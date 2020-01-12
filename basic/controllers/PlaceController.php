<?php

namespace app\controllers;

use app\models\Place;
use Yii;
use yii\web\NotFoundHttpException;

class PlaceController extends \yii\base\Controller
{
    public function actionView($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $id = (int) Yii::$app->request->get('id');
        $model = Place::findOne($id);

        if ($model === null) {
            throw new NotFoundHttpException;
        } else {
            return  [
                'status' => 'Success',
                'message' => 'Успешно',
                'data' => [
                    'place' => $model
                ]
            ];
        }
    }

    public function actionCreate()
    {
        $data = Yii::$app->request->post();
        $model = new Place;
        $model->id = $data['id'];
        $model->name = $data['name'];
        $model->street = $data['city'];
        $model->city = $data['street'];
        $model->category = $data['category'];
        dd($model);

        $this->render('create', [
            'model' => $model,
        ]);
    }
}