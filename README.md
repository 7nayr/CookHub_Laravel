# CookHub

Bienvenue sur CookHub, une plateforme dédiée aux passionnés de cuisine. Ce projet permet aux utilisateurs de créer, partager et découvrir des recettes, ainsi que de participer à des ateliers culinaires.

## Structure du Projet

### Fichiers de Vue (`resources/views`)

- **layouts** : Contient les mises en page de base utilisées dans l'application.
    - `app.blade.php` : Mise en page principale pour les utilisateurs connectés.
    - `guest.blade.php` : Mise en page pour les utilisateurs non connectés.
    - `navigation.blade.php` : Barre de navigation commune à toutes les pages.

- **recipes** : Contient les vues liées aux recettes.
    - `create.blade.php` : Formulaire de création de recette.
    - `edit.blade.php` : Formulaire de modification de recette.
    - `index.blade.php` : Liste des recettes.
    - `show.blade.php` : Affichage détaillé d'une recette.

- **workshops** : Contient les vues liées aux ateliers culinaires.
    - `create.blade.php` : Formulaire de création d'atelier.
    - `edit.blade.php` : Formulaire de modification d'atelier.
    - `index.blade.php` : Liste des ateliers.

- **auth** : Contient les vues d'authentification.
    - `login.blade.php` : Formulaire de connexion.
    - `register.blade.php` : Formulaire d'inscription.

### Contrôleurs (`app/Http/Controllers`)

- **RecipeController.php** : Gère les opérations CRUD (Create, Read, Update, Delete) pour les recettes.
- **WorkshopController.php** : Gère les opérations CRUD pour les ateliers culinaires.
- **Auth** : Contient les contrôleurs d'authentification.
    - `AuthenticatedSessionController.php` : Gère les sessions utilisateur.
    - `RegisteredUserController.php` : Gère l'inscription des utilisateurs.
    - `ConfirmablePasswordController.php` : Gère la confirmation des mots de passe.
    - `NewPasswordController.php` : Gère la réinitialisation des mots de passe.

### Routes (`routes/web.php`)

- Définit les routes de l'application.
- Routes pour les recettes :
    - `recipes.index` : Affiche la liste des recettes.
    - `recipes.create` : Affiche le formulaire de création de recette.
    - `recipes.store` : Enregistre une nouvelle recette.
    - `recipes.edit` : Affiche le formulaire de modification de recette.
    - `recipes.update` : Met à jour une recette existante.
    - `recipes.destroy` : Supprime une recette.
- Routes pour les ateliers :
    - `workshops.index` : Affiche la liste des ateliers.
    - `workshops.create` : Affiche le formulaire de création d'atelier.
    - `workshops.store` : Enregistre un nouvel atelier.
    - `workshops.edit` : Affiche le formulaire de modification d'atelier.
    - `workshops.update` : Met à jour un atelier existant.
    - `workshops.destroy` : Supprime un atelier.

## Installation

1. Clonez le dépôt :
     ```bash
     git clone https://github.com/votre-utilisateur/cookhub.git
     ```
2. Installez les dépendances :
     ```bash
     cd cookhub
     composer install
     npm install
     ```
3. Configurez l'environnement :
     ```bash
     cp .env.example .env
     php artisan key:generate
     ```
4. Configurez la base de données dans le fichier `.env`.
5. Exécutez les migrations et les seeders :
     ```bash
     php artisan migrate --seed
     ```
6. Démarrez le serveur de développement :
     ```bash
     php artisan serve
     ```

## Contribution

Les contributions sont les bienvenues ! Veuillez soumettre une pull request ou ouvrir une issue pour discuter des changements que vous souhaitez apporter.

## Licence

Ce projet est sous licence MIT. Voir le fichier [LICENSE](LICENSE) pour plus de détails.
