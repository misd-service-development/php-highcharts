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

class ChartTest extends AbstractChartTest
{
    /**
     * @return Chart
     */
    protected function createChart()
    {
        return new Chart();
    }

    public function testFactory()
    {
        $this->assertInstanceOf('Misd\Highcharts\ChartInterface', Chart::factory());
    }
}
