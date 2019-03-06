# Lumen API Authentication Example

# Usage

- `clone` the repo.
- run `composer install` to install dependencies
- rename `.env.example` to `.env` and enter your database configurations
- run `php -S localhost:8000 -t public` to serve app

# Controllers

controllers are on `App\Http\Controllers`.

- RegisterController (Creating new user)
- Login controller (Login user via email and password)
- UserController (show authenticated users profile)

# Middleware

You can configure Middleware Providers at `App\Providers\AuthServiceProvider`.

# Routes

API routes are on path `routes/web`.

