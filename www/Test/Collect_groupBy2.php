<?php

namespace Test;

include_once __DIR__ . '/../../vendor/autoload.php';


class Categories
{
    private static $categories = [
        [
            'id' => 1,
            'title' => 'Наука',
            'name' => 'science'
        ],
        [
            'id' => 2,
            'title' => 'Спорт',
            'name' => 'sport',
        ],
        [
            'id' => 3,
            'title' => 'Культура',
            'name' => 'culture',
        ]
    ];

    /**
     * @return array[]
     */
    public static function getCategories(): array
    {
        return static::$categories;
    }

    /**
     * @param $name
     * @return int|null
     */
    public static function getCategoryIdByName($name): ?int
    {
        $collection = collect(static::$categories);
        $id = $collection->groupBy('name')->get($name);
        return $id ? $id->first()['id'] : null;
    }
}

echo '<pre>';
var_dump(Categories::getCategoryIdByName('culture'));
echo '</pre>';
