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

class Priority implements OptionSourceInterface
{
    public const LOWEST  = 1;
    public const LOW     = 2;
    public const MEDIUM  = 3;
    public const HIGH    = 4;
    public const HIGHEST = 5;

    /**
     * @return array
     */
    public function toOptionArray(): array
    {
        return [
            ['value' => self::LOWEST,  'label' => __('Lowest')],
            ['value' => self::LOW,     'label' => __('Low')],
            ['value' => self::MEDIUM,  'label' => __('Medium')],
            ['value' => self::HIGH,    'label' => __('High')],
            ['value' => self::HIGHEST, 'label' => __('Highest')],
        ];
    }
}
