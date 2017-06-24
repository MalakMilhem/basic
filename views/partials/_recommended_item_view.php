<?php
    $parts = explode('/',$model['hotelInfo']['hotelImageUrl']);
    $originalLastPart  = end($parts);
    $lastPart = str_replace('t','l',$originalLastPart);
    $imgUrl = str_replace($originalLastPart,$lastPart ,$model['hotelInfo']['hotelImageUrl'])
?>
<a href="<?= urldecode($model['hotelUrls']['hotelInfositeUrl'])?>">
    <div class="col-lg-6">
        <div class="tm-home-box-3">
            <div class="tm-home-box-3-img-container">
                <img src="<?=$imgUrl?>" alt="image" class="img-responsive" width="250" height="225">
            </div>
            <div class="tm-home-box-3-info">
                <p class="tm-home-box-3-description"><?=$model['hotelInfo']['hotelName'] . "<br>". $model['hotelInfo']['hotelDestination']?>
                    <?= \kartik\rating\StarRating::widget([
                        'name' => 'rating_35',
                        'value' => $model['hotelInfo']['hotelStarRating'],
                        'pluginOptions' => ['displayOnly' => true]
                    ]);
                    ?>
                </p>
            </div>
        </div>
    </div>
</a>