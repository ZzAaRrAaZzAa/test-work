<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Ticket $model */

$this->title = 'Create Ticket';
$this->params['breadcrumbs'][] = ['label' => 'Tickets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket-form">

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'resolved_date')->input('date') ?>

<?= $form->field($model, 'created_date')->input('date') ?>

<?= $form->field($model, 'status')->dropDownList([
    'Нова' => 'Нова',
    'В роботі' => 'В роботі',
    'Вирішена' => 'Вирішена',
]) ?>

<?= $form->field($model, 'category')->dropDownList([
    'Відключення' => 'Відключення',
    'Перевірка/здешевлення' => 'Перевірка/здешевлення',
    'Технічне питання' => 'Технічне питання',
    'Інше' => 'Інше',
]) ?>

<?= $form->field($model, 'agent')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

<div class="form-group">
    <?= \yii\helpers\Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>