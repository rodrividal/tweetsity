Steps to deploy this project:

Requirements:
- PHP >= 7.2
- MySQL
- Apache
- Composer (We'll give you a link during this explanation)

1) Clone the repository. Run in your terminal the following command:

git clone https://github.com/rodrividal/tweetsity.git

2) Navigate into your new folder named by default 'tweetsity'

3) Take the .env.example file, copy and rename it to '.env'. 
There you have to complete your credentials to access your database,
and specify the name of the database you will use as well. The suggestion
is to create a database called 'tweetsity'.

4) After that, you're ready to install some dependencies.
You'll need to install composer in your computer/server, follow
the instructions here: https://getcomposer.org/download/

5) Once you have your composer installed, run this command in your terminal:

composer install

6) Now you need to setup a key for encryption and security. Run:

php artisan key:generate

7) Now we are going to generate the database, tables, and some sample data to
test the project. Run the migrations and seeders with the following command:

php artisan migrate --seed

8) Serve the project to test it:

php artisan serve

You'll be able to access in this URL: localhost:8000

Some users and passwords for you to check:

rodrigovidal05@gmail.com
12345678

kurtcobain@gmail.com
12345678

michaeljackson@gmail.com
12345678

johntravolta@gmail.com
12345678

freddykrugger@gmail.com
12345678

The sample data contains this users, some entries, and some hidden tweets.
You can also create register yourself, and even create more entries and hide your own tweets.

IMPORTANT NOTE: As we are using a sandbox domain for email sending, you won't be able
to receive the password reset email unless you confirm your email as an authorized recipient.
In order to do that, just send me an email and I'll do it in a while: rodrigovidal05@gmail.com

