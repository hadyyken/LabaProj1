<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PresentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Presents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presents-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Presents', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'type',
            'size',
            'price',
            'fragility',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
