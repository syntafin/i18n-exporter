<p align="center"><a href="https://syntafin.dev" target="_blank"><img src="https://share.syntafin.de/github/dev_slogan.png" width="600" /></a></p>

<p align="center">
<a href="https://discord.gg/7NqGZfn" target="_blank"><img src="https://img.shields.io/discord/616573354685759488?color=fe93db&label=Discord&style=for-the-badge" alt="Discord" /></a>
<a href="xmpp://syntafin@tengu.chat"><img src="https://img.shields.io/static/v1?label=XMPP&message=syntafin@tengu.chat&color=fe93db&style=for-the-badge" alt="XMPP" /></a>
<a href="mailto://mail@syntaf.in"><img src="https://img.shields.io/static/v1?label=Mail&message=hello@syntafin.dev&color=fe93db&style=for-the-badge" alt="Email me" /></a>
<a href="LICENSE"><img src="https://img.shields.io/static/v1?label=Lizenz&message=MIT&color=fe93db&style=for-the-badge" alt="License" /></a>
</p>

# Laravel i18n Exporter

A simple Laravel package to export your localization files into a JSON. Useful for translation workflows, localization auditing, or integrating with external translation platforms.

---

## 🚀 Features

- Export Laravel translation files to JSON, CSV, Excel, or custom formats
- Artisan command integration
- Easy to customize and extend
- PSR-4 autoloaded, clean structure

---

## 📦 Installation

### 1. Add package via Composer

If you’re using this locally via path repository:

```bash
composer require syntafin/laravel-i18n-exporter:*
```

---

## ⚙️ Configuration
If you want to publish the config (optional):
```bash
php artisan vendor:publish --tag=i18n-exporter-config
```

---

## 🛠 Usage
Run the export command via Artisan:
```bash
php artisan i18n:export
```

This will scan your Laravel lang directory and export all translation keys into the specified format (default: JSON). 

📝 You can customize the output path, file type, and other options via configuration or CLI options (coming soon).

---

## 🧪 Testing
TBD — unit tests coming soon.

---

## 💡 Credits
Developed by [Syntafin](https://github.com/syntafin) 💙
Feel free to contribute, fork, or open an issue!