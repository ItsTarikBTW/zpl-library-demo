# Laravel ZPL Library Demo

![X SVG](x.svg)

## Project Structure
```
zpl-library-demo/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   └── ZplController.php
│   ├── Models/
│   │   └── Template.php
├── database/
│   ├── migrations/
│   │   ├── 2024_05_24_185822_create_templates_table.php
│   └── seeds/
│       └── TemplateSeeder.php
├── public/
│   └── assets/
│       └── john.png
│       └── tarik.png
├── resources/
├── routes/
│   └── web.php
├── storage/
│   └── app/
│       └── templates/
│           └── designTmp.zpl
│           └── sample1.xml
│           └── sample2.xml
│           └── templateSchema.xsd
│       └── zpl/
├── tests/
├── .env.example
├── composer.json
├── phpunit.xml
└── README.md
└── postman_collection.json
```

## Overview

This project is a Laravel-based library for generating ZPL files from XML templates and dynamic data.

## Installation

1. Clone the repository:
    ```sh
    git clone https://github.com/itsTarikBTW/zpl-library-demo.git
    cd zpl-library-demo
    ```

2. Install dependencies:
    ```sh
    composer install
    ```

3. Set up the environment:
    ```sh
    cp .env.example .env
    php artisan key:generate
    ```

4. Configure your `.env` file with your database credentials.

5. Run migrations:
    ```sh
    php artisan migrate
    ```

6. Seed the database with an example template (optional):
    ```sh
    php artisan db:seed --class=TemplateSeeder
    ```

7. Import the Postman collection to test the API.

## Usage

1. Start the Laravel development server:
    ```sh
    php artisan serve
    ```

2. Send a POST request to `/upload-template` with a name and a file named `template` to upload a new template.

3. Send a POST request to `/generate-zpl/{id}` with dynamic data to generate ZPL.

## Testing

Run the following command to run the tests:
```sh
php artisan test
```

## Worning

This project is a demo and should not be used in production.
The CSRF middleware is disabled for demonstration purposes.

## License

This project is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
