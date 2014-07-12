<?php

use Acme\Jobs\JobFilledCommand;
use Acme\Jobs\PostJobListingCommand;

class JobsController extends BaseController {

	/**
	 * Display new job form
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('jobs.create');
	}

	/**
	 * Store a new job
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only('title', 'description');

		$command = new PostJobListingCommand($input['title'], $input['description']);

		$this->commandBus->execute($command);
	}

	/**
	 * Set job as filled
	 *
	 * @param $jobId
	 *
	 * @return Response
	 */
	public function delete($jobId)
	{
		$command = new JobFilledCommand($jobId);

		$this->commandBus->execute($command);
	}

}