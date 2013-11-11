## eots

### dependencies

#### install php5

```bash
sudo apt-get install php5-sqlite php-pear php-db php5-cli php5
```
#### install composer

```bash
cd ~
mkdir bin
cd bin
curl -sS https://getcomposer.org/installer | php
```
Add $HOME/bin to $PATH

```bash
cd protected
composer.phar install -vvv
```

### init database

```bash
cd protected
sqlite3 ./db/eots.db < ./db/schema.sqlite.sql
yiic migrate
```

### start server

```bash
php -S localhost:3000
```


