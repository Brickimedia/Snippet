<?php

class BricksetSnippetAPI extends ApiBase {

	public function execute() {
		$id = $this->getMain()->getVal('id');
		$name = $this->getMain()->getVal('name');

		$title = BricksetSnippet::getTitle( $id, $name );

		$title = Title::newFromText( '7965 Millennium Falcon' );

		if ( $title ) {

			$page = new WikiPage( $title );
			$content = $page->getContent()->getNativeData();

			$snippet = BricksetSnippet::parseText( $content );

			$result = array(
				'url' => $title->getFullURL(),
				'snippet' => $snippet,
			);

			$this->getResult()->addValue( null, $this->getModuleName(), $result );
		}

		return true;
	}

	public function getDescription() {
		return 'An API action returning a snippet of a page from a Brickset search.';
	}

	public function getAllowedParams() {
		return array(
				'id' => array (
						ApiBase::PARAM_TYPE => 'string',
						ApiBase::PARAM_REQUIRED => true
				),
				'name' => array (
						ApiBase::PARAM_TYPE => 'string',
						ApiBase::PARAM_REQUIRED => true
				),
		);
	}

	public function getParamDescription() {
		return array(
				'id' => 'The ID of the set to return',
				'name' => 'The name of the set to return'
		);
	}

	public function getExamples() {
		return array(
				'api.php?action=bricksetsnippet&id=4346&name=Robo_Pod&format=xml' => 'Get the description for 4346 Robo Pod'
		);
	}
}