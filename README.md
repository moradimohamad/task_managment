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
