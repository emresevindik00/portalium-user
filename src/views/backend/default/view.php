<?php

use portalium\theme\helpers\Html;
use portalium\theme\widgets\DetailView;
use portalium\theme\widgets\Panel;
use portalium\user\Module;

/* @var $this yii\web\View */
/* @var $model portalium\user\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Module::t('Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<?php Panel::begin([
    'title' => Html::encode($this->title),
    'actions' => [
        'header' => [
            Html::a(Module::t( 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']),
            Html::a(Module::t( 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Module::t( 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]),
        ]
    ]
]) ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'first_name',
            'last_name',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'email:email',
            'access_token',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

    <?php
    if (empty($groupNames)) {
        echo Module::t('User does not belong to any group.');
    } else {
        echo Module::t('User groups: ') . implode(", ", $groupNames);
    }
    ?>
<?php Panel::end() ?>
