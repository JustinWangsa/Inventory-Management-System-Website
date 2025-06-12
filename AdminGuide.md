# Admin Guide

Welcome to the **Tkuisa inventory management Admin Guide**. This guide is intended for administrators who manage and maintain the system, hosted on a **Raspberry Pi** server.

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

## Deployment 
The inventory system is deployed and hosted on a Raspberry Pi device using Apache, PHP, and MariaDB.

### Requirements

* Raspberry Pi 
* Apache2 + PHP
* MariaDB server

For detailed setup instructions — including software installation, file placement, and database import — please refer to the [installation.md](./installation.md) file.

## Admin Operations

* **Add Item:** Use `add.php` to add a new inventory item.
* **Edit Item:** Use `edit.php` to update details.
* **Delete Item:** Use `delete.php` to remove entries.
* **Update Item:** `update.php` processes the edit form.

---

## Security Tips

* Change default MariaDB password.
* Regularly backup your database.
