<?php namespace Acme\Listeners;

use Acme\Eventing\EventListener;
use Acme\Jobs\JobWasPosted;

class EmailNotifier extends EventListener {

	public function whenJobWasPosted(JobWasPosted $event)
	{
		var_dump('Send confirmation email about event: ' . $event->job->title);
	}

}