<?php

class BricksetSnippetAPI extends ApiBase {

	public function execute() {
		$id = $this->getMain()->getVal('id');
		$name = $this->getMain()->getVal('name');

		$result = array(
			'url' => '',
			'snippet' => '',
		);

		$this->getResult()->addValue( null, $this->getModuleName(), $result );

		return true;
	}

	public function getDescription() {
		return 'An API action returning a snippet of a page from a Brickset search.';
	}

	public function getAllowedParams() {
		return array_merge( parent::getAllowedParams(), array(
				'id' => array (
						ApiBase::PARAM_TYPE => 'string',
						ApiBase::PARAM_REQUIRED => true
				),
				'name' => array (
						ApiBase::PARAM_TYPE => 'string',
						ApiBase::PARAM_REQUIRED => true
				),
		) );
	}

	public function getParamDescription() {
		return array_merge( parent::getParamDescription(), array(
				'id' => 'The ID of the set to return',
				'name' => 'The name of the set to return'
		) );
	}

	public function getExamples() {
		return array(
				'api.php?action=bricksetsnippet&id=4346&name=Robo_Pod&format=xml' => 'Get the description for 4346 Robo Pod'
		);
	}
}