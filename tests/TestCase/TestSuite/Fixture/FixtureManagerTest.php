<?php

namespace App\Test\TestCase\TestSuite\Fixture;

use App\TestSuite\Fixture\FixtureManager;
use Cake\Core\Configure;
use Cake\TestSuite\TestCase;
use TestApp\Test\TestCase\TestCaseWithNoFixtures;

/**
 * App\TestSuite\Fixture\FixtureManager Test Case
 */
class FixtureManagerTest extends TestCase
{

    /**
     * The class under test.
     *
     * @var FixtureManager
     */
    public $fixtureManager;

    /**
     * The application namespace to preserve.
     *
     * @var string
     */
    public $namespace;

    /**
     * Runs before each test.
     *
     * @return void
     */
    public function setUp()
    {
        $this->namespace = Configure::read('App.namespace');
        Configure::write('App.namespace', 'TestApp');

        $fixturePath = TEST_APP_TESTS . 'Fixture';
        $this->fixtureManager = new FixtureManager($fixturePath);
    }

    /**
     * Runs after each test.
     *
     * @return void
     */
    public function tearDown()
    {
        Configure::write('App.namespace', $this->namespace);
    }

    /**
     * @test
     * @return void
     */
    public function itShouldAutomaticallyAddFixturesToTestCases()
    {
        $testCaseWithNoFixtures = new TestCaseWithNoFixtures();

        $this->assertNull($testCaseWithNoFixtures->fixtures);

        $this->fixtureManager->fixturize($testCaseWithNoFixtures);

        $expected = ['app.first_test', 'app.second_test'];
        $actual = $testCaseWithNoFixtures->fixtures;

        $this->assertEquals($expected, $actual);
    }
}
