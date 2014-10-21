<?php
/**
 * This file is part of PHPWord - A pure PHP library for reading and writing
 * word processing documents.
 *
 * PHPWord is free software distributed under the terms of the GNU Lesser
 * General Public License version 3 as published by the Free Software Foundation.
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code. For the full list of
 * contributors, visit https://github.com/PHPOffice/PHPWord/contributors.
 *
 * @link        https://github.com/PHPOffice/PHPWord
 * @copyright   2010-2014 PHPWord contributors
 * @license     http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 */

namespace PhpOffice\PhpWord\Element;

use PhpOffice\PhpWord\Style\Cell as CellStyle;

/**
 * Table cell element
 */
class Cell extends AbstractContainer
{
    /**
     * @var string Container type
     */
    protected $container = 'Cell';

    /**
     * Cell width
     *
     * @var int
     */
    private $width = null;

    /**
     * Cell width unit
     *
     * @var string Width unit
     */
    private $unit = null;

    /**
     * Cell style
     *
     * @var \PhpOffice\PhpWord\Style\Cell
     */
    private $style;

    /**
     * Create new instance
     *
     * @param int|array $width
     * @param array|\PhpOffice\PhpWord\Style\Cell $style
     */
    public function __construct($width = null, $style = null)
    {
        if (is_array($width)) {
            $this->width = isset($width['width']) ? $width['width'] : null;
            $this->unit = isset($width['unit']) ? $width['unit'] : null;
        }
        else $this->width = $width;

        if ($this->unit === null) {
            // Fallback is to twip for backwards compatibility.
            $this->unit = $this->width === null ? \PhpOffice\PhpWord\Style\Table::WIDTH_AUTO : \PhpOffice\PhpWord\Style\Table::WIDTH_TWIP;
        }

        $this->style = $this->setStyle(new CellStyle(), $style, true);
    }

    /**
     * Get cell style
     *
     * @return \PhpOffice\PhpWord\Style\Cell
     */
    public function getStyle()
    {
        return $this->style;
    }

    /**
     * Get cell width
     *
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Get width unit
     *
     * @return string
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * Set width unit
     *
     * @param string $value
     * @return self
     */
    public function setUnit($value = null)
    {
        $enum = array(Table::WIDTH_AUTO, Table::WIDTH_PERCENT, Table::WIDTH_TWIP);
        $this->unit = $this->setEnumVal($value, $enum, $this->unit);

        return $this;
    }
}
