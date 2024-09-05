# Laravel Test

## Pre-requisites

-   **Laravel**: Version 11.0
-   **PHP**: Version 8.3
-   **Composer**: Version 2.7.1
-   **MySQL / MariaDB**: Latest
-   **Node.js**: Version 20
-   **NPM**: Version 9.2

### Optional

-   **Docker**: Version 27.1.1
-   **Mailtrap**: For email testing

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/madyardwn/simple-app.git
    ```

2. Install dependencies:

    ```bash
    composer install
    npm install
    npm run dev # watch
    npm run build # build
    ```

3. Create a new `.env` file:

    ```bash
    cp .env.example .env
    ```

4. Generate a new application key:

    ```bash
    php artisan key:generate
    ```

5. Update the `.env` file with your database credentials:

    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.0
    DB_PORT=3306
    DB_DATABASE=your_database
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    ```

6. Create a symbolic link for the storage directory:

    ```bash
    php artisan storage:link
    ```

7. Run database migrations:

    ```bash
    mkdir -p storage/app/public/logos # dir for image from faker
    ```

    ```bash
    php artisan migrate:fresh --seed
    ```

8. Start the Laravel development server:

    ```bash
    php artisan serve
    ```

## Using Docker

1. Clone the repository:

    ```bash
    git clone https://github.com/madyardwn/simple-app.git
    ```

2. Create a new `.env` file:

    ```bash
    cp .env.example .env
    ```

3. Update the `.env` file with your database credentials:

    ```bash
    DB_CONNECTION=mysql
    DB_HOST=simple-app-db
    DB_PORT=3306
    DB_DATABASE=your_database
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    ```

4. Export UID for the Docker container:

    ```bash
    export UID=$(id -u)
    ```

5. Build the Docker image:

    ```bash
    docker compose build app
    ```

6. Start the Docker containers:

    ```bash
    docker compose up -d
    ```

7. Install dependencies:

    ```bash
    docker compose exec app composer install
    docker compose exec app npm install
    docker compose exec app npm run build
    ```

8. Generate a new application key:

    ```bash
    docker compose exec app php artisan key:generate
    ```

9. Create a symbolic link for the storage directory:

    ```bash
    docker compose exec app php artisan storage:link
    ```

10. Run database migrations:

    ```bash
    docker compose exec app mkdir -p storage/app/public/logos # dir for image from faker
    ```

    ```bash
    docker compose exec app php artisan migrate:fresh --seed
    ```

11. Access the application at `http://localhost:8000`.
