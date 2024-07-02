## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

## Requirements

- PHP >= 8.0
- Composer
- Node.js & npm

## Installation

1. Clone the repository:

```sh
git clone git@github.com:Mdednnjya/SeaSalon.git
cd SeaSalon
```

2. Install PHP dependencies:

```sh
composer install
```

3. Install JavaScript dependencies:

```sh
npm install
```

4. Copy the \`.env.example\` file to \`.env\`:

```sh
cp .env.example .env
```

5. Generate the application key:

```sh
php artisan key:generate
```

6. Install jQuery:

```sh
npm install jquery
```

7. Run the database migrations and seeders:

```sh
php artisan migrate --seed
```

8. Build the frontend assets:

```sh
npm run build
```

## Development

To start the development server with Vite:

```sh
npm run dev
```

## Usage

To start the Laravel development server:

```sh
php artisan serve
```

Visit \`http://localhost:8000\` in your browser.

## Additional Commands

- To run the seeder only:

```sh
php artisan db:seed
```

- To run the migration only:

```sh
php artisan migrate
```
