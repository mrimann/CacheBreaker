<?php
namespace OpsDev\CacheBreaker\Tests\ViewHelpers;

    /*                                                                        *
     * This script belongs to the TYPO3 Flow package "OpsDev.CacheBreaker".   *
     *                                                                        *
     *                                                                        */
use OpsDev\CacheBreaker\ViewHelpers\ResourceViewHelper;

/**
 * Testcase for the resource viewhelper
 */
class ResourceViewhelperTest extends \TYPO3\Flow\Tests\UnitTestCase {

    /**
     * @var \OpsDev\CacheBreaker\ViewHelpers\ResourceViewHelper
     */
    protected $fixture;

    public function setUp()
    {
        $this->fixture = new ResourceViewHelper();
    }

    public function tearDown()
    {
        unset ($this->fixture);
    }

    /**
     * @test
     */
    public function renderReturnsTheProperShortenedMd5Value() {
        $this->assertEquals(
            'fff',
            $this->fixture->render('Test/test.css', 'OpsDev.CacheBreaker')
        );
    }
}