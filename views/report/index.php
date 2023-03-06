<?php


/** @var yii\web\View $this */
/** @var app\models\DateForm $model */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Обороты';
$this->params['breadcrumbs'][] = $this->title;
$client = @$_GET['client'] == 'solid' ? 'solid' : 'mts';
?>
<div class="rate">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link <?= $client == 'mts' ? 'active' : null ?>" id="nav-<?= $client ?>-tab" href="/report/index?client=mts" role="tab" aria-controls="nav-<?= $client ?>" aria-selected="<?= ($client == 'mts') ?>">МТС</a>
                                <a class="nav-item nav-link <?= $client == 'solid' ? 'active' : null ?>" id="nav-<?= $client ?>-tab" href="/report/index?client=solid" role="tab" aria-controls="nav-<?= $client ?>" aria-selected="<?= ($client == 'mts') ?>">Солидарность</a>
                            </div>
                        </nav>

                        <div class="my-3">

                        <?php $form = ActiveForm::begin();
                        ?>

                        <?= $form->field($model, 'date')->input('date') ?>

                        <?= Html::submitButton('Search', ['class' => 'btn btn-success']) ?>
                        <?php ActiveForm::end(); ?>

                        </div>

                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-<?= $client ?>" role="tabpanel" aria-labelledby="nav-<?= $client ?>-tab">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Count</th>
                                        <th>Sum</th>
                                        <th>Average</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($report as $key => $item){ ?>
                                        <tr>
                                            <td><?= $key+1 ?></td>
                                            <td><?= $item['date'] ?></td>
                                            <td><?= $item['count'] ?></td>
                                            <td><?= $item['sum'] ?></td>
                                            <td><?= $item['average'] ?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
