<?php

use Acme\Jobs\PostJobListingCommand;

class JobsController extends BaseController {

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

}