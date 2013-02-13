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

use Misd\Highcharts\Exception\InvalidArgumentException;
use Zend\Json\Expr;

interface FormatableInterface
{
    /**
     * Gets the formatter.
     *
     * @return Expr|null Formatter, or `null` if not set.
     */
    public function getFormatter();

    /**
     * Sets the formatter.
     *
     * @param Expr|null $formatter Formatter, or `null` to remove a set value.
     *
     * @return self Reference to the tooltip.
     *
     * @throws InvalidArgumentException If an argument is invalid.
     */
    public function setFormatter($formatter);
}
