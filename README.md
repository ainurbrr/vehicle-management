
# Vehicle Management

Aplikasi ini berbasis website menggunakan bahasa pemrograman php
dengan framework laravel aplikasi ini terdapat beberapa fungsionalitas sebagai berikut:
1. Terdapat 2 user (admin dan pihak yang menyetujui)
2. Admin dapat menginputkan pemesanan kendaraan dan menentukan driver serta pihak yang menyetujui pemesanan
3. Persetujuan dilakukan berjenjang 2 level untuk approver 1 lalu ke approver 2
4. Pihak yang menyetujui dapat melakukan persetujuan melalui aplikasi
5. Terdapat dashboard yang menampilkan grafik pemakaian kendaraan
6. Terdapat laporan periodik pemesanan kendaraan yang dapat di export (Excel)
## Authors

- [Moh. Ainur Bahtiar Rohman](https://github.com/ainurbrr)


## Requirements
PHP

```bash
  php >= 8.3.7
```
MYSQL
```bash
  mysql >= 8.2.12
  ```
Framework Laravel
```bash
  laravel >= 11.*
  ```
## Installation
```bash
  php artisan key:generate
  ```
```bash
 php artisan migrate
  ```

```bash
 php artisan db:seed UserSeeder
  ```

```bash
 php artisan db:seed
  ```
Run Project
```bash
php artisan serve
  ```

Go to http://localhost:8000/
## Usage/Examples
Username and Password

username : superadmin\
pw : superadminpw

username : admin\
pw : adminpw

username : approver1\
pw : approver1pw

username : approver2\
pw : approver2pw


