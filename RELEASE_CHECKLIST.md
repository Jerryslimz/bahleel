# Release Checklist

Use this checklist before releasing a new version of Bahleel.

## Pre-Release Preparation

### Code Quality
- [ ] All tests passing (`php bahleel test`)
- [ ] Code formatted with Pint (`./vendor/bin/pint`)
- [ ] No critical bugs or security issues
- [ ] Manual testing of core features completed

### Documentation
- [ ] README.md updated with new features
- [ ] CHANGELOG.md updated with all changes
- [ ] Version number updated in relevant files
- [ ] Documentation reflects current functionality
- [ ] Code examples tested and working

### Version Management
- [ ] Determine version number (MAJOR.MINOR.PATCH)
  - **MAJOR**: Breaking changes
  - **MINOR**: New features (backward compatible)
  - **PATCH**: Bug fixes (backward compatible)
- [ ] Update version in `composer.json` if needed
- [ ] Update CHANGELOG.md with version and date

## Release Process

### 1. Prepare Release Branch
```bash
# For feature release
git checkout -b release/v0.2.0

# Final updates
# - Update CHANGELOG.md
# - Update version references
# - Update documentation
```

### 2. Final Testing
```bash
# Run full test suite
php bahleel test

# Test in fresh environment
composer install --no-dev
php bahleel migrate
php bahleel make:spider TestSpider
php bahleel run:spider TestSpider
php bahleel test
```

### 3. Commit Release Updates
```bash
git add .
git commit -m "chore: prepare release v0.2.0"
```

### 4. Merge to Main
```bash
git checkout main
git merge release/v0.2.0
```

### 5. Create Git Tag
```bash
# Create annotated tag
git tag -a v0.2.0 -m "Release version 0.2.0"

# Push tag to remote
git push origin v0.2.0
git push origin main
```

### 6. Create GitHub Release
1. Go to: https://github.com/bahleel/bahleel/releases/new
2. Select the tag: `v0.2.0`
3. Release title: `v0.2.0 - Release Name`
4. Description: Copy from CHANGELOG.md
5. Attach binary (if built): `bahleel.phar`
6. Check "Create a discussion for this release"
7. Publish release

### 7. Update Development Branch
```bash
git checkout develop
git merge main
git push origin develop
```

## Post-Release

### Announcements
- [ ] Update GitHub README badges
- [ ] Post release announcement (if applicable)
- [ ] Update project homepage (if exists)
- [ ] Share on relevant communities

### Monitoring
- [ ] Watch for bug reports
- [ ] Monitor GitHub issues
- [ ] Check installation feedback
- [ ] Review automated test results

### Next Steps
- [ ] Create milestone for next version
- [ ] Move unreleased items to new version
- [ ] Plan next release features

## Hotfix Release (Emergency)

For critical bugs in production:

### 1. Create Hotfix Branch
```bash
git checkout main
git checkout -b hotfix/v0.1.1
```

### 2. Fix the Bug
```bash
# Make fixes
# Add tests
git add .
git commit -m "fix: critical bug description"
```

### 3. Release Hotfix
```bash
# Merge to main
git checkout main
git merge hotfix/v0.1.1

# Tag
git tag -a v0.1.1 -m "Hotfix: critical bug fix"
git push origin v0.1.1
git push origin main

# Merge to develop
git checkout develop
git merge hotfix/v0.1.1
git push origin develop

# Delete hotfix branch
git branch -d hotfix/v0.1.1
```

## Version Examples

### Patch Release (0.1.0 → 0.1.1)
- Bug fixes only
- No new features
- Backward compatible

### Minor Release (0.1.1 → 0.2.0)
- New features
- Deprecations (with notices)
- Backward compatible

### Major Release (0.2.0 → 1.0.0)
- Breaking changes
- API changes
- Migration guide required

## Release Template

### GitHub Release Description Template

```markdown
# 🎉 Bahleel v0.2.0

## ✨ What's New

### Features
- Feature 1 description
- Feature 2 description

### Improvements
- Improvement 1
- Improvement 2

### Bug Fixes
- Fix 1
- Fix 2

## 📦 Installation

```bash
git clone https://github.com/bahleel/bahleel.git
cd bahleel
composer install
php bahleel migrate
```

## 🔄 Upgrade Guide

### From v0.1.x

1. Update dependencies: `composer update`
2. Run migrations: `php bahleel migrate`
3. Review breaking changes (if any)

## 📝 Full Changelog

See [CHANGELOG.md](CHANGELOG.md) for complete details.

## 🙏 Contributors

Thanks to all contributors who made this release possible!

## 📖 Documentation

- [README](README.md)
- [Contributing Guide](CONTRIBUTING.md)
- [Changelog](CHANGELOG.md)
```

## Notes

- **Semantic Versioning**: Always follow semver.org
- **Changelog**: Keep CHANGELOG.md updated with every change
- **Communication**: Announce breaking changes clearly
- **Testing**: Never skip testing before release
- **Documentation**: Update docs before, not after release
