#!/bin/bash

# Bahleel - Initial Repository Setup Script

echo "🕷️  Bahleel - Setting up Git repository..."
echo ""

# Initialize git if not already initialized
if [ ! -d .git ]; then
    echo "✓ Initializing Git repository..."
    git init
    git branch -M main
else
    echo "✓ Git repository already initialized"
fi

# Create .gitkeep files for empty directories
echo "✓ Creating .gitkeep files..."
touch storage/logs/.gitkeep
touch storage/framework/cache/.gitkeep
touch storage/framework/views/.gitkeep
mkdir -p spiders middlewares processors exporters
touch spiders/.gitkeep
touch middlewares/.gitkeep
touch processors/.gitkeep
touch exporters/.gitkeep

# Create develop branch
echo "✓ Creating develop branch..."
git branch develop

echo ""
echo "✅ Git repository setup complete!"
echo ""
echo "Next steps:"
echo "1. Review files: git status"
echo "2. Stage files: git add ."
echo "3. Create initial commit: git commit -m 'chore: initial commit - Bahleel v0.1.0'"
echo "4. Create GitHub repository: https://github.com/new"
echo "5. Add remote: git remote add origin https://github.com/bahleel/bahleel.git"
echo "6. Push to GitHub: git push -u origin main"
echo "7. Push develop: git push -u origin develop"
echo "8. Create first tag: git tag -a v0.1.0 -m 'Release version 0.1.0'"
echo "9. Push tag: git push origin v0.1.0"
echo "10. Create GitHub Release from tag"
echo ""
