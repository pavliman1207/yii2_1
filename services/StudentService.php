<?php
namespace app\services;
use Yii;
use app\models\Student;
use yii\base\ViewNotFoundException;
use yii\web\Response;
use yii\web\NotFoundHttpException;

class StudentService{
    public function findAll(){
        return Student::find()->all();
    }
    public function updateFam($id,$fam){
        
       /// Yii::$app->response->format=Response::FORMAT_JSON;
        $student=Student::findOne($id);
        if(!$student){
            throw new NotFoundHttpException('Студент не найдет.');
        }
        $student->fam=$fam;
        if($student->save()){
            return ['success'=>true,'student'=>$student];
        } else{
             return ['success'=>false,  'message'=>'фамилия не добавлена'];

        }
    }
    public function addStudent(){
       /// Yii::$app->response->format=Response::FORMAT_JSON;
        $student =new Student();
        $params=Yii::$app->request->bodyParams;
        $student->load($params,'');
        if($student->save()){
            $student->refresh();
            return ['success'=>true,'students'=>$student];
        } else {
            return ['success'=>false,'errors'=>$student->getErrors()];
        }
    }
    public function deleteStudent($id){
    ///   Yii::$app->response->format=Response::FORMAT_JSON;
       $student=Student::findOne($id);
       if(!$student){
          throw new ViewNotFoundException('Студент не найден');
       }
      if($student->delete()!==false){
          return ['success'=>true,'id'=>$id];
      } else {
        return ['success'=>false,'message'=>'Ошибка при удаление студента'];
      }
    }
}