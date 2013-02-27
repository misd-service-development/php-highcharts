<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Misd\Highcharts\Test\Series\State;

use Misd\Highcharts\Series\SeriesInterface;
use Misd\Highcharts\Series\State\AbstractState;
use PHPUnit_Framework_TestCase as TestCase;

class AbstractStateTest extends TestCase
{
    /**
     * @var SeriesInterface
     */
    protected $mockSeries;

    public function setUp()
    {
        $this->mockSeries = $this->getMock('Misd\Highcharts\Series\SeriesInterface');
    }

    /**
     * @return AbstractState
     */
    protected function createState()
    {
        return $this->getMockForAbstractClass('Misd\Highcharts\Series\State\AbstractState', array($this->mockSeries));
    }

    public function testSeries()
    {
        $state = $this->createState();

        $this->assertSame($this->mockSeries, $state->getSeries());
    }

    public function testEnabled()
    {
        $state = $this->createState();

        $this->assertTrue(is_bool($state->isEnabled()));
        $this->assertSame($state, $state->setEnabled(false));
        $this->assertFalse($state->isEnabled());
    }

    /**
     * @expectedException \Misd\Highcharts\Exception\InvalidArgumentException
     */
    public function testEnabledInvalidArgumentException()
    {
        $state = $this->createState();

        $state->setEnabled(null);
    }

    public function testLineWidth()
    {
        $state = $this->createState();

        $this->assertSame($state, $state->setLineWidth(2));
        $this->assertSame(2, $state->getLineWidth());
        $this->assertSame($state, $state->setLineWidth(null));
        $this->assertNull($state->getLineWidth());
    }

    /**
     * @expectedException \Misd\Highcharts\Exception\InvalidArgumentException
     */
    public function testLineWidthInvalidArgumentException()
    {
        $state = $this->createState();

        $state->setLineWidth(true);
    }

    public function testMarker()
    {
        $state = $this->createState();

        $this->assertInstanceOf('Misd\Highcharts\Series\Marker\MarkerInterface', $state->getMarker());
    }
}
