# Comptes-rendus de Gauthier, ressource R4.02 - Qualité de développement #

# CharleBin

CharleBin est un projet pédagogique basé sur **PrivateBin**, une plateforme de "pastebin" minimaliste, open-source et chiffrée. 

### À quoi ça sert ?
Il permet de partager des notes ou du code de manière sécurisée. Contrairement aux services classiques, les données sont chiffrées et déchiffrées directement dans le navigateur du client. Le serveur ne possède jamais la clé de déchiffrement, garantissant une confidentialité totale (Zero-Knowledge).

### Fonctionnalités principales
- Chiffrement côté client (AES-256).
- Définition d'une durée d'expiration des messages.
- Protection par mot de passe optionnelle.
- Support du format Markdown et de la coloration syntaxique.

### Installation locale
1. Clonez le dépôt.
2. Lancez l'installation des dépendances : `make install`.
3. Démarrez le projet : `make start`.



## Séance 2 ##

### Transparents 01 - Mise en place de l'environnement distant ###

Mes manipulations :

 - Configuration d'une clé SSH publique sur GitHub et activation de l'agent SSH pour éviter la saisie répétée du mot de passe.
 - Création d'un repository nommé **CharleBin** sur l'interface GitHub.
 - Liaison du repository local au nouveau repository distant à l'aide de la commande `git remote set-url`.
 - Envoi de l'intégralité du contenu de la branche `main` locale vers le serveur GitHub.

Il y avait du code que voilà :

```bash
git remote set-url origin git@github.com:DartoyMoinauxGauthier/CharleBin.git
git push -u origin main
```

### Transparents 02 - Synchronisation via GitHub ###

Mes manipulations :

 - Modification du titre de la page de "PrivateBin" vers "CharleBin" directement dans le fichier lib/Configuration.php via l'interface web de GitHub.
 - Constat que le changement fait sur GitHub n'est pas présent localement.
 - Utilisation de `git pull` pour rapatrier les modifications et synchroniser le répertoire de travail.

### Transparents 03 - Ouverture d'une Pull Request (PR) ###

Mes manipulations :

 - Vérification de l'état du dépôt avec `git status`.
 - Création d'une nouvelle branche de fonctionnalité avec `git switch -C`.
 - Modification du code pour supprimer le footer de PrivateBin.
 - Envoi de la branche sur GitHub avec `git push -u origin` et ouverture de la Pull Request sur l'interface sans effectuer la fusion.

### Transparents 04 - Documentation et Règles de contribution ###

Mes manipulations :

 - Création d'un fichier README.md présentant le projet, ses pré-requis (Docker, PHP) et la procédure d'installation.
 - Rédaction d'un fichier CONTRIBUTING.md expliquant les règles de contribution (scénario de PR, respect des linters).
 - Mise en place d'un template de Pull Request pour structurer les retours des contributeurs (description du bug, solution, etc.).

## Séance 3 ##

### Transparents 01 - Installation des outils de qualité ###

Mes manipulations :

 - Installation de PHP Code Sniffer pour vérifier les standards PSR et de PHP Mess Detector pour analyser la complexité du code.
 - Création d'une target `lint` dans le Makefile pour exécuter les trois linters (PHP Lint, PHPCS, PHPMD) en une seule commande.
 - Correction de plus de 5 erreurs de style et de complexité signalées par les outils.

Il y avait du code que voilà :

```makefile
lint:
	php -l ./lib/*.php
	./vendor/bin/phpcs --extensions=php ./lib/
	./vendor/bin/phpmd ./lib ansi codesize,unusedcode,naming
	kyotaro@Gotye:~/QualiteDev/Charlebin/CharleBin$ ./vendor/bin/phpcbf --standard=PSR12 ./lib/

PHPCBF RESULT SUMMARY
---------------------------------------------------------------------------------------------------------
FILE                                                                                     FIXED  REMAINING
---------------------------------------------------------------------------------------------------------
/home/kyotaro/QualiteDev/Charlebin/CharleBin/lib/Json.php                                3      2
/home/kyotaro/QualiteDev/Charlebin/CharleBin/lib/I18n.php                                8      16
/home/kyotaro/QualiteDev/Charlebin/CharleBin/lib/Proxy/YourlsProxy.php                   3      4
/home/kyotaro/QualiteDev/Charlebin/CharleBin/lib/Proxy/ShlinkProxy.php                   3      4
/home/kyotaro/QualiteDev/Charlebin/CharleBin/lib/Proxy/AbstractProxy.php                 6      11
/home/kyotaro/QualiteDev/Charlebin/CharleBin/lib/TemplateSwitcher.php                    3      4
/home/kyotaro/QualiteDev/Charlebin/CharleBin/lib/FormatV2.php                            6      1
/home/kyotaro/QualiteDev/Charlebin/CharleBin/lib/Persistence/TrafficLimiter.php          2      6
/home/kyotaro/QualiteDev/Charlebin/CharleBin/lib/Persistence/AbstractPersistence.php     3      2
/home/kyotaro/QualiteDev/Charlebin/CharleBin/lib/Persistence/PurgeLimiter.php            3      2
/home/kyotaro/QualiteDev/Charlebin/CharleBin/lib/Persistence/ServerSalt.php              3      2
/home/kyotaro/QualiteDev/Charlebin/CharleBin/lib/Exception/TranslatedException.php       3      2
/home/kyotaro/QualiteDev/Charlebin/CharleBin/lib/Exception/JsonException.php             3      1
/home/kyotaro/QualiteDev/Charlebin/CharleBin/lib/Request.php                             7      13
/home/kyotaro/QualiteDev/Charlebin/CharleBin/lib/Data/GoogleCloudStorage.php             3      8
/home/kyotaro/QualiteDev/Charlebin/CharleBin/lib/Data/AbstractData.php                   3      3
/home/kyotaro/QualiteDev/Charlebin/CharleBin/lib/Data/S3Storage.php                      3      11
/home/kyotaro/QualiteDev/Charlebin/CharleBin/lib/Data/Filesystem.php                     3      14
/home/kyotaro/QualiteDev/Charlebin/CharleBin/lib/Data/Database.php                       15     23
/home/kyotaro/QualiteDev/Charlebin/CharleBin/lib/Filter.php                              3      1
/home/kyotaro/QualiteDev/Charlebin/CharleBin/lib/Model.php                               3      3
/home/kyotaro/QualiteDev/Charlebin/CharleBin/lib/Model/Paste.php                         3      6
/home/kyotaro/QualiteDev/Charlebin/CharleBin/lib/Model/Comment.php                       3      3
/home/kyotaro/QualiteDev/Charlebin/CharleBin/lib/Model/AbstractModel.php                 3      9
/home/kyotaro/QualiteDev/Charlebin/CharleBin/lib/Vizhash16x16.php                        3      4
/home/kyotaro/QualiteDev/Charlebin/CharleBin/lib/Configuration.php                       3      21
/home/kyotaro/QualiteDev/Charlebin/CharleBin/lib/View.php                                3      3
/home/kyotaro/QualiteDev/Charlebin/CharleBin/lib/Controller.php                          8      30
---------------------------------------------------------------------------------------------------------
A TOTAL OF 115 ERRORS WERE FIXED IN 28 FILES
---------------------------------------------------------------------------------------------------------

Time: 5.34 secs; Memory: 16MB
```

### Transparents 02 - Automatisation par Pre-commit Hooks ###

Mes manipulations :

 - Configuration d'un script bash dans `.git/hooks/` pour créer un pre-commit hook.
 - Utilisation de PHP CS Fixer pour corriger automatiquement les erreurs de formatage avant le commit.
 - Ajout d'une condition pour interdire le commit si PHP Mess Detector détecte des violations majeures.

### Transparents 03 - Intégration Continue (CI) ###

Mes manipulations :

 - Mise en place d'une GitHub Action de lint pour automatiser la vérification sur chaque Pull Request.
 - Activation de la protection de branche sur `main` dans les réglages GitHub pour empêcher les commits directs et exiger un passage réussi de la CI.

## Séance 4 ##

### Transparents 01 - Refactoring assisté par IA ###

Mes manipulations :

 - Installation de l'extension GitHub Copilot sur VS Code.
 - Réécriture de la méthode `formatHumanReadableTime` dans le fichier `lib/Filter.php`.
 - Test de différentes suggestions de l'IA et analyse critique des résultats produits.

### Transparents 02 - Inspection du navigateur et Sécurité ###

Mes manipulations :

 - Utilisation des outils de développement (F12) pour inspecter le DOM et récupérer la valeur d'un champ de mot de passe masqué.
 - Analyse des requêtes dans l'onglet "Network" pour prouver que les données sont chiffrées côté client avant l'envoi au serveur.

## Séance 5 ##

### Transparents 01 - Tests End-to-End avec Cypress ###

Mes manipulations :

 - Installation de Cypress et initialisation du projet de test.
 - Écriture d'un scénario de test complet : création d'un paste, récupération de son URL unique, reconnexion et vérification que le contenu affiché correspond au message initial.
 - Intégration de la suite de tests au dépôt Git.