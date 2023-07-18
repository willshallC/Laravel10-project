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
define( 'DB_NAME', 'laravelpress' );

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
define( 'AUTH_KEY',         'zUR>DV=#%ATBr{&8Xq?]jT36rfVE1*c=/eEP*lWijirUGZr  du&Abv;P`*9U/#Z' );
define( 'SECURE_AUTH_KEY',  '#eFsoIR0z^)^v6<8BVk.u5m)A>5-r7TS<<yM[.mmv~&q[Ul97f^JpLs)q+$.).n!' );
define( 'LOGGED_IN_KEY',    '=`>b1/cVM zYs]rRA,FbEB)? W0UtpLExsfy)afa{jNG{9E>K^$~*S]}Eknj.vbf' );
define( 'NONCE_KEY',        'y&GRK829Y^hi%v`a-a+`Rh*d22hqA8t7.Vr./9zaehJ $v?$uW_?&Q@F`=eCj5d-' );
define( 'AUTH_SALT',        '-*5YboEB,tWRJ@R{lP^loXPe8~u&fL!,GNK]_EW9M,Dm&d-oN$s~5u2SIi/iR[42' );
define( 'SECURE_AUTH_SALT', 'dwqGnji#6/m2G 3w^0/)r-]$X%Q)vQhGp#N[J?qVR:6jxiN@I$w-s,J Bg1YaFA]' );
define( 'LOGGED_IN_SALT',   'qvu<I6xl_Olg>$5ZbF&MNmuEK,0[lx6}(Ml8?e6z8}[&a!oidS N[[tjmP@!2H_c' );
define( 'NONCE_SALT',       '#U;d}<$-$7ZLJ<?{@)DMH:.zOhQjdK4:Kw#ELc?k*KR#z8bby}X=d0xXM|2i}})j' );

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
