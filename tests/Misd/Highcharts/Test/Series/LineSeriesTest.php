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

use Misd\Highcharts\Series\LineSeries;

class LineSeriesTest extends AbstractSequentialSeriesTest
{
    public function getSeries()
    {
        return new LineSeries();
    }

    public function testFactory()
    {
        $this->assertInstanceOf('Misd\Highcharts\Series\LineSeriesInterface', LineSeries::factory());
    }
}
