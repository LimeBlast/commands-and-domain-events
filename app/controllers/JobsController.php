<?php

use Acme\Jobs\PostJobListingCommand;

class JobsController extends BaseController {

	/**
	 * Store a new job
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only('title', 'description');

		new PostJobListingCommand($input['title'], $input['description']);
	}

} 