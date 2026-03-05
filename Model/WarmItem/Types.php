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

namespace Bydn\ImprovedPageCache\Model\WarmItem;

class Types
{
    const HOME = 'home';
    const PAGES = 'pages';
    const CATEGORIES = 'categories';
    const PRODUCTS = 'products';
    const DIRECT_URL = 'url';

    static public function getAllTypes()
    {
        return [
            self::HOME,
            self::PAGES,
            self::CATEGORIES,
            self::PRODUCTS,
            self::DIRECT_URL,
        ];
    }
}
