# RippleDevs Laravel Faker 🚀

![Tests](https://github.com/rippledevs/laravel-faker/workflows/Tests/badge.svg)

An advanced and extensible **Laravel Faker extension** that enhances Laravel’s Faker system with **localized providers**, **regional datasets**, and **missing global utilities**.

Currently, the package includes a comprehensive **Persian (fa_IR) localization** with Iranian-specific generators such as **Sheba**, **National Code**, **Bank Card Number**, **Postal Code**, and **Persian Lorem Ipsum** — with a roadmap designed to support additional locales and Laravel-related utilities in the future.

Built to integrate seamlessly with Laravel’s Faker ecosystem while remaining flexible and expandable.

---

## ✨ Features

- 🌍 Extensible Faker providers architecture
- 🇮🇷 Persian (fa_IR) localization (Iran)
- Localized Lorem Ipsum generators
- Language-specific word generators
- Regional & global utility generators
- Validated algorithm-based data generation
- Fully compatible with Laravel 9, 10, 11, and 12
- PHP 8+ support

---

## 📦 Installation

Install via Composer:

```bash
composer require rippledevs/laravel-faker
```

Laravel will auto-discover the service provider.

---

## ⚙️ Configuration

⚠️ **Important**

To use this package, you **must** set Faker locale to `fa_IR`.

Edit `config/app.php`:

```php
'faker_locale' => 'fa_IR',
```

Without this configuration, the custom Persian Faker methods will **not** be available.

---

## 🚀 Usage

Use Laravel’s `fake()` helper or `$this->faker` inside factories and seeders.

```php
fake()->sheba();
```

---

## 🧩 Available Methods

### Persian Lorem Ipsum

```php
fake()->sentence();        // Persian lorem sentence
fake()->paragraph();       // Persian lorem paragraph
fake()->paragraphs(3);     // Multiple paragraphs
fake()->lorem();           // Alias for paragraph()
```

---

### Persian Words

```php
fake()->word();            // Random Persian word
fake()->words(5);          // Array of Persian words
```

---

### Iranian Utilities

```php
fake()->nationalCode();     // Valid Iranian National Code
fake()->sheba();            // Valid Iranian Sheba (IBAN)
fake()->bankCardNumber();   // Iranian bank card number
fake()->postalCode();       // Valid Iranian postal code
```

All generated values are **algorithmically valid**.

---

## 🧪 Testing

Run tests using:

```bash
vendor/bin/phpunit
```

---

## 📋 Requirements

- PHP ^8.0
- Laravel ^9 | ^10 | ^11 | ^12
- fakerphp/faker ^1.23

---

## 📄 License

This package is open-sourced software licensed under the **MIT License**.

---

## 👤 Author

**RippleDevs**  
📧 rippledevsofficial@gmail.com

---

## 🤝 Contributing

Contributions, issues, and feature requests are welcome.

1. Fork the repository
2. Create your feature branch
3. Commit your changes
4. Open a Pull Request

---

## ⭐ Support

If you find this package useful, please consider giving it a ⭐ on GitHub.
