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

use Misd\Highcharts\Axis\AxisInterface;
use Misd\Highcharts\Axis\Label\Label;
use Misd\Highcharts\Axis\Label\LabelInterface;
use PHPUnit_Framework_TestCase as TestCase;

class LabelTest extends TestCase
{
    /**
     * @var AxisInterface
     */
    protected $mockAxis;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        $this->mockAxis = $this->getMock('Misd\Highcharts\Axis\AxisInterface');
    }

    /**
     * @return Label
     */
    protected function createLabel()
    {
        return new Label($this->mockAxis);
    }

    public function testAxis()
    {
        $label = $this->createLabel();

        $this->assertSame($this->mockAxis, $label->getAxis());
    }

    public function testEnabled()
    {
        $label = $this->createLabel();

        $this->assertTrue($label->isEnabled());
        $this->assertSame($label, $label->setEnabled(false));
        $this->assertFalse($label->isEnabled());
    }

    /**
     * @expectedException \Misd\Highcharts\Exception\InvalidArgumentException
     */
    public function testEnabledInvalidArgumentException()
    {
        $label = $this->createLabel();

        $label->setEnabled(null);
    }

    public function testAlign()
    {
        $label = $this->createLabel();

        $this->assertNull($label->getAlign());
        $this->assertSame($label, $label->setAlign(LabelInterface::ALIGN_LEFT));
        $this->assertSame(LabelInterface::ALIGN_LEFT, $label->getAlign());
    }

    /**
     * @expectedException \Misd\Highcharts\Exception\InvalidArgumentException
     */
    public function testAlignInvalidArgumentException()
    {
        $label = $this->createLabel();

        $label->setAlign($this->getMock('StdClass'));
    }

    public function testStyle()
    {
        $label = $this->createLabel();

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
        $label = $this->createLabel();

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
        $label = $this->createLabel();

        $label->setXOffset('test');
    }

    public function testYOffset()
    {
        $label = $this->createLabel();

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
        $label = $this->createLabel();

        $label->setYOffset('test');
    }

    public function testShowFirst()
    {
        $label = $this->createLabel();

        $this->assertTrue($label->isShowFirst());
        $this->assertSame($label, $label->setShowFirst(false));
        $this->assertFalse($label->isShowFirst());
    }

    /**
     * @expectedException \Misd\Highcharts\Exception\InvalidArgumentException
     */
    public function testShowFirstInvalidArgumentException()
    {
        $label = $this->createLabel();

        $label->setShowFirst(null);
    }

    public function testShowLast()
    {
        $label = $this->createLabel();

        $this->assertTrue($label->isShowLast());
        $this->assertSame($label, $label->setShowLast(false));
        $this->assertFalse($label->isShowLast());
    }

    /**
     * @expectedException \Misd\Highcharts\Exception\InvalidArgumentException
     */
    public function testShowLastInvalidArgumentException()
    {
        $label = $this->createLabel();

        $label->setShowLast(null);
    }

    public function testFormatter()
    {
        $label = $this->createLabel();

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
        $label = $this->createLabel();

        $label->setFormatter('test');
    }
}
