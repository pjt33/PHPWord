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
 * TextFormField element writer
 */
class TextFormField extends AbstractComplexField
{
    /**
     * Write element
     */
    public function write()
    {
        $element = $this->getElement();
        if ($element instanceof \PhpOffice\PhpWord\Element\TextFormField) {
            parent::write();
        }
    }

    protected function writeFieldElement()
    {
        $xmlWriter = $this->getXmlWriter();
        $element = $this->getElement();

        $xmlWriter->startElement('w:textInput');
        $xmlWriter->endElement(); //w:textInput
    }

    protected function getFieldCodes()
    {
        return ' FORMTEXT ';
    }

    protected function writeResultElements(){
        $xmlWriter = $this->getXmlWriter();
        $element = $this->getElement();
        $text = $element->getText();

        // Mimic the "empty" value used by Word itself.
        // json_decode trick from http://stackoverflow.com/a/6058533
        if (!$text) {
            $text = json_decode('"\u2002\u2002\u2002\u2002\u2002"');
        }

        $xmlWriter->startElement('w:r');
        $this->writeFontStyle();
        $xmlWriter->startElement('w:t');
        $xmlWriter->writeAttribute('xml:space', 'preserve');
        $xmlWriter->writeRaw($this->getText($text));
        $xmlWriter->endElement(); // w:t
        $xmlWriter->endElement(); // w:r
    }
}
