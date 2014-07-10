<?php namespace Acme\Jobs;

class JobWasPosted {

	public $job;

	function __construct($job)
	{
		$this->job = $job;
	}

}