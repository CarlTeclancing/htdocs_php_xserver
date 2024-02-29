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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ecom' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         ' BlTc1#>ikhZ4huC>mRZ.v9*hOJN(Yh{MGVs{A{ }J{S73gn)TD.6+H19lc(W(C1' );
define( 'SECURE_AUTH_KEY',  '7B]n<2_VN?,kwFA>p*IAN>I~=vA1yiKi#+Ra2mHrEaX%l(WkZGpS+_:K0f^nBvJ:' );
define( 'LOGGED_IN_KEY',    'g/9Ev2OPH}BjS0X&tl]xq_V~RdEHcMtIl/^[;hLk*hapK*_wA1|_H`<>{hQMEG`^' );
define( 'NONCE_KEY',        'RdD8d&TA09^t=/?z<>>rT/BKg-5:!k}0xax:%T5F4fjI(=}<4ZtwZ}8M!|E{.6m<' );
define( 'AUTH_SALT',        '4cO)x9$8,-n^qcQfK>Tp~|UOC 5Js=$v#IH4Z1?s(&@6!<`[~K,L}*+!qZ!#A`fF' );
define( 'SECURE_AUTH_SALT', 'lr$TqgyE=v32xs=EyW}7g2;[)_2bVbi)tpr;{7>4aFjjbC~A}5,>X26x4_qg@WhE' );
define( 'LOGGED_IN_SALT',   'M$J)&O}=^{et]KM`1w,eNRQ^D%.Ltryfw?&]+>46g#G#+f]$:<dfz}ME+.ixvu/)' );
define( 'NONCE_SALT',       'Ms?*)SXOFkc_2j?!bc>ZG w;eo7PCFBBNj59q%,fM]mod4`~xoItwsvBg6F(Mb2q' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
