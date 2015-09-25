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

    public $fixtures;

    /**
     * @test
     * @return void
     */
    public function itShouldAutomaticallyAddFixturesToTestCases()
    {
        $testCaseWithNoFixtures = new TestCaseWithNoFixtures();

        $this->assertNull($testCaseWithNoFixtures->fixtures);

        Configure::write('App.namespace', 'TestApp');
        $fixturePath = TEST_APP_TESTS . 'Fixture';

        $fixtureManager = new FixtureManager($fixturePath);
        $fixtureManager->fixturize($testCaseWithNoFixtures);

        $expected = [
            'app.first_test',
            'app.second_test',
        ];
        $actual = $testCaseWithNoFixtures->fixtures;

        $this->assertEquals($expected, $actual);
    }
}
