<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>


<div class="delete-form">
    <h2>Удалить студента по ID</h2>
    <?php $form=ActiveForm::begin(['action'=>['student/delete']]); ?>
    <?=$form->field($model,'id')->input('number',['min'=>1])->label('ID') ?>
      <div class="form-group">
        <?=Html::submitButton('Удалить студента',['class' =>'btn btn-primary']) ?>
      </div>
    <?php ActiveForm::end(); ?>  

</div>