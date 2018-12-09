<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BakerySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bakeries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bakery-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bakery', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'type',
            'price',
            'shelf_life',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
