<?php
\app\assets\AppAsset::register($this);

?>
<!-- site index-->
<body class="tm-gray-bg">
<!-- gray bg -->
<section class="container tm-home-section-1" id="more">
    <?= $this->render('//partials/_search',['searchModel'=>$searchModel]);?>
    <div class="section-margin-top">
        <div class="row">
            <div class="tm-section-header">
                <div class="col-lg-3 col-md-3 col-sm-3"><hr></div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <h2 class="tm-section-title">Most Comfortable Hotels</h2>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3"><hr></div>
            </div>
        </div>
        <div class="row">
            <?= \yii\widgets\ListView::widget(
                [
                    'dataProvider' => $mostComfortableHotels,
                    'itemView'     =>  '_item_view',
                ])?>
            <div class="row">
                <div class="col-lg-12">
                    <p class="home-description"> these hotels are 5 stars hotels and get recommended from the guests</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- white bg -->
<section class="tm-white-bg section-padding-bottom">
    <div class="container">
        <div class="row">
            <div class="tm-section-header section-margin-top">
                <div class="col-lg-4 col-md-3 col-sm-3"><hr></div>
                <div class="col-lg-4 col-md-6 col-sm-6"><h2 class="tm-section-title">Recommended hotels</h2></div>
                <div class="col-lg-4 col-md-3 col-sm-3"><hr></div>
            </div>
            <?= \yii\widgets\ListView::widget(
                [
                    'dataProvider' => $recommendedHotels,
                    'itemView'     =>  '//partials/_recommended_item_view',
                ])?>
        </div>
    </div>
</section>
</body>
