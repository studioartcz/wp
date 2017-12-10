<?php

// ** MySQL settings ** //
/** The name of the database for WordPress */
define('DB_NAME', '');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');


$table_prefix = 'wp_';


/**
 * Set up our global environment constant and load its config first
 * Default: development
 */
define('WP_ENV', 'development');

/**
 * URLs
 */
define('WP_HOME', 'http://wordpress.local:8888');
define('WP_SITEURL', WP_HOME . '/wp');
define('WP_DEBUG', true);