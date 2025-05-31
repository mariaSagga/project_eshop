-- Create the database
CREATE DATABASE product_catalog;
USE product_catalog;

-- Products table
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    image VARCHAR(255),
    purchases INT DEFAULT 0
);

-- Sample Data
INSERT INTO products (name, description, price, image, purchases) VALUES
('Apple', 'Fresh red apple.', 1.00, 'apple.jpg', 12),
('Banana', 'Ripe banana.', 0.80, 'banana.jpg', 18),
('Orange', 'Juicy orange.', 1.20, 'orange.jpg', 6);