#!/bin/bash

# Contenu du Vagrantfile
cat <<EOF > Vagrantfile
Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/bionic64"
  config.vm.network "forwarded_port", guest: 21, host: 2121, auto_correct: true

  config.vm.provision "shell", inline: <<-SHELL
    # Mise à jour du système
    sudo apt-get update
    sudo apt-get upgrade -y

    # Installation d'un serveur FTP (ici vsftpd)
    sudo apt-get install -y vsftpd

    # Configuration de vsftpd
    echo "anonymous_enable=NO" | sudo tee -a /etc/vsftpd.conf
    echo "local_enable=YES" | sudo tee -a /etc/vsftpd.conf
    echo "write_enable=YES" | sudo tee -a /etc/vsftpd.conf
    echo "chroot_local_user=YES" | sudo tee -a /etc/vsftpd.conf
    echo "allow_writeable_chroot=YES" | sudo tee -a /etc/vsftpd.conf
    echo "seccomp_sandbox=NO" | sudo tee -a /etc/vsftpd.conf
    echo "pasv_enable=YES" | sudo tee -a /etc/vsftpd.conf  # Ajout pour le mode passif
    echo "pasv_min_port=40000" | sudo tee -a /etc/vsftpd.conf  # Port minimum pour le mode passif
    echo "pasv_max_port=40100" | sudo tee -a /etc/vsftpd.conf  # Port maximum pour le mode passif

    # Redémarrage du service vsftpd
    sudo systemctl restart vsftpd

    # Création des répertoires et fichiers souhaités
    sudo mkdir /home/ctf
    sudo mkdir /home/ctf/bureau /home/ctf/telechargement /home/ctf/documents /home/ctf/images
    sudo chown -R ctf:ctf /home/ctf

    # Création des fichiers aléatoires dans chaque répertoire
    for dir in bureau telechargement documents images; do
      for i in {1..5}; do
        echo "Contenu du fichier $i dans le répertoire $dir" | sudo tee /home/ctf/\$dir/fichier\$i.txt > /dev/null
      done
    done

    # Création du fichier cache flag1.txt avec un contenu spécifique
    echo "GE3TELRSGAXDCMBOGE2A====" | sudo tee /home/ctf/.flag1.txt > /dev/null

    # Configuration des identifiants FTP
    sudo useradd -m ctf -s /bin/bash
    echo "ctf:azerty" | sudo chpasswd
  SHELL
end
EOF

# Démarrage de la machine virtuelle avec Vagrant
vagrant up
