# Simple PHP Student Management System

This project is a basic CRUD application built with PHP and MySQL. It allows you to add, view, edit and delete students for a training institute.

## Setup
1. Ensure you have PHP and MySQL installed.
2. Create the database using the provided `schema.sql` file:
   ```bash
   mysql -u root -p < schema.sql
   ```
   Alternatively you can run `php db.php` to create the database and table programmatically.
3. Update the credentials in `db_connect.php` if necessary.
4. Place the project files in your web server directory and access `index.php` from your browser.

## Files
- `db_connect.php` – establishes a connection to MySQL.
- `db.php` – optional script to create the database and table.
- `StudentManager.php` – class for managing student records.
- `student_form.php` – form for adding students.
- `view_students.php` – list of students.
- `edit_student.php` – update student details.
- `delete_student.php` – delete a student.
- `schema.sql` – SQL commands to create the database schema.

Bootstrap 5 is used for styling the interface.
