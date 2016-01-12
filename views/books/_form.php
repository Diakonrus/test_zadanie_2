<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Books;

/* @var $this yii\web\View */
/* @var $model app\models\Books */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    .select2-container {
        min-width:100%;
    }
</style>
<div class="books-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'book_category_id')->dropDownList(Books::getCategorys()) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model, 'authors')->listBox(Books::getAuthors(),['class'=>'multi-select2', 'multiple' =>true]);?>

    <?php

    echo $form->field($model, 'annotation')->widget(\vova07\imperavi\Widget::className(), [
        'settings' => [
            'lang' => 'ru',
            'minHeight' => 120,
            'plugins' => [
                'clips',
                'fullscreen'
            ]
        ]
    ]);

    ?>

    <?= $form->field($model, 'year')->textInput(['maxlength' => true, 'class'=>'mask_year form-control']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <a href="/books" class="btn">Отмена</a>
    </div>

    <?php ActiveForm::end(); ?>

</div>
