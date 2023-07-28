mkdir database/migrations
composer update
cp modules/Auth/src/Http/Controllers/AuthRouteMethods.php vendor/laravel/ui/src
cp .env_host .env
curl -H'Authorization: cpanel nhathhmd:U6I9SPUH8E94ONFITAKETDYAOXSAYAED' 'https://gator3199.hostgator.com:2083/execute/LangPHP/php_set_vhost_versions?version=ea-php74&vhost=laravel.tungocvan.com'
echo "hoàn thành cài đặt"
echo "Lưu ý setup database và cài đặt table user"
echo "php artisan migrate:fresh"
echo "Quá trình cài đặt nếu xảy ra lỗi vui lòng chạy lại:"
echo "composer update"