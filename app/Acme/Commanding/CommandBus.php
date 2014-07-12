<?php namespace Acme\Commanding;

interface CommandBus {

	public function execute($command);

}