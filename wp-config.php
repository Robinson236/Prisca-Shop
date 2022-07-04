<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'bd_shop' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Ir >#$9.f.:A@lTHCU!`laV:F*(/&<+<OrQH!LB;jX<wis&AiF ?R`m57pi=Rvn7' );
define( 'SECURE_AUTH_KEY',  '.;*u4iB3|AxQL[(RM+Y,fMFyE,8,6mR::-v$4Z 1`W_haZAx.aU.bJPEnFer7E*n' );
define( 'LOGGED_IN_KEY',    'uj2BH]wcOK(SUEK,N/!>#?=-%v.`(*zDpq5]4wPo#NE-`kNZE+(e:W::/!wT=+ro' );
define( 'NONCE_KEY',        '*>s]G%DESFKA:,[:Q$=]V=M]J3,br^-WjVWE2=@ToK[`$@BeEPaUd3t}@aL<Xw.*' );
define( 'AUTH_SALT',        '<I4>b0b..eO/LI:$Y$*>TS$/P`Tw%:3)S,ZUCbK ae*%M<Ysh0i]LbbP[Qu:rfwn' );
define( 'SECURE_AUTH_SALT', 'mbNRbg)scd& Zxv8C`o` ;Atn:Xn[;D|~~o >au$&tt>(35wl`q|x1r@@:Mp|wru' );
define( 'LOGGED_IN_SALT',   '>M{Um$7G+$VDqP/QOiDN3k5YG8aI4yso-FCs]v|aVrh>3@rVW8nW8|)DZE1Z#e}Y' );
define( 'NONCE_SALT',       'X:6<7I!hC_!)y>f^%Ph>@4E-b`[Tdw;nz! 7+^>,ZXSe`o#-Q!g:%4/<1YoWm+L@' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
