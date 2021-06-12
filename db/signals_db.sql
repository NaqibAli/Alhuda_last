-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2021 at 03:44 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `signals_db`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `account_delete_sp` (IN `_id` VARCHAR(20) CHARSET utf8)  NO SQL
BEGIN

DELETE FROM account WHERE account.account_id = _id;
SELECT 'success' AS Message;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `account_fill_sp` (IN `_id` VARCHAR(20) CHARSET utf8)  NO SQL
BEGIN
IF _id = '' THEN
SELECT `account_id` id,`bank_name`,`bank_account` FROM `account`;
ELSE
SELECT `account_id` id,`bank_name`,`bank_account` FROM `account` WHERE account.account_id = _id;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `account_read_sp` (IN `_id` VARCHAR(20) CHARSET utf8)  NO SQL
BEGIN

IF _id = '' THEN
SELECT `account_id` ID, `bank_name` Bank, `bank_account` 'Account', `created_date` Date FROM `account` WHERE 1;

ELSE

SELECT * FROM account WHERE account_id = _id;

END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `account_sp` (IN `_account_id` VARCHAR(20) CHARSET utf8, IN `_bank_name` VARCHAR(100), IN `_bank_account` VARCHAR(50), IN `_date` DATE, IN `_user` VARCHAR(20) CHARSET utf8, IN `_action` VARCHAR(20))  NO SQL
BEGIN

IF _action = 'Insert' THEN

INSERT INTO `account`(`account_id`, `bank_name`, `bank_account`, `created_date`, `user_id`) VALUES (_account_id, _bank_name, _bank_account, _date, _user);

SELECT 'inserted' AS Message;
END IF;

IF _action = 'Update' THEN 

UPDATE `account` SET `bank_name`=_bank_name,`bank_account`=_bank_account,`created_date`=_date,`user_id`=_user WHERE `account_id`=_account_id;

SELECT 'updated' AS Message;
END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `boxes_get_sp` (IN `_type` VARCHAR(20))  NO SQL
BEGIN

SET @customer = (SELECT COUNT(customer.customer_id) from customer);
SET @active_cus = (SELECT COUNT(customer.customer_id) from customer where customer.status='Active');
SET @inactive_cus = (SELECT COUNT(customer.customer_id) from customer WHERE customer.status='InActive');

SET @employee = (SELECT COUNT(employee.employee_id) from employee);
SET @active_emp = (SELECT COUNT(employee.employee_id) from employee where employee.status='Active');
SET @inactive_emp = (SELECT COUNT(employee.employee_id) from employee WHERE employee.status='InActive');

SET @product = (SELECT COUNT(product.product_id) from product);
SET @low_stock = (SELECT COUNT(product.product_id) from product where product.status='Low Stock');
SET @available = (SELECT COUNT(product.product_id) from product where product.status='Available');
SET @finished = (SELECT COUNT(product.product_id) from product where product.status='Finished');

SET @invoices = (SELECT COUNT(invoices.invoice_id) from invoices);
SET @partial_invoice = (SELECT COUNT(invoices.invoice_id) from invoices where invoices.status='Partial Paid');
SET @full_invoice = (SELECT COUNT(invoices.invoice_id) from invoices where invoices.status='Full Paid');
SET @not_invoice = (SELECT COUNT(invoices.invoice_id) from invoices where invoices.status='Not Paid');




SELECT @customer as customer, @active_cus as active_cus, @inactive_cus as inactive_cus, @employee as employee, @active_emp as active_emp, @inactive_emp as inactive_emp, @product as product, @low_stock as low_stock, @available as available, @finished as finished,  @invoices as invoices, @partial_invoice as partial_invoice, @full_invoice as full_invoice, @not_invoice as not_invoice;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `change_username_or_password_sp` (IN `_user_id` VARCHAR(50) CHARSET utf8, IN `_username` VARCHAR(50) CHARSET utf8, IN `_password` VARCHAR(50) CHARSET utf8)  NO SQL
BEGIN

UPDATE users SET users.username = _username, users.password = PASSWORD(_password) WHERE users.user_id = _user_id;
UPDATE users set users.password_status = 'Yes' WHERE users.user_id = _user_id;
SELECT 'updated!' AS Message;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `chart_customer_status` (IN `_id` VARCHAR(20))  NO SQL
BEGIN


SELECT customer.status AS status, COUNT(*) AS customer  FROM customer 


GROUP BY customer.status;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `chart_employee_status` (IN `_id` VARCHAR(20))  NO SQL
BEGIN


SELECT employee.status AS status, COUNT(*) AS employees  FROM employee 


GROUP BY employee.status;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `check_user_link_sp` (IN `_page` VARCHAR(100), IN `_user_id` VARCHAR(100) CHARSET utf8)  NO SQL
BEGIN

IF EXISTS (SELECT * FROM users_link WHERE users_link.user_name=_user_id and users_link.link=_page) THEN

SELECT 'Allowed' as Message;

ELSE

SELECT 'Denied' as Message;

END IF;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `customer_address_fill` (IN `_id` VARCHAR(20))  NO SQL
BEGIN


SELECT customer.address from customer
GROUP by customer.address;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `customer_delete_sp` (IN `_id` VARCHAR(20) CHARSET utf8)  NO SQL
BEGIN

DELETE FROM customer WHERE customer.customer_id = _id;
SELECT 'success' AS Message;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `customer_fill_sp` (IN `_id` VARCHAR(20) CHARSET utf8)  NO SQL
BEGIN

IF _id = '' THEN
SELECT customer.customer_id id, `name`, customer.mobile FROM customer ;
ELSE
SELECT customer.customer_id id, `name`, customer.mobile FROM customer WHERE customer.customer_id = _id;
END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `customer_read_sp` (IN `_id` VARCHAR(20) CHARSET utf8)  NO SQL
BEGIN

IF _id = '' THEN

SELECT customer.customer_id as ID, customer.name as Name, customer.mobile as Mobile, customer.gender as Gender, customer.email as Email, customer.address as Address, customer.created_date as Date, customer.status as Status from customer;

ELSE

SELECT * from customer where customer.customer_id=_id;

END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `customer_sp` (IN `_id` VARCHAR(20) CHARSET utf8, IN `_name` VARCHAR(100), IN `_gender` VARCHAR(20), IN `_mobile` VARCHAR(20), IN `_email` VARCHAR(100), IN `_address` VARCHAR(100), IN `_status` VARCHAR(20), IN `_date` DATE, IN `_user` VARCHAR(20) CHARSET utf8, IN `_action` VARCHAR(20))  NO SQL
BEGIN

IF (_action = 'Insert') THEN

INSERT INTO `customer`(`customer_id`, `name`, `mobile`, `gender`, `email`, `address`, `created_date`, `status`, `user_id`) VALUES (customer_generate_fn(), _name, _mobile, _gender, _email, _address,    _date,_status, _user);

SELECT 'inserted' AS Message;
END IF;

IF (_action = 'Update') THEN

UPDATE `customer` SET `name`=_name,`gender`=_gender,`mobile`=_mobile,`email`=_email,  `address`=_address,`created_date`=_date, customer.status=_status, `user_id`=_user WHERE customer.customer_id=_id;

SELECT 'updated' AS Message;
END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dragable_submenu_get` (IN `_id` VARCHAR(20))  NO SQL
BEGIN

SELECT `submenu_id` AS 'ID', s.`name` AS Name, `link` AS Link, m.`name` AS Menu, s.`created_date` AS Date FROM `sub_menu` s
JOIN menu m ON m.menu_id = s.`menu_id` ORDER BY s.auto;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `employee_fill` (IN `_id` INT)  NO SQL
BEGIN

SELECT `employee_id`, employee.name as name, employee.emp_type as title, contact phone FROM `employee` ;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `employee_get` (IN `_id` VARCHAR(20))  NO SQL
BEGIN

if (_id='') THEN
SELECT employee.employee_id as ID, employee.name as Name, employee.emp_type as Title, employee.gender as Gender, employee.email as Email, employee.contact as Tel, employee.address as Address, employee.created_date as Date, employee.status as Status from employee;

ELSE

SELECT * from employee where employee.employee_id= _id;

END IF;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `employee_sp` (IN `_employee_id` VARCHAR(20) CHARSET utf8, IN `_name` VARCHAR(100), IN `_emp_type` VARCHAR(11), IN `_gender` VARCHAR(10), IN `_email` VARCHAR(50), IN `_contact` INT, IN `_address` VARCHAR(50), IN `_photo` VARCHAR(50), IN `_status` VARCHAR(20), IN `_user_id` VARCHAR(15) CHARSET utf8, IN `_date` DATE, IN `_action` VARCHAR(20))  NO SQL
BEGIN

IF (_action = 'INSERT') THEN

INSERT INTO `employee`(`employee_id`, `name`, `emp_type` ,`gender`, `email`, `contact`, `address`,`photo`, `status`, `user_id`, `created_date`) 
VALUES (_employee_id, _name, _emp_type, _gender, _email, _contact, _address,  _photo, _status, _user_id, _date);


SELECT 'inserted' AS Message;
END IF;

IF (_action = 'UPDATE') THEN

UPDATE `employee` SET `name`=_name, `emp_type`=_emp_type, `gender`=_gender,`email`=_email,`contact`=_contact,`address`=_address,`photo`=_photo, `status` = _status, `user_id`=_user_id,`created_date`=_date WHERE employee_id=_employee_id;

SELECT 'updated' AS Message;
END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `expense_delete_sp` (IN `_id` VARCHAR(20))  NO SQL
BEGIN

DELETE from expense  WHERE expense.expense_id= _id;

SELECT 'success' as Message;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `expense_get` (IN `_id` VARCHAR(20))  NO SQL
BEGIN

IF (_id='') THEN

SELECT `expense_id` ID, `type` Type, `amount` Amount, `description` Description, `created_date` 'Date' FROM `expense`;

ELSE
SELECT * from expense where expense.expense_id= _id;

END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `expense_sp` (IN `_expense_id` INT, IN `_type` VARCHAR(20), IN `_amount` VARCHAR(20), IN `_description` TEXT, IN `_date` DATE, IN `_user` VARCHAR(20) CHARSET utf8, IN `_action` VARCHAR(20))  NO SQL
BEGIN

IF _action = 'Insert' THEN
INSERT INTO `expense`(`type`, `amount`, `description`, `created_date`, `user_id`) VALUES (_type, _amount, _description, _date, _user);

SELECT 'inserted' AS Message;
END IF;

IF _action = 'Update' THEN
UPDATE `expense` SET `type`=_type,`amount`=_amount,`description`=_description,`created_date`=_date,`user_id`=_user WHERE `expense_id`=_expense_id;
SELECT 'updated' AS Message;
END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fill_address` (IN `_id` VARCHAR(20))  NO SQL
BEGIN

SELECT employee.address from employee

GROUP by employee.address;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fill_address_customer` (IN `_id` VARCHAR(20))  NO SQL
BEGIN

SELECT customer.address from customer

GROUP by customer.address;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fill_customerss_specific_get_sp` (IN `_type` VARCHAR(20))  NO SQL
BEGIN

IF (_type='Invoice') THEN
SELECT customer.customer_id, customer.name, customer.mobile from invoices 
LEFT JOIN customer on invoices.customer_id=customer.customer_id

GROUP by invoices.invoice_id;

END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fill_emp_type` (IN `_id` VARCHAR(20))  NO SQL
BEGIN

SELECT employee.emp_type FROM employee

GROUP by employee.emp_type;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fill_expense_types` (IN `_id` VARCHAR(20))  NO SQL
BEGIN

SELECT expense.type from expense

GROUP by expense.type;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fill_specific_employee` (IN `_type` VARCHAR(20), IN `_emp_id` VARCHAR(20))  NO SQL
BEGIN


if (_type='All') THEN

SELECT employee.employee_id as id, employee.name from employee order by employee.employee_id ASC;
ELSE
SELECT employee.employee_id as id, employee.name from employee where employee.employee_id =_emp_id order by employee.employee_id ASC;
END IF;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fill_user_authority_sp` (IN `_username` VARCHAR(20))  NO SQL
BEGIN
SELECT user_authorize.submenu_id FROM `user_authorize` WHERE user_authorize.user_name=_username;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `generate` (IN `_table` VARCHAR(20), IN `_col` VARCHAR(20))  NO SQL
BEGIN


SELECT t.menu_id from (SELECT table_name FROM information_schema.tables WHERE `TABLE_NAME` = _table AND TABLE_SCHEMA = 'jtechdb-3134378c2a') t;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_count_boxes` (IN `_id` VARCHAR(20))  NO SQL
BEGIN

SET @all_tickets = (SELECT COUNT(tickets.id) from tickets);
SET @partial_paid = (SELECT COUNT(tickets.id) from tickets where tickets.status='Partial Paid');
SET @not_paid = (SELECT COUNT(tickets.id) from tickets where tickets.status='Not Paid');
SET @full_paid = (SELECT COUNT(tickets.id) from tickets where tickets.status='Full Paid');


SET @all_passenger = (SELECT COUNT(passenger.passenger_id) FROM passenger);

SET @all_employees = (SELECT COUNT(employee.employee_id) FROM employee);



SELECT @all_employees as all_employees, @all_passenger as all_passenger, @full_paid as full_paid, @not_paid  not_paid, @partial_paid as partial_paid, @all_tickets as all_tickets;




END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_customer_balance_sp` (IN `_custom` VARCHAR(20), IN `_from` DATE, IN `_to` DATE)  NO SQL
BEGIN

IF _custom  = 'all' THEN

CREATE TEMPORARY table tem SELECT invoices.invoice_id as Invoice, customer.customer_id,  CONCAT(customer.customer_id, ' - ', customer.name, ' - ', customer.mobile ) as Customer, CONCAT((SELECT SUM(invoices_items.quantity) from invoices_items where invoices_items.invoice_id=invoices.invoice_id), ' Liters') as Fuel,  ((SELECT SUM(invoices_items.total) from invoices_items where invoices_items.invoice_id=invoices.invoice_id)-(invoices.discount)) as Total, (SELECT ifnull(sum(receipt.amount),0) FROM receipt WHERE receipt.invoice_id = invoices.invoice_id) as Paid, ((SELECT SUM(invoices_items.total) FROM invoices_items WHERE invoices_items.invoice_id = invoices.invoice_id)-(SELECT invoices.discount) - (SELECT ifnull(sum(receipt.amount),0) FROM receipt WHERE receipt.invoice_id = invoices.invoice_id)) as Balance, invoices.created_date as Date, invoices.status as Status FROM invoices

LEFT JOIN invoices_items on invoices_items.invoice_id=invoices.invoice_id
LEFT JOIN customer on invoices.customer_id=customer.customer_id
LEFT JOIN receipt on receipt.invoice_id=invoices.invoice_id

GROUP by invoices.invoice_id;

SELECT *FROM tem WHERE Balance > 0; 

else

CREATE TEMPORARY table tem SELECT invoices.invoice_id as Invoice, customer.customer_id, CONCAT(customer.customer_id, ' - ', customer.name, ' - ', customer.mobile ) as Customer, CONCAT((SELECT SUM(invoices_items.quantity) from invoices_items where invoices_items.invoice_id=invoices.invoice_id), ' Liters') as Fuel,  ((SELECT SUM(invoices_items.total) from invoices_items where invoices_items.invoice_id=invoices.invoice_id)-(invoices.discount)) as Total, (SELECT ifnull(sum(receipt.amount),0) FROM receipt WHERE receipt.invoice_id = invoices.invoice_id) as Paid, ((SELECT SUM(invoices_items.total) FROM invoices_items WHERE invoices_items.invoice_id = invoices.invoice_id)-(SELECT invoices.discount) - (SELECT ifnull(sum(receipt.amount),0) FROM receipt WHERE receipt.invoice_id = invoices.invoice_id)) as Balance, invoices.created_date as Date, invoices.status as Status FROM invoices

LEFT JOIN invoices_items on invoices_items.invoice_id=invoices.invoice_id
LEFT JOIN customer on invoices.customer_id=customer.customer_id
LEFT JOIN receipt on receipt.invoice_id=invoices.invoice_id

where invoices.created_date BETWEEN _from and _to
GROUP by invoices.invoice_id;

SELECT *FROM tem WHERE Balance > 0; 
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_customer_statement_sp` (IN `_customer_id` VARCHAR(15) CHARSET utf8, IN `_custom` VARCHAR(20), IN `_from` DATE, IN `_to` DATE)  NO SQL
BEGIN

CREATE TEMPORARY TABLE statement (
    Date date,
    REF VARCHAR(50) CHARSET utf8,
    Type VARCHAR(50) CHARSET utf8,
    Invoice VARCHAR(50) CHARSET utf8,
    Receipt  VARCHAR(50) CHARSET utf8
);

if _custom = 'all' THEN

INSERT INTO statement SELECT  i.`created_date` AS Date, i.invoice_id as 'REF', 'INVOICE' AS Type,  (((SELECT SUM(invoices_items.total) FROM invoices_items WHERE invoices_items.invoice_id = i.invoice_id)-(SELECT i.discount))) as Invoice, ' ' AS 'Recipt' FROM invoices i 
LEFT JOIN invoices_items on invoices_items.invoice_id=i.invoice_id
LEFT JOIN customer on i.customer_id=customer.customer_id
WHERE customer.customer_id = _customer_id
GROUP BY i.invoice_id;

INSERT INTO statement SELECT  invoices.created_date AS Date, receipt.receipt_id as 'REF',  'Recipt' AS Type,' ' AS 'Invoice', (receipt.amount) AS 'Receipt' FROM receipt  

LEFT JOIN invoices on receipt.invoice_id=invoices.invoice_id
LEFT JOIN customer on invoices.customer_id=customer.customer_id
where customer.customer_id = _customer_id

GROUP by receipt.receipt_id;

set @charge= 0;
set @receipt= 0;

ELSE

INSERT INTO statement SELECT  i.created_date AS Date, i.invoice_id as 'REF', 'INVOICE' AS Type,  (((SELECT SUM(invoices_items.total) FROM invoices_items WHERE invoices_items.invoice_id = i.invoice_id)-(SELECT i.discount))) as Invoice, ' ' AS 'Recipt' FROM invoices i 
LEFT JOIN invoices_items on invoices_items.invoice_id=i.invoice_id
LEFT JOIN customer on i.customer_id=customer.customer_id
WHERE customer.customer_id = _customer_id
and i.created_date BETWEEN _from and _to 
GROUP BY i.invoice_id;

INSERT INTO statement SELECT  invoices.created_date AS Date, receipt.receipt_id as 'REF',  'Recipt' AS Type,' ' AS 'Invoice', (receipt.amount) AS 'Receipt' FROM receipt  

LEFT JOIN invoices on receipt.invoice_id=invoices.invoice_id
LEFT JOIN customer on invoices.customer_id=customer.customer_id
where customer.customer_id = _customer_id
and receipt.created_date BETWEEN _from and _to
GROUP by receipt.receipt_id;

set @charge = (SELECT ((SELECT ifnull(SUM(invoices_items.total),0) FROM invoices_items WHERE invoices_items.invoice_id = invoices.invoice_id)-(SELECT (invoices.discount))) from invoices 
LEFT JOIN customer on invoices.customer_id=customer.customer_id
where customer.customer_id =_customer_id and invoices.created_date < _from);

set @receipt= (SELECT ifnull(SUM(receipt.amount),0) from receipt 
LEFT JOIN invoices on receipt.invoice_id=invoices.invoice_id
LEFT JOIN customer on invoices.customer_id=customer.customer_id where  customer.customer_id = _customer_id and receipt.created_date < _from ); 


END IF;

CREATE TEMPORARY TABLE statement_2 SELECT * from statement ORDER BY Date ASC;

SET @prev_balance = @charge - @receipt;

set @balance=@prev_balance;

SELECT '' Date, '' Type,'Previous Balance' REF, '' Invoice,'' Receipt,@prev_balance Balance

UNION

SELECT Date,Type,REF, Invoice, Receipt, if(Invoice='', @balance:=@balance-Receipt, @balance:=@balance+Invoice) Balance from statement_2

UNION

SELECT '','','Total', ifnull(sum(Invoice),0),ifnull(sum(Receipt),0),(ifnull(SUM(Invoice),0)-ifnull(SUM(Receipt),0)) +@prev_balance Balance FROM statement;



END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `latest_10_customners_get_Sp` (IN `_id` VARCHAR(20))  NO SQL
BEGIN

SELECT CONCAT(customer.customer_id, ' - ' , customer.name, ' - ' , customer.mobile) as Customer, customer.gender as Gender,customer.address as Address, customer.created_date as Date, customer.status as Status from customer 

order by customer.customer_id DESC limit 10;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `login_sp` (IN `_username` VARCHAR(100) CHARSET utf8, IN `_password` VARCHAR(100) CHARSET utf8)  NO SQL
BEGIN

IF EXISTS (SELECT * FROM users WHERE users.UserName =_username  AND users.Password = PASSWORD(_password)) THEN

IF EXISTS (SELECT * FROM users WHERE users.UserName =_username  AND users.Password = PASSWORD(_password) AND users.status='Active') THEN

SELECT 'User' AS jst_Type, u.user_id as jst_user_id, ifnull(e.name,'Default User') as jst_name, u.username as jst_username, u.user_type as jst_user_type, u.status as jst_status, u.password_status, ifnull(e.photo,'default.png') as jst_photo, ifnull(u.employee_id,'JT000') as jst_employee_id, ifnull(e.emp_type,'Admin') as jst_title
FROM users u 

LEFT JOIN employee e on u.employee_id= e.employee_id
WHERE u.username = _username;

UPDATE users SET users.log='Online' WHERE users.username = _username; 

ELSE

SELECT 'inactive' as Message;

END IF;


ELSE

SELECT 'Denied' as Message;

END IF;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `menus_fill` (IN `_id` INT)  NO SQL
BEGIN

SELECT `menu_id` as id, `name` FROM `menu` ORDER BY `menu_id` ASC;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `menu_get` (IN `_id` VARCHAR(20))  NO SQL
BEGIN

SELECT `menu_id` as 'ID', `name` as Name, `module` as module, `icon` as Icon FROM `menu` WHERE 1;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `menu_sp` (IN `_id` VARCHAR(20), IN `_name` VARCHAR(100), IN `_module` VARCHAR(50), IN `_icon` VARCHAR(50), IN `_user` VARCHAR(20) CHARSET utf8, IN `_action` VARCHAR(20))  NO SQL
BEGIN

IF (_action = 'INSERT') THEN
INSERT INTO `menu`(`menu_id`, `name`, `module`, `icon`, `user_id`, `created_date`) VALUES (menu_generate_fn(), _name, _module, _icon, _user, CURRENT_DATE());

SELECT 'inserted' AS Message;
END IF;

IF (_action = 'UPDATE') THEN
UPDATE `menu` SET `name`=_name,`module`=_module,`icon`=_icon,`user_id`=_user WHERE `menu_id`=_id;

SELECT 'updated' AS Message;
END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `receipt_delete_sp` (IN `_id` VARCHAR(20))  NO SQL
BEGIN


DELETE from receipt where receipt.receipt_id = _id;
SELECT 'success' as Message;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `receipt_fill` (IN `_invoice_id` VARCHAR(20) CHARSET utf8)  NO SQL
BEGIN

SELECT receipt.receipt_id, invoices.invoice_id, customer.name as customer, customer.mobile, invoices.status from receipt 

LEFT JOIN invoices on receipt.invoice_id=invoices.invoice_id

LEFT JOIN customer on invoices.customer_id=customer.customer_id

WHERE receipt.invoice_id=_invoice_id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `receipt_print_get_sp` (IN `_receipt_id` VARCHAR(20) CHARSET utf8)  NO SQL
BEGIN

SELECT invoices.invoice_id,  receipt.account_id, invoices.status as invoice_status, ((SELECT SUM(invoices_items.total) FROM invoices_items WHERE invoices_items.invoice_id = invoices.invoice_id)-(SELECT invoices.discount)  - (SELECT SUM(receipt.amount) from receipt where receipt.invoice_id=invoices.invoice_id)) as total, receipt.amount, ((SELECT SUM(invoices_items.total) FROM invoices_items WHERE invoices_items.invoice_id = invoices.invoice_id)-(SELECT invoices.discount)  - (SELECT SUM(receipt.amount) from receipt where receipt.invoice_id=invoices.invoice_id) - receipt.amount) as balance, invoices.created_date as invoice_date, receipt.receipt_id as receipt_id, receipt.created_date as receipt_date,  receipt.payment_method as method,  receipt.reference as reference, account.bank_name, customer.customer_id, customer.name as customer, customer.mobile FROM receipt

LEFT JOIN invoices on receipt.invoice_id=invoices.invoice_id
LEFT JOIN invoices_items on invoices_items.invoice_id=invoices.invoice_id
LEFT JOIN customer on invoices.customer_id=customer.customer_id
left JOIN account on receipt.account_id=account.account_id
 where receipt.receipt_id = _receipt_id
        
GROUP BY receipt.invoice_id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `receipt_read_sp` (IN `_id` VARCHAR(20))  NO SQL
BEGIN

if (_id='') THEN

SELECT receipt.receipt_id Receipt, receipt.invoice_id as Invoice, CONCAT(customer.name, ' - ', customer.mobile) as Customer, receipt.amount Amount, account.bank_name 'Account', receipt.reference 'REFERENCE', receipt.`created_date` 'Date' FROM `receipt`

LEFT JOIN invoices on receipt.invoice_id=invoices.invoice_id
LEFT JOIN customer on invoices.customer_id=customer.customer_id
LEFT JOIN account ON account.account_id = receipt.account_id;


ELSE

SELECT * from receipt where receipt.receipt_id = _id;
END IF;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `receipt_sp` (IN `_receipt_id` VARCHAR(20) CHARSET utf8, IN `_invoice_id` VARCHAR(20), IN `_pay_method` VARCHAR(100), IN `_amount` VARCHAR(100), IN `_account_id` VARCHAR(100), IN `_ref` VARCHAR(100), IN `_status` VARCHAR(20), IN `_date` DATE, IN `_user` VARCHAR(20) CHARSET utf8, IN `_action` VARCHAR(20))  NO SQL
BEGIN



IF _action = 'Insert' THEN

INSERT INTO `receipt`(`receipt_id`, `invoice_id`, `payment_method`, `account_id`, `amount`, `reference`, `created_date`, `user_id`) VALUES (receipt_generate_fn(), _invoice_id, _pay_method,_account_id, _amount, _ref, _date, _user);

UPDATE invoices SET `status` = _status WHERE invoices.invoice_id = _invoice_id;

SELECT 'inserted' Message;
END IF;

IF _action = 'Update' THEN 

UPDATE `receipt` SET `invoice_id`=_invoice_id,`payment_method`=_pay_method,`amount`=_amount,`account_id`=_account_id,`reference`=_ref,`created_date`=_date,`user_id`=_user WHERE `receipt_id`=_receipt_id;

UPDATE invoices SET `status` = _status WHERE invoices.invoice_id = _invoice_id;

SELECT 'updated' Message;
END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `rpt_customer_get_sp` (IN `_custom` VARCHAR(20), IN `_from` DATE, IN `_to` DATE, IN `_address` VARCHAR(20), IN `_status` VARCHAR(20), IN `_gender` VARCHAR(20))  NO SQL
BEGIN
SET @address = 'x';
IF (_address != '') THEN
SET @address = _address;
END IF;

IF _custom = 'all' THEN 

SELECT customer.customer_id as ID, customer.name as Name, customer.mobile as Mobile, customer.gender as Gender, customer.address as Address , customer.created_date as Date, customer.status as Status from customer



WHERE customer.gender LIKE CONCAT(_gender,'%')
AND customer.address LIKE  CONCAT(_address,'%')
AND customer.address NOT LIKE  CONCAT(CONCAT('_',@address),'%')
AND customer.address LIKE  CONCAT('%',_address)
AND customer.status LIKE  CONCAT('%',_status);

ELSE

SELECT customer.customer_id as ID, customer.name as Name, customer.mobile as Mobile, customer.gender as Gender, customer.address as Address , customer.created_date as Date, customer.status as Status from customer



WHERE customer.gender LIKE CONCAT(_gender,'%')
AND customer.address LIKE  CONCAT(_address,'%')
AND customer.address NOT LIKE  CONCAT(CONCAT('_',@address),'%')
AND customer.address LIKE  CONCAT('%',_address)
AND customer.status LIKE  CONCAT('%',_status)
AND customer.created_date BETWEEN _from AND _to;

END IF;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `rpt_receipt_get_sp` (IN `_custom` VARCHAR(20), IN `_from` DATE, IN `_to` DATE, IN `_customer` VARCHAR(20), IN `_invoice` VARCHAR(20), IN `_receipt` VARCHAR(20))  NO SQL
BEGIN


IF _custom = 'all' THEN

SELECT receipt.receipt_id Receipt, receipt.invoice_id as Invoice, CONCAT(customer.name, ' - ', customer.mobile) as Customer, receipt.amount Amount, account.bank_name 'Account', receipt.reference 'REFERENCE', receipt.`created_date` 'Date' FROM `receipt`

LEFT JOIN invoices on receipt.invoice_id=invoices.invoice_id
LEFT JOIN customer on invoices.customer_id=customer.customer_id
LEFT JOIN account ON account.account_id = receipt.account_id

WHERE customer.customer_id like CONCAT('%',_customer)
AND receipt.invoice_id LIKE Concat('%',_invoice)
AND receipt.receipt_id LIKE Concat('%',_receipt);

ELSE

SELECT receipt.receipt_id Receipt, receipt.invoice_id as Invoice, CONCAT(customer.name, ' - ', customer.mobile) as Customer, receipt.amount Amount, account.bank_name 'Account', receipt.reference 'REFERENCE', receipt.`created_date` 'Date' FROM `receipt`

LEFT JOIN invoices on receipt.invoice_id=invoices.invoice_id
LEFT JOIN customer on invoices.customer_id=customer.customer_id
LEFT JOIN account ON account.account_id = receipt.account_id

WHERE customer.customer_id like CONCAT('%',_customer)
AND receipt.invoice_id LIKE Concat('%',_invoice)
AND receipt.receipt_id LIKE Concat('%',_receipt)

AND receipt.`created_date` BETWEEN _from AND _to;

END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `settings_sp` (IN `_setting_id` INT(20), IN `_title` VARCHAR(100), IN `_body` VARCHAR(1000), IN `_head_name` VARCHAR(100), IN `_footer` VARCHAR(10000), IN `_icon` VARCHAR(100), IN `_icon_white` VARCHAR(100), IN `_logo` VARCHAR(100), IN `_logo_white` VARCHAR(100), IN `_back_img_1` VARCHAR(100), IN `_back_img_2` VARCHAR(100), IN `_back_img_3` VARCHAR(100), IN `_back_img_4` VARCHAR(100), IN `_sms` VARCHAR(20), IN `_action` VARCHAR(20))  NO SQL
BEGIN
IF _action = 'Update' THEN
UPDATE
    `settings`
SET
    `title` = _title,
    `body` = _body,
    `head_name` = _head_name,
    `footer` = _footer,
    `icon` = _icon,
    `icon_white` = _icon_white,
    `logo` = _logo,
    `sms` = _sms,
    `logo_white` = _logo_white,
   	`back_img_1` = _back_img_1,
    `back_img_2` = _back_img_2,
    `back_img_3` = _back_img_3,
    `back_img_4` = _back_img_4
WHERE
    `setting_id` = _setting_id;
    
SELECT 'updated' AS Message;
ELSE

SELECT 'dinied' Message;

END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `submenu_get` (IN `_id` VARCHAR(20))  NO SQL
BEGIN

SELECT `submenu_id` AS 'ID', s.`name` AS Name, `link` AS Link, m.`name` AS Menu FROM `sub_menu` s
JOIN menu m ON m.menu_id = s.`menu_id` ORDER BY Menu;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `submenu_sp` (IN `_id` INT, IN `_name` VARCHAR(100), IN `_menu` VARCHAR(20), IN `_link` VARCHAR(100), IN `_user` VARCHAR(20), IN `_action` VARCHAR(15))  NO SQL
BEGIN

IF (_action = 'INSERT') THEN
INSERT INTO `sub_menu`(`name`, `link`, `menu_id`, `user_id`, `created_date`) VALUES (_name, _link, _menu, _user, CURRENT_DATE());

SELECT 'inserted' AS Message;
END IF;

IF (_action = 'UPDATE') THEN
UPDATE `sub_menu` SET `name`=_name,`link`=_link,`menu_id`=_menu,`user_id`=_user WHERE `submenu_id`=_id;

SELECT 'updated' AS Message;
END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `users_get` (IN `_id` VARCHAR(20))  NO SQL
BEGIN
SELECT usr.`user_id` AS 'ID', ifnull(emp.name,'Default User') AS Employee, `username` AS Username,  `user_type` AS Type, usr.`status` AS Status,  usr.`created_date` AS Date FROM `users` usr 
LEFT JOIN employee emp ON usr.employee_id = emp.employee_id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `users_sp` (IN `_userid` VARCHAR(15), IN `_username` VARCHAR(50), IN `_password` VARCHAR(50), IN `_usertype` VARCHAR(50), IN `_status` VARCHAR(50), IN `_employee` VARCHAR(20), IN `_date` DATE, IN `_user` VARCHAR(20) CHARSET utf8, IN `_action` VARCHAR(20))  NO SQL
BEGIN
SET @emp = NULL;
IF _employee != '' THEN
SET @emp = _employee;
END IF;


IF (_action = 'INSERT') THEN
 
INSERT INTO `users`(`user_id`, `username`, `password`, `user_type`, `status`, users.employee_id, `created_date`) VALUES (_userid,  _username, PASSWORD(_password), _usertype, _status, @emp, _date);


SELECT 'inserted' AS Message;
END IF;

IF (_action = 'UPDATE') THEN

IF _password != '' THEN
UPDATE `users` SET `username`=_username,`password`=PASSWORD(_password),
`user_type`=_usertype,`status`=_status,
`employee_id`=@emp, `created_date`=_date WHERE user_id = _userid;
ELSE
UPDATE `users` SET `username`=_username,
`user_type`=_usertype,`status`=_status,
`employee_id`=@emp, `created_date`=_date WHERE user_id = _userid;
END IF;

SELECT 'updated' AS Message;
END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `user_authority_fill` (IN `_username` VARCHAR(20))  NO SQL
BEGIN
SELECT user_authorize.submenu_id FROM `user_authorize` WHERE user_authorize.user_name=_username;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `user_authorize_sp` (IN `_username` VARCHAR(20), IN `_submenu` INT, IN `_userid` VARCHAR(20), IN `_loop` INT, IN `_action` VARCHAR(20))  NO SQL
BEGIN

IF _action = 'Update' THEN

-- first delete all previas user aturize
IF (_loop = 0) THEN
	DELETE FROM `user_authorize` WHERE `user_name` = _username;
END IF;

SET @getMenu = (SELECT sub.menu_id FROM sub_menu sub WHERE sub.submenu_id = _submenu);

INSERT INTO `user_authorize`(`user_name`, `menu_id`, `submenu_id`, `user_id`, `created_date`) VALUES (_username, @getMenu, _submenu, _userid, CURRENT_DATE());

SELECT 'updated' AS Message;

END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `user_fill` (IN `_id` VARCHAR(20))  NO SQL
BEGIN

SELECT u.`user_id` as id, `username`,`user_type` 'type', ifnull(e.name,'Default User') employee FROM `users` u
left JOIN employee e ON e.employee_id = u.`employee_id`;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `user_menu_get` (IN `_id` VARCHAR(20))  NO SQL
BEGIN

SELECT menu.menu_id, sub_menu.submenu_id, menu.module, menu.name as menu, menu.icon,sub_menu.name as sub_menu FROM `menu` JOIN sub_menu on menu.menu_id=sub_menu.menu_id ORDER BY menu.module;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `user_nav_get` (IN `_userid` VARCHAR(20))  NO SQL
BEGIN

SELECT m.name menu, m.icon, sm.name submenu, sm.link

FROM `user_authorize` ua
JOIN menu m ON m.menu_id = ua.`menu_id`
JOIN sub_menu sm ON sm.submenu_id = ua.`submenu_id`
WHERE ua.`user_name` = _userid ORDER BY sm.auto;


END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `calculate_total_tickets` (`_ticket_id` VARCHAR(20) CHARSET utf8) RETURNS VARCHAR(255) CHARSET utf8 NO SQL
BEGIN

RETURN (SELECT SUM(`total`) FROM tickets WHERE tickets.id = _ticket_id);

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `customer_generate_fn` () RETURNS VARCHAR(255) CHARSET utf8 NO SQL
BEGIN

SET @abr = 'G';
SET @maxId =  (SELECT SUBSTR(MAX(customer_id),4) from customer);
    SET @maxId:= @maxId + 1;
    SET @newId = (
        CASE WHEN LENGTH(@maxId) = 1 THEN CONCAT(@abr, '00', @maxId) WHEN LENGTH(@maxId) = 2 THEN CONCAT(@abr, '0', @maxId) ELSE CONCAT(@abr, @maxId)
    END
    );
    
    RETURN ifnull(@newId,'G001');

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `find_ticket_balance` (`_ticket_id` VARCHAR(20) CHARSET utf8) RETURNS VARCHAR(255) CHARSET utf8 NO SQL
BEGIN

RETURN ifnull((SELECT ((
    calculate_total_quote(quote.`quote_id`) -
    (quote_discount_get(quote.quote_id))) - 
	ifnull(SUM(receipt.amount),0)) Balance FROM `invoice` 
               
LEFT JOIN quote ON quote.quote_id = invoice.quote_id
LEFT JOIN receipt ON receipt.invoice_id = invoice.invoice_id
WHERE invoice.invoice_id = _invoice),0);


END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `find_total_amount_by_invoice` (`_invoice_id` VARCHAR(20) CHARSET utf8) RETURNS INT(255) NO SQL
BEGIN

RETURN (SELECT SUM(`amount`) FROM `receipt` WHERE `invoice_id` = _invoice_id);
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `generate_product` () RETURNS VARCHAR(255) CHARSET utf8 NO SQL
BEGIN

SET @abr = 'P';
SET @maxId =  (SELECT SUBSTR(MAX(product.product_id),2) from product);
    SET @maxId:= @maxId + 1;
    SET @newId = (
        CASE WHEN LENGTH(@maxId) = 1 THEN CONCAT(@abr, '00', @maxId) WHEN LENGTH(@maxId) = 2 THEN CONCAT(@abr, '0', @maxId) ELSE CONCAT(@abr, @maxId)
    END
    );
    
    RETURN ifnull(@newId,'P001');

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `invoice_generate_fn` () RETURNS VARCHAR(255) CHARSET utf8 NO SQL
BEGIN

SET @abr = 'INV';
SET @maxId =  (SELECT SUBSTR(MAX(invoices.invoice_id),4) from invoices);
    SET @maxId:= @maxId + 1;
    SET @newId = (
        CASE WHEN LENGTH(@maxId) = 1 THEN CONCAT(@abr, '00', @maxId) WHEN LENGTH(@maxId) = 2 THEN CONCAT(@abr, '0', @maxId) ELSE CONCAT(@abr, @maxId)
    END
    );
    
    RETURN ifnull(@newId,'INV001');

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `menu_generate_fn` () RETURNS VARCHAR(255) CHARSET utf8 NO SQL
BEGIN

SET @abr = 'MN';
SET @maxId =  (SELECT SUBSTR(MAX(menu_id),4) from menu);
    SET @maxId:= @maxId + 1;
    SET @newId = (
        CASE WHEN LENGTH(@maxId) = 1 THEN CONCAT(@abr, '00', @maxId) WHEN LENGTH(@maxId) = 2 THEN CONCAT(@abr, '0', @maxId) ELSE CONCAT(@abr, @maxId)
    END
    );
    
    RETURN ifnull(@newId,'MN001');

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `receipt_generate_fn` () RETURNS VARCHAR(255) CHARSET utf8 NO SQL
BEGIN

SET @abr = 'RV';
SET @maxId =  (SELECT SUBSTR(MAX(receipt_id),3) from receipt);
    SET @maxId:= @maxId + 1;
    SET @newId = (
        CASE WHEN LENGTH(@maxId) = 1 THEN CONCAT(@abr, '00', @maxId) WHEN LENGTH(@maxId) = 2 THEN CONCAT(@abr, '0', @maxId) ELSE CONCAT(@abr, @maxId)
    END
    );
    
    RETURN ifnull(@newId,'RV001');

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_id` varchar(20) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `bank_account` varchar(100) NOT NULL,
  `created_date` date NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `bank_name`, `bank_account`, `created_date`, `user_id`, `modified_date`) VALUES
('AC001', 'Salaam Somali Bank', '31260005', '2020-08-29', 'USR0001', '2020-08-29 13:02:21'),
('AC002', 'IBS Bank', '36451', '2020-08-29', 'USR0001', '2020-08-29 13:05:46'),
('AC003', 'EVC PLUS', '0615868999', '2020-09-03', 'USR0001', '2020-09-03 11:42:13');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `created_date` date NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active',
  `user_id` varchar(20) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `mobile`, `gender`, `email`, `address`, `created_date`, `status`, `user_id`, `modified_date`) VALUES
('G001', 'Abdirahman Hassan Haji', '0618946816', 'Male', 'cajmaan33@gmail.com', 'xafada buulo xubey', '2020-11-18', 'Active', 'USR0001', '2020-12-28 09:21:35'),
('G002', 'Abdisamad Ali Mohamed', '0615376720', 'Male', 'kish@gmail.com', '', '2020-11-21', 'InActive', 'USR0001', '2020-12-31 16:35:21'),
('G003', 'Hanad Abdulahi Osman', '0616102387', 'Male', 'hanad@just.edu.so', '', '2020-12-30', 'Active', 'USR0001', '2020-12-31 13:35:35'),
('G004', 'Hanad Abdulahi Osman', '25353654', 'Male', '', 'xafada buulo xubey', '2020-12-31', 'Active', 'USR0001', '2020-12-31 10:42:30');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `emp_type` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` varchar(20) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `user_id` varchar(15) NOT NULL,
  `created_date` date NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `name`, `emp_type`, `gender`, `email`, `contact`, `address`, `photo`, `status`, `user_id`, `created_date`, `modified_date`) VALUES
('G2101', 'Abdirisak Warsame', 'Admin', 'Male', 'cr@jtech.so', '615551999', 'Wadajir', 'DIS2001_photo.png', 'Active', 'USR0001', '2020-03-28', '2020-03-28 08:50:34'),
('G2102', 'Abdirahman Hassan Haji', 'Manager', 'Male', 'cajmaan33@gmail.com', '618946816', 'Hodan', 'DIS2002_photo.png', 'Active', 'USR0001', '2020-12-18', '2020-12-18 17:11:51'),
('G2103', 'Asha Abdikadir Osman', 'Cashier', 'Female', 'asha@gmail.com', '618946854', 'Heliwaa', 'G2103_photo.png', 'Active', 'USR0001', '2020-12-27', '2020-12-27 12:57:27');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `expense_id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL COMMENT 'petty_cash, check & other',
  `amount` float NOT NULL,
  `description` text NOT NULL,
  `created_date` date NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`expense_id`, `type`, `amount`, `description`, `created_date`, `user_id`, `modified_date`) VALUES
(1, 'Petty Cash', 2, 'Hanad Abdullahi Osman', '2020-09-13', 'USR0001', '2020-12-23 15:45:35'),
(2, 'Petty Cash', 2, 'Hanad Abdullahi Osman', '2020-09-15', 'USR0001', '2020-10-18 15:29:20'),
(3, 'Petty Cash', 5, 'Hanad Abdullahi Osman', '2020-09-19', 'USR0001', '2020-12-17 12:26:29'),
(4, 'Petty Cash', 2, 'Hanad Abdullahi Osman', '2020-09-21', 'USR0001', '2020-12-23 15:46:19');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `module` varchar(100) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `created_date` date NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `name`, `module`, `icon`, `user_id`, `created_date`, `modified_date`) VALUES
('MN001', 'Dashbaords', 'Dashboard', 'fa-chart-line', 'USR0001', '2020-08-19', '2020-08-19 16:21:33'),
('MN003', 'Manage Employees', 'HRM', 'fa-user-tie', 'USR0001', '2020-08-19', '2020-08-19 16:26:35'),
('MN004', 'Menu', 'Setting', 'fa-bars', 'USR0001', '2020-08-19', '2020-08-19 16:22:21'),
('MN005', 'Permissions', 'Setting', 'fa-cog', 'USR0001', '2020-08-19', '2020-08-19 16:22:29'),
('MN006', 'User', 'Setting', 'fa fa-user', 'USR0001', '2020-08-29', '2020-08-29 10:38:13'),
('MN007', 'Customer', 'CRM', 'fa-user-friends', 'USR0001', '2020-11-17', '2020-11-17 12:24:30'),
('MN011', 'Receipts', 'CRM', 'fa-money-bill-alt', 'USR0001', '2020-11-21', '2020-11-21 13:50:47'),
('MN012', 'Customer Report', 'Report', 'fa-users', 'USR0001', '2020-12-06', '2020-12-06 13:12:00'),
('MN015', 'Finance Report', 'Report', 'fa-money-bill-alt', 'USR0001', '2020-12-06', '2020-12-06 13:15:45'),
('MN018', 'Expense', 'CRM', 'fa-hourglass-end', 'USR0001', '2020-12-17', '2020-12-17 10:08:03'),
('MN021', 'Sales', 'CRM', 'fa-file-invoice', 'USR0001', '2020-12-28', '2020-12-28 13:37:54'),
('MN022', 'Signals', 'Signals', 'fa-signal', 'USR0001', '2021-01-09', '2021-01-09 16:03:43');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `receipt_id` varchar(20) NOT NULL,
  `invoice_id` varchar(20) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `account_id` varchar(20) NOT NULL,
  `amount` float(10,2) NOT NULL,
  `reference` varchar(100) NOT NULL,
  `created_date` date NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`receipt_id`, `invoice_id`, `payment_method`, `account_id`, `amount`, `reference`, `created_date`, `user_id`, `modified_date`) VALUES
('RV001', 'INV001', 'E-Cash', 'AC001', 3.00, '121', '2020-12-30', 'USR0001', '2020-12-30 06:06:07'),
('RV002', 'INV001', 'E-Cash', 'AC001', 6.00, '121', '2020-12-30', 'USR0001', '2020-12-30 06:10:45'),
('RV003', 'INV001', 'E-Cash', 'AC001', 5.00, '121', '2020-12-30', 'USR0001', '2020-12-30 06:36:46');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `setting_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `head_name` varchar(100) NOT NULL,
  `footer` varchar(10000) NOT NULL,
  `body` varchar(600) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `icon_white` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `logo_white` varchar(100) NOT NULL,
  `back_img_1` varchar(100) NOT NULL,
  `back_img_2` varchar(100) NOT NULL,
  `back_img_3` varchar(100) NOT NULL,
  `back_img_4` varchar(100) NOT NULL,
  `sms` varchar(20) NOT NULL DEFAULT 'OFF',
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`setting_id`, `title`, `head_name`, `footer`, `body`, `icon`, `icon_white`, `logo`, `logo_white`, `back_img_1`, `back_img_2`, `back_img_3`, `back_img_4`, `sms`, `modified_date`) VALUES
(1, 'Signal System', 'Signal System', 'Copyright Â© 2020 <b>Signal System </b>. Developed by  <a href=\"https://jtech.so\">Jamhuriya Technology Solutions</a> All rights reserved.', 'Jamhuriya Technology Solutions - JTech is a professional technology solution service provider and ICT training center founded in 2020 by Jamhuriya University of Science and Technology in Mogadishu, Somalia. JTech has been established to fill the gap (of quality and creativity) in the field of ICT solutions.', 'fav.png', 'fav_white.png', 'logo.png', 'logo_white.png', '1.png', '2.png', '3.png', '4.png', 'ON', '2020-09-13 10:29:35');

-- --------------------------------------------------------

--
-- Table structure for table `sub_menu`
--

CREATE TABLE `sub_menu` (
  `submenu_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `link` varchar(50) NOT NULL,
  `menu_id` varchar(50) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `created_date` date NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `auto` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_menu`
--

INSERT INTO `sub_menu` (`submenu_id`, `name`, `link`, `menu_id`, `user_id`, `created_date`, `modified_date`, `auto`) VALUES
(6, 'Country', 'country', 'MN002', 'USR0001', '2020-08-19', '2020-08-19 16:24:40', 1),
(7, 'Region', 'region', 'MN002', 'USR0001', '2020-08-19', '2020-08-19 16:24:56', 2),
(8, 'District', 'district', 'MN002', 'USR0001', '2020-08-19', '2020-08-19 16:25:36', 3),
(10, 'Employee', 'employee', 'MN003', 'USR0001', '2020-08-19', '2020-08-19 16:29:59', 1),
(11, 'Menu', 'menus', 'MN004', 'USR0001', '2020-08-19', '2020-08-19 16:30:55', 13),
(13, 'Menu permissions', 'permissions', 'MN005', 'USR0001', '2020-08-19', '2020-08-19 16:31:29', 15),
(14, 'Settings', 'settings', 'MN005', 'USR0001', '2020-08-19', '2020-08-19 16:31:45', 17),
(27, 'User', 'users', 'MN006', 'USR0001', '2020-08-29', '2020-08-29 10:39:04', 14),
(45, 'Default Dashboard', 'dashboard', 'MN001', 'USR0001', '2020-10-10', '2020-10-10 07:01:55', 0),
(56, 'Submenu Arrangement', 'submenu_arragnment', 'MN005', 'USR0001', '2020-10-17', '2020-10-17 16:41:38', 16),
(57, 'Branches', 'branches', 'MN016', 'USR0001', '2020-11-17', '2020-11-17 09:37:23', 4),
(58, 'Customer', 'customer', 'MN007', 'USR0001', '2020-11-17', '2020-11-17 12:25:20', 4),
(59, 'Aircrafts', 'aircrafts', 'MN008', 'USR0001', '2020-11-17', '2020-11-17 13:25:07', 7),
(60, 'New Flight Schedule', 'new_flight_schedule', 'MN009', 'USR0001', '2020-11-17', '2020-11-17 13:54:02', 8),
(61, 'Flight Schedules', 'flight_schedules', 'MN009', 'USR0001', '2020-11-17', '2020-11-17 13:54:30', 9),
(62, 'Schedule Preview', 'schedule_preview', 'MN009', 'USR0001', '2020-11-17', '2020-11-17 13:54:54', 10),
(63, 'Tickets ', 'tickets', 'MN010', 'USR0001', '2020-11-21', '2020-11-21 11:01:07', 12),
(64, 'Bank Accounts', 'accounts', 'MN011', 'USR0001', '2020-11-21', '2020-11-21 13:51:11', 5),
(65, 'Receipts', 'receipts', 'MN011', 'USR0001', '2020-11-21', '2020-11-21 13:51:29', 6),
(66, 'Search Receipt', 'receipt_view', 'MN011', 'USR0001', '2020-11-21', '2020-11-21 13:52:09', 7),
(67, 'Search Ticket', 'ticket_view', 'MN010', 'USR0001', '2020-12-06', '2020-12-06 10:36:56', 13),
(68, 'Account Receivable ', 'ac_receivable', 'MN011', 'USR0001', '2020-12-06', '2020-12-06 13:09:49', 8),
(69, 'Customer Report', 'customer_report', 'MN012', 'USR0001', '2020-12-06', '2020-12-06 13:16:20', 10),
(70, 'Statement Report', 'statement', 'MN012', 'USR0001', '2020-12-06', '2020-12-06 13:16:37', 11),
(71, 'Aircrafts Report', 'aircrafts_report', 'MN013', 'USR0001', '2020-12-06', '2020-12-06 13:17:20', 26),
(74, 'Receipt Report', 'receipt_report', 'MN015', 'USR0001', '2020-12-06', '2020-12-06 13:18:49', 12),
(76, 'Income Statement', 'income_statement', 'MN017', 'USR0001', '2020-12-17', '2020-12-17 09:58:54', 32),
(77, 'Balance Sheet', 'balance_sheet', 'MN017', 'USR0001', '2020-12-17', '2020-12-17 09:59:07', 33),
(79, 'Expense', 'expense', 'MN018', 'USR0001', '2020-12-17', '2020-12-17 10:08:19', 9),
(90, 'Signals', 'Signals', 'MN022', 'USR0001', '2021-01-09', '2021-01-09 16:03:57', 2),
(91, 'Posts', 'Posts', 'MN022', 'USR0001', '2021-01-09', '2021-01-09 16:04:06', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `log` varchar(20) NOT NULL DEFAULT 'Offline',
  `status` varchar(50) NOT NULL,
  `password_status` varchar(20) DEFAULT 'No',
  `employee_id` varchar(20) DEFAULT NULL,
  `created_date` date NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `user_type`, `log`, `status`, `password_status`, `employee_id`, `created_date`, `modified_date`) VALUES
('USR0001', 'admin', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 'Admin', 'Online', 'Active', 'Yes', 'G2102', '2020-08-18', '2020-08-18 10:29:47');

-- --------------------------------------------------------

--
-- Stand-in structure for view `users_link`
-- (See below for the actual view)
--
CREATE TABLE `users_link` (
`id` int(11)
,`user_name` varchar(20)
,`submenu_id` int(11)
,`link` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `user_authorize`
--

CREATE TABLE `user_authorize` (
  `id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `menu_id` varchar(50) NOT NULL,
  `submenu_id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `created_date` date NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_authorize`
--

INSERT INTO `user_authorize` (`id`, `user_name`, `menu_id`, `submenu_id`, `user_id`, `created_date`, `modified_date`) VALUES
(771, 'USR0001', 'MN007', 58, 'USR0001', '2021-01-09', '2021-01-09 16:04:22'),
(772, 'USR0001', 'MN011', 64, 'USR0001', '2021-01-09', '2021-01-09 16:04:22'),
(773, 'USR0001', 'MN011', 65, 'USR0001', '2021-01-09', '2021-01-09 16:04:22'),
(774, 'USR0001', 'MN011', 66, 'USR0001', '2021-01-09', '2021-01-09 16:04:22'),
(775, 'USR0001', 'MN011', 68, 'USR0001', '2021-01-09', '2021-01-09 16:04:22'),
(776, 'USR0001', 'MN018', 79, 'USR0001', '2021-01-09', '2021-01-09 16:04:22'),
(777, 'USR0001', 'MN001', 45, 'USR0001', '2021-01-09', '2021-01-09 16:04:22'),
(778, 'USR0001', 'MN003', 10, 'USR0001', '2021-01-09', '2021-01-09 16:04:22'),
(779, 'USR0001', 'MN004', 11, 'USR0001', '2021-01-09', '2021-01-09 16:04:22'),
(780, 'USR0001', 'MN005', 13, 'USR0001', '2021-01-09', '2021-01-09 16:04:22'),
(781, 'USR0001', 'MN005', 14, 'USR0001', '2021-01-09', '2021-01-09 16:04:22'),
(782, 'USR0001', 'MN005', 56, 'USR0001', '2021-01-09', '2021-01-09 16:04:22'),
(783, 'USR0001', 'MN006', 27, 'USR0001', '2021-01-09', '2021-01-09 16:04:22'),
(784, 'USR0001', 'MN022', 90, 'USR0001', '2021-01-09', '2021-01-09 16:04:22'),
(785, 'USR0001', 'MN022', 91, 'USR0001', '2021-01-09', '2021-01-09 16:04:22');

-- --------------------------------------------------------

--
-- Structure for view `users_link`
--
DROP TABLE IF EXISTS `users_link`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `users_link`  AS  select `ua`.`id` AS `id`,`ua`.`user_name` AS `user_name`,`ua`.`submenu_id` AS `submenu_id`,`s`.`link` AS `link` from (`user_authorize` `ua` join `sub_menu` `s` on((`s`.`submenu_id` = `ua`.`submenu_id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`),
  ADD UNIQUE KEY `bank_account` (`bank_account`),
  ADD KEY `account_user_1` (`user_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `contact` (`contact`),
  ADD UNIQUE KEY `name_2` (`name`,`emp_type`,`email`,`contact`,`address`),
  ADD KEY `emp_user_id` (`user_id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`expense_id`),
  ADD KEY `expense_user_1` (`user_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `name_2` (`name`,`module`),
  ADD KEY `menu_user_1` (`user_id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`receipt_id`),
  ADD KEY `receipt_user_1` (`user_id`),
  ADD KEY `receipt_invoice_1` (`invoice_id`),
  ADD KEY `receipt_account_1` (`account_id`);

--
-- Indexes for table `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD PRIMARY KEY (`submenu_id`),
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `employee_id` (`employee_id`);

--
-- Indexes for table `user_authorize`
--
ALTER TABLE `user_authorize`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `submenu_id` (`submenu_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `submenu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `user_authorize`
--
ALTER TABLE `user_authorize`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=786;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `receipt`
--
ALTER TABLE `receipt`
  ADD CONSTRAINT `receipt_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`invoice_id`) ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
