<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Category;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\Category */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh mục';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">
    
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="panel-body">
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <p class="pull-right">
                <?= Html::a('Thêm mới', ['create'], ['class' => 'btn btn-success btn-sm']) ?>
            </p>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    /*['class' => 'yii\grid\SerialColumn',
                        'header'=>'STT',
                        'headerOptions'=>[
                            'style'=>'width:15px; text-align:center;'
                        ]
                    ],*/
                    ['class'=>'yii\grid\CheckBoxColumn'],
                    [
                        'attribute' => 'id',
                        'label' => 'ID',
                        'headerOptions' => [
                            'style' => 'width:15px; text-align:center'
                        ],
                        'contentOptions' => [
                            'style' => 'width:15px; text-align:center'
                        ]
                    ],
                    
                    'name',
                    'slug',
                    [
                        'attribute' => 'parent',
                        'content'=>function ($model)
                        {
                            if ($model->parent == 0) {
                                return 'Root';
                            }else{
                                $parent = Category::find()->where(['id'=>$model->parent])->one();
                                if($parent){
                                    return $parent->name;
                                }else{
                                    return 'Không có danh mục cha';
                                }
                                return '<span class="label label-success">Active</span>';
                            }
                        },
                        'headerOptions' => [
                            'style' => 'width:150px; text-align:center'
                        ],
                        'contentOptions' => [
                            'style' => 'width:150px; text-align:center'
                        ]
                    ],
                    [
                        'attribute' => 'status',
                        'content'=>function ($model)
                        {
                            if($model->status == 0) {
                                return '<span class="label label-danger">Deactive</span>';
                            }else{
                                return '<span class="label label-success">Active</span>';
                            }
                        },
                        'headerOptions' => [
                            'style' => 'width:150px; text-align:center'
                        ],
                        'contentOptions' => [
                            'style' => 'width:150px; text-align:center'
                        ]
                    ],
                    // 'created_at',
                    [
                        'attribute' => 'created_at',
                        'content' => function($model){
                            return date('d-m-Y', $model->created_at);
                        }
                    ],
                    // 'updated_at',

                    ['class' => 'yii\grid\ActionColumn',
                        'header'=>'Hành động',
                        'headerOptions' => [
                            'style' => 'color:#2352A6'
                        ],
                        'contentOptions' => [
                            'style' => 'text-align:center'
                        ],
                        'buttons'=>[
                            'view' => function($url, $model){
                                return Html::a('View', $url, ['class'=>'btn btn-xs btn-primary']);
                            },

                            'update' => function($url, $model){
                                return Html::a('Edit', $url, ['class'=>'btn btn-xs btn-success']);
                            },

                            'delete' => function($url, $model){
                                return Html::a('Delete', $url, 
                                    [
                                        'class'=>'btn btn-xs btn-danger',
                                        'data-confirm'=> 'Bạn chắc chán muốn xóa '.$model->name,
                                        'data-method' => 'post'
                                    ]
                                );
                            }
                        ]
                    ],
                ],
            ]); ?>
        </div>
    </div>

</div>
