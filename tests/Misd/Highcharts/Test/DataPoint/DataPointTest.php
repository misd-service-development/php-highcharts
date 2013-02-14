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

use Misd\Highcharts\DataPoint\DataPoint;

class DataPointTest extends AbstractDataPointTest
{
    /**
     * @return DataPoint
     */
    protected function getDataPoint()
    {
        return new DataPoint();
    }

    public function testFactory()
    {
        $dataPoint = DataPoint::factory(null, null);

        $this->assertInstanceOf('Misd\Highcharts\DataPoint\DataPointInterface', $dataPoint);
        $this->assertNull($dataPoint->getXValue());
        $this->assertNull($dataPoint->getYValue());

        $dataPoint = DataPoint::factory(5, 10);

        $this->assertInstanceOf('Misd\Highcharts\DataPoint\DataPointInterface', $dataPoint);
        $this->assertSame(5, $dataPoint->getXValue());
        $this->assertSame(10, $dataPoint->getYValue());
    }
}
