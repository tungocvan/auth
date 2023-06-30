git clone git@github.com:tungocvan/app-laravel.git

- cài đặt trên host thì chạy file: setup_host.sh
- cài đặt trên wsl local thì chạy file: setup_local.sh

xem lại cấu hình env -> cấu hình database -> 
- Tên database
- User databse
- Mật khẩu database

-> php artisan migrate:fresh 
Tạo các bảng authencation vào database

-> để tạo 1 module : php artisan make:module ten_module