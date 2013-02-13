<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Misd\Highcharts\Tooltip;

use Misd\Highcharts\ChartInterface;
use Misd\Highcharts\FormatableInterface;
use Misd\Highcharts\StyleableInterface;

interface TooltipInterface extends FormatableInterface, StyleableInterface
{
    /**
     * Gets the chart.
     *
     * @return ChartInterface Chart.
     */
    public function getChart();

    /**
     * Whether the tooltip is enabled.
     *
     * @return bool `true` if enabled, otherwise `false`.
     */
    public function isEnabled();

    /**
     * Sets whether the tooltip is enabled.
     *
     * @param bool $enabled `true` if enabled, otherwise `false`.
     *
     * @return self Reference to the tooltip.
     */
    public function setEnabled($enabled = true);
}
