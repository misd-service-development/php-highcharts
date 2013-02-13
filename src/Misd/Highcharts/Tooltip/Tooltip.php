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
use Misd\Highcharts\Exception\InvalidArgumentException;
use Zend\Json\Expr;

class Tooltip implements TooltipInterface
{
    /**
     * Constructor.
     *
     * @param ChartInterface $chart Chart.
     */
    public function __construct(ChartInterface $chart)
    {
        $this->chart= $chart;
    }

    protected $chart;

    /**
     * {@inheritdoc}
     */
    public function getChart()
    {
        return $this->chart;
    }

    /**
     * Formatter.
     *
     * @var Expr|null
     */
    protected $formatter;

    /**
     * {@inheritdoc}
     */
    public function getFormatter()
    {
        return $this->formatter;
    }

    /**
     * {@inheritdoc}
     */
    public function setFormatter($formatter)
    {
        if (false === $formatter instanceof Expr && false === is_null($formatter)) {
            throw new InvalidArgumentException();
        }

        $this->formatter = $formatter;

        return $this;
    }
}
