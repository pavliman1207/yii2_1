<?php
namespace app\controllers;

use app\models\DeleteForm;
use app\models\Student;
use app\models\UpdateFamForm;
use Yii;
use yii\web\Controller;
use app\services\StudentService;
use yii\web\Response;

class StudentController extends Controller{ 
protected $service;


 protected function getService()
    {
        if (!$this->service) {
            $this->service = new StudentService();
        }
        return $this->service;
    }
public function actionIndex(){
     $students=$this->getService()->findAll();
     $updateModel=new UpdateFamForm();
     $createModel=new Student();
     $deleteModel=new DeleteForm();
    /// для постмана
      /// Yii::$app->response->format=Response::FORMAT_JSON;
   //// return $this->getService()->findAll();
    return $this->render('index',['students'=>$students,'createModel'=>$createModel,'updateModel'=>$updateModel,'deleteModel'=>$deleteModel]); 

}

///public function actionUpdateFam($id){
 ///   return $this->getService()->updateFam($id);
///}
public function actionUpdateFamForm(){
    $model=new UpdateFamForm();
    if($model->load(Yii::$app->request->post())&& $model->validate()){
        $result=$this->getService()->updateFam($model->id,$model->fam);
        if($result['success']){
            $students=$this->getService()->findAll();
            Yii::$app->session->setFlash('success','Фамилия обновлена');
            return $this->redirect('index');}
        else{
            Yii::$app->session->setFlash('error','Ошибка в обновлении фамилии');
        }
        return $this->redirect(['index']) ;  
    }
    $students=$this->getService()->findAll();
    $createModel=new Student();
    $updateModel=new UpdateFamForm();
    return $this->render('index',['students'=>$students,'createModel'=>$createModel,'updateModel'=>$updateModel]);
}

public function actionCreate(){
$model=new Student();
if($model->load(Yii::$app->request->post())&& $model->save() ){
     Yii::$app->session->setFlash('success','Студент добавлен');
    return $this->redirect(['index']);
} 
else {
    Yii::$app->session->setFlash('error','Ошибка при добавление студента');
}
$students=$this->getService()->findAll();
    $createModel=new Student();
    $updateModel=new UpdateFamForm();
    $deleteModel=new DeleteForm();
    return $this->render('index',['students'=>$students,'createModel'=>$createModel,'updateModel'=>$updateModel,'deleteModel'=>$deleteModel]);
}
public function actionDelete(){
    $model=new DeleteForm();
    if($model->load(Yii::$app->request->post())&& $model->validate()){
        $result=$this->getService()->deleteStudent($model->id);
       if($result['success']){
        Yii::$app->session->setFlash('success','Студент удален');
       } else{
        Yii::$app->session->setFlash('error','Ошибка при удалении студента');
       }
        return $this->redirect(['index']);
    }
    $students=$this->getService()->findAll();
    $createModel=new Student();
    $updateModel=new UpdateFamForm();
    $deleteModel=new DeleteForm();
    return $this->render('index',['students'=>$students,'createModel'=>$createModel,'updateModel'=>$updateModel,'deleteModel'=>$deleteModel]);
    
}
}