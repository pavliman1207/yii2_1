<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>
<div class="create-form"> 
    <h2>Добавить студента</h2>
   <?php  $form=ActiveForm::begin(['action'=>['student/create']]); ?>
   <?=  $form->field($model,'name')->label('Имя студента'); ?>
   <?=  $form->field($model,'fam')->label('Фамилия студента'); ?>
   <?=  $form->field($model,'fak')->label('Кафедра'); ?>
   <?=  $form->field($model,'studgroup')->label('Группа'); ?>
    <div class="form-group">
   <?=  Html::submitButton('Добавить студента',['class' =>'btn btn-primary']) ?>
   </div>
   <?php  ActiveForm::end(); ?>
</div>

