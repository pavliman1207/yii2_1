<?php
use yii\helpers\Html;


?>
<div class="student-page">
    <h1><?=Html::encode('Таблица студентов')?> </h1>
    <table class="student-table"
        <thead>
                <tr>
                  <th>ID</th>
                  <th>Имя</th>
                  <th>Фамилия</th>
                  <th>Факультет</th>
                  <th>Группа</th>
               </tr>
        </thead>
        <tbody>
            <?php foreach($students as $stud):?> 
                <tr>
                    <td><?=Html::encode($stud->id)  ?></td>
                    <td><?=Html::encode($stud->name)  ?></td>
                    <td><?=Html::encode($stud->fam)  ?></td>
                    <td><?=Html::encode($stud->fak)  ?></td>
                    <td><?=Html::encode($stud->studgroup)  ?></td>
               </tr>
            <?php endforeach;?>
        </tbody>
    </table> 
    <?=$this-> render('createForm',['model'=>$createModel])   ?>
    <?=$this-> render('updateForm',['model'=>$updateModel])   ?>   
     <?=$this-> render('deleteForm',['model'=>$deleteModel])   ?> 
</div>

