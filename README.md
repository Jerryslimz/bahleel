# Bahleel - PHP Web Scraping Framework

[![Tests](https://github.com/bahleel/bahleel/workflows/Tests/badge.svg)](https://github.com/bahleel/bahleel/actions)
[![Code Style](https://github.com/bahleel/bahleel/workflows/Code%20Style/badge.svg)](https://github.com/bahleel/bahleel/actions)
[![Latest Version](https://img.shields.io/github/v/release/bahleel/bahleel)](https://github.com/bahleel/bahleel/releases)
[![License](https://img.shields.io/github/license/bahleel/bahleel)](LICENSE)

🕷️ Framework PHP untuk menambang data dari internet. 
✅ Ingat tambang ingat bahleel.

> **Built with** [RoachPHP](https://roach-php.dev/) + [Laravel Zero](https://laravel-zero.com/)

## ✨ Features

- 🎯 **Interactive Spider Generator** - Buat spider dengan wizard interaktif
- 💾 **Auto SQLite Storage** - Data otomatis tersimpan di database
- 🔄 **Duplicate Detection** - Filter otomatis untuk data duplikat
- 📊 **Export Formats** - Export ke CSV, JSON, dan custom format
- 🔌 **Middleware Support** - Proxy, JavaScript execution, cookies, dll
- 📝 **Logging & Statistics** - Track setiap spider run dengan detail
- 🎨 **Template Generator** - Generate middleware, processor, exporter

## 📋 Requirements

- PHP 8.2 or higher
- Composer
- SQLite (sudah termasuk dalam PHP)

## 🚀 Installation

```bash
git clone https://github.com/bahleel/bahleel.git
cd bahleel
composer install
php bahleel migrate
```

## 📖 Quick Start

### 1. Buat Spider Pertama

```bash
php bahleel make:spider
```

Wizard interaktif akan memandu Anda:
- Nama spider
- Start URLs
- Concurrency & delay settings
- Middleware options (proxy, JavaScript, etc.)
- Field extraction (CSS selectors)

### 2. Run Spider

```bash
php bahleel run:spider MySpider
```

### 3. Lihat Data

```bash
php bahleel data:show MySpider
```

### 4. Export Data

```bash
php bahleel export:csv MySpider
```

## 🎯 Command Reference

### Spider Management

```bash
# Buat spider baru
php bahleel make:spider

# List semua spiders
php bahleel spider:list

# Run spider
php bahleel run:spider {name}
```

### Data Management

```bash
# Show scraped data
php bahleel data:show {spider} --limit=10
```

### Export

```bash
# Export ke CSV
php bahleel export:csv {spider} --output=path/to/file.csv

# Generate custom exporter
php bahleel make:exporter
```

### Generators

```bash
# Generate spider
php bahleel make:spider

# Generate middleware
php bahleel make:middleware

# Generate item processor
php bahleel make:processor

# Generate exporter
php bahleel make:exporter
```

## 📁 Project Structure

```
bahleel/
├── app/
│   ├── Commands/          # CLI commands
│   ├── Models/            # Database models
│   ├── Services/          # Business logic
│   ├── ItemProcessors/    # RoachPHP processors
│   └── Exporters/         # Data exporters
├── spiders/               # Generated spiders
├── middlewares/           # Generated middlewares
├── processors/            # Generated processors
├── exporters/             # Generated exporters
├── config/
│   ├── bahleel.php        # Main config
│   └── database.php       # Database config
├── database/
│   ├── migrations/        # Database schema
│   └── database.sqlite    # SQLite database
└── storage/
    └── exports/           # Exported files
```

## ⚙️ Configuration

Edit `.env` untuk konfigurasi:

```env
# Auto save scraped data
BAHLEEL_AUTO_SAVE=true
BAHLEEL_DUPLICATE_FILTER=true

# Default spider settings
BAHLEEL_CONCURRENCY=2
BAHLEEL_REQUEST_DELAY=1

# Proxy settings
PROXY_ENABLED=false
PROXY_URL=http://proxy-server:port

# JavaScript execution (requires Puppeteer)
JS_ENABLED=false
CHROME_PATH=/path/to/chrome
NODE_PATH=/path/to/node
```

## 🔧 Advanced Usage

### Custom Middleware

Generate custom middleware untuk modify requests/responses:

```bash
php bahleel make:middleware MyMiddleware --type=request
```

### Custom Item Processor

Generate custom processor untuk data transformation:

```bash
php bahleel make:processor DataCleaner
```

### Custom Exporter

Generate custom exporter untuk format khusus:

```bash
php bahleel make:exporter HtmlExporter
```

## 📊 Example Spider

```php
<?php

namespace Spiders;

use RoachPHP\Http\Response;
use RoachPHP\Spider\BasicSpider;

class ExampleSpider extends BasicSpider
{
    public array $startUrls = [
        'https://example.com',
    ];

    public array $itemProcessors = [
        \App\ItemProcessors\SqliteStorageProcessor::class,
    ];

    public function parse(Response $response): \Generator
    {
        $title = $response->filter('h1')->text();
        $content = $response->filter('.content')->text();

        yield $this->item([
            'title' => $title,
            'content' => $content,
            'url' => $response->getRequest()->getUri(),
        ]);
    }
}
```

## 🐛 Debugging

Enable verbose output:

```bash
php bahleel run:spider MySpider -v
```

## 🔐 Proxy & JavaScript

### Menggunakan Proxy

Edit spider atau set di config:

```php
public array $downloaderMiddleware = [
    [\RoachPHP\Downloader\Middleware\ProxyMiddleware::class, [
        'proxy' => [
            'example.com' => 'http://proxy-server:port'
        ]
    ]],
];
```

### Enable JavaScript

Requires Puppeteer:

```bash
npm install -g puppeteer
composer require spatie/browsershot
```

Tambah di spider:

```php
public array $downloaderMiddleware = [
    \RoachPHP\Downloader\Middleware\ExecuteJavascriptMiddleware::class,
];
```

## � Testing

Bahleel includes a comprehensive test suite using Pest PHP.

### Run All Tests

```bash
php bahleel test
```

### Run Specific Test Suites

```bash
# Run only Unit tests
php bahleel test --unit

# Run only Feature tests
php bahleel test --feature

# Filter tests by name
php bahleel test --filter=SpiderManager
```

### Test Coverage

- **Unit Tests**: Services, Models, Exporters, Template Generators
- **Feature Tests**: Command execution and integration

### Writing Tests

Create a new test:

```bash
php bahleel make:test MyFeatureTest
```

Example test:

```php
test('spider manager can check if spider exists', function () {
    $manager = new SpiderManager();
    expect($manager->exists('MySpider'))->toBeFalse();
});
```

## �🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## 📝 License

MIT License

## 🙏 Credits

Bahleel is built on top of these amazing projects:

- **[RoachPHP](https://roach-php.dev/)** - The powerful PHP web scraping library
  - [Documentation](https://roach-php.dev/docs/installation)
  - [Spiders Guide](https://roach-php.dev/docs/spiders)
  - [Middleware Reference](https://roach-php.dev/docs/downloader-middleware)
  
- **[Laravel Zero](https://laravel-zero.com/)** - The micro-framework for console applications
  - [Documentation](https://laravel-zero.com/docs/introduction)
  - [Database Guide](https://laravel-zero.com/docs/database)
  - [Testing](https://laravel-zero.com/docs/testing)

Inspired by Python's [Scrapy](https://scrapy.org/)

## 📚 Further Reading

- [RoachPHP Item Pipeline](https://roach-php.dev/docs/item-pipeline) - Learn about data processing
- [RoachPHP Extensions](https://roach-php.dev/docs/extensions) - Extend spider functionality
- [Laravel Collections](https://laravel.com/docs/collections) - Powerful data manipulation
- [Laravel Eloquent](https://laravel.com/docs/eloquent) - Database ORM used in Bahleel

## 📮 Support

For issues and questions, please use the [GitHub issue tracker](https://github.com/bahleel/bahleel/issues).

---

Made with ❤️ by Bahleel Team

