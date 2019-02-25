<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use common\models\frontend\Auto;
use kartik\select2\Select2;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var common\models\frontend\AutoMileage */
/* @var $form yii\widgets\ActiveForm */
?>

<?php Pjax::begin(); ?>
<?php $form = ActiveForm::begin([
    'options' => [
        'id' => 'annual-auto-form',
        'class' => 'form-horizontal',
        'data-pjax' => true,
    ],
    'fieldConfig' => [
        'template' => "<div class=\"col-md-3\">{label}</div>\n<div class=\"col-md-9\">{input}</div>\n<div class=\"col-md-12\">{error}</div>",
    ],
]); ?>

<?= $form->field($model, 'auto_id')
    ->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Auto::getAll(), 'id', 'auto_name'),
        'options' => ['placeholder' => 'Select Auto'],
    ])
    ->label('Auto') ?>

<?= $form->field($model, 'year')
    ->widget(DatePicker::className(), [
        'clientOptions' => [
            'format' => " yyyy", // Notice the Extra space at the beginning
            'viewMode' => "years",
            'minViewMode' => "years",
            'autoclose' => true,
            'todayHighlight' => true,
            'setDate' => ' new Date()',
        ],

    ]) ?>

<?= $form->field($model, 'begin_odo') ?>

<?= $form->field($model, 'end_odo') ?>

<div class="form-group modal-footer">
    <?= Html::submitButton('<span class="glyphicon glyphicon-ok-circle"></span>' . ($model->isNewRecord
            ? ' Add'
            : ' Update'), [
        'class' => 'btn btn-success'
    ]) ?>
    <button type="button" class="btn btn-success" data-dismiss="modal"><span
                class="glyphicon glyphicon-ban-circle"></span> Cancel
    </button>

</div>

<?php ActiveForm::end(); ?>
<?php Pjax::end(); ?>
