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
     * Is enabled.
     *
     * @var bool
     */
    protected $enabled = true;

    /**
     * {@inheritdoc}
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * {@inheritdoc}
     */
    public function setEnabled($enabled = true)
    {
        if (false === is_bool($enabled)) {
            throw new InvalidArgumentException();
        }

        $this->enabled = $enabled;

        return $this;
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

    /**
     * Styles.
     *
     * @var array
     */
    protected $styles = array();

    /**
     * {@inheritdoc}
     */
    public function getStyle($key)
    {
        return array_key_exists($key, $this->styles) ? $this->styles[$key] : null;
    }

    /**
     * {@inheritdoc}
     */
    public function getStyles()
    {
        return $this->styles;
    }

    /**
     * {@inheritdoc}
     */
    public function setStyle($key, $value)
    {
        $this->styles[$key] = $value;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setStyles(array $styles)
    {
        $this->styles = $styles;

        return $this;
    }
}
