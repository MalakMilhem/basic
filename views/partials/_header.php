<?php
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
?>

<!-- Header -->
<?php
NavBar::begin([
    'brandLabel' => 'Expedia',
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-inverse navbar-fixed-top',
    ],
]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => [
        ['label' => 'Home', 'url' => Yii::$app->homeUrl],
        ['label' => 'About', 'url' => '#'],
        ['label' => 'Contact', 'url' => '#'],
        Yii::$app->user->isGuest ? (
        ['label' => 'Login', 'url' =>'#']
        ) : (
            '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>'
        )
    ],
]);
NavBar::end();
?>
<!-- Banner -->
<section class="tm-banner">
    <!-- Flexslider -->
    <div class="flexslider flexslider-banner">
        <ul class="slides">
            <li>
                <div class="tm-banner-inner">
                    <h1 class="tm-banner-title">Find <span class="tm-yellow-text">The Best</span> Place</h1>
                    <p class="tm-banner-subtitle">For Your Holidays</p>
                    <a href="#more" class="tm-banner-link">Learn More</a>
                </div>
                <img src="img/banner-1.jpg" alt="Image" />
            </li>
            <li>
                <div class="tm-banner-inner">
                    <h1 class="tm-banner-title">Paris <span class="tm-yellow-text"></span> </h1>
                    <p class="tm-banner-subtitle">Wonderful Destinations</p>
                    <a href="#more" class="tm-banner-link">Learn More</a>
                </div>
                <img src="img/banner-2.jpg" alt="Image" />
            </li>
            <li>
                <div class="tm-banner-inner">
                    <h1 class="tm-banner-title">Berlin <span class="tm-yellow-text"></span> </h1>
                    <p class="tm-banner-subtitle">Wonderful Destinations</p>
                    <a href="#more" class="tm-banner-link">Learn More</a>
                </div>
                <img src="img/banner-3.jpg" alt="Image" />
            </li>
        </ul>
    </div>
</section>

