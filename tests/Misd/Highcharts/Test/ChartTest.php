<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Misd\Highcharts\Test;

use Misd\Highcharts\Chart;
use PHPUnit_Framework_TestCase as TestCase;

class ChartTest extends TestCase
{
    public function testGetId()
    {
        $chart = new Chart();

        $this->assertTrue(is_string($chart->getId()));
    }

    public function testTitle()
    {
        $chart = new Chart();

        $title = 'Title';

        $this->assertNull($chart->getTitle());
        $this->assertSame($chart, $chart->setTitle($title));
        $this->assertSame($title, $chart->getTitle($title));
    }

    public function testSubtitle()
    {
        $chart = new Chart();

        $subtitle = 'Subtitle';

        $this->assertNull($chart->getSubtitle());
        $this->assertSame($chart, $chart->setSubtitle($subtitle));
        $this->assertSame($subtitle, $chart->getSubtitle($subtitle));
    }

    public function testXAxis()
    {
        $chart = new Chart();

        $this->assertEmpty($chart->getXAxes());

        $axis1 = $this->getMock('Misd\Highcharts\Axis\XAxisInterface');
        $axis2 = $this->getMock('Misd\Highcharts\Axis\XAxisInterface');

        $this->assertSame($chart, $chart->addXAxis($axis1));
        $this->assertSame($chart, $chart->addXAxis($axis2));
        $this->assertSame(array($axis1, $axis2), $chart->getXAxes());
    }

    public function testYAxis()
    {
        $chart = new Chart();

        $this->assertEmpty($chart->getYAxes());

        $axis1 = $this->getMock('Misd\Highcharts\Axis\YAxisInterface');
        $axis2 = $this->getMock('Misd\Highcharts\Axis\YAxisInterface');

        $this->assertSame($chart, $chart->addYAxis($axis1));
        $this->assertSame($chart, $chart->addYAxis($axis2));
        $this->assertSame(array($axis1, $axis2), $chart->getYAxes());
    }

    public function testSeries()
    {
        $chart = new Chart();

        $this->assertEmpty($chart->getSeries());

        $series1 = $this->getMock('Misd\Highcharts\Series\SeriesInterface');
        $series2 = $this->getMock('Misd\Highcharts\Series\SeriesInterface');

        $this->assertSame($chart, $chart->addSeries($series1));
        $this->assertSame($chart, $chart->addSeries($series2));
        $this->assertSame(array($series1, $series2), $chart->getSeries());
    }

    public function testLegend()
    {
        $chart = new Chart();

        $this->assertTrue($chart->hasLegend());

        $chart->setLegend(false);

        $this->assertFalse($chart->hasLegend());
    }

    /**
     * @expectedException \Misd\Highcharts\Exception\InvalidArgumentException
     */
    public function testLegendInvalidArgumentException()
    {
        $chart = new Chart();

        $chart->setLegend(null);
    }

    public function testTooltip()
    {
        $chart = new Chart();

        $this->assertInstanceOf('Misd\Highcharts\Tooltip\TooltipInterface', $chart->getTooltip());
    }
}
