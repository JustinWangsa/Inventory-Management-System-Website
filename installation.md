# Installation Guide

This document describes how to install and run the TKUISA Inventory Management System on two environments:

1. [Localhost using XAMPP (Windows)](#localhost-installation-with-xampp)
2. [Raspberry Pi Server](#raspberry-pi-installation)

---

## Localhost Installation with XAMPP

### Prerequisites

* Windows PC
* XAMPP installed: [Download XAMPP](https://www.apachefriends.org/index.html)

### Steps

1. **Install XAMPP** if you haven’t already.
2. Navigate to the following directory:

   ```
   C:\xampp\htdocs
   ```
3. **Clone or copy** all project files into the `htdocs` folder.
4. Launch **XAMPP Control Panel** and start both **Apache** and **MySQL**.
5. Open your browser and go to:

   ```
   http://localhost/phpmyadmin
   ```
6. Create a new database named:

   ```
   inventory
   ```
7. Import the `inventory.sql` file into the newly created `inventory` database.
8. Open your browser and go to:

   ```
   http://localhost/inventory
   ```

   You should now see the inventory system running.

---

## Raspberry Pi Installation

### Prerequisites

* Raspberry Pi with Raspberry Pi OS installed
* Terminal access to the Pi (local or SSH)

### Steps

1. **Update packages** (optional but recommended):

   ```bash
   sudo apt update && sudo apt upgrade
   ```

2. **Install Apache2**:

   ```bash
   sudo apt install apache2
   ```

3. **Install PHP**:

   ```bash
   sudo apt install php libapache2-mod-php
   ```

4. **Install MariaDB Server**:

   ```bash
   sudo apt install mariadb-server
   ```

5. **Copy or clone project files** to:

   ```bash
   /var/www/html/inventory
   ```

6. **Set correct permissions**:

   ```bash
   sudo chown -R www-data:www-data /var/www/html/inventory
   ```

7. **(Optional) Set correct DocumentRoot in Apache config:**

   * Open Apache configuration file:

     ```bash
     sudo nano /etc/apache2/sites-enabled/000-default.conf
     ```
   * Locate the line that starts with `DocumentRoot` and update it to the directory where this app is located:

     ```
     DocumentRoot /var/www/html/inventory
     ```
   * Add access permissions for that directory:

     ```
     <Directory /var/www/html/inventory/>
         Require all granted
     </Directory>
     ```
   * Save and exit, then restart Apache:

     ```bash
     sudo systemctl restart apache2
     ```

8. **Import the database**:

   ```bash
   sudo mysql -u root -p
   CREATE DATABASE inventory;
   USE inventory;
   SOURCE /var/www/html/inventory/src/inventory.sql;
   ```

9. **Access the system** in your browser:

   ```
   http://<raspberry-pi-ip>/inventory
   ```

---

If you encounter issues, please refer to the [Admin Guide](./AdminGuide.md) or contact your system administrator.
