<?php namespace Acme\Commanding;

use Illuminate\Foundation\Application;

class CommandBus {

	private $app;
	/**
	 * @var CommandTranslator
	 */
	private $commandTranslator;

	function __construct(Application $app, CommandTranslator $commandTranslator)
	{
		$this->app               = $app;
		$this->commandTranslator = $commandTranslator;
	}

	public function execute($command)
	{
		$handler = $this->commandTranslator->toCommandHandler($command);

		// resolve out of ioc container, and call handle method
		return $this->app->make($handler)->handle($command);
	}

}