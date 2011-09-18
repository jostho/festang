-- popper.sql
-- supports both mysql and postgresql

-- 
-- database: mysql 5.5
-- 

-- connect to mysql as root

-- create DB 
CREATE DATABASE popper;

-- give access
GRANT ALL PRIVILEGES ON popper.* TO popper@localhost IDENTIFIED BY 'p0pper';

-- connect to popper DB
-- $ mysql -u popper -pp0pper popper 

-- create employees table 
-- mysql version 
CREATE TABLE employees (
  id INT(6) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  first_name VARCHAR(20),
  last_name VARCHAR(20),
  email VARCHAR(60),
  designation VARCHAR(60),
  date_of_joining date
) ;


-- 
-- database: postgresql 9.0
-- 

-- su as postgres user
-- $ su - postgres

-- create user
-- $ createuser -d -P -R -S popper

-- create db
-- $ createdb -O popper popper

-- connect to popper DB
-- $ psql -W -U popper popper

-- create employees table
-- postgresql version
CREATE TABLE employees (
  id SERIAL NOT NULL PRIMARY KEY,
  first_name VARCHAR(20),
  last_name VARCHAR(20),
  email VARCHAR(60),
  designation VARCHAR(60),
  date_of_joining date
) ;


-- 
-- CRUD operations (mysql/postgresql)
-- 

-- insert data 
INSERT INTO employees (first_name, last_name, email, designation, date_of_joining) 
  VALUES 
  ('David', 'Webb', 'david.webb@popper.com', 'Principal', '2004-01-23'),
  ('Jason', 'Bourne', 'jason.bourne@popper.com', 'Lead software developer', '2005-06-30'),
  ('John', 'Kane', 'john.kane@popper.com', 'Senior software developer', '2006-04-07'),
  ('Charles', 'Briggs', 'charles.briggs@popper.com', 'Software developer', '2007-11-05')  
  ;

-- select all 
SELECT * FROM employees ;

-- select by id
SELECT * FROM employees WHERE id = 1 ;

-- update  
UPDATE employees 
  set first_name='Jason', last_name='Bourne', email='jason.bourne@jostho.org', 
  designation='Lead software developer',  date_of_joining='2005-06-30'
  where id=2 ;

-- delete  
DELETE from employees where id=8 ;  


-- drop employees table
DROP TABLE employees ;

