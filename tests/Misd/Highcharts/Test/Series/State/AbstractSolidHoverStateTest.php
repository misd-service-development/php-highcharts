<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Misd\Highcharts\Test\Series\State;

use Misd\Highcharts\Series\State\AbstractSolidHoverState;

class AbstractSolidHoverStateTest extends AbstractHoverStateTest
{
    /**
     * @return AbstractSolidHoverState
     */
    protected function createState()
    {
        return $this->getMockForAbstractClass(
            'Misd\Highcharts\Series\State\AbstractSolidHoverState',
            array($this->mockSeries)
        );
    }

    public function testBrightness()
    {
        $state = $this->createState();

        $this->assertSame($state, $state->setBrightness(0.5));
        $this->assertSame(0.5, $state->getBrightness());
        $this->assertSame($state, $state->setBrightness(null));
        $this->assertNull($state->getBrightness());
    }

    /**
     * @expectedException \Misd\Highcharts\Exception\InvalidArgumentException
     */
    public function testBrightnessInvalidArgumentException()
    {
        $state = $this->createState();

        $state->setBrightness('test');
    }
}
