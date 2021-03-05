<!--//--><?php //$this->title = 'Одна статья'; ?>
<h1>Одна статья</h1>
<?php //foreach ($cats as $cat){
//    echo $cat->title . '</br>';
//} ?>
<?php //debug($cats); ?>
<?php //echo count($cats[0]->products); ?>
<?php //debug($cats); ?>

<?php foreach ($cats as $cat){
    echo '<ul>';
    echo '<li>' . $cat->title . '</li>';
    echo '</ul>';
} ?>

<button class="btn btn-success" id="btn">Button</button>
<?php $this->registerJsFile('@web/js/js.js', ['depends'=> 'yii\web\YiiAsset']) ?>
<?php //$this->registerJs("$('.container').append('<b>SHOW</b>');") ?>


<?php
$js = <<<JS
    $('#btn').on('click', function (){
        console.log('res');
        $.ajax({
        url: 'index.php?r=post/index',
        data: {test: '123'},
        type: 'POST',
        success: function (res){
            console.log(res);
        },
        error: function (){
            alert('Error');
        }
        });
    });


JS;
$this->registerJs($js);
?>