<?php

namespace frontend\controllers;
use yii\web\Controller;

class DemoController extends Controller
{
    public function actionIndex()
    {
        return $this->render('actionindex');
    }

    public function actionHello(){
        return $this->render('hello');
    }
}
