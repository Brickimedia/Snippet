<?php

/**
 * Class for static functions
 */
class BricksetSnippet {

	/**
	 * Parse wikitext into raw paragraph
	 *
	 * @param String $text: text to proccess
	 * @return String: processed text
	 */
	static function parseText( $text ) {
		$parts = explode( '==', $text );
		$text = $parts[0]; // remove anything after the first heading

		$text = preg_replace( "/'''/", "", $text ); // remove bold
		$text = preg_replace( "/''/", "", $text ); // remove italics

		$text = preg_replace( '/\[\[([^|]+?)\]\]/', '$1', $text ); // remove non-piped links
		$text = preg_replace( '/\[\[[^|\n]+?\|([^|\n]+?)\]\]/', '$1', $text ); // remove piped links

		$text = preg_replace( '/<.+?>/', '', $text ); // remove html elements

		$text = preg_replace( '/{{[^{]+?}}/', '', $text ); // remove 3rd layer templates
		$text = preg_replace( '/{{[^{]+?}}/', '', $text ); // remove 2nd layer templates
		$text = preg_replace( '/{{[^{]+?}}/', '', $text ); // remove 1st layer templates

		$text = trim( $text );

		return $text;
	}

	/**
	 * Get the title object for the given search data, or false if none found
	 *
	 * @param String $id: id of article to find
	 * @param String $name: name of article to find
	 * @return Title|boolean: title if found OR false if none found
	 */
	static function getTitle( $id, $name ) {

	}
}