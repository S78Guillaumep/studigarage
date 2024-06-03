Démarche à suivre pour l'exécution en local:

-Installer Composer
(gestionnaire de dépendance)
-installer Symfony CLI
-Créer dans le dossier studigarage un nouveau projet
via commande: symfony new --webapp parrotv -version=lts
-Dupliquer le fichier .env en .env.local 
mes paramètres personnels ne transitent pas puisque lier à git
-Apporter les modifications nécessaires à ce dossier
pour ma part, décommenter la ligne qui appelle mysql et la modifier pour la lier à ma base de données.
-Configurer la base de données
-Exécuter les migrations
nécessaire à la mise à jour de la base de données
-Démarrer le serveur web local
symfony serve:start
-Développer le projet


Création d'un administrateur pour le back office de l'application web:

-Création de l'entité Users
-Mise à jour de la base de données (migration)
-Création d'un contrôleur et de vues pour les utilisateurs
-Création de Datafixtures pour les utilisateurs
c'est ici que je peux définir le rôle d'un utilisateur et en faire un Admin
-Mise à jour de la base de données
-Gestion des permissions utilisateurs
security.yaml

-Création d'un dossier Admin dans Controller 
dans le but de gérer les fonctionnalités spécifiques à l'administrateur


