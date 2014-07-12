<?php

use Acme\Eventing\EventGenerator;
use Acme\Jobs\JobWasArchived;
use Acme\Jobs\JobWasPosted;

/**
 * Job
 *
 * @property integer        $id
 * @property string         $title
 * @property string         $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Job whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Job whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\Job whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\Job whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Job whereUpdatedAt($value)
 */
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

	public function archive()
	{
		$this->delete();

		$this->raise(new JobWasArchived($this));
	}

}