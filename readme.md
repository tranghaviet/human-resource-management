# Laravel 5.5 Boilerplate

## Installation

### Requirements
- PHP >= 7.0.0 (kiểm tra bằng câu lệnh `php --version`)
- MySQL (có thể cài cả PHP và MySQL bằng Xampp/LAMP)
- Composer (chạy được câu lệnh `composer`)
- Git

TIPS: Cài đặt hirak/prestissimo để tiến hành setup project nhanh hơn:
```
composer global require hirak/prestissimo
```
### Setup
Clone project về bất kì đâu
```
git clone https://github.com/tranghaviet/laravel-boilerplate.git;
cd laravel-boilerplate;
```
Chuyển sanh nhánh dev
```
git checkout dev
```
Cài đặt các Packages:
```
composer install
hoặc
composer update
```
Copy file .env.example thành .env
sửa config trong file .env
```
DB_DATABASE=database_name
DB_USERNAME=root
DB_PASSWORD=
```
Tạo key cho app
```
php artisan key:generate
```
Khởi động app:
```
php artisan serve
```
