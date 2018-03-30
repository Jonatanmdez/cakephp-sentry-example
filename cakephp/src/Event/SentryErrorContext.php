<?php

namespace App\Event;

use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Event\EventListenerInterface;
use Raven_Client;

class SentryErrorContext implements EventListenerInterface
{
	public function implementedEvents()
	{
		return [
			'CakeSentry.Client.beforeCapture' => 'setContext',
		];
	}

	public function setContext(Event $event)
	{


		$request = $event->getSubject()->getRequest();
		$request->trustProxy = true;

		$raven = $event->getSubject()->getRaven();

		/* @var Raven_Client $raven */




		return [
			'extra' => [
				'foo' => 'bar',
			]
		];
	}
}

?>
