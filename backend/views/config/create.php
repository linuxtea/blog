<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Config $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Config',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Configs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="config-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
