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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'ZmkO7wfpguQFAz+054+ix5mbIvnEa24A+B2RmqSPg/28DZZ2I9m+CQngbwBrIiWaL9tmfBEWokNYR7sPTQ0o1Q==');
define('SECURE_AUTH_KEY',  '7kfy9/PfM1/sYeJwEsB0fHvN2BnBbKEBeVxvj+nrRuf4eCq86RAqnNsH88X4nEWEC5EJ5l/3QHSxLysDF1lpBQ==');
define('LOGGED_IN_KEY',    'S8t2jhTII6h1pr3Rd0rgwIXuStgj4+oPMdBkbsG/LIxgPdR6JS7jPO61ScW5Vkn728TaRJhMGJnIGnXrg+vunA==');
define('NONCE_KEY',        'YMQ2t9opB0dV3DGX0DH/yAyFk4hznPjttZ5GqJhvX/nPtVELj8W4xpH++jJbA+NteLJ4z4f1JdqoxcuGW25R3g==');
define('AUTH_SALT',        'xLjhuP2Y3+HmVb1uG5PDgWoncpdE9gNJeSNHjb0UqOl7MMkCCKYlHQWQm9jN8uXJ+Z+UACSmhJzWhS7IK6Ow1w==');
define('SECURE_AUTH_SALT', 'qLHE/74RvSEqLbCdEu2rZFnJjgpE4cSIAmaN4oCH5KtEGASuCTkQDbM5laLr2vsiAbzEUbl/GWfzrzbjaMU0AQ==');
define('LOGGED_IN_SALT',   'cl14JiOgild/uZjmOphRgRW+Y8s/j5Y/uOqnsLdCRMKJ32tni4nUJU8c/LNv+m7gCd9vamTiJEihIF38VyGu8A==');
define('NONCE_SALT',       'mrcURdlM9Afk/GCve9zFeiH9Q35C/tVcNPKjyNTpzi4WMAvv3cCW3Dxrpqije2BPzUd1dAsU2SDd4eZ0ejZj2w==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

// Enable WP_DEBUG mode
define( 'WP_DEBUG', true );

// Enable Debug logging to the /wp-content/debug.log file
define( 'WP_DEBUG_LOG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
