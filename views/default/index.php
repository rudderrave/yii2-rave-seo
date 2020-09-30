<?php

use ravesoft\grid\GridPageSize;
use ravesoft\grid\GridView;
use ravesoft\helpers\Html;
use ravesoft\models\User;
use ravesoft\seo\models\Seo;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel ravesoft\seo\models\search\SeoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('rave/seo', 'Search Engine Optimization');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seo-index">

    <div class="row">
        <div class="col-sm-12">
            <h3 class="lte-hide-title page-title"><?= Html::encode($this->title) ?></h3>
            <?= Html::a(Yii::t('rave', 'Add New'), ['/seo/default/create'], ['class' => 'btn btn-sm btn-primary']) ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-12 text-right">
                    <?= GridPageSize::widget(['pjaxId' => 'page-grid-pjax']) ?>
                </div>
            </div>

            <?php Pjax::begin(['id' => 'seo-grid-pjax']) ?>

            <?=
            GridView::widget([
                'id' => 'seo-grid',
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'bulkActionOptions' => [
                    'gridId' => 'seo-grid',
                    'actions' => [
                        Url::to(['bulk-delete']) => Yii::t('yii', 'Delete'),
                    ]
                ],
                'columns' => [
                    ['class' => 'ravesoft\grid\CheckboxColumn', 'options' => ['style' => 'width:10px']],
                    [
                        'attribute' => 'url',
                        'class' => 'ravesoft\grid\columns\TitleActionColumn',
                        'controller' => '/seo/default',
                        'title' => function (Seo $model) {
                            return Html::a($model->url, ['/seo/default/update', 'id' => $model->id], ['data-pjax' => 0]);
                        },
                        'buttonsTemplate' => '{update} {delete}',
                    ],
                    'title',
                    //'author',
                    //'keywords',
                    //'description',
                    [
                        'class' => 'ravesoft\grid\columns\StatusColumn',
                        'attribute' => 'index',
                        'options' => ['style' => 'width:30px'],
                    ],
                    [
                        'class' => 'ravesoft\grid\columns\StatusColumn',
                        'attribute' => 'follow',
                        'options' => ['style' => 'width:30px'],
                    ],
                ],
            ]);
            ?>

            <?php Pjax::end() ?>
        </div>
    </div>
</div>


