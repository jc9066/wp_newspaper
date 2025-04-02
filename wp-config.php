<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'viralnumerologypower' );

/** Database username */
define( 'DB_USER', 'janice' );

/** Database password */
define( 'DB_PASSWORD', 'janicec8' );

/** Database hostname */
define( 'DB_HOST', '188.166.252.184' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'Fr^a^A8h$|K.;:/a}|&G#25_F@XtInnpTfmT4r &KGG7b+`[zCq:&![A=mmwxS~Q' );
define( 'SECURE_AUTH_KEY',  'XEmYbW.(KF_m&#6uPG;#;Te;-fOTQI!sGy3Ur z[ur&x?rCt!7Kz_bSv~-B;?pDu' );
define( 'LOGGED_IN_KEY',    'wR~2d~k5g2`N3jzD&X(lei<Su`m*.t%I)AjRK=<Wi_3Ij*3J|@cepuZ9$H0k|jJc' );
define( 'NONCE_KEY',        'h>[,=]>0n^>@^Gg}GPMBkDp7j|rPkh(b/[w|q`X8(`[5oJvAQ~Mn*f]T[S~,o# E' );
define( 'AUTH_SALT',        'G~E}64fWyKwXr>+x.MzI]eDNg8u1aigV?{kKJ@M0iZaVTC3 !7b[i0oR9`F[G[XI' );
define( 'SECURE_AUTH_SALT', '2z9}evot{EzE$:Ob%{Gl@5HI9E^(TUyh8F67qYyf0^-l*rb,q_|&9)Wx?7M<0C-)' );
define( 'LOGGED_IN_SALT',   'w^Q0:*p]_;5}EyGX>;V.I/L={2j.pWwS-< *U}`(]sj7g8Us~c9k89)BSvi`L7sl' );
define( 'NONCE_SALT',       'M|DN&h?([4H|8;JK:>oC88)w%DO4<[+MIdt;&l-cMYFtA>{~tPyQ<UUIi(uAQ#d`' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'alpha_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );
define('WP_DEBUG_DISPLAY', false);
@ini_set('display_errors', 0);
define('FS_METHOD', 'direct');
error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);



/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
