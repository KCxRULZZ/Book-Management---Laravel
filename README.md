Book Management System


Project Structure
This Laravel project implements a Book Management System with CRUD (Create, Read, Update, Delete) functionality. The application includes authentication (login and registration) and various pages for managing books.

Project Structure
Models
•	Book.php: Eloquent model representing a book. Fields: title, author, publication_date, genre.
•	User.php: Eloquent model for authentication with fields: name, email, password.
Views
•	Authentication
o	login.blade.php: Login form page.
o	register.blade.php: Registration form page.
•	Books
o	home.blade.php: Displays a list of books with search and pagination functionalities.
o	create.blade.php: Form for adding a new book.
o	edit.blade.php: Form for editing an existing book.



________________________________________
Setup Instructions
1.	Clone the Repository

git clone https://github.com/yourusername/book-management-system.git
cd book-management-system


2.	Install Dependencies
Make sure you have Composer installed.
composer install

3.	Configure Environment

Copy the .env.example file to .env and configure your environment settings:

cp .env.example .env
Edit the .env file to set up your database and other environment settings.

4.	Generate Application Key
php artisan key:generate

5.	Run Migrations
This will create the necessary database tables:
php artisan migrate

6.	Seed Database (Optional)
If you have seeders, you can run them to populate the database with initial data:
php artisan db:seed

7.	Serve the Application
You can now start the development server:

php artisan serve
Visit http://localhost:8000 in your web browser to view the application.


________________________________________
Additional Notes
•	Front-end Assets
Ensure you have Node.js and npm installed. Run the following commands to install and build front-end assets:
arduino
npm install
npm run dev

•	Routes
o	/login: Login page
o	/register: Registration page
o	/books: Home page displaying books
o	/books/create: Form to add a new book
o	/books/{id}/edit: Form to edit an existing book
•	JavaScript
o	The create.js file is included for handling additional client-side logic during book creation.
•	Authentication
The authentication system uses Laravel's built-in features. Customize the User model and authentication views as needed.


[ReadME-Book Management System.docx](https://github.com/user-attachments/files/16963006/ReadME-Book.Management.System.docx)
