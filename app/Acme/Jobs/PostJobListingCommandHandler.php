<?php namespace Acme\Jobs;

use Acme\Commanding\CommandHandler;

class PostJobListingCommandHandler implements CommandHandler {

	/**
	 * Handle the command
	 *
	 * @param $command
	 *
	 * @return mixed
	 */
	public function handle($command)
	{
		var_dump('delegate process of posting a job listing');
	}

}