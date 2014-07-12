<?php namespace Acme\Jobs;

use Acme\Commanding\CommandHandler;
use Acme\Eventing\EventDispatcher;
use Job;

class JobFilledCommandHandler implements CommandHandler {

	protected $job;

	protected $eventDispatcher;

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
		$job = $this->job->findOrFail($command->jobId);

		$job->archive();

		$this->eventDispatcher->dispatch($job->releaseEvents());
	}
}