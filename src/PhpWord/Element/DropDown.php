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

/**
 * Dropdown field element
 */
class DropDown extends AbstractComplexField
{
    /**
     * Selectable values
     *
     * @var array
     */
    private $values;

    /**
     * Create new instance
     *
     * @param string $name
     * @param array $values
     * @param mixed $fontStyle
     * @param mixed $paragraphStyle
     * @param string $selected
     * @return self
     */
    public function __construct($name = null, $values = array(), $fontStyle = null, $paragraphStyle = null, $selected = null)
    {
        $this->setValues($values);
        parent::__construct($name, $selected, $fontStyle, $paragraphStyle);
    }

    /**
     * Set selectable values
     *
     * @param array $values
     * @return self
     */
    public function setValues($values)
    {
        $this->values = $values;

        return $this;
    }

    /**
     * Get selectable values
     *
     * @return array
     */
    public function getValues()
    {
        return $this->values;
    }
}
