# 🚀 Quick Release Guide

## First Time Setup (5 minutes)

### 1. Initialize Git Repository
```bash
./setup-repo.sh
```

### 2. Create GitHub Repository
1. Go to https://github.com/new
2. Repository name: `bahleel`
3. **Don't** initialize with README (already exists)
4. Click "Create repository"

### 3. Push to GitHub
```bash
# Add remote
git remote add origin https://github.com/YOUR_USERNAME/bahleel.git

# Push main branch
git push -u origin main

# Push develop branch
git push -u origin develop

# Push tag
git tag -a v0.1.0 -m "Release version 0.1.0"
git push origin v0.1.0
```

### 4. Create GitHub Release
1. Go to: https://github.com/YOUR_USERNAME/bahleel/releases/new
2. Select tag: `v0.1.0`
3. Title: `v0.1.0 - Initial Release`
4. Copy description from `CHANGELOG.md`
5. Click "Publish release"

Done! 🎉

## Future Releases

### For New Features (v0.2.0)

```bash
# 1. Work on develop branch
git checkout develop
git checkout -b feature/new-feature
# ... make changes ...
git commit -m "feat: add new feature"
git push origin feature/new-feature

# 2. Create PR: feature → develop
# 3. After merge, when ready to release:
git checkout main
git merge develop

# 4. Update CHANGELOG.md
# - Move [Unreleased] items to [0.2.0]
# - Add release date

# 5. Tag and push
git tag -a v0.2.0 -m "Release version 0.2.0"
git push origin main v0.2.0

# 6. Create GitHub Release
```

### For Bug Fixes (v0.1.1)

```bash
# 1. Create hotfix from main
git checkout main
git checkout -b hotfix/v0.1.1
# ... fix bug ...
git commit -m "fix: critical bug"

# 2. Merge and tag
git checkout main
git merge hotfix/v0.1.1
git tag -a v0.1.1 -m "Hotfix v0.1.1"
git push origin main v0.1.1

# 3. Merge back to develop
git checkout develop
git merge main
git push origin develop

# 4. Create GitHub Release
```

## Pre-Release Checklist

```bash
# ✅ Run tests
php bahleel test

# ✅ Check code style
./vendor/bin/pint

# ✅ Manual testing
php bahleel make:spider TestSpider
php bahleel run:spider TestSpider
php bahleel spider:list

# ✅ Update CHANGELOG.md
# ✅ Update version numbers
# ✅ Commit changes
```

## Version Numbers (Semantic Versioning)

- `v1.0.0` → `v2.0.0` - **MAJOR**: Breaking changes
- `v0.1.0` → `v0.2.0` - **MINOR**: New features
- `v0.1.0` → `v0.1.1` - **PATCH**: Bug fixes

## Useful Commands

```bash
# View all tags
git tag -l

# Delete tag (if mistake)
git tag -d v0.1.0
git push origin :refs/tags/v0.1.0

# View commits since last tag
git log $(git describe --tags --abbrev=0)..HEAD --oneline

# Check what will be released
git diff main..develop

# View current version
git describe --tags
```

## GitHub Release Template

```markdown
# 🎉 Bahleel v0.2.0

## ✨ What's New
- Feature 1: Description
- Feature 2: Description

## 🐛 Bug Fixes
- Fix 1: Description

## 📦 Installation
\`\`\`bash
git clone https://github.com/bahleel/bahleel.git
cd bahleel
composer install
php bahleel migrate
\`\`\`

## 🔄 Upgrade
\`\`\`bash
git pull origin main
composer update
php bahleel migrate
\`\`\`

## 📝 Full Changelog
See [CHANGELOG.md](CHANGELOG.md)
```

## Need Help?

- 📖 Full guide: [RELEASE_STRATEGY.md](RELEASE_STRATEGY.md)
- 📋 Detailed checklist: [RELEASE_CHECKLIST.md](RELEASE_CHECKLIST.md)
- 🤝 Contributing: [CONTRIBUTING.md](CONTRIBUTING.md)

---

**Happy Releasing! 🚀**
