# Language Learner

This is a flashcard style learning web application. It is made for a school project. Main target is mobile devices hence it uses jQuery mobile.

User is supposed to add their own question pictures. There are three example pictures in the repository under assets/pictures folder. They are added to database in the creation script provided in this repository.

## Steps to set up this repository

1. Make sure that you have WAMP, MAMP or equivalent installed.
2. Clone this repository to your working directory (e.g in WAMP www folder).
3. Navigate to newly created "languageLearner/db" folder. There is a database creation file called "create_db.sql". You will use it in the step 5.
4. Open phpMyAdmin with your web browser. Create a new database called "mobileweb-amazeme".
5. Import "db_create.sql" to database you created. This will create the database that is needed to run this application correctly.
6. Create user to your database using phpMyadmin. The application uses this user for database access. Use following configurations to create new user:
  * Username: usramazeme
  * Password: Am@Z3mE
  * There is no need to give global priviledges. Leave rest as it is. Creation tested on MySQL version 5.5.42.

7. To test your the application, navigate to it with web browser.
