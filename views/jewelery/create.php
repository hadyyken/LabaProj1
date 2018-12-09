<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Jewelery */

$this->title = 'Create Jewelery';
$this->params['breadcrumbs'][] = ['label' => 'Jeweleries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jewelery-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
