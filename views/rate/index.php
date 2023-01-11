<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Rate $model */

$this->title = 'Курсы валют';
$this->params['breadcrumbs'][] = $this->title;
$client = @$_GET['client'] == 'solid' ? 'solid' : 'mts';
$model->amount = $line_rate['cb_rate'];
?>
<div class="rate">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link <?= $client == 'mts' ? 'active' : null ?>" id="nav-<?= $client ?>-tab" href="/rate/index?client=mts" role="tab" aria-controls="nav-<?= $client ?>" aria-selected="<?= ($client == 'mts') ?>">МТС</a>
                                <a class="nav-item nav-link <?= $client == 'solid' ? 'active' : null ?>" id="nav-<?= $client ?>-tab" href="/rate/index?client=solid" role="tab" aria-controls="nav-<?= $client ?>" aria-selected="<?= ($client == 'mts') ?>">Солидарность</a>
                            </div>
                        </nav>
                        <h5 class="mt-5">Нынешний курс для RUBUZS: <b><?= $rates[0]->amount ?? 0 ?></b></h5>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-<?= $client ?>" role="tabpanel" aria-labelledby="nav-<?= $client ?>-tab">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Курс</th>
                                        <th>Относительно</th>
                                        <th>Когда установлен</th>
                                        <th>С какого момента</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($rates as $key => $rate){ ?>
                                        <tr>
                                            <td><?= $key+1 ?></td>
                                            <td><?= $rate->amount ?></td>
                                            <td>RUBUZS</td>
                                            <td><?= $rate->created_at ?></td>
                                            <td><?= $rate->from ?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                                <h5 class="mt-5">Полоса для курса</h5>
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>MIN</th>
                                        <th>RATE(CBU)</th>
                                        <th>MAX</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?= $line_rate['min'] ?></td>
                                            <td><?= $line_rate['cb_rate'] ?></td>
                                            <td><?= $line_rate['max'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <h5 class="mt-5">Введите новый курс</h5>
                                <?= $this->render('_form', [
                                    'model' => $model,
                                ]) ?>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
