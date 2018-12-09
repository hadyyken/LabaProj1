<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bakery */

$this->title = 'Create Bakery';
$this->params['breadcrumbs'][] = ['label' => 'Bakeries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bakery-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
