<?php namespace Acme\Listeners;

use Acme\Jobs\JobWasPosted;

class EmailNotifier {

	public function whenJobWasPosted(JobWasPosted $event)
	{
		var_dump('Send confirmation email about event: ' . $event->job->title);
	}

}