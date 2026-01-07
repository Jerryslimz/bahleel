# Changelog

All notable changes to Bahleel will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added
- Initial release preparation

## [0.1.0] - 2026-01-07

### Added
- Interactive spider generator with `make:spider` command
- Spider execution with `run:spider` command
- SQLite database storage with automatic duplicate detection
- Data management commands (`data:show`, `data:clear`)
- CSV export functionality with `export:csv`
- Spider listing with `spider:list`
- Custom command list interface
- Comprehensive test suite (27 tests)
- Models: ScrapedItem, SpiderRun, SpiderLog
- Services: SpiderManager, TemplateGenerator, SpiderRunner
- Blade templates for code generation
- SqliteStorageProcessor with hash-based deduplication
- Exporter interfaces (CSV, JSON)
- Configuration management
- Database migrations

### Features
- **Spider Generation**: Interactive wizard for creating spiders
- **Concurrent Scraping**: Support for concurrent requests
- **Middleware Support**: Proxy and JavaScript execution capabilities
- **Data Storage**: Automatic SQLite storage with relationships
- **Duplicate Detection**: Hash-based duplicate filtering
- **Export**: Multiple export formats (CSV, JSON)
- **Logging**: Comprehensive logging system
- **Testing**: Full test coverage with Pest PHP

### Documentation
- Complete README with installation, usage, and examples
- Command reference guide
- Configuration guide
- Testing documentation
- Credits and external documentation links

[Unreleased]: https://github.com/bahleel/bahleel/compare/v0.1.0...HEAD
[0.1.0]: https://github.com/bahleel/bahleel/releases/tag/v0.1.0
