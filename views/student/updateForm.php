<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>


<div class="update-fam-form">
    <h2>Обновить список студентов по ID</h2>
    <?php $form=ActiveForm::begin(['action'=>['student/update-fam-form']]); ?>
    <?=$form->field($model,'id')->input('number',['min'=>1])->label('ID') ?>
    <?=$form->field($model,'fam')->textInput(['maxlength'=>55])->label('Фамилия') ?>
      <div class="form-group">
        <?=Html::submitButton('Обновить фамилию',['class' =>'btn btn-primary']) ?>
      </div>
    <?php ActiveForm::end(); ?>  

</div>