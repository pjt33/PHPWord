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

namespace PhpOffice\PhpWord\Writer\Word2007\Element;

/**
 * CheckBox element writer
 *
 * @since 0.10.0
 */
class CheckBox extends AbstractComplexField
{
    /**
     * Write element
     */
    public function write()
    {
        $element = $this->getElement();
        if ($element instanceof \PhpOffice\PhpWord\Element\CheckBox) {
            parent::write();
        }
    }

    protected function writeFieldElement()
    {
        $xmlWriter = $this->getXmlWriter();
        $element = $this->getElement();

        $xmlWriter->startElement('w:checkBox');
        $xmlWriter->writeAttribute('w:sizeAuto', '');
        $xmlWriter->startElement('w:default');
        $xmlWriter->writeAttribute('w:val', 0);
        $xmlWriter->endElement(); //w:default
        if ($element->getChecked()) {
            $xmlWriter->startElement('w:checked');
            $xmlWriter->endElement(); // w:checked
        }
        $xmlWriter->endElement(); //w:checkBox
    }

    protected function getFieldCodes()
    {
        return ' FORMCHECKBOX ';
    }

    protected function writeSuffix() {
        $xmlWriter = $this->getXmlWriter();
        $element = $this->getElement();

        $xmlWriter->startElement('w:r');
        $this->writeFontStyle();
        $xmlWriter->startElement('w:t');
        $xmlWriter->writeAttribute('xml:space', 'preserve');
        $xmlWriter->writeRaw($this->getText($element->getText()));
        $xmlWriter->endElement(); // w:t
        $xmlWriter->endElement(); // w:r
    }
}
