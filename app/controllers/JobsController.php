<?php

use Acme\Commanding\CommandBus;
use Acme\Jobs\PostJobListingCommand;

class JobsController extends BaseController {

	/**
	 * @var Acme\Commanding\CommandBus
	 */
	private $commandBus;

	function __construct(CommandBus $commandBus)
	{
		$this->commandBus = $commandBus;
	}

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
		// validate form input
		// if not valid, go back
		// otherwise, create job record in db
		// send user confirmation
		// notify all listeners of a particular job tag
		// etc.

		$input = Input::only('title', 'description');

		$command = new PostJobListingCommand($input['title'], $input['description']);

		$this->commandBus->execute($command);
	}

} 