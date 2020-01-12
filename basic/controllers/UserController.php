<?php

namespace app\controllers;

use app\models\User;
use Yii;
use yii\web\NotFoundHttpException;

class UserController extends \yii\base\Controller
{
    public function actionView()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $id = (int) Yii::$app->request->get('id');
        $model = User::findIdentity($id);
        dd($model);
        if ($model === null) {
            throw new NotFoundHttpException;
        } else {
            return  [
                'status' => 'Success',
                'message' => 'Успешно',
                'data' => [
                    'user' => $model
                ]
            ];
        }
    }

    public function actionCreate()
    {
        $data = Yii::$app->request->post();
        $model = new User;
        $model->id = $data['id'];
        $model->firstName = $data['firstName'];
        $model->secondName = $data['secondName'];
        dd($model);

        $this->render('create', [
            'model' => $model,
        ]);
    }
}