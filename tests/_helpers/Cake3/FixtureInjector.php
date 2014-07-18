<?php

use Cake\TestSuite\Fixture\FixtureManager;
use Codeception\Event\SuiteEvent;
use Codeception\Event\TestEvent;
use Codeception\Platform\Extension;

class FixtureInjector extends Extension {

    public static $events = [
        'suite.before' => 'startTestSuite',
        'suite.after' => 'endTestSuite',
        'test.start' => 'startTest',
        'test.end' => 'endTest',
    ];

    protected $_fixtureManager;

    protected $_first;

    public function __construct() {
        $this->_fixtureManager = new FixtureManager();
        $this->_fixtureManager->shutdown();
    }

    public function startTestSuite(SuiteEvent $event) {
        if (empty($this->_first)) {
            $this->_first = $event->getSuite();
        }
    }

    public function endTestSuite(SuiteEvent $event) {
        if ($this->_first === $event->getSuite()) {
            $this->_fixtureManager->shutdown();
        }
    }

    public function startTest(TestEvent $event) {
        $event->getTest()->fixtureManager = $this->_fixtureManager;
        if ($event->getTest() instanceof PHPUnit_Framework_TestCase) {
            $this->_fixtureManager->fixturize($event->getTest());
            $this->_fixtureManager->load($event->getTest());
        }
    }

    public function endTest(TestEvent $event, $time) {
        if ($event->getTest() instanceof PHPUnit_Framework_TestCase) {
            $this->_fixtureManager->unload($event->getTest());
        }
    }

}
