<?php

class SnippetAPI extends ApiBase {

	public function execute() {
		$set = $this->getMain()->getVal('set');

		$title = Snippet::getTitle( $set );

		if ( $title ) {

			$page = new WikiPage( $title );
			$content = $page->getContent()->getNativeData();

			$snippet = Snippet::parseText( $content );

			$result = array(
				'url' => $title->getFullURL(),
				'snippet' => $snippet,
			);

			$this->getResult()->addValue( null, $this->getModuleName(), $result );
		}

		return true;
	}

	public function getDescription() {
		return 'An API action returning a snippet of a page from a search.';
	}

	public function getAllowedParams() {
		return array(
				'set' => array (
						ApiBase::PARAM_TYPE => 'string',
						ApiBase::PARAM_REQUIRED => true
				),
		);
	}

	public function getParamDescription() {
		return array(
				'set' => 'The set to search for',
		);
	}

	public function getExamples() {
		return array(
				'api.php?action=snippet&set=7965-1:%20Millennium%20Falcon' => 'Get the description for 7965-1: Millennium Falcon'
		);
	}
}