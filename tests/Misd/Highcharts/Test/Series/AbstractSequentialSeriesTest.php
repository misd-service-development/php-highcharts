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

use Misd\Highcharts\Series\AbstractSequentialSeries;

class AbstractSequentialSeriesTest extends AbstractSeriesTest
{
    /**
     * @return AbstractSequentialSeries
     */
    protected function getSeries()
    {
        return $this->getMockForAbstractClass('Misd\Highcharts\Series\AbstractSequentialSeries');
    }

    public function testPointStart()
    {
        $series = $this->getSeries();

        $this->assertNull($series->getPointStart());
        $this->assertSame($series, $series->setPointStart(10));
        $this->assertSame(10, $series->getPointStart());
        $this->assertSame($series, $series->setPointStart(null));
        $this->assertNull($series->getPointStart());
    }

    /**
     * @expectedException \Misd\Highcharts\Exception\InvalidArgumentException
     */
    public function testPointStartInvalidArgumentException()
    {
        $series = $this->getSeries();

        $series->setPointStart('test');
    }

    public function testColor()
    {
        $series = $this->getSeries();

            $this->assertNull($series->getPointStart());
            $this->assertSame($series, $series->setPointStart(10));
            $this->assertSame(10, $series->getPointStart());
            $this->assertSame($series, $series->setPointStart(null));
            $this->assertNull($series->getPointStart());
    }
}
