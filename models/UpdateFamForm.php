<?php

namespace app\models;
use yii\base\Model;

class UpdateFamForm extends Model{
    public $id;
    public $fam;
     public function rules(){
        return [
           [ ['id','fam'],'required'],
           ['id','integer'],
           ['fam','string','max'=>55]
        ];
     }
}