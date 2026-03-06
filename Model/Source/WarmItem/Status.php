<?php
/**
 * @package     Bydn_ImprovedPageCache
 * @author      Daniel Navarro <https://github.com/danidnm>
 * @license     GPL-3.0-or-later
 * @copyright   Copyright (c) 2025 Daniel Navarro
 *
 * This file is part of a free software package licensed under the
 * GNU General Public License v3.0.
 * You may redistribute and/or modify it under the same license.
 */

namespace Bydn\ImprovedPageCache\Model\Source\WarmItem;

use Magento\Framework\Data\OptionSourceInterface;

class Status implements OptionSourceInterface
{
    public const NEW        = 1;
    public const PROCESSING = 2;
    public const DONE       = 3;
    public const ERROR      = 4;
    public const DISABLED   = 5;

    /**
     * @return array
     */
    public function toOptionArray(): array
    {
        return [
            ['value' => self::NEW,        'label' => __('New')],
            ['value' => self::PROCESSING, 'label' => __('Processing')],
            ['value' => self::DONE,       'label' => __('Done')],
            ['value' => self::ERROR,      'label' => __('Error')],
            ['value' => self::DISABLED,   'label' => __('Disabled')],
        ];
    }
}
