当出现如下错误：
``` bash
SQLSTATE[HY000] [1045] Access denied for user 'homestead'@'localhost' (using password: YES) 
```
解决办法：
``` bash
php artisan cache:clear
php artisan config:clear
php artisan serve
```