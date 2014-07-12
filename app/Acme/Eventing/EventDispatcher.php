<?php namespace Acme\Eventing;

use Illuminate\Events\Dispatcher;
use Illuminate\Log\Writer;

class EventDispatcher {

	/**
	 * @var \Illuminate\Events\Dispatcher
	 */
	protected $event;
	/**
	 * @var \Illuminate\Log\Writer
	 */
	protected $log;

	function __construct(Dispatcher $event, Writer $log)
	{
		$this->event = $event;
		$this->log   = $log;
	}

	public function dispatch(array $events)
	{
		foreach ($events as $event) {
			$eventName = $this->getEventName($event);

			$this->event->fire($eventName, $event);

			$this->log->info("$eventName was fired.");
		}
	}

	protected function getEventName($event)
	{
		return str_replace('\\', '.', get_class($event));
	}

}