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
define('DB_NAME', 'kmin90');

/** MySQL database username */
define('DB_USER', 'kmin90');

/** MySQL database password */
define('DB_PASSWORD', 'kim8459!');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '>hP4KW7f0;|_Z[l|}Vfwty1RFw`yC/[[tO1GAq[sLr1a<rd`K:zJ18[[wKx?rC2F');
define('SECURE_AUTH_KEY',  've!`Slsy0dIbqG,{]5gl<CE>_{Y:KsPWPSeu|5x,elD?:k7Yv67ty5F,:0F9T-cp');
define('LOGGED_IN_KEY',    '(MKXi[ <OMm$mUO%Pur:[TUsi({0)5fti[w]>/(pQ:J>~Y053f#-s}*b:>TtCiAG');
define('NONCE_KEY',        'nh]wlx3@bghH3`C)L#d55eEoOGnaTE+yn/%)b_/&&G&+N=.61|dX+= MCG_]KL&>');
define('AUTH_SALT',        'uS^`?`DRl07=POW[K1Srdf%FNd:iiP#KAZ>oW)U#6cX53|I-T]M2B[$)D}bD6Qsa');
define('SECURE_AUTH_SALT', 'I5qp9A&nkB/}hv94B-+AeupyN|H8p@P|23*(]acS&z@-`%07:Uv[F>fk?9ea~+6k');
define('LOGGED_IN_SALT',   '^F+i7JI/U3Pv&AGE~Z|xrr{d!?r*6qu$${Lo%!xc99O54/?t#%@4Z`Z&X~z]|5Np');
define('NONCE_SALT',       '^>[H< F3jRcl,lZm%:[u]FUt zv)NM3KSP6fFBd|n@Pz+6J&U*Ify+9ffI5cg,|K');

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
