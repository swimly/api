### composer安装
windows用户可下载exe安装包按顺序安装：[https://getcomposer.org/Composer-Setup.exe](https://getcomposer.org/Composer-Setup.exe),但是由于天朝那堵高墙，并非所有人都能顺利越过，给大家提供第二种方案，也就是手动配置（提示：在安装composer之前，确保已经安装了php5.5以上，并且配置好环境变量）。

通过[https://github.com/swimly/api/tree/master/composer](https://github.com/swimly/api/tree/master/composer)下载composer.phar文件和composer.bat两个文件。并且将这两个文件放在php.exe同目录
``` bash
composer

D:\phpStudy\WWW\api>composer
   ______
  / ____/___  ____ ___  ____  ____  ________  _____
 / /   / __ \/ __ `__ \/ __ \/ __ \/ ___/ _ \/ ___/
/ /___/ /_/ / / / / / / /_/ / /_/ (__  )  __/ /
\____/\____/_/ /_/ /_/ .___/\____/____/\___/_/
                    /_/
Composer version 1.5-dev (8491a21d41fdb22a892f4184861cb314f185317e) 2017-04-13 22:28:24

Usage:
  command [options] [arguments]

Options:
  -h, --help                     Display this help message
  -q, --quiet                    Do not output any message
  -V, --version                  Display this application version
      --ansi                     Force ANSI output
      --no-ansi                  Disable ANSI output
  -n, --no-interaction           Do not ask any interactive question
      --profile                  Display timing and memory usage information
      --no-plugins               Whether to disable plugins.
  -d, --working-dir=WORKING-DIR  If specified, use the given directory as working directory.
  -v|vv|vvv, --verbose           Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug

Available commands:
  about           Shows the short information about Composer.
  archive         Creates an archive of this composer package.
  browse          Opens the package's repository URL or homepage in your browser.
  clear-cache     Clears composer's internal package cache.
  clearcache      Clears composer's internal package cache.
  config          Sets config options.
  create-project  Creates new project from a package into given directory.
  depends         Shows which packages cause the given package to be installed.
  diagnose        Diagnoses the system to identify common errors.
  dump-autoload   Dumps the autoloader.
  dumpautoload    Dumps the autoloader.
  exec            Executes a vendored binary/script.
  global          Allows running commands in the global composer dir ($COMPOSER_HOME).
  help            Displays help for a command
  home            Opens the package's repository URL or homepage in your browser.
  info            Shows information about packages.
  init            Creates a basic composer.json file in current directory.
  install         Installs the project dependencies from the composer.lock file if present, or falls back on the composer.json.
  licenses        Shows information about licenses of dependencies.
  list            Lists commands
  outdated        Shows a list of installed packages that have updates available, including their latest version.
  prohibits       Shows which packages prevent the given package from being installed.
  remove          Removes a package from the require or require-dev.
  require         Adds required packages to your composer.json and installs them.
  run-script      Runs the scripts defined in composer.json.
  search          Searches for packages.
  self-update     Updates composer.phar to the latest version.
  selfupdate      Updates composer.phar to the latest version.
  show            Shows information about packages.
  status          Shows a list of locally modified packages.
  suggests        Shows package suggestions.
  update          Updates your dependencies to the latest version according to composer.json, and updates the composer.lock file.
  validate        Validates a composer.json and composer.lock.
  why             Shows which packages cause the given package to be installed.
  why-not         Shows which packages prevent the given package from being installed.
```
当你看到如上大大的composer字样即表示安装成功！
接下来我们就要越过那堵大墙！
``` bash
composer config -g repo.packagist composer https://packagist.phpcomposer.com
```
将composer的镜像改成墙内的。
### 安装laravel
``` bash
composer create-project --prefer-dist laravel/laravel blog
```
稍等片刻，便可以完成laravel的安装。
``` bash
cd blog
php artisan serve
```
打开浏览器窗口，如果能看看大大的laravel即可！


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
### api
``` php
/*用户相关操作*/
Route::get('signUp', 'UserController@signUp'); //注册
Route::get('signIn', 'UserController@signIn'); //登陆
Route::get('users', 'UserController@lists'); //获取用户表数据，每页10条数据
Route::get('user/delete/{id}', 'UserController@delete'); //删除指定id的用户
Route::get('user/edit/{id}', 'UserController@edit'); //修改指定id的用户
Route::get('user/{id}', 'UserController@info'); //获取指定id的用户信息
Route::get('user/check/{name}/{value}', 'UserController@check'); //验证name=value的数据是否存在
/*项目相关操作*/
Route::get('projects', 'ProjectController@lists');
Route::get('projects/add', 'ProjectController@add');
Route::get('projects/edit/{id}', 'ProjectController@edit');
Route::get('projects/{id}', 'ProjectController@info');
Route::get('projects/delete/{id}', 'ProjectController@delete');
```