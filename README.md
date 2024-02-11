# GestionnaireDEmprunt

Site web de gestionnaire d'emprunt de matériel informatique

## Arborescence

- main
  - controller
    - contient les controleurs de chaques pages du styte web
  - entity
    - contient les POJO du projet
  - repository
    - contient les classes permettant d'agir sur les entités (CRUD…)
  - view
    - contient les pages HTML
- ressources
  - images
    - contient les images utilisés dans le projet
  - styles
    - contient les feuilles de style

## Mode d'emploi
Afin de tester l'application il est possible d'utiliser Wampserver64.

Tout d'abord, il vous faudra créer la base de données : 
Après avoir lancé Wampserver64, aller dans la partie phpmyadmin en cliquant avec le clic gauche sur l'icone Wampserver64 et sur la partie phpmyadmin.

Il faut tout d'abord changer le mot de passe de root en se connectant avec root et pas de mot de passe puis aller dans "Compte utilisateurs", root puis change password et remplacer par root.

Puis il faut créer une nouvelle base de données avec "Nouvelle base de données" puis comme nom il faut mettre "db_gestemprunt". Puis il faut aller dans Importer et importer le ficher "script.sql".

Pour accéder au site web, placer le code source dans un dossier nommé dans "C:\wamp64\www" puis se rendre dans le projet dans un navigateur 
et cliquer sur le dossier du projet puis main puis view ou il est possible d'entrer sur le site avec le lien "localhost/"nomdudossierajouté"/main/view/index.php" .

Si vous voulez vous connecter avec un profil administrateur, la base de données comporte déjà un compte sous le matricule "0000001" et comme mot de passe "password".