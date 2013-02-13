<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Misd\Highcharts\Axis;

use Misd\Highcharts\Axis\Label\Label;
use Misd\Highcharts\Axis\Label\LabelInterface;
use Misd\Highcharts\Axis\Title\Title;
use Misd\Highcharts\Axis\Title\TitleInterface;
use Misd\Highcharts\Exception\InvalidArgumentException;

/**
 * Abstract axis.
 *
 * @author Chris Wilkinson <chris.wilkinson@admin.cam.ac.uk>
 */
abstract class AbstractAxis implements AxisInterface
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->title = new Title($this);
        $this->label = new Label($this);
    }

    /**
     * Title.
     *
     * @var TitleInterface
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
     * Label.
     *
     * @var LabelInterface
     */
    protected $label;

    /**
     * {@inheritdoc}
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Categories.
     *
     * @var array
     */
    protected $categories = array();

    /**
     * {@inheritdoc}
     */
    public function getCategory($id)
    {
        return array_key_exists($id, $this->categories) ? $this->categories[$id] : null;
    }

    /**
     * {@inheritdoc}
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * {@inheritdoc}
     */
    public function addCategory($id, $name)
    {
        $this->categories[$id] = $name;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function addCategories(array $categories)
    {
        $this->categories = array_merge($this->categories, $categories);

        return $this;
    }

    /**
     * Is opposite.
     *
     * @var bool
     */
    protected $opposite = false;

    /**
     * {@inheritdoc}
     */
    public function isOpposite()
    {
        return $this->opposite;
    }

    /**
     * {@inheritdoc}
     */
    public function setOpposite($opposite = true)
    {
        if (false === is_bool($opposite)) {
            throw new InvalidArgumentException();
        }

        $this->opposite = $opposite;

        return $this;
    }

    /**
     * Show first label.
     *
     * @var bool
     */
    protected $showFirstLabel = true;

    /**
     * {@inheritdoc}
     */
    public function isShowFirstLabel()
    {
        return $this->showFirstLabel;
    }

    /**
     * {@inheritdoc}
     */
    public function setShowFirstLabel($showFirstLabel = true)
    {
        if (false === is_bool($showFirstLabel)) {
            throw new InvalidArgumentException();
        }

        $this->showFirstLabel = $showFirstLabel;

        return $this;
    }

    /**
     * Show last label.
     *
     * {@inheritdoc}
     */
    protected $showLastLabel = true;

    /**
     * {@inheritdoc}
     */
    public function isShowLastLabel()
    {
        return $this->showLastLabel;
    }

    /**
     * {@inheritdoc}
     */
    public function setShowLastLabel($showLastLabel = true)
    {
        if (false === is_bool($showLastLabel)) {
            throw new InvalidArgumentException();
        }

        $this->showLastLabel = $showLastLabel;

        return $this;
    }

    /**
     * Tick width.
     *
     * @var int
     */
    protected $tickWidth = 0;

    /**
     * {@inheritdoc}
     */
    public function getTickWidth()
    {
        return $this->tickWidth;
    }

    /**
     * {@inheritdoc}
     */
    public function setTickWidth($tickWidth)
    {
        if (false === is_int($tickWidth)) {
            throw new InvalidArgumentException();
        }

        $this->tickWidth = $tickWidth;

        return $this;
    }
}
