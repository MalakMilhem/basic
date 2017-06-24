<?php
$parts = explode('/',$model['hotelInfo']['hotelImageUrl']);
$originalLastPart  = end($parts);
$lastPart = str_replace('t','l',$originalLastPart);
$imgUrl = str_replace($originalLastPart,$lastPart ,$model['hotelInfo']['hotelImageUrl'])
?>
<a href="<?= \yii\helpers\Html::encode($model['hotelUrls']['hotelInfositeUrl'])?>">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xxs-12">
        <div class="tm-home-box-2">
            <img src="<?=$imgUrl?>" alt="image" class="img-responsive">
            <?php $name =  substr($model['hotelInfo']['hotelName'],0, 25). '...' ?>
            <h3><?= $name?></h3>
            <?php $name =  substr($model['hotelInfo']['hotelDestination'],0, 38) ?>
            <p class="tm-date"><?=$name?></p>
            <div class="tm-home-box-2-container">
                <?= \kartik\rating\StarRating::widget([
                    'name' => 'rating_35',
                    'value' => $model['hotelInfo']['hotelStarRating'],
                    'pluginOptions' => ['displayOnly' => true]
                ]);
                ?>
            </div>
        </div>
    </div>
</a>
