<?php

/**
 * Class for static functions
 */
class Snippet {

	/**
	 * Parse wikitext into raw paragraph
	 *
	 * @param String $text: text to proccess
	 * @return String: processed text
	 */
	static function parseText( $text ) {
		global $wgSnippetMaxLength;

		$parts = explode( '==', $text );
		$text = $parts[0]; // remove anything after the first heading

		$text = preg_replace( "/'''/", "", $text ); // remove bold
		$text = preg_replace( "/''/", "", $text ); // remove italics

		$text = preg_replace( '/\[\[([^|]+?)\]\]/', '$1', $text ); // remove non-piped links
		$text = preg_replace( '/\[\[[^|\n]+?\|([^|\n]+?)\]\]/', '$1', $text ); // remove piped links

		$text = preg_replace( '/<ref>.+?<\/ref>/', '', $text ); // remove <ref> tags

		$text = preg_replace( '/<.+?>/', '', $text ); // remove html elements

		$text = preg_replace( '/{{[^{]+?}}/', '', $text ); // remove 3rd layer templates
		$text = preg_replace( '/{{[^{]+?}}/', '', $text ); // remove 2nd layer templates
		$text = preg_replace( '/{{[^{]+?}}/', '', $text ); // remove 1st layer templates

		$text = substr( $text, 0, $wgSnippetMaxLength ); // limit to $wgSnippetMaxLength chars

		$parts = explode( '.', $text );
		array_pop( $parts ); // remove anything after the last full stop
		$text = implode( '.', $parts ) . '.';

		$text = trim( $text );

		return $text;
	}

	/**
	 * Get the title object for the given search data, or false if none found
	 *
	 * @param String $search: article to search for
	 * @return Title|boolean: title if found OR false if none found
	 */
	static function getTitle( $search ) {

		$engine = SearchEngine::create();
		$engine->setLimitOffset( 1, 0 );
		$results = $engine->searchTitle( $search );

		if ( $results->numRows() ) {
			$result = $results->next();
			$title = $result->getTitle();
			if ( $title->isRedirect() ) {
				$page = WikiPage::factory( $title );
				$content = $page->getContent( Revision::FOR_PUBLIC );
				$title = $content->getUltimateRedirectTarget();
			}
			return $title;
		} else {
			return false;
		}
	}
}