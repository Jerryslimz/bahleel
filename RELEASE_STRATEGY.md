# 🚀 Strategi Rilis Bahleel

## 📚 Ringkasan Strategi

Strategi rilis yang komprehensif telah disiapkan untuk memastikan release yang profesional dan terorganisir.

## ✅ File yang Sudah Disiapkan

### 1. **Dokumentasi Proyek**
- ✅ `CHANGELOG.md` - Track semua perubahan dengan format standardized
- ✅ `CONTRIBUTING.md` - Guide untuk contributor
- ✅ `RELEASE_CHECKLIST.md` - Checklist lengkap sebelum release
- ✅ `README.md` - Updated dengan badges dan informasi lengkap

### 2. **GitHub Configuration**
- ✅ `.github/ISSUE_TEMPLATE/bug_report.md` - Template untuk bug reports
- ✅ `.github/ISSUE_TEMPLATE/feature_request.md` - Template untuk feature requests
- ✅ `.github/PULL_REQUEST_TEMPLATE.md` - Template untuk pull requests
- ✅ `.github/workflows/tests.yml` - CI untuk running tests
- ✅ `.github/workflows/code-style.yml` - CI untuk code style checks

### 3. **Project Management**
- ✅ `.gitignore` - Updated untuk exclude generated files
- ✅ `composer.json` - Updated dengan project metadata
- ✅ `setup-repo.sh` - Script untuk initial git setup

## 🎯 Langkah-Langkah Release

### Fase 1: Setup Repository (First Time)

```bash
# 1. Setup Git repository
./setup-repo.sh

# 2. Create GitHub repository
# - Go to https://github.com/new
# - Repository name: bahleel
# - Public/Private: Public
# - Don't initialize with README (already exists)

# 3. Connect to GitHub
git remote add origin https://github.com/bahleel/bahleel.git
git push -u origin main
git push -u origin develop

# 4. Create first tag
git tag -a v0.1.0 -m "Release version 0.1.0 - Initial release"
git push origin v0.1.0
```

### Fase 2: Create GitHub Release

1. **Go to Releases**
   - Navigate to: `https://github.com/bahleel/bahleel/releases`
   - Click "Draft a new release"

2. **Fill Release Information**
   - **Tag**: Select `v0.1.0`
   - **Title**: `v0.1.0 - Initial Release`
   - **Description**: Copy from `CHANGELOG.md`

3. **Additional Settings**
   - ☑️ Set as the latest release
   - ☑️ Create a discussion for this release

4. **Publish Release**

### Fase 3: Enable GitHub Features

1. **Enable GitHub Actions**
   - Actions should run automatically on push/PR
   - Check workflows at: `https://github.com/bahleel/bahleel/actions`

2. **Setup Branch Protection** (Recommended)
   - Settings → Branches → Add rule
   - Branch name pattern: `main`
   - ☑️ Require pull request reviews before merging
   - ☑️ Require status checks to pass before merging
   - ☑️ Require tests to pass

3. **Configure Repository Settings**
   - Settings → General → Features
   - ☑️ Issues
   - ☑️ Discussions (optional)
   - ☑️ Projects (optional)

### Fase 4: Post-Release

1. **Announce Release**
   - Create Discussion post about the release
   - Share on relevant communities (if applicable)

2. **Monitor Issues**
   - Watch for bug reports
   - Respond to issues promptly

3. **Plan Next Release**
   - Create milestone for v0.2.0
   - Label issues for next release

## 🔄 Development Workflow

### Branch Strategy

```
main (production)
  └── develop (development)
       ├── feature/new-feature
       ├── bugfix/fix-something
       └── hotfix/critical-fix
```

### For New Features

```bash
# Start from develop
git checkout develop
git pull origin develop

# Create feature branch
git checkout -b feature/awesome-feature

# Work on feature
# ... make changes ...
git add .
git commit -m "feat: add awesome feature"

# Push and create PR
git push origin feature/awesome-feature
# Create PR on GitHub: feature/awesome-feature → develop
```

### For Bug Fixes

```bash
# Start from develop
git checkout develop
git checkout -b bugfix/fix-issue-123

# Fix bug
# ... make changes ...
git add .
git commit -m "fix: resolve issue #123"

# Push and create PR
git push origin bugfix/fix-issue-123
```

### For Hotfixes (Critical Production Bugs)

```bash
# Start from main
git checkout main
git checkout -b hotfix/v0.1.1

# Fix critical bug
# ... make changes ...
git add .
git commit -m "fix: critical bug in spider runner"

# Merge to main
git checkout main
git merge hotfix/v0.1.1
git tag -a v0.1.1 -m "Hotfix: critical bug fix"
git push origin main v0.1.1

# Merge to develop
git checkout develop
git merge hotfix/v0.1.1
git push origin develop
```

## 📊 Release Schedule (Recommended)

### Semantic Versioning

- **MAJOR** (1.0.0): Breaking changes, major rewrites
- **MINOR** (0.X.0): New features, backward compatible
- **PATCH** (0.1.X): Bug fixes, backward compatible

### Suggested Timeline

- **Patch releases**: As needed (bug fixes)
- **Minor releases**: Every 2-4 weeks (new features)
- **Major releases**: Every 3-6 months (breaking changes)

## 🛠️ Pre-Release Checklist

Before every release, verify:

```bash
# 1. All tests pass
php bahleel test

# 2. Code style is correct
./vendor/bin/pint

# 3. CHANGELOG is updated
# - Version number
# - Release date
# - All changes documented

# 4. Version numbers match
# - CHANGELOG.md
# - Git tag
# - GitHub release

# 5. Documentation is current
# - README.md reflects current features
# - Examples are working
# - Links are valid
```

## 📦 Build Options (Future)

### Create Standalone Executable

```bash
# Using Laravel Zero's build command
php bahleel app:build bahleel

# Creates: builds/bahleel
# Distribute this single file!
```

### Package as PHAR

```bash
# Install box
composer require laravel-zero/phar-updater --dev

# Build PHAR
php bahleel app:build

# Distribute bahleel.phar
```

## 🎓 Best Practices

1. **Always test before release**
   - Run full test suite
   - Manual testing of key features
   - Test on clean environment

2. **Keep CHANGELOG updated**
   - Update with every PR
   - Use clear, user-friendly descriptions
   - Include migration notes for breaking changes

3. **Semantic versioning**
   - Follow semver.org strictly
   - Communicate breaking changes clearly
   - Provide migration guides

4. **Documentation first**
   - Update docs before release
   - Include code examples
   - Keep README concise

5. **Communication**
   - Announce releases
   - Respond to issues promptly
   - Be transparent about bugs

## 🚨 Emergency Procedures

### Rollback a Release

```bash
# If v0.2.0 has critical bug
git checkout main
git revert <commit-hash>
git push origin main

# Create hotfix
git checkout -b hotfix/v0.2.1
# ... fix bug ...
git tag -a v0.2.1 -m "Hotfix: critical bug"
git push origin v0.2.1
```

### Deprecate a Release

1. Edit GitHub release
2. Mark as "Pre-release"
3. Add warning in description
4. Create new fixed release

## 📞 Support

Setelah release:
- Monitor GitHub Issues
- Check GitHub Discussions
- Watch for security issues
- Update documentation based on user feedback

## 🎉 Ready to Release!

Semua file sudah disiapkan. Jalankan:

```bash
./setup-repo.sh
```

Dan follow the on-screen instructions!

---

**Good luck with your release! 🚀**
