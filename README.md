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
Pour ce mode d'emploi, nous allons utiliser Wampserver64.

Tout d'abord, il faut créer la base de données : 
Après avoir lancé Wampserver64, aller dans la partie phpmyadmin en cliquant avec le clique gauche sur l'icone Wampserver64 et sur la partie phpmyadmin.

Il faut tout d'abord changer le mot de passe de root en se connectant avec root et pas de mot de passe puis aller dans "Compte utilisateurs", root puis change password et remplacer par root.

Puis il faut créer une nouvelle base de données avec "Nouvelle base de données" puis comme nom il faut mettre "db_gestemprunt". Puis il faut aller dans Importer et importer le ficher "script.sql".

Pour accèder au site web, il faut mettre le tout le contenu du github dans un dossier nommé dans "C:\wamp64\www" puis après il faut aller dans le projet dans un navigateur 
et cliquer sur le dossier du projet puis main puis view ou vous pouvez entrer sur le site avec le lien "localhost/"nomdudossierajouté"/main/view/index.php .

Si vous voulez vous connectez avec un profil administrateur, la base de données comporte déjà un compte sous le matricule "0000001" et comme mot de passe "password".