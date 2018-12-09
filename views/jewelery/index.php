<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JewelerySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jeweleries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jewelery-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Jewelery', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'type',
            'material:ntext',
            'edibility',
            'price',
            //'size',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
