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
 * Abstract complex field element writer
 */
abstract class AbstractComplexField extends Text
{
    /**
     * Write element
     */
    public function write()
    {
        $xmlWriter = $this->getXmlWriter();
        $element = $this->getElement();
        if (!$element instanceof \PhpOffice\PhpWord\Element\AbstractComplexField) {
            return;
        }

        $this->writeOpeningWP();

        $this->writePrefix();

        $xmlWriter->startElement('w:r');
        $xmlWriter->startElement('w:fldChar');
        $xmlWriter->writeAttribute('w:fldCharType', 'begin');
        $xmlWriter->startElement('w:ffData');
        $xmlWriter->startElement('w:name');
        $xmlWriter->writeAttribute('w:val', $this->getText($element->getName()));
        $xmlWriter->endElement(); //w:name
        $xmlWriter->writeAttribute('w:enabled', '');
        $xmlWriter->startElement('w:calcOnExit');
        $xmlWriter->writeAttribute('w:val', '0');
        $xmlWriter->endElement(); //w:calcOnExit
        $this->writeFieldElement();
        $xmlWriter->endElement(); // w:ffData
        $xmlWriter->endElement(); // w:fldChar
        $xmlWriter->endElement(); // w:r

        $xmlWriter->startElement('w:r');
        $xmlWriter->startElement('w:instrText');
        $xmlWriter->writeAttribute('xml:space', 'preserve');
        $xmlWriter->writeRaw($this->getFieldCodes());
        $xmlWriter->endElement();// w:instrText
        $xmlWriter->endElement(); // w:r

        $this->writeLabelElements();

        $xmlWriter->startElement('w:r');
        $xmlWriter->startElement('w:fldChar');
        $xmlWriter->writeAttribute('w:fldCharType', 'separate');
        $xmlWriter->endElement();// w:fldChar
        $xmlWriter->endElement(); // w:r

        $this->writeResultElements();

        $xmlWriter->startElement('w:r');
        $xmlWriter->startElement('w:fldChar');
        $xmlWriter->writeAttribute('w:fldCharType', 'end');
        $xmlWriter->endElement();// w:fldChar
        $xmlWriter->endElement(); // w:r

        $this->writeSuffix();

        $this->writeClosingWP();
    }

    protected abstract function writeFieldElement();
    protected abstract function getFieldCodes();

    protected function writePrefix() {
        // Do nothing.
    }

    protected function writeLabelElements() {
        // Do nothing.
    }

    protected function writeResultElements() {
        // Do nothing.
    }

    protected function writeSuffix() {
        // Do nothing.
    }
}
