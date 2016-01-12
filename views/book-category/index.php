<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BookCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории книг';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать новую категорию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',

            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'Кнопки действий',
                'template' => '{update} {delete}',
            ],
        ],
    ]); ?>

</div>
