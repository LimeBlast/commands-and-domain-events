<?php namespace Acme\Jobs;

class JobFilledCommand {

	public $jobId;

	function __construct($jobId)
	{
		$this->jobId = $jobId;
	}

}