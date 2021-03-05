<?php

use app\assets\AppAsset;
use yii\helpers\Html;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!doctype html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this -> beginBody() ?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <?= Html::a('Главная', '/web/',['class'=> 'nav-link']) ?>
                    </li>
                    <li class="nav-item">
                        <?= Html::a('Статьи', ['/post/index']) ?>
                    </li>
                    <li class="nav-item">
                        <?= Html::a('Статья', ['/post/show']) ?>
                    </li>
                </ul>

                <?= $content ?>
            </div>
        </div>
    </div>
</section>

<?php $this -> endBody() ?>
</body>
</html>
<?php $this -> endPage() ?>