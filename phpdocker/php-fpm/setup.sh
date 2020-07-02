composer install
cp -n .env.example .env
php artisan key:generate
until php artisan migrate;
do echo "Retrying to migrate database";
sleep 2;
done
echo "Migration process done!"
