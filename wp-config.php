<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'ruou_db');

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
define('AUTH_KEY',         'pa.+1QH9&yG+$xE(0uk2r*5xI?*McR`cD%@qEfFrTZ9%GgB7S,7MdT*G[+L12Fdl');
define('SECURE_AUTH_KEY',  'MG)!q/ ,C|sj2Nl)l^SK[AMr`eRw^iXFT}q:kX.;G1awZD/$b{<fONH%AV^A(u%b');
define('LOGGED_IN_KEY',    '0o?7op$8v o8N|,1Mw-7{nCq t^5W8Xemq:^pE D!N)p*?M4Bz!^{>t1UC~e]RHT');
define('NONCE_KEY',        'yP&sgRWJIJ{Q-[:@Z|[ahP|y*ZV><9bgsz+o2$GaNx0tCHqdkw{frO*Tyt,h-F|J');
define('AUTH_SALT',        'DAT2d?2H Xm0BK+=}f-PF9._X?gRC}51?[2,UcE#1:g5OHjDNLKVP~#c)B}?!$bm');
define('SECURE_AUTH_SALT', '#6#%Xa#.A?9gJUa5h.NK)ts/!73|A/db.><#Sfz+.22O,@n~8j1j*s*d&j/WflQ*');
define('LOGGED_IN_SALT',   '~4Y9MPCwOu^V67ERG2w}?*{!<M7UXcYWd&Ri-Fvh]J8#D?B inU5Is;KB8?xGwk(');
define('NONCE_SALT',       '%Y?6]+.@)M_pA3JLD1qZ:T1m11|>#a)~+26pN6>4fb%)>sMMB47bk6W,TW-7!n{8');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
