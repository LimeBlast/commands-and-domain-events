<?php namespace Acme\Commanding;

use Illuminate\Foundation\Application;

class ValidationCommandBus implements CommandBus {

	protected $commandBus;

	protected $app;

	protected $commandTranslator;

	function __construct(DefaultCommandBus $commandBus, Application $app, CommandTranslator $commandTranslator)
	{
		$this->commandBus        = $commandBus;
		$this->app               = $app;
		$this->commandTranslator = $commandTranslator;
	}

	public function execute($command)
	{
		$validator = $this->commandTranslator->toValidator($command);

		if (class_exists($validator)) {
			$this->app->make($validator)->validate($command);
		}

		$this->commandBus->execute($command);
	}

}