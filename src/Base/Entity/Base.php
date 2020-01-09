<?php


namespace App\Base\Entity;


abstract class Base
{
    /**
     * Debug any object
     * Improvements: Get the level of debug just to human, excluding the recursion.
     * @param $data
     * @param $kill
     */
    static function dd($data, $kill = true) {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        if ($kill) {
            exit;
        }
    }
}
