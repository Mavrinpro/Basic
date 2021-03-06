<?php
// Autor Alex Mavrin serblog.ru

namespace app\models;


use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function tableName()
    {
        return 'categories';
    }
    public function getProducts(){
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }
}