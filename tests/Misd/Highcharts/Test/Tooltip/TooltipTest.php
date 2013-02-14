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
     * @var ChartInterface
     */
    protected $mockChart;

    public function setUp()
    {
        $this->mockChart = $this->getMock('Misd\Highcharts\ChartInterface');
    }

    /**
     * @return Tooltip
     */
    protected function createTooltip()
    {
        return new Tooltip($this->mockChart);
    }

    public function testChart()
    {
        $tooltip = $this->createTooltip();

        $this->assertSame($this->mockChart, $tooltip->getChart());
    }

    public function testEnabled()
    {
        $tooltip = $this->createTooltip();

        $this->assertTrue($tooltip->isEnabled());
        $this->assertSame($tooltip, $tooltip->setEnabled(false));
        $this->assertFalse($tooltip->isEnabled());
    }

    /**
     * @expectedException \Misd\Highcharts\Exception\InvalidArgumentException
     */
    public function testEnabledInvalidArgumentException()
    {
        $tooltip = $this->createTooltip();

        $tooltip->setEnabled(null);
    }

    public function testFormatter()
    {
        $tooltip = $this->createTooltip();

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
        $tooltip = $this->createTooltip();

        $tooltip->setFormatter('test');
    }

    public function testStyle()
    {
        $tooltip = $this->createTooltip();

        $this->assertSame(array(), $tooltip->getStyles());
        $this->assertSame($tooltip, $tooltip->setStyle('one', 'One'));
        $this->assertSame(array('one' => 'One'), $tooltip->getStyles());
        $this->assertSame($tooltip, $tooltip->setStyles(array('two' => 'Two', 'three' => 'Three')));
        $this->assertSame(array('two' => 'Two', 'three' => 'Three'), $tooltip->getStyles());
        $this->assertSame('Three', $tooltip->getStyle('three'));
        $this->assertNull($tooltip->getStyle('four'));
    }
}
