# Locals One Tour Guide Booking System

## General Info
A tour guide booking web-based application with PHP CodeIgniter 3 Framework mainly for three users - staff, tour guides and tourist.

## Features 
**1. For Staff**
- CRUD of staff
- CRUD of tour type
- CRUD of tour guide
- Checking tour
- Generating report

**2. For Tour Guide**
- Managing profile
- CRUD of tour
- Managing tour guide request
- Writing blog

**3. For Tourist / Traveller**
- Managing user account
- Booking tour / tour guide
- Rating tour guide
- Reacting blog

## Setup
- Create a database and import '_localtourguidebooking_db.sql_'
- Open the database configuration file located at '_application/config/database.php_' & change database info
```
$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => '',
	'database' => 'localtourguidebooking_db',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
```
- Open the configuration file located at '_application/config/config.php_' & change the _base_url_
```
$config['base_url'] = 'http://localhost/yourprojectdir/';
```

## Accessing the System
If you are going to test the system with the existing database '_localtourguidebooking_db.sql_', user passwords are as follows.
```
Admin      – admin@gmail.com | 1234Admin
Tour guide – guide@gmail.com | 1234Guide
User       – user@gmail.com | 1234User
```
