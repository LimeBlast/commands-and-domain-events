<?php

use Acme\Eventing\EventGenerator;
use Acme\Jobs\JobWasPosted;

class Job extends Eloquent {

	use EventGenerator;

	public function post($title, $description)
	{
		$this->title       = $title;
		$this->description = $description;

		$this->save();

		$this->raise(new JobWasPosted($this));

		return $this;
	}

}