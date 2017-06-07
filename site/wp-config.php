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
//define('DB_NAME', 'gruporalifla');
define('DB_NAME', 'gruporalifla');

/** MySQL database username */
//define('DB_USER', 'gruporalifla');
define('DB_USER', 'gruporalifla');


/** MySQL database password */
//define('DB_PASSWORD', 'mu3UmuCabr5dusemazujeceFach7W');
define('DB_PASSWORD', 'dev1119');

/** MySQL hostname */
//define('DB_HOST', 'mysql01-farm58.kinghost.net'); 
define('DB_HOST', 'mysql01-farm58.kinghost.net'); 

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('FS_METHOD', direct);

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ' Vl< sw~Ibz_r&boq(EW:f={Ua=l5IE!J.WgL#s8)AA^ldp$NDEFXI>h:cip<5Zi');
define('SECURE_AUTH_KEY',  '}pgvnD^-#&e6 2%h071wb/N02E-gbo-yAWHWM;}#l06}aHJ5GcfQr@:_(_&#6Xq_');
define('LOGGED_IN_KEY',    '#;Q#]zkP?EB98$hJb>7{hDcv0P-@:J#T/p)4nY!&+4(xS7f1y648l13*ROp^c|@J');
define('NONCE_KEY',        '`2OxdVeVgc4q@zPAOkS_MwHY2X6oO[g*wFc~y/;.>XX00aSH6z;I[=XZt}j`Q$CE');
define('AUTH_SALT',        'iFr]P,HP*9!WjXhO$Oko@%MrAY+%vHt-2{wGGv,|S0(z*e+!)TFuQ=ZE.k@i6@&e');
define('SECURE_AUTH_SALT', ',9f(1On<MKM{X37vy4]NL< oG&j:US*Hf4DUeY7R)L=pO!o._q&vnax7/^d7?C)k');
define('LOGGED_IN_SALT',   'X mGV(Z)R!)}f9;O{payyp/y4}P 6ua-4=-gh:#Oj_Hjsv&0Zlr+=oJLj5xp#Rwx');
define('NONCE_SALT',       'VcJBL1*KXLt!A&6+5>Q 5VSOA*z[Sd251/Z9]C2A2!9A!bNVv_bdl.Na4=@$k&oM');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'r_';

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
define('RELOCATE',true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
