
## About Project

Simple Order Creation Process

- also can be performed using web interface and api
- api replaced authentication with field user_id (mandatory parameter)
- api replaced order total amount with amount (mandatory parameter)
- check for user type 
- according to user type and order sequence , commission is classified with specific percentage
- hepler functions are responsible for detecting user type 
- hepler functions are responsible for detecting either order is first or not 

## how to get started

### Web interface

- clone repo using git bash command line
- cd project name
- composer install 
- add .env file 
- create database name of you choice
- run php:artisan migrate
- run php artisan db:seed
- hit login in url 
- login credentials differ according to logged in user
- free account user can login with email  freeEmail@example.com
- premium account user can login with email  premiumEmail@example.com
- password is password for two cases 
- after successful login user will be redirected to some dummy order details (3 products)
- sum of these products' prices represents order amount
- after clicking confirm , he will be redirected to list of orders got done
- each user can accesss only his orders

### Api Postman 

- hit request api/v1/create/order 
- has validation for user_id , and amount 
- user_id field represents authenticated user
- amount field order total amount
- order created successfully
- returned response has order details , user details and commission details

















