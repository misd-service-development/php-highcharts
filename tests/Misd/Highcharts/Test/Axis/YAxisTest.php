<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Misd\Highcharts\Test\Axis;

use Misd\Highcharts\Axis\YAxis;

class YAxisTest extends AbstractAxisTest
{
    /**
     * @return YAxis
     */
    protected function getAxis()
    {
        return new YAxis();
    }

    public function testFactory()
    {
        $this->assertInstanceOf('Misd\Highcharts\Axis\YAxisInterface', YAxis::factory());
    }
}
