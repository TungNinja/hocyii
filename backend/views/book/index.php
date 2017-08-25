<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Category;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Book', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute' => 'cate',
                'content' => function($model){
                    $parent = Category::find()->where(['id'=>$model->cate])->one();
                    if($parent){
                        return $parent->name;
                    }else{
                        return 'Không có danh mục cha';
                    }
                    return '<span class="label label-success">Active</span>';
                }
            ],
            'slug',
            //'image',
            // 'desc',
            // 'content:ntext',
            // 'price',
            // 'quantity',
            // 'author',
            // 'pages',
            // 'status',
            // 'publish_at',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
