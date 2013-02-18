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
use Misd\Highcharts\Credit\Credit;
use Misd\Highcharts\Credit\CreditInterface;
use Misd\Highcharts\Exception\InvalidArgumentException;
use Misd\Highcharts\Series\SeriesInterface;
use Misd\Highcharts\Tooltip\Tooltip;
use Misd\Highcharts\Tooltip\TooltipInterface;

/**
 * Abstract chart.
 *
 * @author Chris Wilkinson <chris.wilkinson@admin.cam.ac.uk>
 */
abstract class AbstractChart implements ChartInterface
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->id = 'chart_' . uniqid();
        $this->tooltip = new Tooltip($this);
        $this->credit = new Credit($this);
    }

    /**
     * ID.
     *
     * @var string
     */
    protected $id;

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Title.
     *
     * @var string
     */
    protected $title;

    /**
     * {@inheritdoc}
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * {@inheritdoc}
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Subtitle.
     *
     * @var string
     */
    protected $subtitle;

    /**
     * {@inheritdoc}
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * {@inheritdoc}
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    /**
     * X-axes.
     *
     * @var XAxisInterface[]
     */
    protected $xAxes = array();

    /**
     * {@inheritdoc}
     */
    public function addXAxis(XAxisInterface $xAxis)
    {
        $this->xAxes[] = $xAxis;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getXAxes()
    {
        return $this->xAxes;
    }

    /**
     * {@inheritdoc}
     */
    public function getXAxis($key)
    {
        return array_key_exists($key, $this->xAxes) ? $this->xAxes[$key] : null;
    }

    /**
     * Y-axes.
     *
     * @var YAxisInterface[]
     */
    protected $yAxes = array();

    /**
     * {@inheritdoc}
     */
    public function addYAxis(YAxisInterface $yAxis)
    {
        $this->yAxes[] = $yAxis;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getYAxes()
    {
        return $this->yAxes;
    }

    /**
     * {@inheritdoc}
     */
    public function getYAxis($key)
    {
        return array_key_exists($key, $this->yAxes) ? $this->yAxes[$key] : null;
    }

    /**
     * Series.
     *
     * @var SeriesInterface[]
     */
    protected $series = array();

    /**
     * {@inheritdoc}
     */
    public function addSeries($series)
    {
        if (false === is_array($series)) {
            $series = array($series);
        }

        foreach ($series as $individualSeries) {
            if (false === $individualSeries instanceof SeriesInterface) {
                throw new InvalidArgumentException();
            }
        }

        $this->series = array_merge($this->series, array_values($series));

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * {@inheritdoc}
     */
    public function clearSeries()
    {
        $this->series = array();

        return $this;
    }

    /**
     * Whether to show the legend.
     *
     * @var bool
     */
    protected $legend = true;

    /**
     * {@inheritdoc}
     */
    public function hasLegend()
    {
        return $this->legend;
    }

    /**
     * {@inheritdoc}
     */
    public function setLegend($legend = true)
    {
        if (false === is_bool($legend)) {
            throw new InvalidArgumentException();
        }

        $this->legend = $legend;

        return $this;
    }

    /**
     * Tooltip.
     *
     * @var TooltipInterface
     */
    protected $tooltip;

    /**
     * {@inheritdoc}
     */
    public function getTooltip()
    {
        return $this->tooltip;
    }

    /**
     * Credit.
     *
     * @var CreditInterface
     */
    protected $credit;

    /**
     * {@inheritdoc}
     */
    public function getCredit()
    {
        return $this->credit;
    }
}
