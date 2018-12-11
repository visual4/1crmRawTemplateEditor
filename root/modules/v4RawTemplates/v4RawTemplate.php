<?php

/**
 * Created by PhpStorm.
 * User: brafreider
 * Date: 18.11.2016
 * Time: 10:50
 */
class v4RawTemplate extends SugarBean
{
    public static function before_save(RowUpdate $upd){
        $upd->set('std', true);
    }
}