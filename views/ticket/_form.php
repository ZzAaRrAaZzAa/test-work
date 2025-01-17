<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Ticket $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="ticket-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Нова' => 'Нова', 'В роботі' => 'В роботі', 'Вирішена' => 'Вирішена', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'category')->dropDownList([ 'Відключення' => 'Відключення', 'Перевірка/здешевлення' => 'Перевірка/здешевлення', 'Технічне питання' => 'Технічне питання', 'Інше' => 'Інше', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'resolved_date')->textInput() ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'agent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
