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

class Type implements OptionSourceInterface
{
    public const HOME       = 'home';
    public const PAGES      = 'pages';
    public const CATEGORIES = 'categories';
    public const PRODUCTS   = 'products';
    public const DIRECT_URL = 'url';

    /**
     * @return array
     */
    public static function getAllTypes(): array
    {
        return [
            self::HOME,
            self::PAGES,
            self::CATEGORIES,
            self::PRODUCTS,
            self::DIRECT_URL,
        ];
    }

    /**
     * @return array
     */
    public function toOptionArray(): array
    {
        return [
            ['value' => self::HOME,       'label' => __('Home')],
            ['value' => self::PAGES,      'label' => __('CMS Pages')],
            ['value' => self::CATEGORIES, 'label' => __('Categories')],
            ['value' => self::PRODUCTS,   'label' => __('Products')],
            ['value' => self::DIRECT_URL, 'label' => __('Direct URL')],
        ];
    }
}
