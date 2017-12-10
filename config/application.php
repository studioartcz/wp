<?php

/**
 * error tracking
 */
define( 'WP_SENTRY_DSN', '' );
define( 'WP_SENTRY_PUBLIC_DSN', '' );


/** @var string Directory containing all of the site's files */
$root_dir = dirname(__DIR__);

/** @var string Document Root */
$webroot_dir = $root_dir . '/public';

/**
 * Custom Content Directory
 */
define('CONTENT_DIR', '/app');
define('WP_CONTENT_DIR', $webroot_dir . CONTENT_DIR);
define('WP_CONTENT_URL', WP_HOME . CONTENT_DIR);

/** WordPress view bootstrapper */
define( 'WP_USE_THEMES', true );

/**
 * Custom Settings
 */
define('AUTOMATIC_UPDATER_DISABLED', true);
//define('DISABLE_WP_CRON', env('DISABLE_WP_CRON') ?: false);
define('DISALLOW_FILE_EDIT', true);



/**
 * Bootstrap WordPress
 */
if (!defined('ABSPATH')) {
    define('ABSPATH', $webroot_dir . '/wp/');
}