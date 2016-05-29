# Language Learner

This is a flashcard style learning web application. It is made for a school project. Main target is mobile devices hence it uses jQuery mobile.

User is supposed to add their own question pictures. There are three example pictures in the repository under assets/pictures folder. They are added to database in the creation script provided in this repository.

### Used Techniques
* HTML
* CSS
* jQuery
* jQuery Mobile
* PHP
* SQL (MySQL)

## Steps to Set Up This Application

1. Make sure that you have WAMP, MAMP or equivalent installed.
2. Clone this repository to your working directory (e.g in WAMP www folder).
3. Open phpMyAdmin with your web browser. Go to _import_ tab. Import newly created __languageLearner/db/db_create.sql__ file. Press _go_. This will create the database and tables that is needed to run this application correctly.
4. Create user to your database using phpMyadmin. The application uses this user for database access. Use following configurations to create new user:
  * Username: usramazeme
  * Password: Am@Z3mE
  * There is no need to give global priviledges. Leave rest as it is. Creation tested on MySQL version 5.5.42.
5. To test your the application, navigate to it with web browser.
