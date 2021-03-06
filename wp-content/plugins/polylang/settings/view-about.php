<?php

/**
 * displays the content of the About metabox
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // don't access directly
};
?>
<p><?php
printf(
	/* translators: %s are html tags */
	__( 'Polylang is provided with an extensive %sdocumentation%s (in English only). It includes information on how to set up your multilingual site and use it on a daily basis, a FAQ, as well as a documentation for developers to adapt their plugins and themes.', 'polylang' ),
	'<a href="https://polylang.pro/doc/">',
	'</a>'
);
if ( ! defined( 'POLYLANG_PRO' ) ) {
	echo ' ';
	printf(
		/* translators: %s are html tags */
		__( 'Support and extra features are available to %sPolylang Pro%s users.' ),
		'<a href="https://polylang.pro">',
		'</a>'
	);
}?>
</p>
<p><?php
printf(
	/* translators: %s are html tags */
	__( 'Polylang is released under the same license as WordPress, the %sGPL%s.', 'polylang' ),
	'<a href="http://wordpress.org/about/gpl/">',
	'</a>'
);

