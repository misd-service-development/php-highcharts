<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Misd\Highcharts\Test\Axis\Label;

use Misd\Highcharts\Axis\Label\Label;
use Misd\Highcharts\Axis\Label\LabelInterface;
use PHPUnit_Framework_TestCase as TestCase;

class LabelTest extends TestCase
{
    public function testEnabled()
    {
        $label = new Label();

        $this->assertTrue($label->isEnabled());
        $this->assertSame($label, $label->setEnabled(false));
        $this->assertFalse($label->isEnabled());
    }

    /**
     * @expectedException \Misd\Highcharts\Exception\InvalidArgumentException
     */
    public function testEnabledInvalidArgumentException()
    {
        $label = new Label();

        $label->setEnabled(null);
    }

    public function testAlign()
    {
        $label = new Label();

        $this->assertNull($label->getAlign());
        $this->assertSame($label, $label->setAlign(LabelInterface::ALIGN_LEFT));
        $this->assertSame(LabelInterface::ALIGN_LEFT, $label->getAlign());
    }

    /**
     * @expectedException \Misd\Highcharts\Exception\InvalidArgumentException
     */
    public function testAlignInvalidArgumentException()
    {
        $label = new Label();

        $label->setAlign($this->getMock('StdClass'));
    }

    public function testStyle()
    {
        $label = new Label();

        $this->assertSame(array(), $label->getStyles());
        $this->assertSame($label, $label->setStyle('one', 'One'));
        $this->assertSame(array('one' => 'One'), $label->getStyles());
        $this->assertSame($label, $label->setStyles(array('two' => 'Two', 'three' => 'Three')));
        $this->assertSame(array('two' => 'Two', 'three' => 'Three'), $label->getStyles());
        $this->assertSame('Three', $label->getStyle('three'));
        $this->assertNull($label->getStyle('four'));
    }

    public function testXOffset()
    {
        $label = new Label();

        $this->assertNull($label->getXOffset());
        $this->assertSame($label, $label->setXOffset(10));
        $this->assertSame(10, $label->getXOffset());
        $this->assertSame($label, $label->setXOffset(null));
        $this->assertNull($label->getXOffset());
    }

    /**
     * @expectedException \Misd\Highcharts\Exception\InvalidArgumentException
     */
    public function testXOffsetInvalidArgumentException()
    {
        $label = new Label();

        $label->setXOffset('test');
    }

    public function testYOffset()
    {
        $label = new Label();

        $this->assertNull($label->getYOffset());
        $this->assertSame($label, $label->setYOffset(10));
        $this->assertSame(10, $label->getYOffset());
        $this->assertSame($label, $label->setYOffset(null));
        $this->assertNull($label->getYOffset());
    }

    /**
     * @expectedException \Misd\Highcharts\Exception\InvalidArgumentException
     */
    public function testYOffsetInvalidArgumentException()
    {
        $label = new Label();

        $label->setYOffset('test');
    }

    public function testFormatter()
    {
        $label = new Label();

        $formatter = $this->getMock('Zend\Json\Expr', array(), array('test'));

        $this->assertNull($label->getFormatter());
        $this->assertSame($label, $label->setFormatter($formatter));
        $this->assertSame($formatter, $label->getFormatter());
        $this->assertSame($label, $label->setFormatter(null));
        $this->assertNull($label->getFormatter());
    }

    /**
     * @expectedException \Misd\Highcharts\Exception\InvalidArgumentException
     */
    public function testFormatterInvalidArgumentException()
    {
        $label = new Label();

        $label->setFormatter('test');
    }
}
