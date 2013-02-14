<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Misd\Highcharts\Test\Series;

use Misd\Highcharts\Series\AbstractSeries;
use PHPUnit_Framework_TestCase as TestCase;

class AbstractSeriesTest extends TestCase
{
    /**
     * @return AbstractSeries
     */
    protected function getSeries()
    {
        return $this->getMockForAbstractClass('Misd\Highcharts\Series\AbstractSeries');
    }

    public function testName()
    {
        $series = $this->getSeries();

        $this->assertNull($series->getName());
        $this->assertSame($series, $series->setName('Test'));
        $this->assertSame('Test', $series->getName());
        $this->assertSame($series, $series->setName(null));
        $this->assertNull($series->getName());
    }

    public function testColor()
    {
        $series = $this->getSeries();

        $this->assertNull($series->getColor());
        $this->assertSame($series, $series->setColor('Test'));
        $this->assertSame('Test', $series->getColor());
        $this->assertSame($series, $series->setColor(null));
        $this->assertNull($series->getColor());
    }

    public function testDataPoint()
    {
        $series = $this->getSeries();

        $dataPoint1 = $this->getMock('Misd\Highcharts\DataPoint\DataPointInterface');
        $dataPoint2 = $this->getMock('Misd\Highcharts\DataPoint\DataPointInterface');

        $this->assertEmpty($series->getDataPoints());
        $this->assertSame($series, $series->addDataPoint($dataPoint1));
        $this->assertSame($series, $series->addDataPoint($dataPoint2));
        $this->assertSame(array($dataPoint1, $dataPoint2), $series->getDataPoints());
        $this->assertSame($series, $series->addData(array(1, 2)));

        $dataPoints = $series->getDataPoints();

        $this->assertSame(1, $dataPoints[2]->getYValue());
        $this->assertSame(2, $dataPoints[3]->getYValue());
    }

    public function testXAxis()
    {
        $series = $this->getSeries();

        $axis = $this->getMock('Misd\Highcharts\Axis\XAxisInterface');

        $this->assertNull($series->getXAxis());
        $this->assertSame($series, $series->setXAxis($axis));
        $this->assertSame($axis, $series->getXAxis());
        $this->assertSame($series, $series->setXAxis(null));
        $this->assertNull($series->getXAxis());
    }

    /**
     * @expectedException \Misd\Highcharts\Exception\InvalidArgumentException
     */
    public function testXAxisInvalidArgumentException()
    {
        $series = $this->getSeries();

        $series->setXAxis('test');
    }

    public function testYAxis()
    {
        $series = $this->getSeries();

        $axis = $this->getMock('Misd\Highcharts\Axis\YAxisInterface');

        $this->assertNull($series->getYAxis());
        $this->assertSame($series, $series->setYAxis($axis));
        $this->assertSame($axis, $series->getYAxis());
        $this->assertSame($series, $series->setYAxis(null));
        $this->assertNull($series->getYAxis());
    }

    /**
     * @expectedException \Misd\Highcharts\Exception\InvalidArgumentException
     */
    public function testYAxisInvalidArgumentException()
    {
        $series = $this->getSeries();

        $series->setYAxis('test');
    }

    public function testLabelsFormatter()
    {
        $series = $this->getSeries();

        $formatter = $this->getMock('Zend\Json\Expr', array(), array('test'));

        $this->assertNull($series->getLabelsFormatter());
        $this->assertSame($series, $series->setLabelsFormatter($formatter));
        $this->assertSame($formatter, $series->getLabelsFormatter());
        $this->assertSame($series, $series->setLabelsFormatter(null));
        $this->assertNull($series->getLabelsFormatter());
    }

    /**
     * @expectedException \Misd\Highcharts\Exception\InvalidArgumentException
     */
    public function testLabelsFormatterInvalidArgumentException()
    {
        $series = $this->getSeries();

        $series->setLabelsFormatter('test');
    }

    public function testEnableMouseTracking()
    {
        $series = $this->getSeries();

        $this->assertTrue($series->isEnableMouseTracking());
        $this->assertSame($series, $series->setEnableMouseTracking(false));
        $this->assertFalse($series->isEnableMouseTracking());
    }

    /**
     * @expectedException \Misd\Highcharts\Exception\InvalidArgumentException
     */
    public function testEnableMouseTrackingInvalidArgumentException()
    {
        $series = $this->getSeries();

        $series->setEnableMouseTracking('test');
    }

    public function testMarker()
    {
        $series = $this->getSeries();

        $this->assertInstanceOf('Misd\Highcharts\Series\Marker\MarkerInterface', $series->getMarker());
    }

    public function testCursor()
    {
        $series = $this->getSeries();

        $this->assertSame($series, $series->setCursor('pointer'));
        $this->assertSame('pointer', $series->getCursor());
        $this->assertSame($series, $series->setCursor(null));
        $this->assertNull($series->getCursor());
    }

    public function testWeight()
    {
        $series = $this->getSeries();

        $this->assertTrue(is_int($series->getWeight()));
        $this->assertSame($series, $series->setWeight(10));
        $this->assertSame(10, $series->getWeight());
    }

    /**
     * @expectedException \Misd\Highcharts\Exception\InvalidArgumentException
     */
    public function testWeightInvalidArgumentException()
    {
        $series = $this->getSeries();

        $series->setWeight('test');
    }
}
