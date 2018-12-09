<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Presents */

$this->title = 'Create Presents';
$this->params['breadcrumbs'][] = ['label' => 'Presents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presents-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
