# Victor del Valle

## How to run app

1. `cd api && composer install && cd ..`
2. `cd app && npm install && cd ..`
3. `docker-compose up -d --build`
4. `docker-compose exec api php artisan migrate`

_note: you can skip step 1 and 2, since it's done from docker, but it'll be faster._

## TEST

Execute api tests

- `docker-compose exec api ./vendor/bin/phpunit`

## API - First Phase

Endpoint that returns the winner of two contracts:
- POST base_url/api/trials/{contract1}/{contract2}

Example: 
- POST http://0.0.0.0:8000/api/trials/KN/NNV

Trials and contracts are saved in database.

## FRONT App - Second stage

Enter: http://localhost:3000/