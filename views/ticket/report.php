<?php
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TicketSearch */
/* @var $dataProvider yii\data\ArrayDataProvider */

$this->title = 'Звіт по заявках';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="ticket-report">

    <h1><?= \yii\helpers\Html::encode($this->title) ?></h1>

    <div class="ticket-search">
        <?php $form = ActiveForm::begin(['method' => 'get']); ?>

        <?= $form->field($searchModel, 'date_from')->input('date', ['placeholder' => 'Дата рішення с']) ?>
        <?= $form->field($searchModel, 'date_to')->input('date', ['placeholder' => 'Дата рішення по']) ?>

        <div class="form-group">
            <?= \yii\helpers\Html::submitButton('Пошук', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'label' => 'ПІБ (хто вирішив заявку)',
                'attribute' => 'agent',
            ],
            [
                'label' => 'Відключення',
                'attribute' => 'disconnections',
            ],
            [
                'label' => 'Перевірка/здешевлення',
                'attribute' => 'optimizations',
            ],
            [
                'label' => 'Тех. питання',
                'attribute' => 'technical_issues',
            ],
            [
                'label' => 'Інше',
                'attribute' => 'others',
            ],
            [
                'label' => 'Усього',
                'attribute' => 'total',
            ],
        ],
    ]); ?>

</div>
