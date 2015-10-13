<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'karthi@123');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('FS_METHOD', 'direct');
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'gOJD]Z(xf2Hx+&V{V-8~vtfG[*rj7.,Q!g WK=T7f{%_.&TE5`E~vVpV,)r<}h,7');
define('SECURE_AUTH_KEY',  ':dLN8MHew|;SDmJq0,k,3;CR(ZXoms}1~OnHI >%}Y>nmIC+iyS-|n-+CXZ.|jXj');
define('LOGGED_IN_KEY',    '}my$I0dWTY9*+|6i@OYWZ_ YGKJU(7CT!,a52dSz-!1hn-NwO2k@+45+9{``_M3h');
define('NONCE_KEY',        'MPa,[:w[k3CcBvVF6x+:pJ5aJbh6)k#(*CYv+P4M*?rT;(o8M@>uHDxZ4RS]>4z{');
define('AUTH_SALT',        'Xa)Y|,O^[,?YbAtDlkFAY5-8o%I@(my!-BbtT}<OvW0;y~AYo>+qpg!hv).c!MNM');
define('SECURE_AUTH_SALT', 'ODv/VA<pm_|#tzhomDkEx-yIh 52+t;9pk;i-vs|s|a-[[H-2)(LI>S-QLsR^pH?');
define('LOGGED_IN_SALT',   '}I(]Edj!G+q_>8jo|bN`-$xK)`VWc|u$:mt:71pJ>hG{i3sqiA[GMq&a)gL{L9VH');
define('NONCE_SALT',       '&+C,LW^kH{eMb#9lQQm{[HzW$tm.j$9:5L+@p-V%pS9qD#_p;>6+j%/STbmY`,r*');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

