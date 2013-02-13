<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Misd\Highcharts\Test\Tooltip;

use Misd\Highcharts\ChartInterface;
use Misd\Highcharts\Tooltip\Tooltip;
use PHPUnit_Framework_TestCase as TestCase;

class TooltipTest extends TestCase
{
    /**
     * @return ChartInterface
     */
    protected function getMockChart()
    {
        return $this->getMock('Misd\Highcharts\ChartInterface');
    }

    /**
     * @return Tooltip
     */
    protected function getTooltip()
    {
        return new Tooltip($this->getMockChart());
    }

    public function testFormatter()
    {
        $tooltip = $this->getTooltip();

        $formatter = $this->getMock('Zend\Json\Expr', array(), array('test'));

        $this->assertNull($tooltip->getFormatter());
        $this->assertSame($tooltip, $tooltip->setFormatter($formatter));
        $this->assertSame($formatter, $tooltip->getFormatter());
        $this->assertSame($tooltip, $tooltip->setFormatter(null));
        $this->assertNull($tooltip->getFormatter());
    }

    /**
     * @expectedException \Misd\Highcharts\Exception\InvalidArgumentException
     */
    public function testFormatterInvalidArgumentException()
    {
        $tooltip = $this->getTooltip();

        $tooltip->setFormatter('test');
    }
}
