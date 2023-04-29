<?php
echo "Индекс ПХП";

$array = [
    ['id' => 1, 'date' => '12.01.2020', 'name' => 'test1'],
    ['id' => 2, 'date' => '02.05.2020', 'name' => 'test2'],
    ['id' => 4, 'date' => '08.03.2020', 'name' => 'test4'],
    ['id' => 1, 'date' => '22.01.2020', 'name' => 'test1'],
    ['id' => 2, 'date' => '11.11.2020', 'name' => 'test4'],
    ['id' => 3, 'date' => '06.06.2020', 'name' => 'test3'],
];

var_dump($array);

/**
 * 1 - выделить уникальные записи (убрать дубли) в отдельный массив. в конечном массиве не должно быть элементов с одинаковым id.
 */

/** Простое решение */
//$result_1_1 = [];
//foreach ($array as $key => $value) {
//    $result_1_1[$value['id']] = $value;
//}
//ksort($result_1_1);
//var_dump($result_1_1);
/** Решение  без foreach */
//$column_id = array_column($array, 'id');
//$result_1_2 = array_combine($column_id, $array);
//ksort($result_1_2);
//var_dump($result_1_2);

/**
 * 2 - отсортировать многомерный массив по ключу (любому)
 */
//$column_date = array_column($array, 'date');
//array_multisort($column_date, SORT_ASC, $array);
/** или по другой колонке */
//$column_name = array_column($array, 'name');
//array_multisort($column_name, SORT_ASC, $array);

/**
 * 3 - вернуть из массива только элементы, удовлетворяющие внешним условиям (например элементы с определенным id)
 */
//function getRowById($row)
//{
//    if ($row['id'] === 1) {
//        return $row;
//    }
//}
//$result_3 = array_map('getRowById', $array);
//var_dump($result_3);

/**
 * 4 - изменить в массиве значения и ключи (использовать name => id в качестве пары ключ => значение)
 */
//$column_id = array_unique(array_column($array, 'id'));
//$column_name = array_unique(array_column($array, 'name'));
//$result_4 = array_combine($column_name, $column_id);
//var_dump($result_4);

/**
 * 5 - В базе данных имеется таблица с товарами goods (id INTEGER, name TEXT),
 * таблица с тегами tags (id INTEGER, name TEXT)
 * и таблица связи товаров и тегов goods_tags (tag_id INTEGER, goods_id INTEGER, UNIQUE(tag_id, goods_id)).
 * Выведите id и названия всех товаров, которые имеют все возможные теги в этой базе.
 */
//$sql = 'SELECT g.id, g.name FROM goods_tags gt INNER JOIN goods g on gt.goods_id=g.id INNER JOIN tags t on gt.tag_id=t.id GROUP BY g.id;';

/**
 * 6 - Выбрать без join-ов и подзапросов все департаменты, в которых есть мужчины, и все они (каждый) поставили высокую оценку (строго выше 5).
 */
//$sql = 'SELECT department_id FROM evaluations as e WHERE e.gender=TRUE AND e.value > 5';
