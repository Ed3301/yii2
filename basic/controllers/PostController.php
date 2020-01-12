<?php

namespace app\controllers;

use app\models\Post;
use Yii;
use yii\web\NotFoundHttpException;

class PostController extends \yii\base\Controller
{
    public function actionView($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $id = (int) Yii::$app->request->get('id');
        $model = Post::findOne($id);

        if ($model === null) {
            throw new NotFoundHttpException;
        } else {
            return  [
                'status' => 'Success',
                'message' => 'Успешно',
                'data' => [
                    'post' => $model
                ]
            ];
        }
    }

    public function actionCreate()
    {
        $data = Yii::$app->request->post();
        $model = new Post;
        $model->id = $data['id'];
        $model->userId = $data['userId'];
        $model->placeId = $data['placeId'];
        $model->text = $data['text'];
        $model->status = $data['status'];
        dd($model);

        $this->render('create', [
            'model' => $model,
        ]);
    }
}