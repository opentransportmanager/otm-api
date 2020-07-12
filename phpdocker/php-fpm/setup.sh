composer install &&
cp -n .env.example .env
php artisan key:generate
until php artisan migrate:fresh --seed;
do echo "Retrying to migrate database";
sleep 2;
done
echo "Migration process done!" &&
crontab -r &&
(crontab -l 2>/dev/null; echo "* * * * * cd /application && php artisan schedule:run >> /dev/null 2>&1") | crontab - &&
service cron restart &&
tail -f /dev/null
