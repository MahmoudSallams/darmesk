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
define('DB_NAME', 'darmesk');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'X? f_8Wlkb<Mb]hAup:!K+cZem>x8];tYR%C 1B?6bgu-u3QI4t[j.3a(RDxdE9`');
define('SECURE_AUTH_KEY',  'dy;)M)`_%vvhrA#v]pU5U+I.+f-^oo1x_,?aKnOtnxTIb#t9$QW!Xt7x@>c=x^@6');
define('LOGGED_IN_KEY',    '*MIq U:qPcOX??A>h3~euBo /@f0&E79| *:~F<hYCeA>y=-`>D1Laf-a#up%TLK');
define('NONCE_KEY',        'r13zAyM%MWU!>,diSH*7&NRvhrqs`^v8T]+Gqz_Vb8h4-}}]VE$wc8ZZ>7Fr@Yr>');
define('AUTH_SALT',        'LM[pDOwUI?Jw,Z|k,zY;2n0Hs~+yeOR75d(gjZjOrX|O{U45 Rm[X]&;bckfTmLQ');
define('SECURE_AUTH_SALT', ')^%a4~tkNz][WjTgQ)xD0bf&SZ46vSyrFMM2^]}fe1||8Vo&Y#.zZFc-E>Ze/3Zq');
define('LOGGED_IN_SALT',   'fe?!=;Mt&ls-5{/CT< eK[b~tlBb>/E?K72nA[Z<UwV)Dx*ymDen|Wf?W@*De;>2');
define('NONCE_SALT',       ':i2DG*+ts}oIg5G4_%npNHv&E?6YN*| {jj/z?gL`>^g+,H74}gP*j3&b)8s^h:#');

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
define('FS_METHOD', 'direct');


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
