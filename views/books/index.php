<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BooksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Книги';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php $label = new \app\models\Books; ?>

    <p>
        <?= Html::a('Новая запись', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',

            [
                'label'=>$label->getAttributeLabel('book_category_id'),
                'attribute' => 'book_category_id',
                'format' => 'raw',
                'value'=>function ($data) {
                    return \app\models\Books::getCategorys($data->book_category_id);
                },
                'filter' => \app\models\Books::getCategorys(),
            ],

            'name',

            [
                'label'=>$label->getAttributeLabel('authors'),
                'attribute' => 'authors',
                'format' => 'raw',
                'value'=>function ($data) {
                    $author = '';
                    foreach (\app\models\BooksAuthors::getAuthorsName($data->authors) as $key=>$val){
                        $author .= $val.'<BR>';
                    }
                    return $author;
                },
                'filter' => \app\models\BooksAuthors::getAuthorsName(),
            ],

            'year',
            'views',
            // 'created_at',


            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'Кнопки действий',
                'template' => '{view} {update} {delete}',
            ],

        ],
    ]); ?>

</div>
