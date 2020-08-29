<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>


## How to install the project

1. Clone the project.

2. Copy and rename the .env.example file.

3. Fill the database name in the env file : classroomfinder.
    Be sure to modify the right file of the right folder ;p

4. Use 'composer install' in the command line  inside the classroomfinder folder.

5. Use php artisan key:generate.

6. Use 'php artisan migrate' to fill the database.
    -> If you get error with "... could not find driver", you will need to uncomment ';extension=pdo_mysql.so' from the php.ini file in your php installation folder.

7. Use the command 'composer dump-autoload', then use 
    'php artisan migrate' follow by 'php artisan db:seed' to fill the database with data.
    
8. Use 'php artisan serve' to launch the localhost


## Mail configuration

In the .env file, replace like the following :

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME="Your email"
MAIL_PASSWORD="your password"
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS="Your email"
MAIL_FROM_NAME="${APP_NAME}"
