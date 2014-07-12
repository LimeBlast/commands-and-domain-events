<?php namespace Acme\Listeners;

use Acme\Eventing\EventListener;
use Acme\Jobs\JobWasArchived;
use Acme\Jobs\JobWasPosted;

class EmailListener extends EventListener {

	public function whenJobWasPosted(JobWasPosted $event)
	{
		var_dump('Send confirmation email about event: ' . $event->job->title);
	}

	public function whenJobWasArchived(JobWasArchived $event)
	{
		var_dump('Send archive email about event: ' . $event->job->title);
	}

}