<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BookCategory */

$this->title = 'Создать новую категорию книг';
$this->params['breadcrumbs'][] = ['label' => 'Категории книг', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
