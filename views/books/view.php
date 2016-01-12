<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Books */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Книги', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-view">
    <?php $label = new \app\models\Books; ?>
    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            [
                'label' => $label->getAttributeLabel('authors'),
                'format' => 'html',
                'value' => \app\models\BooksAuthors::getAuthorsName($model->authors, true),
            ],

            'year',

            [
                'label' => $label->getAttributeLabel('annotation'),
                'format' => 'html',
                'value' => $model->annotation,
            ],

        ],
    ]) ?>

</div>


<div class="form-group">
    <a href="/books" class="btn btn-primary">Вернуться к списку</a>
</div>