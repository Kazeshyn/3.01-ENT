# 3.01-ENT
Projet de deuxième année de création d'un ENT

lien du site : https://ent.nboireau.fr/ 
Hébergeur : ionos

Procédure d'hébergement : 
Notre site est d'abord en local sur WAMP et les fichiers sont hébergés sur github. 
Nous avons effectué notre base de donnée sur phpmyadmin grâce à l'url localhost/phpmyadmin
Il s'agit donc de la base de donnée en local. 
L'identifiant a renseigné lorsqu'on liait notre base de donnée à nos fichier php fut : 'root' et mot de passe ''

Une fois les informations de notre base de donnée effectué et tous les fichiers finis nous avons exporté notre base de donnée et compresser notre dossier final (3.01-ENT) dans un fichier zip. 

Nous avons décidé d'héberger notre site sur le serveur Ionos. 
Possédant déjà un compte et un nom de domaine, nous avons utilisé celui de Nahina : nboireau.fr

Pour cela les étapes ont été les suivantes : 
1) Importer nos fichier dans l'espace web un dossier 3.01-ENT crée
2) Création de notre base de donnée sur Ionos grâce phpmyadmin qu'on retrouve dans la rubrique Hébergement. Pour cela on importe à l'intérieur notre base de donnée de notre phpmyadmin local. On pourra ainsi récupérer toutes nos informations et tables. 
Une fois la base de donnée crée on a les informations qu'on pourra mettre dans nos fichier lors de la connexion à la base de donnée c'est à dire.
   --> dbname : ent
   --> port : 3306
   -->nom de l'hôte : db5014997432.hosting-data.io
   --> nom de l'utilisateur : dbu1451212
   --> mot de passe : Domoina1!

3) Créer un sous domaine ent.nboireau.fr qui se trouve à l'intérieur de ce dossier 3.01-ENT qu'on a crée
4) On vérifie la certification SSL qui permet de sécurisé notre site, il permet donc de présenter notre url sous la forme d'un https://
5) Enfin nous avons notre site hébergé à l'url  https://ent.nboireau.fr/ 
