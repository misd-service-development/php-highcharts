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

use Misd\Highcharts\Axis\AbstractAxis;
use PHPUnit_Framework_TestCase as TestCase;

class AbstractAxisTest extends TestCase
{
    /**
     * @return AbstractAxis
     */
    protected function getAxis()
    {
        return $this->getMockForAbstractClass('Misd\Highcharts\Axis\AbstractAxis');
    }

    public function testTooltip()
    {
        $axis = $this->getAxis();

        $this->assertInstanceOf('Misd\Highcharts\Axis\Title\TitleInterface', $axis->getTitle());
    }

    public function testLabel()
    {
        $axis = $this->getAxis();

        $this->assertInstanceOf('Misd\Highcharts\Axis\Label\LabelInterface', $axis->getLabel());
    }

    public function testCategories()
    {
        $axis = $this->getAxis();

        $this->assertSame(array(), $axis->getCategories());
        $this->assertSame($axis, $axis->addCategory('one', 'One'));
        $this->assertSame($axis, $axis->addCategories(array('two' => 'Two', 'three' => 'Three')));
        $this->assertSame(array('one' => 'One', 'two' => 'Two', 'three' => 'Three'), $axis->getCategories());
        $this->assertSame('Three', $axis->getCategory('three'));
        $this->assertNull($axis->getCategory('four'));
    }

    public function testOpposite()
    {
        $axis = $this->getAxis();

        $this->assertFalse($axis->isOpposite());
        $this->assertSame($axis, $axis->setOpposite());
        $this->assertTrue($axis->isOpposite());
    }

    /**
     * @expectedException \Misd\Highcharts\Exception\InvalidArgumentException
     */
    public function testOppositeInvalidArgumentException()
    {
        $axis = $this->getAxis();

        $axis->setOpposite(null);
    }

    public function testShowFirstLabel()
    {
        $axis = $this->getAxis();

        $this->assertTrue($axis->isShowFirstLabel());
        $this->assertSame($axis, $axis->setShowFirstLabel(false));
        $this->assertFalse($axis->isShowFirstLabel());
    }

    /**
     * @expectedException \Misd\Highcharts\Exception\InvalidArgumentException
     */
    public function testShowFirstLabelInvalidArgumentException()
    {
        $axis = $this->getAxis();

        $axis->setShowFirstLabel(null);
    }

    public function testShowLastLabel()
    {
        $axis = $this->getAxis();

        $this->assertTrue($axis->isShowLastLabel());
        $this->assertSame($axis, $axis->setShowLastLabel(false));
        $this->assertFalse($axis->isShowLastLabel());
    }

    /**
     * @expectedException \Misd\Highcharts\Exception\InvalidArgumentException
     */
    public function testShowLastLabelInvalidArgumentException()
    {
        $axis = $this->getAxis();

        $axis->setShowLastLabel(null);
    }

    public function testTickWidth()
    {
        $axis = $this->getAxis();

        $this->assertTrue(is_int($axis->getTickWidth()));
        $this->assertSame($axis, $axis->setTickWidth(10));
        $this->assertSame(10, $axis->getTickWidth());
    }

    /**
     * @expectedException \Misd\Highcharts\Exception\InvalidArgumentException
     */
    public function testTickWidthInvalidArgumentException()
    {
        $axis = $this->getAxis();

        $axis->setTickWidth(null);
    }

    public function testGridLineWidth()
    {
        $axis = $this->getAxis();

        $this->assertTrue(is_int($axis->getGridLineWidth()));
        $this->assertSame($axis, $axis->setGridLineWidth(10));
        $this->assertSame(10, $axis->getGridLineWidth());
    }

    /**
     * @expectedException \Misd\Highcharts\Exception\InvalidArgumentException
     */
    public function testGridLineWidthInvalidArgumentException()
    {
        $axis = $this->getAxis();

        $axis->setGridLineWidth(null);
    }
}
