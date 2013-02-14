<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Misd\Highcharts\Axis\Label;

use Misd\Highcharts\Axis\AxisInterface;
use Misd\Highcharts\Exception\InvalidArgumentException;
use Zend\Json\Expr;

/**
 * Axis label.
 *
 * @author Chris Wilkinson <chris.wilkinson@admin.cam.ac.uk>
 */
class Label implements LabelInterface
{
    /**
     * Constructor.
     *
     * @param AxisInterface $axis Axis.
     */
    public function __construct(AxisInterface $axis)
    {
        $this->axis = $axis;
    }

    /**
     * Axis.
     *
     * @var AxisInterface
     */
    protected $axis;

    /**
     * Gets the axis.
     *
     * @return AxisInterface Axis.
     */
    public function getAxis()
    {
        return $this->axis;
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
     * Alignment.
     *
     * @var string
     */
    protected $align;

    /**
     * {@inheritdoc}
     */
    public function getAlign()
    {
        return $this->align;
    }

    /**
     * {@inheritdoc}
     */
    public function setAlign($align)
    {
        if (false === is_string($align) && false === is_null($align)) {
            throw new InvalidArgumentException();
        }

        $this->align = $align;

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

    /**
     * X-offset.
     *
     * @var int|null
     */
    protected $xOffset;

    /**
     * {@inheritdoc}
     */
    public function getXOffset()
    {
        return $this->xOffset;
    }

    /**
     * {@inheritdoc}
     */
    public function setXOffset($xOffset)
    {
        if (false === is_int($xOffset) && false === is_null($xOffset)) {
            throw new InvalidArgumentException();
        }

        $this->xOffset = $xOffset;

        return $this;
    }

    /**
     * Y-offset.
     *
     * @var int|null
     */
    protected $yOffset;

    /**
     * {@inheritdoc}
     */
    public function getYOffset()
    {
        return $this->yOffset;
    }

    /**
     * {@inheritdoc}
     */
    public function setYOffset($yOffset)
    {
        if (false === is_int($yOffset) && false === is_null($yOffset)) {
            throw new InvalidArgumentException();
        }

        $this->yOffset = $yOffset;

        return $this;
    }

    /**
     * Show first label.
     *
     * @var bool
     */
    protected $showFirst = true;

    /**
     * {@inheritdoc}
     */
    public function isShowFirst()
    {
        return $this->showFirst;
    }

    /**
     * {@inheritdoc}
     */
    public function setShowFirst($showFirst = true)
    {
        if (false === is_bool($showFirst)) {
            throw new InvalidArgumentException();
        }

        $this->showFirst = $showFirst;

        return $this;
    }

    /**
     * Show last label.
     *
     * @var bool
     */
    protected $showLast = true;

    /**
     * {@inheritdoc}
     */
    public function isShowLast()
    {
        return $this->showLast;
    }

    /**
     * {@inheritdoc}
     */
    public function setShowLast($showLast = true)
    {
        if (false === is_bool($showLast)) {
            throw new InvalidArgumentException();
        }

        $this->showLast = $showLast;

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
}
