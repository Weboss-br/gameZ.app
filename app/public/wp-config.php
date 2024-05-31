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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',          '3c@x-Y1VaXdDypNv(b@+;G@gC[|J7pM2Nyj=Mt{=!=|^dqya$Qr>eNU>`XDyqfO*' );
define( 'SECURE_AUTH_KEY',   'Gd>v0#X])=c{(Rb{` ]0@nAdH7G,b:8j(oBN&Np@WT>b y0xz4*Q~nbFpex+O0+W' );
define( 'LOGGED_IN_KEY',     'N6MT$22=Wi|M|/TpL1pT`0dVw.Z87yS){Ux{E8?|VLj%|a;?xv87;zc< FJWeb9{' );
define( 'NONCE_KEY',         ']YyFNGHnPZ.m;r1iE&e/uxB,k5*Wou,:pr*[nq(xYsQ5h>teNcI[xq(+an9,|#p7' );
define( 'AUTH_SALT',         '@h%0>v_X|v#wn^odp_t{l0>5T%Y-rf0JtiYjv,{xla3RPW3)wN8{rc;NclL-D/fz' );
define( 'SECURE_AUTH_SALT',  'tbLNP.jQ,Ya3C/KwKr @.I.lX{b&-hX_Q$/X(tux to+I8?QR:-|nyAfjSd26WIM' );
define( 'LOGGED_IN_SALT',    '$xR{AnyGjqzIIoi4H{qO?*q]AHAB-[$#@rqciD.w{<@AS074^<kOLARK_`m|B9|B' );
define( 'NONCE_SALT',        'Cgu5N9<!JN|ha!`h%MrGINLL!7V$4L&h*])_ybgQ*.bd+Q)Sun=9$`14A>3<1-dp' );
define( 'WP_CACHE_KEY_SALT', 'B_wRZg!=}2=CvuUh.k*}$~B7ap>/gUJf1%zC3qLj1@.(p}n{BZX{^..XpD Cf*Wd' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
