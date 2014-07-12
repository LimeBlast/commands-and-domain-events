<?php namespace Acme\Listeners;

use Acme\Eventing\EventListener;
use Acme\Jobs\JobWasPosted;

class ReportListener extends EventListener {

	public function whenJobWasPosted(JobWasPosted $event)
	{
		var_dump('Add to report about: ' . $event->job->title);
	}

}