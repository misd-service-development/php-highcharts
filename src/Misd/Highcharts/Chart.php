<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Misd\Highcharts;

class Chart extends AbstractChart
{
    /**
     * Factory method.
     *
     * @return ChartInterface New chart.
     */
    public static function factory()
    {
        return new self();
    }
}
