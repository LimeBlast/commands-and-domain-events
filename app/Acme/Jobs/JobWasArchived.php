<?php namespace Acme\Jobs;

use Job;

class JobWasArchived {

	public $job;

	function __construct(Job $job)
	{
		$this->job = $job;
	}

}