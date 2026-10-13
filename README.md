Address Book

A simple and user-friendly Address Book web application built using Laravel. This project helps users manage their contacts in one place and organize them into different groups such as Family, Friends, Work, and College.
I developed this project as part of my learning journey to gain practical experience with Laravel, PHP, database operations, and web application development.

Features
- Contact Management: Add, view, edit, and delete contacts.
- Form Validation: Validate contact details before saving them.
- Search Contacts: Find contacts easily using the search feature.
- Group Management: Create, edit, and delete contact groups.
- Multiple Groups: Assign a contact to more than one group.
- Group Filtering: View contacts based on their assigned groups.
- Database Integration: Store and manage contact information using a database.

Technologies Used
- PHP 8.2
- Laravel 12
- MySQL
- HTML
- CSS
- JavaScript
- XAMPP
- Composer

Getting Started
Follow these steps to run the project on your local machine.
Prerequisites

Make sure you have the following installed:
- PHP
- Composer
- XAMPP
- MySQL
- Git
- 
- Installation

1. Clone the repository
git clone https://github.com/Sakshij1904/address-book.git

2. Open the project folder
cd address-book

3. Install dependencies
composer install

4. Create the environment file
copy .env.example .env

5. Generate the application key
php artisan key:generate

6. Configure the database
Start MySQL using XAMPP. Create a database named "address_book" and update the database settings in your ".env" file.

DB_DATABASE=address_book
DB_USERNAME=root
DB_PASSWORD=

These settings assume a default local XAMPP MySQL configuration. Update them if your setup is different.

7. Run database migrations
php artisan migrate

8. Start the development server
php artisan serve
