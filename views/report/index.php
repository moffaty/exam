<?php

use app\models\Report;
use app\models\Role;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Заявки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-index">
    
    <?php $isAdmin = Yii::$app->user->identity->role_id == Role::ROLE_ADMN; ?>

    <h1><?= Html::encode($isAdmin ? $this->title : 'Мои ' . $this->title) ?></h1>

    <p>
        <?php
            if (!$isAdmin) {
                echo "Здесь находятся ваши заявки. Для составления новой - нажмите на кнопку ниже";
            }
        ?>
    </p>
    <p>
        <?= Html::a('Создать заявку', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'number',
            'description:ntext',
            [
                'attribute'=> 'user_id',
                'content' => function ($model) {
                    return $model->user;
                },
                'visible' => $isAdmin,
            ],
            [
                'attribute'=> 'status_id',
                'content' => function ($model) {
                    return $model->status;
                },
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Report $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                },
                'visible' => $isAdmin,
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
