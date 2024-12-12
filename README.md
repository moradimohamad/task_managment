# Laravel task_managment

## Requirements
- [Docker](https://www.docker.com/)
- [Docker Compose](https://docs.docker.com/compose/)

## Installation
1. Clone Repository
```bash
git clone https://github.com/moradimohamad/task_managment.git
cd task_managment
```

2. Build and start containers
```bash
docker compose up --build
```

3. Install dependencies and run migrations inside container
```bash
docker exec -it task-app bash
composer install
php artisan migrate
```

4. Access application on http://localhost:8000

## Troubleshooting

### 1. Database Connection Errors
- Ensure the `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` values in your `.env` file match your database service in `docker-compose.yml`.

### 2. Permission Issues
- If you encounter file permission errors, you may need to adjust the ownership of the project files:
  ```bash
  sudo chown -R $USER:$USER .
  ```
