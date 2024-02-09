#!/bin/bash

# Vérifier si Vagrant est installé
if ! command -v vagrant &> /dev/null
then
    echo "Vagrant n'est pas installé. Veuillez l'installer avant de continuer."
    exit 1
fi

# Vérifier si VirtualBox est installé
if ! command -v virtualbox &> /dev/null
then
    echo "VirtualBox n'est pas installé. Veuillez l'installer avant de continuer."
    exit 1
fi

# Créer un répertoire pour le Vagrantfile s'il n'existe pas déjà

# Mot de passe pour root
ROOT_PASSWORD="finalstep"

# Mot de passe pour protéger le répertoire
DIRECTORY_PASSWORD="protectdir"

# Mot de passe encodé en base64
ROOT_PASSWORD_BASE64=$(echo -n $ROOT_PASSWORD | base64)

# Mot de passe encodé en base32 (deux fois)
ROOT_PASSWORD_BASE32=$(echo -n $ROOT_PASSWORD_BASE64 | base64 | base32)

# Créer un Vagrantfile
cat <<EOF > Vagrantfile
Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/bionic64"
  config.vm.network "forwarded_port", guest: 22, host: 2224
  config.vm.provider "virtualbox" do |vb|
    vb.memory = "1024"
  end

  config.vm.provision "shell", inline: <<-SHELL
    # Créer un utilisateur avec des permissions excessives
    apt-get update
    apt-get install -y zip
    useradd -m user
    echo "user:password" | chpasswd
    mkdir /home/user/excessive_permissions
    echo "Informations sensibles" > /home/user/excessive_permissions/sensitive_info.txt
    chmod 777 /home/user/excessive_permissions

    # Configurer la connexion automatique de l'utilisateur au démarrage
    echo "exec su -l user" >> /home/user/.bashrc

    # Fixer le mot de passe de root à "finalstep"
    echo "root:$ROOT_PASSWORD" | chpasswd

    # Créer un répertoire protégé par mot de passe
    mkdir /home/user/protected_directory
    echo "$ROOT_PASSWORD_BASE32" > /home/user/protected_directory/protected_file.txt
    zip -q -r -P $DIRECTORY_PASSWORD /home/user/excessive_permissions/protected_directory.zip /home/user/protected_directory
    rm -rf /home/user/protected_directory
  SHELL
end
EOF

# Démarrer la machine virtuelle avec Vagrant
vagrant up
