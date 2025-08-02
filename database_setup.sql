-- MySQL Database Setup Script for Online Book Store
-- Run this script in your MySQL client (phpMyAdmin, MySQL Workbench, or command line)

-- Create the database
CREATE DATABASE IF NOT EXISTS online_book_store CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Use the database
USE online_book_store;

-- Grant privileges (adjust username/password as needed)
-- GRANT ALL PRIVILEGES ON online_book_store.* TO 'root'@'localhost';
-- FLUSH PRIVILEGES;

-- The Laravel migrations will create the actual tables
-- This script just ensures the database exists
