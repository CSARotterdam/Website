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
define('DB_NAME', 'md456797db452600');

/** MySQL database username */
define('DB_USER', 'md456797db452600');

/** MySQL database password */
define('DB_PASSWORD', 'OLtYLCclk^7x3U72Q021vtC@j!yAHV');

/** MySQL hostname */
define('DB_HOST', 'db.csarotterdam.nl');

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
define('AUTH_KEY',         '0jF*Ap^vxLMurB}9|gUaj<N%<z#,WV)g JV]#TKcyOl}VQ4{8]^1T5c7>)1_;7e4');
define('SECURE_AUTH_KEY',  '1woJ*uDwUH,Q{h92%3AVi$Ar%{Q/*gii-NF1BE N4]$-yLvy6k5^{w7 :#/<oR),');
define('LOGGED_IN_KEY',    'Q)RxN4 `Bg+e<5 <,#&:y*2r{8OA*(~w2-lnmfWb}FfWSA=&f?bB%/CUU08w0zm/');
define('NONCE_KEY',        '|sY6p&bBkhXaYnWI+8Qn:J6V0eM([GBNfThH[Uo;Y=;c%/P{R*;TSCYm1C1!4H<J');
define('AUTH_SALT',        'VplWz$;qhI;WR3B:rqZv<&j=~9oM!:`2kes47<6#,-vU7n@^EAd`aI(j*#`-oD,c');
define('SECURE_AUTH_SALT', 'd[r=ANzgTr@|@A(5}drb69N.8)2q[0K8d^=VXQnea:tTLm7tSnoNF-XzKp3<TEpa');
define('LOGGED_IN_SALT',   'Q:ID&EdOzUmB=%{Zn^LT%SK+&l7ZuR,h_(5q8ob6y-]Twv`>/hzueOT#<P2xS.?:');
define('NONCE_SALT',       '@3nS53/+FaV`9[5E#} SH}+e<?3,BHF(FY5{kUFa62.$Cn1yxpg42*mGK,]quih*');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
