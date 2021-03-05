<?php

namespace app\controllers;
use app\models\Category;
use Yii;
use app\models\TestForm;

class PostController extends AppController


{
    public $layout = 'basic';

    public function actionIndex(){
        if (Yii::$app->request->isAjax){
            //debug($_POST);
            debug(Yii::$app->request->post());
            return 'test';
        }
        $model = new TestForm();
        if($model->load(Yii::$app->request->post())){
            //debug($model);
            //die;
            if($model->validate()){
                Yii::$app->session->setFlash('success', 'Данные приняты');
                return $this->refresh();
            }else{
                Yii::$app->session->setFlash('error', 'Ошибка');
            }
        }
        //return $this->render('test');
        return $this->render('test', compact('model'));


    }

    public function actionShow(){
        //$this->layout = 'basic';
        $this->view->title = 'Одна статья';
        $this->view->registerMetaTag(['name'=>'keywords','content'=>'ключевые слова' ]);
        $this->view->registerMetaTag(['name'=>'description','content'=>'Описание страницы' ]);

        //$cats = Category::find()->all();
        //$cats = Category::find()->orderBy(['id' => SORT_DESC])-> all();
        //$cats = Category::find()->asArray()-> all();
        //$cats = Category::find()->asArray()->where('parent=54')-> all();
        //$cats = Category::find()->asArray()->where(['like', 'title', 'pp'])-> all();
        //$cats = Category::find()->asArray()->where('parent=54')->limit(1)-> one();
        //$cats = Category::find()->asArray()->where('parent=54')->count();
        //$cats = Category::findAll((['parent'=> 54]));
        //$query = "SELECT * FROM categories WHERE title LIKE '%пр%'";
        //$query = "SELECT * FROM categories WHERE title LIKE :search";
        //$cats = Category::findBySql($query, [':search' => '%пр%'])->all();
        $cats = Category::find()->with('products')->where('id=2')->all();
        return $this->render('show', compact('cats'));
    }

}