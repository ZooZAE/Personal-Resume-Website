*Getting Started*

Clone this repo:


git clone https://github.com/Ahmad-Chebbo/BTC-Portfolio-Website.git


Install php dependencies:


composer install


Copy the env.example file to .env and generate new key:


cp .env.example .env

php artisan key:generate


Go to the .env file and change the database credentials to your database:

Migrate the database and the seeds:


php artisan migrate:fresh --seed


*Workflow*

Serve the project:


php artisan serve


Login and access project 

To login into the Dashboard.


shift + z


and use the default email : *admin@gmail.com* and password : *password*
