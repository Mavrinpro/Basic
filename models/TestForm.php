<?php
// Autor Alex Mavrin serblog.ru

namespace app\models;
use yii\base\Model;

class TestForm extends Model
{
    public $name;
    public $email;
    public $text;

    public function attributeLabels()
    {
        return [
          'name' => 'Имя',
          'email' => 'E-mail',
          'text' => 'Текст сообщения',
        ];
    }

    public function rules()
    {
        return [
            ['name', 'required'],
            ['email', 'required'],
            ['email', 'email'],
            ['name', 'string', 'min'=> 2, 'tooShort'=> 'Кастом мало'],
            ['name', 'string', 'max'=> 5, 'tooLong'=> 'Кастом много'],
            //['name', 'string', 'length'=> [2,5]],
            ['name', 'myRule', ],
            ['text', 'trim', ],
        ];
    }
    public function myRule($attrs){
        if (!in_array($this->$attrs, ['Hello,', 'world'])){
            $this->addError($attrs, 'Wrong');
        }
    }
}