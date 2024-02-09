<?php

namespace app\services;

use Yii;
use yii\grid\ActionColumn;
use yii\helpers\Html;

class HelperService
{
    public static function enable(): array
    {
        $type = [
            0 => 'Отключить',
            1 => 'Включить'
        ];
        return [
            'attribute' => 'enable',
            'value' => function ($model) use ($type) {
                return $type[$model->enable];
            },
            'filter' => $type
        ];
    }

    public static function image($attribute): array
    {
        return [
            'attribute' => $attribute,
            'format' => 'raw',
            'value' => function ($model) use ($attribute) {
                return Html::a('Просмотр Файл', ['/' . $model->$attribute], ['target' => '_blank']);
            }
        ];
    }
    public static function action(): array
    {
        return [
            'class' => ActionColumn::class,
            'template' => '{view} {update} {delete} {enable}', // specify the actions you want to display
            'buttons' => [
                'view' => function ($url, $model, $key) {
                    return Html::a('<span class="fas fa-eye"></span>', $url); // FontAwesome view icon
                },
                'update' => function ($url, $model, $key) {
                    return Html::a('<span class="fas fa-pencil-alt"></span>', $url); // FontAwesome update icon
                },
                'delete' => function ($url, $model, $key) {
                    return Html::a('<span class="fas fa-trash"></span>', $url, [
                        'data-method' => 'post',
                        'data-confirm' => 'Are you sure you want to delete this item?',
                    ]); // FontAwesome delete icon
                },
                'enable' => function ($url, $model) {
                    return Html::a('<span class="fas fa-sync" style="color: green; margin-left: 2px;"></span>', ['enable', 'id' => $model->id]);
                }
            ],
        ];
    }

    public static function actionChild($path): array
    {
        return [
            'class' => ActionColumn::class,
            'template' => '{view} {update} {delete} {enable}', // specify the actions you want to display
            'buttons' => [
                'view' => function ($url, $model, $key) use ($path) {
                    return Html::a('<span class="fas fa-eye"></span>', ["$path/view", 'id' => $model->id]);
                },
                'update' => function ($url, $model, $key) use ($path) {
                    return Html::a('<span class="fas fa-pencil-alt"></span>', ["$path/update", 'id' => $model->id]);
                },
                'delete' => function ($url, $model, $key) use ($path) {
                    return Html::a('<span class="fas fa-trash"></span>', ["$path/delete", 'id' => $model->id], [
                        'data-method' => 'post',
                        'data-confirm' => 'Are you sure you want to delete this item?',
                    ]);
                },
                'enable' => function ($url, $model) use ($path) {
                    return Html::a('<span class="fas fa-sync" style="color: green; margin-left: 2px;"></span>', ["$path/enable", 'id' => $model->id]);
                },
            ],
        ];
    }

    public static function changeEnableDisable($model): bool
    {
        $model->enable = $model->enable ? '0' : '1';
        if ($model->save()) {
            Yii::$app->session->setFlash('success', 'Успешно сохранено');
            return true;
        }
        Yii::$app->session->setFlash('error', 'Временная ошибка');
        return true;
    }

    public static function findModel($class, $id)
    {
        if (($model = $class::findOne(['id' => $id])) !== null) {
            return $model;
        }

        Yii::$app->session->setFlash('error', 'Fast contact with Developer! (998908319755)');
        return null;
    }
}