HELLO THERE WELCOME TO FORMULA 1 CAR RENTAL !!!!

Web Application Link: https://formula1carrental.onrender.com/

Formula 1 Car Rental System

Overview:
Formula 1 Car Rental is a web-based car rental system built with CodeIgniter 3. It supports CRUD operations, RESTful API integration, and role-based access. Designed for efficiency and security, it allows Super Admins to manage Admin accounts and Admins to handle cars, customers, and rental transactions. The system is deployed via Render with source code hosted on GitHub.

Features:
Role-Based Access: Super Admin and Admin roles with specific permissions
RESTful API: GET /api/cars – Fetch all cars & DELETE /api/cars/{id} – Delete car by ID
Login & Registration: Restricted Admin registration by Super Admin
File Upload: Admin profile pictures with validation (JPG, JPEG, PNG up to 1MB)
Bootstrap UI: Responsive and user-friendly interface

Security Measures
CSRF Protection: Enabled for form submissions
Input Validation & Sanitization: All forms validated and sanitized
Password Hashing: Secure password storage using password_hash()
Session-Based Authentication: Sessions track user access securely
Upload Security: File type/size checks and safe directory handling

Test Accounts
Super Admin
Username: superadmin
Password: password123456

Admin
Username: admin
Password: password123

Repository
GitHub: formula1carrental


Instructions 
FOR LOCALHOSTING
**Database Name: rental_mobile**
**Recommended PHP Version 5.6.3 and 7.4.12**
After Setup, go to URL: "http://localhost/Formula1_CarRental"
Remember: Do not change the project's folder name without updating the $config['base_url']

LogIn
![image](https://github.com/user-attachments/assets/4294f698-a696-46a7-89ce-6fbb51d9b183)

Admin

![image](https://github.com/user-attachments/assets/65036ccd-1db8-446b-bbe8-3236a3b93db6)

Super Admin
![image](https://github.com/user-attachments/assets/acf3722c-3437-4e2b-a947-a34fa97248da)



