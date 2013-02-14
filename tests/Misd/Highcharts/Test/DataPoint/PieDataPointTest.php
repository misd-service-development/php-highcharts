<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Misd\Highcharts\Test\DataPoint;

use Misd\Highcharts\DataPoint\PieDataPoint;

class PieDataPointTest extends AbstractDataPointTest
{
    /**
     * @return PieDataPoint
     */
    protected function getDataPoint()
    {
        return new PieDataPoint();
    }

    public function testFactory()
    {
        $this->assertInstanceOf('Misd\Highcharts\DataPoint\PieDataPointInterface', PieDataPoint::factory());
    }

    public function testSliced()
    {
        $dataPoint = new PieDataPoint();

        $this->assertFalse($dataPoint->isSliced());
        $this->assertSame($dataPoint, $dataPoint->setSliced(true));
        $this->assertTrue($dataPoint->isSliced());
    }

    /**
     * @expectedException \Misd\Highcharts\Exception\InvalidArgumentException
     */
    public function testSlicedInvalidArgumentException()
    {
        $dataPoint = new PieDataPoint();

        $dataPoint->setSliced(null);
    }
}
