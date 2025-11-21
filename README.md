# Hexago Test Project

This project is a Symfony application built with **Domain-Driven Design (DDD)** and **Test-Driven Development (TDD)** principles.

## Prerequisites

Before you begin, ensure you have the following installed on your machine:

- **PHP**: 8.3 or higher
- **Composer**: Latest version
- **Symfony CLI** (optional, but recommended)

## Architecture

This project follows a strict DDD architecture, separating concerns into distinct layers:

- **Domain**: Contains the business logic, entities, and interfaces. It has no dependencies on external frameworks.
- **Application**: Orchestrates the domain logic and handles use cases (Commands/Queries).
- **Infrastructure**: Implements interfaces defined in the Domain (e.g., Repositories, Controllers) and handles framework integration (Symfony).

## Installation

1. Clone the repository:

   ```bash
   git clone <repository-url>
   cd symfony_ddd_tdd
   ```

2. Install dependencies:
   ```bash
   composer install
   ```

## Testing

This project uses **PHPUnit** for testing. The tests are located in the `tests/` directory and mirror the source structure.

To run the full test suite:

```bash
php bin/phpunit
```

### Test Structure

- **Domain Tests**: Unit tests for entities and domain logic.
- **Application Tests**: Unit/Integration tests for use cases.
- **Infrastructure Tests**: Integration/Functional tests for controllers and repositories.

## Key Features

- **PHP 8.3**: Utilizes modern PHP features including Attributes.
- **Symfony 7**: Built on the latest stable Symfony version.
- **Attribute-Based Routing**: All routes are defined using PHP attributes.

## Verification Results

### Automated Tests

- `composer validate`: Passed.
- `composer update`: Successful.
- `php bin/console --version`: `Symfony 7.0.10` (Application boots successfully).
- `php bin/phpunit`: `OK (7 tests, 20 assertions)`.

### How to Test Manually

You can run the tests using PHPUnit:

php bin/phpunit

To test the API (if you run the server):

curl -X POST http://localhost:8000/api/documents/123/publish

Response:

{

"status": "success",

"documentId": "123"

}
