<?php
/* Modeled around the ContributionScores extension */

/** \file
* \brief Contains setup code for the Contribution Scores Extension.
*/

# Not a valid entry point, skip unless MEDIAWIKI is defined
if ( !defined( 'MEDIAWIKI' ) ) {
	echo "Theorems extension";
	exit( 1 );
}

$wgHooks['ParserFirstCallInit'][] = 'theorems_Setup';

function theorems_Setup( &$parser ) {
	$parser->setHook( 'theorem', 'theorem_Render' );
	$parser->setHook( 'proof', 'proof_Render' );
	$parser->setHook( 'definition', 'definition_Render' );
	return true;
}

function theorem_Render( $input, array $args, Parser $parser, PPFrame $frame ) {
	$text = htmlspecialchars($input);
	return $parser->internalParse("'''Theorem''': $text\n");// FIXME i18n
}

function proof_Render( $input, array $args, Parser $parser, PPFrame $frame ) {
	$text = htmlspecialchars($input);
	return $parser->internalParse("''Proof'': $text \n ''q.e.d.''\n");// FIXME i18n
}

function definition_Render( $input, array $args, Parser $parser, PPFrame $frame ) {
	$text = htmlspecialchars($input);
	return $parser->internalParse("'''Definition''': $text\n");// FIXME i18n
}