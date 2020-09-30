<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model ravesoft\seo\models\Seo */

$this->title = Yii::t('rave/seo', 'Create SEO Record');
$this->params['breadcrumbs'][] = ['label' => Yii::t('rave/seo', 'SEO'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seo-create">
    <h3 class="lte-hide-title"><?= Html::encode($this->title) ?></h3>
    <?= $this->render('_form', compact('model')) ?>
</div>
