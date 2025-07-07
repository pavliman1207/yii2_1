<?php

namespace app\models;
use yii\base\Model;

class DeleteForm extends Model{
    public $id;
     public function rules(){
        return [
           [ ['id'],'required'],
           ['id','integer'],
        ];
     }
}