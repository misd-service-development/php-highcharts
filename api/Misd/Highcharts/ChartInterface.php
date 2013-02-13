<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Misd\Highcharts;

use Misd\Highcharts\Axis\XAxisInterface;
use Misd\Highcharts\Axis\YAxisInterface;
use Misd\Highcharts\Series\SeriesInterface;
use Misd\Highcharts\Tooltip\TooltipInterface;
use Misd\Highcharts\Exception\InvalidArgumentException;

/**
 * Chart interface.
 *
 * @author Chris Wilkinson <chris.wilkinson@admin.cam.ac.uk>
 */
interface ChartInterface
{
    /**
     * Gets the chart ID.
     *
     * This is the HTML element where the chart will be rendered.
     *
     * @return string ID.
     */
    public function getId();

    /**
     * Gets the chart title.
     *
     * @return string Title.
     */
    public function getTitle();

    /**
     * Sets the chart title.
     *
     * @param string $title Chart title.
     *
     * @return self Reference to the chart.
     */
    public function setTitle($title);

    /**
     * Gets the chart subtitle;
     *
     * @return string Subtitle.
     */
    public function getSubtitle();

    /**
     * Sets the chart subtitle.
     *
     * @param string $subtitle Subtitle.
     *
     * @return self Reference to the chart.
     */
    public function setSubtitle($subtitle);

    /**
     * Adds an x-axis.
     *
     * @param XAxisInterface $xAxis X-axis.
     *
     * @return self Reference to the chart.
     */
    public function addXAxis(XAxisInterface $xAxis);

    /**
     * Gets the x-axes.
     *
     * @return XAxisInterface[] X-axis.
     */
    public function getXAxes();

    /**
     * Adds a y-axis.
     *
     * @param YAxisInterface $yAxis Y-axis.
     *
     * @return self Reference to the chart.
     */
    public function addYAxis(YAxisInterface $yAxis);

    /**
     * Gets the y-axes.
     *
     * @return YAxisInterface[] Y-axis.
     */
    public function getYAxes();

    /**
     * Adds a series.
     *
     * @param SeriesInterface|SeriesInterface[] $series Series, or an array of series.
     *
     * @return self Reference to the chart.
     *
     * @throws InvalidArgumentException If an argument is invalid.
     */
    public function addSeries($series);

    /**
     * Gets the series.
     *
     * @return SeriesInterface[] Series.
     */
    public function getSeries();

    /**
     * @return bool
     */
    public function hasLegend();

    /**
     * @param bool $legend
     *
     * @return self Reference to the chart.
     */
    public function setLegend($legend = true);

    /**
     * Gets the tooltip.
     *
     * @return TooltipInterface Tooltip.
     */
    public function getTooltip();
}
