from flask import Flask,flash,send_file,  request, jsonify, render_template, render_template_string, session, redirect, url_for
import sqlite3
import pickle, io
import os
app = Flask(__name__)
secret_flag = "CTF{you_got_me}"
code_specifique = "one_piece"
app.secret_key = 'my_secret_key'  
app.config['SESSION_COOKIE_SAMESITE'] = 'None' 

users_db = {'ibtissam': 'password123'}

def get_db_connection():
    conn = sqlite3.connect('database.db')
    conn.row_factory = sqlite3.Row
    return conn


def export_backup_for_download(data):
    """
    Sérialise les données et les prépare pour le téléchargement.

    Args:
    data: Les données à sérialiser.

    Returns:
    BytesIO: Un objet BytesIO contenant les données sérialisées.
    """
    try:
        serialized_data = pickle.dumps(data)
        memory_file = io.BytesIO()
        memory_file.write(serialized_data)
        memory_file.seek(0)  # Remet le curseur au début du fichier
        return memory_file
    except Exception as e:
        raise e

def import_backup(file_path=None):
    try:
        if file_path is None:
            user_home_dir = os.path.expanduser("~")
            file_path = os.path.join(user_home_dir, 'backup.pickle')
        
        with open(file_path, 'rb') as file:
            serialized_data = file.read()
        
        data = pickle.loads(serialized_data)
        return True, data
    except Exception as e:
        return False, f"Échec de la restauration : {str(e)}"

@app.route('/', methods=['GET', 'POST'])
def accueil():
    if request.method == 'POST':
        # Vérifiez les identifiants de l'utilisateur
        if request.form['username'] == 'briffaut' and request.form['password'] == 'you_cant_guess_it_^]':  # Remplacez par votre logique de vérification
            session['logged_in'] = True
            return redirect(url_for('index'))
        else:
            pass

    return render_template('accueil.html')

@app.route('/index')
def index():
    if not session.get('logged_in'):
        return redirect(url_for('accueil'))
    return render_template('index.html')
@app.route('/search', methods=['GET'])
def search():
    query = request.args.get('query')
    conn = get_db_connection()
    cur = conn.cursor()

    cur.execute(f"SELECT * FROM users WHERE username LIKE '%{query}%'")
    results = cur.fetchall()

    conn.close()
    return render_template('results.html', results=results)

@app.route('/login', methods=['GET', 'POST'])
def login():
    if request.method == 'POST':
        username = request.form['username']
        password = request.form['password']

        conn = get_db_connection()
        cur = conn.cursor()
        cur.execute("SELECT permission FROM users WHERE username = ? AND password = ?", (username, password))
        user_data = cur.fetchone()
        conn.close()

        if user_data and user_data['permission'] == 'admin':
            session['username'] = username
            session['permission'] = 'admin'
            return redirect('/admin-only')

    return render_template('login.html')

@app.route('/admin-only')
def admin_only():
    if 'username' not in session:
        return redirect('/login') 
    if session.get('permission') == 'admin':
        return render_template('admin_only.html')    
    else:
        return "Vous n'avez pas l'autorisation d'accéder à cette page."

@app.route('/page-protegee', methods=['GET', 'POST'])
def page_protegee():
    if 'username' not in session or session.get('permission') != 'admin':
        return redirect('/login')

    if request.method == 'POST':
        code_saisi = request.form['code']
        if code_saisi == code_specifique:
            return render_template('page-protegee.html')        
        else:
            return "Code incorrect. Accès refusé."

    return render_template('code_protege.html') # Redirige vers la page admin si l'accès direct est tenté


@app.route('/post-comment', methods=['POST'])
def post_comment():
    comment = request.form['comment']

    return render_template_string(f"<div>{comment}</div>")

@app.route('/reveal-flag', methods=['GET'])
def reveal_flag():
    if request.args.get('token') == 'secret_token':
        return secret_flag
    return "Accès refusé"

@app.route('/admin-save', methods=['POST'])
def admin_save():
    if 'username' not in session or session.get('permission') != 'admin':
        return redirect('/login')

    hint_data = {
        'hint': (
            "Dans la vallée de Cypheria, un vieux gardien garde un secret depuis des générations. "
            "Il a toujours dit : \"Le secret est dans le rythme des mots.\"\n\n"
            "Le gardien partagea un jour ce poème :\n\n"
            "\"Savoir est le début. Écoutez le vent, Cachant des secrets, Riant sous la lune, Éclairé par les étoiles.\"\n\n"
            "Les aventuriers qui visitent Cypheria réfléchissent souvent sur ces mots, cherchant le secret caché dans le rythme et la cadence du poème."
            "dm90cmUgY29kZSBzZWNyZXRlIGVzdCA6IG9uZV9waWVjZQ=="
        )
    }

    memory_file = export_backup_for_download(hint_data)
    return send_file(memory_file, as_attachment=True, download_name='backup.pickle', mimetype='application/octet-stream')

@app.route('/admin-restore', methods=['POST'])
def admin_restore():
    if 'username' not in session or session.get('permission') != 'admin':
        return redirect('/login')

    success, restored_data = import_backup()

    if success:
        

        return "Configuration des utilisateurs restaurée avec succès."
    else:
        return f"Échec de la restauration de la configuration : {restored_data}"

if __name__ == "__main__":
    app.run(host='0.0.0.0', port=5000)
