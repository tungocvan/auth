mkdir database/migrations
composer update
cp modules/Auth/src/Http/Controllers/AuthRouteMethods.php vendor/laravel/ui/src
cp .env_local .env
echo "hoàn thành cài đặt"
echo "Lưu ý setup database và cài đặt table user"
echo "php artisan migrate:fresh"
echo "Quá trình cài đặt nếu xảy ra lỗi vui lòng chạy lại:"
echo "composer update"