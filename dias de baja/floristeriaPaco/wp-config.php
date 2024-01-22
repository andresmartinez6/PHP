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
define( 'DB_NAME', 'paco' );

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
define( 'AUTH_KEY',         'G_Y/{?*+/8H,A09wl+Ut@a>I `W/LC_cr9rr&@.TkyRH48{{ua|(Lu|AFCu|O$.[' );
define( 'SECURE_AUTH_KEY',  '-}Fkv$$Z:{`U[X(F?OkQ4#T^L.?)u316C}gO|)+uGg,s]G!M/pq4WXXA0&mGr!x[' );
define( 'LOGGED_IN_KEY',    'ht?u`K@k1N!#dki`7|87H49Pk~/#U D,w=: dX$HfFes7RN3<$xNawl$?_$GVypC' );
define( 'NONCE_KEY',        '`V?_Cap0/)]tc9m{!g(XJg? lYGb-rQ[,HDgcTBKD)vwn)ED4%L.#H>+6;f.|s?x' );
define( 'AUTH_SALT',        'e!25Rl: C&LZ|Q0IUJ.4>f0D0(qhzW%L$UWM=o_9eTz<1b3Xut,>VDY,r$d+K(ZB' );
define( 'SECURE_AUTH_SALT', ':N<TF_KQKDGn}v}>_0BJwerEoy(?:VVNPi&|UWr6~F!#6k[#xQ!Ec[yMlA*`+ELh' );
define( 'LOGGED_IN_SALT',   'LBkEn6dyQ^Leh.$XlOO<I5{g5):#-)m(QR AEE*ST-WsAy>FV>n>o])pB Z!f1Hp' );
define( 'NONCE_SALT',       'g!-f>S}I8Q_W)`8l0/F`W`:sqLf!{8cb$D}=%@!:rOTvlG(O1Zs+|pA]}X@Ch[8_' );

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
