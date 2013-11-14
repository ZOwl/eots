## EOTS

### Dependencies

#### Install PHP5

```bash
sudo apt-get install php5-sqlite php-pear php-db php5-cli php5
```

#### Install php dependencies

```bash
composer.phar install -vvv
```

### Init database

```bash
protected/yiic migrate
```

### Start server

```bash
php -S localhost:3000
```

