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
	$parser->setHook( 'lemma', 'lemma_Render' );
	$parser->setHook( 'proposition', 'proposition_Render' );
// 	$parser->setHook( 'esempio', 'example_Render' );
	return true;
}

function theorem_Render( $input, array $args, Parser $parser, PPFrame $frame )
{
	return $parser->internalParse("'''Theorem''': $input\n");// FIXME i18n
}

function proof_Render( $input, array $args, Parser $parser, PPFrame $frame )
{
	return $parser->internalParse("''Proof'':\n:$input\n''q.e.d.''\n");// FIXME i18n
}

function definition_Render( $input, array $args, Parser $parser, PPFrame $frame )
{
	return $parser->internalParse("'''Definition''': $input\n");// FIXME i18n
}

function lemma_Render( $input, array $args, Parser $parser, PPFrame $frame )
{
	return $parser->internalParse("'''Lemma''': $input\n");// FIXME i18n
}

function proposition_Render( $input, array $args, Parser $parser, PPFrame $frame )
{
	return $parser->internalParse("'''Proposition''': $input\n");// FIXME i18n
}
