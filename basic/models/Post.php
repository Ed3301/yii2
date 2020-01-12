<?php

namespace app\models;

use yii\base\Model;

class Post extends Model
{
    public $id;
    public $placeId;
    public $userId;
    public $text;
    public $status;

    private static $posts = [
        '100' => [
            'id' => '100',
            'placeId' => 100,
            'userId' => 100,
            'text' => 'test',
            'status' => 1
        ],
    ];

    public function rules()
    {
        return array(
            array('place, userId', 'required'),
        );
    }

    public static function findOne($id)
    {
        return isset(self::$posts[$id]) ? new static(self::$posts[$id]) : null;
    }

}