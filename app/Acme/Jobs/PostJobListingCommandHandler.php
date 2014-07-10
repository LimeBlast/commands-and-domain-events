<?php namespace Acme\Jobs;

use Acme\Commanding\CommandHandler;
use Acme\Eventing\EventDispatcher;
use Job;

class PostJobListingCommandHandler implements CommandHandler {

	private $job;

	private $eventDispatcher;

	function __construct(Job $job, EventDispatcher $eventDispatcher)
	{
		$this->job             = $job;
		$this->eventDispatcher = $eventDispatcher;
	}

	/**
	 * Handle the command
	 *
	 * @param $command
	 *
	 * @return mixed
	 */
	public function handle($command)
	{
		$job = $this->job->post(
			$command->title,
			$command->description
		);

		$this->eventDispatcher->dispatch($job->releaseEvents());
	}

}