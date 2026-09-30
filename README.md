# Building Doctors Website

PHP marketing site for **Building Doctors** — Ottawa permit drawings, drafting, and engineering.

## Pages

- `/` — Home
- `/services` — Services
- `/portfolio` — Portfolio
- `/about` — About
- `/contact` — Contact (Formspree)

## Local development

```bash
php -S localhost:8080 router.php
```

Open http://localhost:8080

Use `router.php` so clean URLs (`/services`, `/about`, etc.) work with PHP’s built-in server. On Apache hosting, `.htaccess` handles this instead.

## Formspree setup

1. Create a form at [formspree.io](https://formspree.io)
2. Paste your endpoint into `includes/config.php`:

```php
'formspree_endpoint' => 'https://formspree.io/f/YOUR_FORM_ID',
```

## Contact

- Phone / WhatsApp: `613-213-0789` (`wa.me/16132130789`)
- Email: `buildingdoctors@outlook.com`

## Images

Hero and remaining section photos are from [Pexels](https://www.pexels.com/) (free stock).

Real project work lives in `assets/img/works/` and is listed in `content/portfolio.php`:

- Photos and drawing images (`*.png`) are used directly.
- Drawing sheets are kept as PDFs, with a first-page JPG preview in `assets/img/works/previews/` (same file name). Regenerate a preview whenever a PDF changes.
- A project with a `compare` entry gets a before/after slider; `gallery` items with a `pdf` key link to the original sheet.

## Brand

- Navy `#0B1F33`
- Concrete `#E8E2D9`
- Copper `#B87333`
- Logo: `assets/img/logo.svg`
