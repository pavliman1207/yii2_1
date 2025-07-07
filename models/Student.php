<?php
namespace app\models;
use yii\db\ActiveRecord;

class Student extends ActiveRecord
{
    public static function tableName()
    {
        return 'students';
    }
    public function rules()
    {
        return [
            [['id'],'integer'],
            [['name','fam','fak','studgroup'],'required'],
            [['name','fam'],'string','max'=>55],
            [['fak','studgroup'],'string','max'=>20]
        ];
    }
}
