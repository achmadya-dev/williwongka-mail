# Laravel Test

## Pre-requisites

-   **Laravel**: Version 11.0
-   **PHP**: Version 8.3
-   **Composer**: Version 2.7.1
-   **MySQL**: latest version
-   **Node.js**: Version 18
-   **NPM**: Version 9.2

### Optional

-   **Docker**: Version 27.1.1
-   **Mailtrap**: For email testing

## Installation

1. Clone the repository:

    ```bash
    git clone
    ```

2. Install dependencies:

    ```bash
    composer install
    npm install
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

6. Run database migrations:

    ```bash
    php artisan migrate
    ```

7. Create a symbolic link for the storage directory:

    ```bash
    php artisan storage:link
    ```

8. Start the Laravel development server:

    ```bash
    php artisan serve
    ```

## Using Docker

1. Clone the repository:

    ```bash
    git clone
    ```

2. Build the Docker image:

    ```bash
    docker compose build app
    ```

3. Start the Docker containers:

    ```bash
    docker compose up -d
    ```

4. Install dependencies:

    ```bash
    docker compose exec app composer install
    docker compose exec app npm install
    ```

5. Create a new `.env` file:

    ```bash
    docker compose exec app cp .env.example .env
    ```

6. Generate a new application key:

    ```bash
    docker compose exec app php artisan key:generate
    ```

7. Update the `.env` file with your database credentials:

    ```bash
    DB_CONNECTION=mysql
    DB_HOST=simple-app-db
    DB_PORT=3306
    DB_DATABASE=your_database
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    ```

## Simple Apps Project Overview

### 1. Basic Laravel Setup

-   **Authentication**: Implement a login system for the administrator.

### 2. Database Seeding

-   **Initial User Creation**: Automatically create the first user with a predefined email using database seeds.

### 3. CRUD Functionality

-   **Entities to Manage**:
    -   **Companies**: Manage company details.
    -   **Employees**: Manage employee records.

### 4. Companies Table Structure

-   **Fields**:
    -   **Name**: Required, 255 characters max.
    -   **Email**: Optional, must be unique if provided, 100 characters max.
    -   **Logo**: Optional, must have a minimum size of 10240 bytes and be a valid image file (jpg, jpeg, png).
    -   **Website**: Optional, must be a valid URL if provided, 255 characters max.

### 5. Employees Table Structure

-   **Fields**:
    -   **First Name**: Required, 255 characters max.
    -   **Last Name**: Required, 255 characters max.
    -   **Company**: Foreign key linked to the `Companies` table.
    -   **Email**: Optional, must be unique if provided, 100 characters max.
    -   **Phone**: Optional, 15 characters max.

### 6. Database Migrations

-   **Schema Creation**:
    -   Create database schemas for `Companies` and `Employees` tables as outlined above.

### 7. Company Logo Storage

-   **Storage Location**: Store company logos in the `storage/app/public` directory.
-   **Public Access**: Ensure logos are publicly accessible via the web.

### 8. Laravel Resource Controllers

-   **Controller Methods**: Implement default resource controller methods (`index`, `create`, `store`, `show`, `edit`, `update`, `destroy`) for managing `Companies` and `Employees`.

### 9. Laravel Validation

-   **Validation**: Utilize Laravel's form request classes to validate data input for `Companies` and `Employees`.

### 10. Pagination

-   **Default Pagination**: Implement pagination for `Companies` and `Employees` lists, displaying 10 records per page by default.

### 11. Laravel `make:auth` Implementation

-   **Authentication UI**: Use Laravel's default authentication system.
-   **Registration**: Remove or disable the user registration functionality to restrict access.

## Additional

### 1. Email Notification

-   **Employee Creation Alert**: Send an email notification to the respective company's admin whenever a new employee is added.

### 2. Basic Unit Testing

-   **Testing Framework**: Write and run basic unit tests using PHPUnit to ensure application functionality.
