## REST API task for NextSale

### Requirements
- php 7.4.*
- composer

### Initialization
- git clone the repository
- composer install
- cd to public dir & boot up php server **(php -S 127.0.0.1:8080)**

### Endpoints
- **GET** /users - Listing all users.
- **POST** /users - Creating new user.

Required params for creating user:
- Send POST request with params (form-data) **id** and **name**.