# Admin Guide

Welcome to the **Inventory Management Admin Guide**. This guide is intended for administrators who manage and maintain the system, hosted on a **Raspberry Pi** server.

---

## System Overview

This web-based inventory system helps you manage item entries (add, edit, and delete). It's built using PHP, CSS, JavaScript, and a MariaDB database.

---

## Project Structure

```
├── src/
│   ├── add.php         # Add a new item
│   ├── connect.php     # Database connection
│   ├── delete.php      # Delete an item
│   ├── edit.php        # Edit item details
│   ├── index.php       # Main interface
│   ├── inventory.sql   # Database schema
│   ├── script.js       # JavaScript for front-end
│   ├── style.css       # Basic styling
│   ├── update.php      # Update item details
```

---

## Deployment (Raspberry Pi)

### Requirements

* Raspberry Pi 
* Apache2 + PHP
* MariaDB server

### Setup Steps

1. **Install Apache, PHP, and MariaDB:**

```bash
sudo apt update
sudo apt install apache2 php mariadb-server php-mysql
```

2. **Clone or copy project files:**

```bash
sudo cp -r /home/pi/inventory-system /var/www/html/inventory
```

3. **Set file permissions:**

```bash
sudo chown -R www-data:www-data /var/www/html/inventory
```

4. **Import the database:**

```bash
sudo mysql -u root -p
MariaDB [(none)]> CREATE DATABASE inventory;
MariaDB [(none)]> USE inventory;
MariaDB [inventory]> SOURCE /var/www/html/inventory/src/inventory.sql;
```

5. **Configure database connection in ****`connect.php`****:**

```php
$servername = "localhost";
$username = "root";
$password = "Password";
$dbname = "inventory";
```

6. **Access the app:**

---

## Admin Operations

* **Add Item:** Use `add.php` to add a new inventory item.
* **Edit Item:** Use `edit.php` to update details.
* **Delete Item:** Use `delete.php` to remove entries.
* **Update Item:** `update.php` processes the edit form.

---

## Security Tips

* Change default MariaDB password.
* Restrict access to `connect.php` using `.htaccess` or permissions.
* Regularly backup your database.

---

## 🛠 Maintenance Tips

* Backup `inventory.sql` regularly:

```bash
mysqldump -u root -p inventory > backup_inventory.sql
```

* Log errors to diagnose problems: `error_log` in `/var/log/apache2/`

---


---
