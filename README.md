
# Articles and Authentication API

this  project is made of articles and authentication api and was developed using Laravel 8
 
 ## Authentication features
 in this project user will only be allowed to perform any action only when  that person is authenticated. once a user sign up or login a token is generated by the system for the purpose of authenticating incoming user request.in addition, authentication of this project was accomplished uing laravel package called sanctum. authentication features cover the following

- User can sign up.
- User can login by providing email and password, then system generate token to authenticate incoming request.
- User can logout .

## Articles features 
 
 once user is authentication that person will be allowed to perform the following, unless 
 system will not grant permission to access api. the following action will be performed 
 on article. 

- read all articles.
- create new article.
- read single article.
- update an existing article.
- delete an existing article.
- search article by thier  priority.
- export csv file for all articles.


## Getting Started

To get started with this app you have to follow all instruction below carefully and implement.

### Prerequisites
First all of, Install the softwares on your local machine
- download and install composer ( php dependency manager).
- download and install node js.
- install git 

Installing  and running this project 
Make sure that you have cloned this Repo to your local machine

- By running  git clone command .
- or download the Zipped folder on GitHub.
- Then after enter the project folder by running the following command  cd Backend-Challenge

#### Database configuration

Here we will be creating database then migrate all migrations which are present, consider the 
following step to do so. 

- create database called articles_db.
- then run  php artisan migrate.


After migrating your migration you database will be filled with empty tables,
And you are requested to make Post request first for creating new article with endpoint POST /api/articles. Then
Provide Title, Description and Priority. And make sure also you are authenticated.
To implement authentication you need first to make POST /api/register to create new
Account, then make POST /api/login to login into the system by providing
email and password used during registration. After login into the system an authentication token
Will be generated, therefore you are allowed to make any other requedt

 #### Scripts to use

 Generate swagger ui and start development server, consider the following step
 Run the following command to generate l5-swagger UI 
 - php artisan l5-swagger:generate
 generated swagger ui can be accessed via <a href="http://127.0.0.1:8000/api/documentation">Swagger ui</a>

If php artisan l5-swagger: generate, throw an error saying that undefined offset 0 . You are requested to update your composer to the newer version this can be accomplished by running
the following command.
- composer update


Run the following command to start development server
- php artisan serve 

## API endpoints with authentication

Remember that database tables contains no data,therefore you are highly recommended
To request for POST/api/articles at the starting for creating new record in the article table and make sure 
You are authenticated. These endpoints can be accessed only if you are authenticated.

To access api of this project we need the following endpoints

 ### Articles api
 - GET /api/articles
- POST /api/articles
- GET /api/articles/{id}
- PUT /api/articles/{id}
- DELETE /api/articles/{id}
- GET /api/export
- GET /api/search

### Authentication api
You are highly recommended to create account first, by requesting POST /api/register
, then continue with login. After authentication is done ,you are now allowed to 
Request for articles api.

The following are authentication endpoints

- POST /api/register
- POST /api/login
- POST /api/logout

## Tools used 

### Backend
- Laravel 8

## Documentation
  link : <a href="http://127.0.0.1:8000/api/documentation">articles api documentation using swagger </a>

## Author 
EDISON NGIZWENAYO <a href="edisonwacavan2015@gmail.com">edisonwacavan2015@gmail.com</a>




