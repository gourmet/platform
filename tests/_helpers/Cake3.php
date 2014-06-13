<?php

namespace App\Test\Codeception\Module;

use Cake\Controller\Error\MissingControllerException;
use Cake\Core\Configure;
use Cake\Core\App;
use Cake\Event\Event;
use Cake\Routing\Dispatcher;
use Cake\Routing\Router;
use Cake\TestSuite\ControllerTestDispatcher;
use Cake\TestSuite\InterceptContentHelper;
use Cake\Utility\Inflector;
use Codeception\Lib\Framework;
use Codeception\Lib\Interfaces\ActiveRecord;
use Codeception\TestCase;
use Symfony\Component\BrowserKit\Client;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\BrowserKit\Response;

class_exists('Cake\TestSuite\ControllerTestCase', true);

class Cake3 extends Framework// implements ActiveRecord
{

	protected $configure;

	public function _initialize()
	{

	}

	public function _before(TestCase $test)
	{
		$this->client = new Cake3Client();
		if (empty($this->configure)) {
			$this->configure = Configure::read();
		}
		if (class_exists('Cake\Routing\Router', false)) {
			Router::reload();
		}
	}

	public function _after(TestCase $test)
	{
		if (!empty($this->configure)) {
			Configure::clear();
			Configure::write($this->configure);
		}
	}

	public function expectAnExceptionOnPage($uri, $exceptionClass = '\Exception') {
		try {
			$this->amOnPage($uri);
		} catch (\Exception $e) {
			if (!($e instanceof $exceptionClass)) {
				throw $e;
			}
			return;
		}
		$this->fail("A $exceptionClass was expected to be thrown");
	}

}

class Cake3Client extends Client
{

	protected $mockObjectGenerator;

	protected function getMock($class, $methods = [], $args = [])
	{
		if (null === $this->mockObjectGenerator) {
			$this->mockObjectGenerator = new \PHPUnit_Framework_MockObject_Generator;
		}

		return $this->mockObjectGenerator->getMock($class, $methods, $args);
	}

	protected function filterRequest(Request $request)
	{
		$requestData = [
			'url' => preg_replace('/^https?:\/\/[a-z0-9\-\.]+/', '', $request->getUri()),
			'cookies' => $request->getCookies(),
			'query' => $request->getParameters()
		];

		return $this->getMock('Cake\Network\Request', null, [$requestData]);
	}

	protected function filterResponse($response)
	{
		return new Response($response->body(), $response->statusCode(), $response->header());
	}

	protected function doRequest($request)
	{
		$plugin = empty($request->params['plugin']) ? '' : Inflector::camelize($request->params['plugin']) . '.';

		$Dispatcher = new ControllerTestDispatcher();
		$Dispatcher->loadRoutes = true;
		$Dispatcher->parseParams(new Event('ControllerTestCase', $Dispatcher, array('request' => $request)));
		$Dispatcher->testController = $this->generate($plugin . Inflector::camelize($request->params['controller']));
		$Dispatcher->response = $this->getMock('Cake\Network\Response', array('send', 'stop'));
		$Dispatcher->dispatch($request, $Dispatcher->response);
		return $Dispatcher->testController->response;
	}

	protected function generate($controller)
	{
		$classname = App::classname($controller, 'Controller', 'Controller');
		if (!$classname) {
			list($plugin, $controller) = pluginSplit($controller);
			throw new MissingControllerException(array(
				'class' => $controller . 'Controller',
				'plugin' => $plugin
			));
		}

		list(, $controllerName) = namespaceSplit($classname);
		$name = substr($controllerName, 0, -10);

		$request = $this->getMock('Cake\Network\Request');
		$response = $this->getMock('Cake\Network\Response', array('_sendHeader', 'stop'));
		$controller = $this->getMock($classname, null, array($request, $response, $name));

		$controller->constructClasses();

		return $controller;
	}

}
