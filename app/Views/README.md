# 🚗 Car Rental System

A simple car rental management system with two user roles: **Client** and **Admin**.

---

## 🧑‍💼 User Roles and Flow

### 👤 Client Flow

1. **Select Role**
   - On the main page, choose **"Client"**.

2. **Login**
   - Enter your login credentials.

3. **Home Page**
   - After login, the user is redirected to the **Home Page**.

4. **Navigation Bar Includes:**
   - **Home** – Main page after login.
   - **About** – Information about our company.
   - **Services** – Displays available rental services and car options.
   - **Profile** – Shows user's personal information and rental history.

---

### 🛠️ Admin Flow

1. **Select Role**
   - On the main page, choose **"Admin Dashboard"**.

2. **Login**
   - Enter your admin credentials.

3. **Admin Landing Page**
   - Redirected to the **Admin Dashboard** after successful login.

4. **Admin Capabilities:**
   - **Add Cars** – Add new cars to the rental inventory.
   - **Edit Cars** – Update existing car details.
   - **Delete Cars** – Remove cars from the system.

---

## 📌 Notes

- Only authenticated users can access their respective dashboards.
- Admin and Client interfaces are role-based for security and organization.
- Designed for simplicity and ease of use.

---

## 📁 Project Structure (optional)

```bash
/your-project-folder
│
├── client/
│   ├── home.php
│   ├── about.php
│   ├── services.php
│   └── profile.php
│
├── admin/
│   ├── dashboard.php
│   ├── add_car.php
│   ├── edit_car.php
│   └── delete_car.php
│
├── login.php
├── index.php  # role selection page
└── README.md


============================================================
                     PROJECT INFORMATION
============================================================

Project Name: [CAR-RENTAL-SYSTEM (CARVIBE)]
Developed By: Dave Ancheta
Year: 2025

============================================================
                      COPYRIGHT NOTICE
============================================================

© 2025 Dave Ancheta and Team. All rights reserved.

This project and all its contents are the intellectual property 
of Dave Ancheta and his collaborators. Unauthorized copying, 
distribution, or modification of any part of this project 
is strictly prohibited without prior written permission.

For inquiries or collaborations, contact: [daveancheta8@gmail.com]

============================================================

## 🚀 Deployment Summary

### A. Hosting Platform (if live)

The **Car Rental Management System** was deployed and tested locally using **XAMPP**, a cross-platform web server package that includes Apache and MySQL. This setup allowed the system—built with **CodeIgniter**—to run in a stable and controlled development environment.

---

### B. Configuration Steps Taken

#### 🔧 XAMPP Installation
- Installed **XAMPP** on a Windows machine.
- Started **Apache** and **MySQL** services via the **XAMPP Control Panel**.

#### 📁 Project Setup
- Placed the project folder `Car-Rental-System-Enhanced` inside the `htdocs` directory of XAMPP.
- Configured the base URL in `application/config/config.php` to:


#### 🗃️ Database Configuration
- Created a new database using **phpMyAdmin**.
- Imported the SQL dump file containing the database schema and sample data.
- Updated the database settings in `application/config/database.php` with local credentials.

#### 🔗 API and Routing Setup
- Verified **RESTful API endpoints** using **Postman**.
- Configured `.htaccess` for clean URLs.
- Enabled `mod_rewrite` in Apache.

#### ✅ Testing and Validation
- Tested:
- Role-based access (Admin, User, etc.)
- Login/Logout functionality
- API requests on `localhost`
- Performed **file upload stress tests** to confirm system stability.

---

### C. Challenges in Deployment

#### 🧩 Composer Not Recognized
- **Issue**: `composer install` was not recognized in the terminal.
- **Resolution**: Added PHP and Composer to the system's environment variables.

#### 🌐 .htaccess Configuration
- **Issue**: Encountered 404 errors due to improper URL routing.
- **Resolution**: Enabled `mod_rewrite` in Apache and verified `.htaccess` configuration.

#### 📦 File Size Limits
- **Issue**: Uploading large files failed.
- **Resolution**: Increased `upload_max_filesize` and `post_max_size` in `php.ini`.

---

### D. Access Link or Demo

- ⚙️ The system is currently hosted **locally** and not deployed on a public server.
- 📂 GitHub Repository: [Car-Rental-System-Enhanced](https://github.com/daveancheta/Car-Rental-System-Enhanced)

## 🔐 Default Login Credentials

Use the following credentials to log in and test the system:

### 🛠️ Admin Account
- **Username:** `admin`
- **Password:** `admin123`

### 👤 Regular User Account
- **Email:** `daveancheta@gmail.com`
- **Password:** `daveancheta123%`
