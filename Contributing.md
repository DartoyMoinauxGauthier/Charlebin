# Guide de contribution à CharleBin

Merci de vouloir améliorer CharleBin ! Pour maintenir une qualité de code optimale, merci de respecter les règles suivantes :

### Flux de travail (Workflow)
1. Ne travaillez jamais directement sur la branche `main`.
2. Créez une branche descriptive : `git switch -C feature-nom-de-votre-tache`.
3. Effectuez des commits atomiques et explicites.
4. Poussez votre branche et ouvrez une **Pull Request (PR)**.

### Qualité de code (Linters)
Avant de soumettre une PR, vous devez valider votre code localement avec :
- **PHP Lint** : Pour la syntaxe.
- **PHPCS** : Pour le respect des standards PSR.
- **PHPMD** : Pour détecter le code trop complexe ou inutile.

Lancement des tests de qualité :
```bash
make lint