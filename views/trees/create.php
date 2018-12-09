<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Trees */

$this->title = 'Create Trees';
$this->params['breadcrumbs'][] = ['label' => 'Trees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trees-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
