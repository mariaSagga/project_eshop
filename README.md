# project_eshop

A simple, lightweight product catalog web app built with PHP (no frameworks), MySQL, Bootstrap, and vanilla JavaScript. Includes a public product listing, search, sort, pagination, and an admin panel for managing products and viewing purchase analytics.

Product Listing with image, description, and price

Search bar to filter products by name

Sorting by name or price

Pagination for product list

Product Detail page with simulated purchase

Admin Panel:

Add/Edit/Delete products

See purchase count per product

Simple bar chart showing most purchased products

Responsive design with Bootstrap

Vanilla PHP (no frameworks)

project-root/
├── admin/
│   ├── add_product.php
│   ├── chart_data.php
│   ├── delete_product.php
│   ├── edit_product.php
│   └── index.php
├── css/
│   └── style.css (optional)
├── images/
│   └── (product images, e.g. apple.jpg)
├── includes/
│   ├── db.php
│   ├── footer.php
│   └── header.php
├── js/
│   ├── main.js (optional)
│   └── chart.js (optional)
├── index.php
├── product.php
└── README.md

Clone or Download this repo to your local machine.

Import the SQL database:

Create a MySQL database (e.g., product_catalog)

Import the following SQL (or see database.sql if provided):

CREATE DATABASE product_catalog;
USE product_catalog;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    image VARCHAR(255),
    purchases INT DEFAULT 0
);

INSERT INTO products (name, description, price, image, purchases) VALUES
('Apple', 'Fresh red apple.', 1.00, 'apple.jpg', 12),
('Banana', 'Ripe banana.', 0.80, 'banana.jpg', 18),
('Orange', 'Juicy orange.', 1.20, 'orange.jpg', 6);

Configure Database Connection:

Edit includes/db.php with your database credentials:

$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'product_catalog';

Add Product Images:

Place product images (apple.jpg, banana.jpg, etc.) in the images/ directory.

Run the App Locally:

In the project root directory, start PHP’s built-in server:

php -S localhost:8000

index.php: Main product listing page with search, sort, and pagination

product.php: Product detail and "Buy" simulation

admin/index.php: Admin dashboard with product management and stats

admin/add_product.php: Add a new product

admin/edit_product.php: Edit existing product

admin/delete_product.php: Delete product

admin/chart_data.php: Returns JSON data for the bar chart (most purchased products)

includes/db.php: Database connection file

includes/header.php, includes/footer.php: Shared page layout (with Bootstrap)

images/: Product images directory
