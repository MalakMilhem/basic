<?php
\app\assets\AppAsset::register($this);

?>
<body class="tm-gray-bg">
<!-- gray bg -->
<section class="container tm-home-section-1" id="more">
    <div class="row">
        <?= $this->render('//partials/_search',['searchModel'=>$searchModel]);?>
            <div class="section-margin-top">
                <div class="row">

                <?= \yii\widgets\ListView::widget(
                    [
                        'dataProvider' => $targetHotels,
                        'itemView'     =>  '//partials/_recommended_item_view',
                    ])?>
            </div>
        </div>
    </div>
</body>
