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
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/Applications/MAMP/htdocs/Dark_Club_Gay/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'dark_club_gay');

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
define('AUTH_KEY',         'N!W-:e9a7gm&t>QKOP?i<JRQGf|ub_g)O1DMn%tlb[R[g8;lQ+gZ(zW?8|;9,?Am');
define('SECURE_AUTH_KEY',  'iP BLDMxATI%{m-X[Y;f;jP=!jG2V.1?4_|4Htm,pKjN~;F[KVajZ%l92a0R_#xJ');
define('LOGGED_IN_KEY',    '&M*.*N ko )k^nvU&],L.h^4*F1lRdp%G+=_8Nut8IGaFV3H`wC}R||%NLM*xAe^');
define('NONCE_KEY',        'c84f> n@kRSL+24J^C76hM<=@Gm5`xiwz]|-)ariRYZMMJWY3bpTOvi1Iyv5XgY4');
define('AUTH_SALT',        '!Fx&e@DHDr06mdE,R&, +3njTqQmF0?qF|x<MlRz%(uUfW[!5]u)blS85^Zh&SA!');
define('SECURE_AUTH_SALT', 'JJX]X^:-kiP3FIG9Wwv@99_Ou>Y{a3-+YJWKJ+@+*HO:VMH.+v;J`vRT.^rm`Ix$');
define('LOGGED_IN_SALT',   ')-}uH@p#U;ryY~B]A7Q@E9<5ts-(<#$,+iLP=vmwp&_[gG}hiOo#NX0gHok);%U@');
define('NONCE_SALT',       'EQW9P|Ko#z]5qdB|cJ-rnQqfU-:b[at/^SM]S;3BkR%0C=!TL8iOJE3[L*9_5/GS');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'dark_';

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
