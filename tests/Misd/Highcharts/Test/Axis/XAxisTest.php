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

use Misd\Highcharts\Axis\XAxis;

class XAxisTest extends AbstractAxisTest
{
    /**
     * @return XAxis
     */
    protected function getAxis()
    {
        return new XAxis();
    }

    public function testFactory()
    {
        $this->assertInstanceOf('Misd\Highcharts\Axis\XAxisInterface', XAxis::factory());
    }
}
