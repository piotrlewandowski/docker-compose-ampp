# AMPP stack built with Docker Compose

This is a multi-container Docker AMPP stack environment build using Docker Compose. It contains:

- [x] Apache 2.4
- [x] MySQL 5.7
- [x] PHP 7.3
- [x] phpMyAdmin

## Installation

1. Clone this repository `git clone git@github.com:piotrlewandowski/docker-compose-ampp.git`
2. Install PHP dependencies (not required, but needed to run demo PHP code) `composer install -o`
3. Build docker containers `docker-compose build`
4. Start the containers in detached mode `docker-compose up -d`
5. To stop containers run `docker-compose down` 

## Configuration

This repository comes with default configuration options. You can change them by creating `.env` file in the root directory.
To make it easier, just copy the content from `sample.env` file and update the environment variable values as per your need.

### Configuration variables

There are following configuration variables available and you can customize them by overwriting in your own `.env` file. 

_**DOCUMENT_ROOT**_

This is a document root for Apache server. The default value is set to `./public`. Your `index.php` file will go here.
Your main PHP should be kept in `src` directory.

_**VHOSTS_DIR**_

This is for virtual hosts. You can place Apache's virtual hosts configuration file here.

_**APACHE_LOG_DIR**_

This will be used to store Apache logs.

_**MYSQL_DATA_DIR**__

This is MySQL data directory. All your MySQL data files will be stored here.

## Web Server

By default apache is configured to run on port `80`, so You can access it via `http://localhost/`.

To get information about PHP's configuration go to:
`http://localhost/phpinfo.php`

To see status of database connection go to:
`http://localhost/test_db.php`

## MySQL

Any `.sql` file stored in `.docker/mysql` folder will by automatically import into MySQL database during build process.

## PHP

Default version of PHP installed is 7.3

## phpMyAdmin

phpMyAdmin is configured to run on port 8080, so to access it, go to `http://localhost:8080/`.

Use following credentials to log in:
username: `root`
password: `docker`
