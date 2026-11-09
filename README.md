# Barangay Bulletin – Purok Amparo

This Laravel application is a small bulletin for community announcements.

## Personalization

- Posts per page: 6, because “Amparo” has six letters.
- Custom category: Education.
- Birthday post date: January 1, 2026.
- The pinned post is “Purok Amparo Clean-up Drive”.

## Running the project

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
npm install
npm run dev
php artisan serve
```
