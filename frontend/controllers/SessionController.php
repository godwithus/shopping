<?php

namespace frontend\controllers;

use Yii;

class SessionController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $session = Yii::$app->session;
        $session->set('name', 'My Yii2 Session');
        // $session['name2'] = "Another Yii2 Session New Style";
        $_SESSION['name01'] = "PHP SESSION regular Legacy";
    }

    public function actionTest()
    {
        $session = Yii::$app->session;

        if($session->isActive){
            echo "Session is Active <br>";
        } else {
            echo "Session is not Active <br>";
        }

        $session['arr'] = [
            'id' => 1,
            'name' => 'Emmanuel Adeyemo',
            'phone' => '08087898765'
        ];

        echo $session->get('name').'<br>';
        echo $session['name2'].'<br>';
        echo $_SESSION['name01'].'<br>';

        // echo $session['arr']['id'] .' &nbsp; '.$session['arr']['name'] .' &nbsp; '.$session['arr']['phone'];

    }

    public function actionArr()
    {
        
    }
}
