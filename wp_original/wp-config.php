<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'workforc_db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'EZAlB60Lu7Cap3zcxz5H4WmKCP4Aa2Jo4wFqWItpANdxF4eCLLGvPFs6X6T3JqTZ');
define('SECURE_AUTH_KEY',  'QaNi5xc4h4c3igDKK8D6SwtKPlj1AoQyJZUqPxO1kkguCXX0LHVcVsSCbqeLdUNo');
define('LOGGED_IN_KEY',    'Vz4mH2BY3zya3bUDib5pUhDs7RuSz0YseK5DYwtIfiSrGn0v4SggZqRauItF214u');
define('NONCE_KEY',        'NHab96AxxqXciY52A6D5x3JicI0WbQBMSnyHAeDK3AsxG9uHLcvUSK097stk7r17');
define('AUTH_SALT',        'KpnTIg9TWvQWhseKQ3AutVUtT11zkd2FmAIQMkoYcrQVJtZtvpmRbDSSd3vpvFP2');
define('SECURE_AUTH_SALT', '6roeU7cEz2xqeYmrLBKJ50YX1c0OcmtlyiwAGUv3CI5B0vRaYmpY5l2v43n6hLp7');
define('LOGGED_IN_SALT',   'IdYHeLA3tadE5ZRZQlCL8WW4dmUqbA98aHKhGwU4imaROusQFCzGqWsQVutGVARh');
define('NONCE_SALT',       'of6inZrYHmVADGj17huwoApMbdjuqBAq47MVcjkgoiWE5Qb5UZ9pxYwYRvh6c9ua');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
