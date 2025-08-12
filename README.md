# Local Installation Guide

## 1. Clone or Download the Project
Option 1 (Git):
```bash
git clone https://github.com/yourusername/yourproject.git
cd yourproject
```



## 2. Install PHP Dependencies
```bash
composer install
```

## 3. Setup Database in phpMyAdmin
1. Open **phpMyAdmin** in your browser.  
2. Create a new database (example: `urlshortner_db`).  
3. Click **Import** in phpMyAdmin.  
4. Select the provided `urlshortner.sql` file and click **Go** to import.

## 4. Update .env with Database Credentials
Edit the `.env` file and update the database settings:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=urlshortner_db
DB_USERNAME=root
DB_PASSWORD=
```

## 5. Configure SMTP (Required for Invitation System)
**Important:** Without proper SMTP settings, the invitation emails will not work.  

Update the `.env` file with your SMTP details:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.your-email-provider.com
MAIL_PORT=587
MAIL_USERNAME=your-email@example.com
MAIL_PASSWORD=your-email-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@example.com
MAIL_FROM_NAME="${APP_NAME}"
```

## 6. Generate Application Key
Run the following command in your project root directory:

```bash
php artisan key:generate
```

## 7. Serve the Application
Run the Laravel development server:

```bash
php artisan serve
```

---

## License

This project is licensed under the **Creative Commons Attribution-NonCommercial 4.0 International License (CC BY-NC 4.0)**.  
You may use, modify, and share the code for personal and educational purposes, but **commercial use is strictly prohibited**.  

[License](LICENSE)
