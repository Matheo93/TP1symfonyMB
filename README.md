echo "# CodeXpress - Gestionnaire de Personnes

## Description

CodeXpress est une application Symfony qui permet de gérer les personnes, les notes, les likes et les réseaux. Ce projet vise à démontrer les compétences en gestion des entités et des relations dans Symfony.

## Installation

1. Clonez le dépôt :
   \`git clone https://github.com/Matheo93/TP1SymfonyMB.git\`
2. Accédez au répertoire du projet :
   \`cd TP1SymfonyMB\`
3. Exécutez \`composer install\` pour installer les dépendances :
   \`composer install\`
4. Configurez votre base de données dans le fichier \`.env\` :
   \`DATABASE_URL=\"mysql://username:password@localhost:3306/database_name\"\`
5. Exécutez les migrations pour mettre à jour la base de données :
   \`php bin/console doctrine:migrations:migrate\`
6. Lancez le serveur de développement :
   \`php -S localhost:8000 -t public\`

## Utilisation

Accédez à \`http://localhost:8000/john\` pour gérer les personnes et tester les fonctionnalités de l'application.
Accédez à \`http://localhost:8000/tp\` pour voir le tp.

## Contribuer

Si vous souhaitez contribuer à ce projet, veuillez soumettre une demande de tirage (pull request) avec vos modifications.

## Licence

Ce projet est sous licence [MIT](LICENSE).
" > README.md