<?php
namespace Ziffity\Feedback\Plugin;

class PluginA
{
    public function beforeSetTitle(\Ziffity\Feedback\Controller\Index\Example $subject, $title)
	{
		$title = $title . " to ";
		echo __METHOD__ . "</br>";

		return [$title];
	}


    public function afterGetTitle(\Ziffity\Feedback\Controller\Index\Example $subject, $result)
	{

		echo __METHOD__ . "</br>";

		return '<h1>'. $result . 'Ziffity.com' .'</h1>';

	}

}