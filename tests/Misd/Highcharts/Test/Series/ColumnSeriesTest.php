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

use Misd\Highcharts\Series\ColumnSeries;

class ColumnSeriesTest extends AbstractStackableSeriesTest
{
    public function getSeries()
    {
        return new ColumnSeries();
    }
}
