<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BooksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Поиск книг по автору';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .show_more_data {
        border-radius: 5px;
        background: grey;
        padding: 10px;
        display: none;
    }
</style>

<div class="books-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php $label = new \app\models\Books; ?>

    <?=((!empty($count))?('<h3>'.$label->getAttributeLabel('count_books_author').': '.$count.'</h3>'):(''));?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label'=>$label->getAttributeLabel('name'),
                'format' => 'raw',
                'value'=>function ($data) {return $data->name; },
                'filter' => null,
            ],

            'views'

        ],
    ]); ?>

</div>
