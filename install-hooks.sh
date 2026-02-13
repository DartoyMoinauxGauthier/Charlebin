#!/bin/bash

# Script d'installation du pre-commit hook pour CharleBin
# Usage: ./install-hooks.sh

echo "🚀 Installation du pre-commit hook pour CharleBin"
echo ""

# Vérifier que nous sommes dans un dépôt Git
if [ ! -d ".git" ]; then
    echo "❌ Erreur : Ce script doit être exécuté à la racine d'un dépôt Git"
    exit 1
fi

# Vérifier que le fichier pre-commit existe
if [ ! -f "git-hooks/pre-commit" ]; then
    echo "❌ Erreur : Le fichier git-hooks/pre-commit est introuvable"
    echo "   Assurez-vous d'avoir créé le fichier correctement"
    exit 1
fi

# Créer le dossier .git/hooks s'il n'existe pas
mkdir -p .git/hooks

# Copier le pre-commit hook
echo "📋 Copie du pre-commit hook..."
cp git-hooks/pre-commit .git/hooks/pre-commit

# Rendre le hook exécutable
echo "🔐 Attribution des permissions d'exécution..."
chmod +x .git/hooks/pre-commit

# Vérifier que PHP CS Fixer est installé
echo "📦 Vérification des dépendances..."
if [ ! -f "vendor/bin/php-cs-fixer" ]; then
    echo "⚠️  PHP CS Fixer non trouvé. Installation via Composer..."
    composer require --dev friendsofphp/php-cs-fixer
fi

# Vérifier que PHPMD est installé
if [ ! -f "vendor/bin/phpmd" ]; then
    echo "⚠️  PHPMD non trouvé. Installation via Composer..."
    composer require --dev phpmd/phpmd
fi

echo ""
echo "✅ Pre-commit hook installé avec succès !"
echo ""
echo "📝 Le hook va maintenant :"
echo "   1. Corriger automatiquement le style de code (PHP CS Fixer)"
echo "   2. Ajouter les fichiers corrigés au commit"
echo "   3. Bloquer le commit si PHPMD détecte des erreurs"
echo ""
echo "💡 Pour bypasser le hook (déconseillé) :"
echo "   git commit --no-verify -m \"message\""
echo ""
