<?php
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
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/home/workforc/public_html/blog/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'workforc_wblog');

/** MySQL database username */
define('DB_USER', 'workforc_blogu');

/** MySQL database password */
define('DB_PASSWORD', 'workforc_bloguser');

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
define('AUTH_KEY',         '/`i7HNNl3-=MrO(K:t}E^2N/]oN+T->O8~rlto}Dl|KxQ[04j RvtW {@!=|A_BK');
define('SECURE_AUTH_KEY',  'Wq[>|v~;~u5^y.@nLxxYC?J/bT-4]S$#N!ruzY|nO!y.9&gvH#t`JW|`@Cg+hO!)');
define('LOGGED_IN_KEY',    ')@-hQS9YiWL4Yv$V+/]NYrtE9QQM1ANP(](0`a!F* 7+A[5:lj=P%4_&}AHTKK;H');
define('NONCE_KEY',        '#=YV|80StB0}}2lm51[>LY}tx%vnII.a+Z[;MWN4?07!N&UfRMyad_>T{#~kHDrW');
define('AUTH_SALT',        ' xd[euXH}-KRDOU+:-fMNwM<[iGaaC8oJ>$<q*dCE;9rMPc>eHY&vCNi`|ok/|fx');
define('SECURE_AUTH_SALT', '29gRspJ)XhT6$|I$nm?+c|GM7a:zy%Kj7A&6|Yw>)[.AoWo[EpnT{Y x#0mXfIVS');
define('LOGGED_IN_SALT',   'impc%+FL9B[W+jtLxd-mYes|!EwPzQnCoA5;>%zV7_wU%zJ`~IM]UP;BSk6BP`Q/');
define('NONCE_SALT',       '#(L|dd7im>Bl?vKnff!^g-3|Lw _/%A-5]q.93l+]VC|OXzpR<ioI|V?|oki26y`');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wf_';

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
