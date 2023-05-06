# Ecommerce Webapp
Sample ecommerce webapp clothing store.

## To Run
Install xampp for linux.

### Add webapp files to xampp
Move default `htdocs` dir: `sudo mv /opt/lampp/htdocs /opt/lampp/oldhtdocs`
Move all webapp files to xampps `htdocs`(must be in ecommerce_webapp dir for this cmd): `sudo mkdir /opt/lampp/htdocs && sudo cp -r * /opt/lampp/htdocs`
Xampp seems to require 777 perms on all htdocs files or all pages return 403 forbidden: `sudo chmod -R 777 /opt/lampp/htdocs`

Start xampp: `sudo /opt/lampp/xampp start`

Webapp should be running at `http://localhost:80`, but it won't work properly until database setup

### Create Database in Phpmyadmin
database.php expects a database named "ecommerce" to be created in Phpmyadmin for it to connect to. Go to `localhost/phpmyadmin`

Create a DB named "ecommerce" and then execute the SQL from each table in dir `database_tables` in the repo. Then run the sql for `default_products.sql` to populate products table.

### Debugging
For example in `login/login.php` or `header.php` or both, comment out lines disabling error displaying and replace them with:

```
ini_set('display_errors', true);
error_reporting(E_ALL ^ E_NOTICE);
```
