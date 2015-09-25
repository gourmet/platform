<?php

namespace App\TestSuite\Fixture;

use Cake\Filesystem\Folder;
use Cake\TestSuite\Fixture\FixtureManager as CoreFixtureManager;
use Cake\Utility\Inflector;

/**
 * Custom fixture manager that automatically loads all fixtures.
 */
class FixtureManager extends CoreFixtureManager
{

    protected $_fixturePath;

    /**
     * Constructor.
     *
     * @param string $fixturePath The path to the fixtures.
     */
    public function __construct($fixturePath = null)
    {
        if (!$fixturePath) {
            $fixturePath = TESTS . 'Fixture';
        }

        $this->_fixturePath = $fixturePath;
    }

    /**
     * Loads all fixtures from disk if none defined.
     *
     * @param \Cake\TestSuite\TestCase $test The test case to inspect.
     * @return void
     */
    public function fixturize($test)
    {
        if (!isset($test->fixtures)) {
            $folder = new Folder($this->_fixturePath);
            $fixtureFiles = $folder->find('.*Fixture\.php');
            foreach ($fixtureFiles as $fixtureFile) {
                $fixtureName = str_replace('Fixture.php', '', $fixtureFile);
                $fixtureName = Inflector::underscore($fixtureName);
                $test->fixtures[] = 'app.' . $fixtureName;
            }
        }
        parent::fixturize($test);
    }
}
