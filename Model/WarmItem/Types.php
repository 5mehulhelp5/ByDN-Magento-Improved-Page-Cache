<?php

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
