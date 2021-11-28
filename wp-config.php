<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp-elabs' );

/** MySQL database username */
define( 'DB_USER', 'elabs' );

/** MySQL database password */
define( 'DB_PASSWORD', 'cowabunga' );

/** MySQL hostname */
define( 'DB_HOST', 'database' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'G}v{FHC[cHFwLEu[FJ]rEda<gmKPRz2-wHz!sG|^[^/V6V&NMG&m56t_Gpq[V_n@');
define('SECURE_AUTH_KEY',  '+Sj%OTVR~zTD,5JSVMM/ZBJ~E3!L%24p5]K`8Ghqkq5:K`-!}&5I*<#bzk}kOGmb');
define('LOGGED_IN_KEY',    'o&XKW`_3~@t[Y,]#1o.C P% yx[f.5agx*; $^-aq&<1#T$|O6#2vtRVU#I2~ylk');
define('NONCE_KEY',        'oi>15+dCpkZ).wwUn,yU~/xH+ToW`lIV<GV+^c}:bw(mJ|+D!f!k%O$H}r=*h{7p');
define('AUTH_SALT',        'R+K;H2wx||KKM?3D4F^`+Ab0H9Z?7(+eNSPBOHw^=-#me b;D7X]2L]vE(2}y >O');
define('SECURE_AUTH_SALT', '(VxSGw$&dd|%sZYG5=Ba2+U&`[RW9+>vfMqu<`}C8&_,bI :DuiPizM^Gzy>^VDe');
define('LOGGED_IN_SALT',   'P+e]wvczZaf-y~GE-:_mhOZr{P>=vM}xcN#`nr(mg M$;VFK;-prj!v3Wsq+K.fP');
define('NONCE_SALT',       '1wtaq-cQT+~,OAFq4+}J`@y9c=%IeR$d|zS}|LF^%J(,s`%v<cRh ,?|aW+jVvw;');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'lbs_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';