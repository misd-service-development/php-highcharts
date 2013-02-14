<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Misd\Highcharts\Series;

use Misd\Highcharts\Axis\XAxisInterface;
use Misd\Highcharts\Axis\YAxisInterface;
use Misd\Highcharts\DataPoint\DataPoint;
use Misd\Highcharts\DataPoint\DataPointInterface;
use Misd\Highcharts\Exception\InvalidArgumentException;
use Misd\Highcharts\Series\Marker\Marker;
use Misd\Highcharts\Series\Marker\MarkerInterface;
use Zend\Json\Expr;

/**
 * Abstract chart series.
 *
 * @author Chris Wilkinson <chris.wilkinson@admin.cam.ac.uk>
 */
abstract class AbstractSeries implements SeriesInterface
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->marker = new Marker($this);
    }

    /**
     * Name.
     *
     * @var string|null
     */
    protected $name;

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Color.
     *
     * @var string
     */
    protected $color;

    /**
     * {@inheritdoc}
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * {@inheritdoc}
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Data points.
     *
     * @var DataPointInterface[]
     */
    protected $dataPoints = array();

    /**
     * {@inheritdoc}
     */
    public function getDataPoints()
    {
        return $this->dataPoints;
    }

    /**
     * {@inheritdoc}
     */
    public function addDataPoint(DataPointInterface $dataPoint)
    {
        $this->dataPoints[] = $dataPoint;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function addData(array $data)
    {
        foreach ($data as $datum) {
            $dataPoint = new DataPoint();
            $dataPoint->setYValue($datum);
            $this->addDataPoint($dataPoint);
        }

        return $this;
    }

    /**
     * X-axis.
     *
     * @var XAxisInterface|null
     */
    protected $xAxis;

    /**
     * {@inheritdoc}
     */
    public function getXAxis()
    {
        return $this->xAxis;
    }

    /**
     * {@inheritdoc}
     */
    public function setXAxis($xAxis)
    {
        if (false === $xAxis instanceof XAxisInterface && false === is_null($xAxis)) {
            throw new InvalidArgumentException();
        }

        $this->xAxis = $xAxis;

        return $this;
    }

    /**
     * Y-axis.
     *
     * @var YAxisInterface|null
     */
    protected $yAxis;

    /**
     * {@inheritdoc}
     */
    public function getYAxis()
    {
        return $this->yAxis;
    }

    /**
     * {@inheritdoc}
     */
    public function setYAxis($yAxis)
    {
        if (false === $yAxis instanceof YAxisInterface && false === is_null($yAxis)) {
            throw new InvalidArgumentException();
        }

        $this->yAxis = $yAxis;

        return $this;
    }

    /**
     * Labels formatter.
     *
     * @var Expr|null
     */
    protected $labelsFormatter;

    /**
     * {@inheritdoc}
     */
    public function getLabelsFormatter()
    {
        return $this->labelsFormatter;
    }

    /**
     * {@inheritdoc}
     */
    public function setLabelsFormatter($labelsFormatter)
    {
        if (false === $labelsFormatter instanceof Expr && false === is_null($labelsFormatter)) {
            throw new InvalidArgumentException();
        }

        $this->labelsFormatter = $labelsFormatter;

        return $this;
    }

    /**
     * Marker.
     *
     * @var MarkerInterface
     */
    protected $marker;

    /**
     * {@inheritdoc}
     */
    public function getMarker()
    {
        return $this->marker;
    }

    /**
     * Is enable mouse tracking.
     *
     * @var bool
     */
    protected $enableMouseTracking = true;

    /**
     * {@inheritdoc}
     */
    public function isEnableMouseTracking()
    {
        return $this->enableMouseTracking;
    }

    /**
     * {@inheritdoc}
     */
    public function setEnableMouseTracking($enableMouseTracking = true)
    {
        if (false === is_bool($enableMouseTracking)) {
            throw new InvalidArgumentException();
        }

        $this->enableMouseTracking = $enableMouseTracking;

        return $this;
    }

    /**
     * Weight.
     *
     * @var int
     */
    protected $weight = 0;

    /**
     * {@inheritdoc}
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * {@inheritdoc}
     */
    public function setWeight($weight)
    {
        if (false === is_int($weight)) {
            throw new InvalidArgumentException();
        }

        $this->weight = $weight;

        return $this;
    }
}
