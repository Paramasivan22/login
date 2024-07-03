# Laravel Authentication System

This is a basic Laravel application implementing user authentication with a custom unique user ID generation.

## Setup Instructions

### Prerequisites
- PHP >= 7.4
- Composer
- MySQL
- Git

### Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/yourusername/your-repository-name.git
    cd your-repository-name
    ```

2. Install dependencies:
    ```bash
    composer install
    ```

3. Copy the `.env.example` file to `.env`:
    ```bash
    cp .env.example .env
    ```

4. Generate an application key:
    ```bash
    php artisan key:generate
    ```

5. Set up your database configuration in the `.env` file:
    ```env
   DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=login
    DB_USERNAME=root
    DB_PASSWORD=
    ```

6. Run the migrations:
    ```bash
    php artisan migrate
    ```

7. Serve the application:
    ```bash
    php artisan serve
    ```

### Unique User ID Generation

The application generates a unique alphanumeric user ID for each registered user. This is done in the `User` model's `creating` event using the following code:

```php
protected static function booted()
{
    static::creating(function ($model) {
        $model->user_id = 'USER-' . strtoupper(Str::random(10));
    });
}
