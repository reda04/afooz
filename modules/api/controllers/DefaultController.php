<?php

namespace app\modules\controllers;

use yii\web\Controller;

/**
 * Default controller for the `api` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    { echo 'test';
        return $this->render('index');
    }
}
