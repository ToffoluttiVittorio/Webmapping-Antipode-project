# Webmapping_project
Github du projet webmapping de Vittorio Toffolutti


Pour jouer correctement à ce jeux il faut suivre les étapes de ce README : 

1. Télécharger postgresql sur votre machine, la version 14 est celle utilisé pour faire ce jeux.
2. Télécharger Wampserveur, une fois fais, lancez Wamp, cliquer sur l'icone vert de wamp dans la barre des tâches, PHP, php.ini. Editez ce fichier et décommenter (enlever les ";" en début de ligne) les lignes ";extension=pgsql" et ";extension=pdo_pgsql". 
3. Lancez Pgamdin4, allez dans "Files" en haut à droite, "Preferences" et chercher "Binary Path" dans "Path". Allez en bas, dans PostgreSQL Binary Path et renseigner le chemin du dossier "bin" de votre PostgreSQL dans la bonne version. C'est généralement : "C:\Program Files\PostgreSQL\14\bin" (ici pour une version 14).
4. Créer dans Pgadmin une nouvelle base de donnée qui accuillera la base de donnée de ce projet. Clique droit sur cette nouvelle bdd, "Backup", il ne vous reste plus qu'a indiquer le fichier sql qui est dans ce github. Vous voici avec la base de donnée du projet dans votre pgAdmin.
5. Ensuite Prenez les fichiers php, html et js de ce repository et mettez les dans un même fichier apres "C:\wamp64\www", par exemple : "webmap_vittorio".
6. Editez les fichiers php pour que les données de connexion correspondent à votre installion de PostgresSQ. IL faut modifier ce qu'il y'a entre '', ligne 3 à 7 : 
$host = 'localhost'; 
$port = '5432';
$dbname = 'postgres';
$user = 'postgres';
$password = 'postgres';
Pour connaitre votre host, port et username, dans pgAdmin, clique droit sur votre serveur, "Properties" et "Connection", tout est renseigné dans cette page.
dbname est le nom que vous avez donnée à votre base de donnée et password votre mot de passe. 
Lancez ensuite dans un navigateur internet : "http://localhost/webmap_vittorio/index.html"
