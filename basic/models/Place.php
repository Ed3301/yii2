<?php

namespace app\models;

use yii\base\Model;

class Place extends Model
{
    public $id;
    public $name;
    public $city;
    public $street;
    public $category;

    private static $places = [
        '100' => [
            'id' => '100',
            'firstName' => 'admin',
            'secondName' => 'admin',
        ]
    ];

    public function rules()
    {
        return array(
            array('name, city', 'required'),
        );
    }

    public static function findOne($id)
    {
        return isset(self::$places[$id]) ? new static(self::$places[$id]) : null;
    }

}