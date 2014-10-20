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

namespace PhpOffice\PhpWord;

/**
 * Document settings
 */
class DocumentSettings
{
    /** @const string Document protection constants */
    const PROTECTION_EDIT_RESTRICTIONS_NONE = 'none';
    const PROTECTION_EDIT_RESTRICTIONS_READ_ONLY = 'readOnly';
    const PROTECTION_EDIT_RESTRICTIONS_COMMENTS = 'comments';
    const PROTECTION_EDIT_RESTRICTIONS_TRACKED_CHANGES = 'trackedChanges';
    const PROTECTION_EDIT_RESTRICTIONS_FORMS = 'forms';

    /**
     * Document editing restrictions
     *
     * @var string
     */
    private $editRestrictions;

    /**
     * Create new DocumentSettings
     */
    public function __construct()
    {
        $this->editRestrictions = self::PROTECTION_EDIT_RESTRICTIONS_NONE;
    }

    /**
     * Get document editing restrictions
     *
     * @return string
     */
    public function getEditRestrictions()
    {
        return $this->editRestrictions;
    }

    /**
     * Set document editing restrictions
     *
     * @param  string $value
     * @return self
     */
    public function setEditRestrictions($value = 'none')
    {
        if ($value === null || $value === '') {
            $value = 'none';
        }

        switch ($value) {
            case self::PROTECTION_EDIT_RESTRICTIONS_NONE:
            case self::PROTECTION_EDIT_RESTRICTIONS_READ_ONLY:
            case self::PROTECTION_EDIT_RESTRICTIONS_COMMENTS:
            case self::PROTECTION_EDIT_RESTRICTIONS_TRACKED_CHANGES:
            case self::PROTECTION_EDIT_RESTRICTIONS_FORMS:
                $this->editRestrictions = $value;
                break;

            default:
                throw new \InvalidArgumentException('Invalid document editing restrictions value.');
        }

        return $this;
    }
}
