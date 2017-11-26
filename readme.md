# Human Resource Management;

## Requirements
- PHP >= 7.0.0 (kiểm tra bằng câu lệnh `php --version`)
- MySQL (có thể cài cả PHP và MySQL bằng Xampp/LAMP)
- Composer (chạy được câu lệnh `composer`)
- Git

## Installation

TIPS: Cài đặt hirak/prestissimo để tiến hành setup project nhanh hơn:
```
composer global require hirak/prestissimo
```
### Setup
Clone project về bất kì đâu
```
git clone https://github.com/tranghaviet/human-resource-management.git;
cd human-resource-management;
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
```
cp .env.example .env
```
Sửa config trong file .env
```
DB_DATABASE=human_resource_management
DB_USERNAME=root
DB_PASSWORD=
```
Tạo key cho app
```
php artisan key:generate
```
Tạo database `human_resource_management` trong mysql với collation là `utf8_unicode_ci`

Sinh ra database và data:
```
php artisan migrate:refresh --seed
```
Khởi động app:
```
php artisan serve
```
