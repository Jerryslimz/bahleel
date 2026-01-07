# Contributing to Bahleel

Thank you for considering contributing to Bahleel! 🎉

## Development Setup

1. **Clone the repository**
   ```bash
   git clone https://github.com/bahleel/bahleel.git
   cd bahleel
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Setup database**
   ```bash
   php bahleel migrate
   ```

4. **Run tests**
   ```bash
   php bahleel test
   ```

## Development Workflow

### Branching Strategy

- `main` - Stable production releases
- `develop` - Development branch for next release
- `feature/*` - New features
- `bugfix/*` - Bug fixes
- `hotfix/*` - Urgent production fixes

### Making Changes

1. **Create a feature branch**
   ```bash
   git checkout -b feature/your-feature-name
   ```

2. **Make your changes**
   - Write clean, documented code
   - Follow PSR-12 coding standards
   - Add tests for new features
   - Update documentation

3. **Run code quality checks**
   ```bash
   # Format code
   ./vendor/bin/pint
   
   # Run tests
   php bahleel test
   ```

4. **Commit your changes**
   ```bash
   git add .
   git commit -m "feat: add new feature description"
   ```

### Commit Message Convention

Follow [Conventional Commits](https://www.conventionalcommits.org/):

- `feat:` - New feature
- `fix:` - Bug fix
- `docs:` - Documentation changes
- `style:` - Code style changes (formatting)
- `refactor:` - Code refactoring
- `test:` - Adding or updating tests
- `chore:` - Maintenance tasks

Examples:
```
feat: add JSON exporter command
fix: resolve duplicate detection bug
docs: update installation guide
test: add tests for SpiderManager
```

### Pull Request Process

1. **Update documentation** if needed
2. **Add tests** for new functionality
3. **Ensure all tests pass**
4. **Update CHANGELOG.md** under `[Unreleased]` section
5. **Create Pull Request** with clear description
6. **Link related issues** in PR description

### Pull Request Template

```markdown
## Description
Brief description of changes

## Type of Change
- [ ] Bug fix
- [ ] New feature
- [ ] Breaking change
- [ ] Documentation update

## Testing
- [ ] Tests added/updated
- [ ] All tests passing
- [ ] Manual testing done

## Checklist
- [ ] Code follows PSR-12
- [ ] Self-review completed
- [ ] Comments added for complex code
- [ ] Documentation updated
- [ ] CHANGELOG.md updated
```

## Coding Standards

### PHP Standards (PSR-12)

Run Laravel Pint for auto-formatting:
```bash
./vendor/bin/pint
```

### Testing Standards

- Write tests for all new features
- Maintain test coverage above 80%
- Use descriptive test names
- Follow AAA pattern: Arrange, Act, Assert

Example:
```php
test('spider manager can check if spider exists', function () {
    // Arrange
    $manager = new SpiderManager();
    
    // Act
    $exists = $manager->exists('MySpider');
    
    // Assert
    expect($exists)->toBeFalse();
});
```

### Documentation Standards

- Update README.md for user-facing changes
- Add PHPDoc blocks for all public methods
- Include code examples where helpful
- Keep CHANGELOG.md updated

## Reporting Bugs

### Before Submitting

1. **Check existing issues**
2. **Search closed issues**
3. **Try latest version**
4. **Run tests** to verify

### Bug Report Template

```markdown
**Description**
Clear description of the bug

**To Reproduce**
Steps to reproduce:
1. Run command '...'
2. See error

**Expected Behavior**
What should happen

**Actual Behavior**
What actually happens

**Environment**
- Bahleel version: [e.g., 0.1.0]
- PHP version: [e.g., 8.3.0]
- OS: [e.g., macOS 14]

**Additional Context**
Error messages, screenshots, etc.
```

## Feature Requests

We welcome feature requests! Please:

1. **Check existing issues** first
2. **Explain the use case** clearly
3. **Describe the expected behavior**
4. **Consider alternatives**

## Code Review Process

### Review Criteria

- ✅ Code quality and readability
- ✅ Test coverage
- ✅ Documentation completeness
- ✅ Performance considerations
- ✅ Security implications
- ✅ Backward compatibility

### Response Time

- Initial response: Within 48 hours
- Full review: Within 1 week
- Merge decision: Based on review feedback

## Community

- **GitHub Issues**: Bug reports and feature requests
- **GitHub Discussions**: Questions and ideas
- **Pull Requests**: Code contributions

## License

By contributing, you agree that your contributions will be licensed under the MIT License.

## Questions?

Feel free to open a GitHub Discussion or issue if you have questions about contributing!

Thank you for helping make Bahleel better! 🚀
