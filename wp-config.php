<?php
/**
 * Baskonfiguration för WordPress.
 *
 * Denna fil används av wp-config.php-genereringsskript under installationen.
 * Du behöver inte använda webbplatsen, du kan kopiera denna fil direkt till
 * "wp-config.php" och fylla i värdena.
 *
 * Denna fil innehåller följande konfigurationer:
 *
 * * Inställningar för MySQL
 * * Säkerhetsnycklar
 * * Tabellprefix för databas
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL-inställningar - MySQL-uppgifter får du från ditt webbhotell ** //
/** Namnet på databasen du vill använda för WordPress */
define('DB_NAME', 'nbs-wordpress');

/** MySQL-databasens användarnamn */
define('DB_USER', 'root');

/** MySQL-databasens lösenord */
define('DB_PASSWORD', '');

/** MySQL-server */
define('DB_HOST', 'localhost');

/** Teckenkodning för tabellerna i databasen. */
define('DB_CHARSET', 'utf8mb4');

/** Kollationeringstyp för databasen. Ändra inte om du är osäker. */
define('DB_COLLATE', '');

/**#@+
 * Unika autentiseringsnycklar och salter.
 *
 * Ändra dessa till unika fraser!
 * Du kan generera nycklar med {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Du kan när som helst ändra dessa nycklar för att göra aktiva cookies obrukbara, vilket tvingar alla användare att logga in på nytt.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '-E;VlnS9?N`&htm8Bw?Dt:7A^,uhj5 +K{kfOa.?z2P9cdUige5nk0bm{y:Er.45');
define('SECURE_AUTH_KEY',  'l@sm_yLu[QOIGN?AE&q%>P3=GD5m>2|ndvi^ASlV1iSpR-|8@g=9]#@0Vv)8Oi G');
define('LOGGED_IN_KEY',    'X49_fr6`).`r8UX;KDc68p&#ve4>-;ADvAs+WoVT6S8>J9xnzG>$qV33nM.wK-Hi');
define('NONCE_KEY',        '&,|r)p(k2Y 1<v~A9Q#8(D jvo:eH/DEmd5L#A&v)wz]r3F?An*e~]ly-?qhjQ# ');
define('AUTH_SALT',        '!j+F@$AOC2yhs}}yJRe1oW)!Mhz6otoqc67/d^~`Xgpq~*<RVbn>up5r`RS6+rLp');
define('SECURE_AUTH_SALT', 'b|hO^Qy)ld$O?eqWrQ;Mx5Rq!!eTEh-OJx*]}U/4&H&NE`nyd5]iKkM^vj$Hui<Y');
define('LOGGED_IN_SALT',   '+z%~nLTN4^4b;KBuGlQZTYl?8]zeQy:voIZ(&]ckD.]s7#8A@Q)e6H=@+qH%Mj`W');
define('NONCE_SALT',       'b<8QKYjz>&_pVXO4f66sLEJ9x3^(c+XHi/=yu69}zm>9i~Ls5Lw~}HfIVp$%Ay6Q');

/**#@-*/

/**
 * Tabellprefix för WordPress Databasen.
 *
 * Du kan ha flera installationer i samma databas om du ger varje installation ett unikt
 * prefix. Endast siffror, bokstäver och understreck!
 */
$table_prefix  = 'nbs_';

/** 
 * För utvecklare: WordPress felsökningsläge. 
 * 
 * Ändra detta till true för att aktivera meddelanden under utveckling. 
 * Det är rekommderat att man som tilläggsskapare och temaskapare använder WP_DEBUG 
 * i sin utvecklingsmiljö. 
 *
 * För information om andra konstanter som kan användas för felsökning, 
 * se dokumentationen. 
 * 
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */ 
define('WP_DEBUG', false);

/* Det var allt, sluta redigera här! Blogga på. */

/** Absoluta sökväg till WordPress-katalogen. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Anger WordPress-värden och inkluderade filer. */
require_once(ABSPATH . 'wp-settings.php');