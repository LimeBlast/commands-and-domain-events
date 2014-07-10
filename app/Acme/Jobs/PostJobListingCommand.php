<?php namespace Acme\Jobs;

class PostJobListingCommand {

	public $title;

	public $description;

	function __construct($description, $title)
	{
		$this->description = $description;
		$this->title       = $title;
	}

}