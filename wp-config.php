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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'vlogdb' );


/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'F}^ox$+(|1S)Y>F9KQ=6~KmHgJOQ+e~etS4-Il8BYUXFv u>>Pe-B`~lDvr#) uB');
define('SECURE_AUTH_KEY',  '(6Qr6QaJ`}5WC~H_eGj/JjNjqf33qcWxG,8`@SUz*BC@KHc:PXIg >9;oyz<VN+0');
define('LOGGED_IN_KEY',    'aDbJ&$M+Kb?wK-(/p|@Sy-xBDJUuos)pS5G;MA~LiBWD6+kF;NHeS?R;`{|=]pkn');
define('NONCE_KEY',        '_Sp,j%GDSmrjN9LiH)a%K80`Qtc* I0v=>Y,GK!1+d|!iOxB!PE+V8WcMc`rnn~1');
define('AUTH_SALT',        'Y> fs@|(UdVL!pFGV;ZI9y}OGZ:_f?W+.x|#OZ-U[dHuiT@mx=]),(@~{$8Xkn{*');
define('SECURE_AUTH_SALT', 'F-Tm+?$|8;7|e) lr^<AKt|t 2B %/QgqMruMez[SDh#ru_h!eLl)Uap?99q-E52');
define('LOGGED_IN_SALT',   'mrb^WIs}r%;eR^^wcrs+K5pej8]E~Ee*>?Qg5)Zm&,&N)7Qg-}D#8WYCQ,)NKZY%');
define('NONCE_SALT',       '+-u Auye?u}t# -ORD0z=L|w(t7@-D.iiF5{ve(460NCx:/E~WByYtJOL~e?I8:(');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'vlog_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
