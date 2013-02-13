<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Misd\Highcharts\Renderer;

use Misd\Highcharts\ChartInterface;

interface RendererInterface
{
    /**
     * @param ChartInterface $chart
     * @param string         $element
     * @param array          $attributes
     *
     * @return string
     */
    public function renderContainer(ChartInterface $chart, $element = 'div', $attributes = array());

    /**
     * @param ChartInterface $chart
     *
     * @return string
     */
    public function render(ChartInterface $chart);
}
