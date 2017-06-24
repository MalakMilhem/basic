<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-6">
        <!-- Nav tabs -->
        <div class="tm-home-box-1">
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active tm-white-bg" id="hotel">
                    <div class="tm-search-box effect2">
                        <?php $form = \yii\widgets\ActiveForm::begin([
                            'action' => \yii\helpers\Url::toRoute('hotel/index'),
                            'method' => 'get',
                            'enableAjaxValidation' => true,
                            'options' => ['class'=>'hotel-search-form']
                        ]); ?>
                        <div class="tm-form-inner">
                            <div class="form-group">
                                <?= $form->field($searchModel, 'destinationCity',['inputOptions' =>['id'=>'cities','placeholder' => 'City','maxlength'=>'21'],'options'=>['class'=>'form-group inlineBlock']])->label() ?>
                            </div>
                            <div class="form-group">
                                <?= $form->field($searchModel, 'minTripStartDate',['inputOptions'=>['placeholder'=>'Start date'],
                                    'options'=>['class'=>'form-group inlineBlock']])->widget(\yii\jui\DatePicker::classname(), [
                                    'dateFormat' => 'yyyy-MM-dd']) ?>
                            </div>
                            <div class="form-group">
                                <?= $form->field($searchModel, 'maxTripStartDate',['inputOptions'=>['placeholder'=>'Start date'],
                                    'options'=>['class'=>'form-group inlineBlock']])->widget(\yii\jui\DatePicker::classname(), [
                                    'dateFormat' => 'yyyy-MM-dd']) ?>
                            </div>
                            <div class="form-group">
                                <?=$form->field($searchModel, 'lengthOfStay')->textInput(['type' => 'number'])->label()?>
                            </div>
                            <div class="form-group margin-bottom-0">
                                <?= $form->field($searchModel, 'maxStarRating')
                                    ->dropDownList([1=>'1 Star',2=>'2 Stars',3=>'3 Star',4=>'4 Star',5=>'5 Star'],['prompt'=>'Hotel Stars','id' => 'rules_id']) ?>
                            </div>
                        </div>
                        <div class="form-group tm-yellow-gradient-bg text-center">
                            <?= \yii\helpers\Html::submitButton('Find', ['class' => 'tm-yellow-btn']) ?>
                        </div>
                    </div>
                    <?php \yii\widgets\ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="tm-home-box-1 tm-home-box-1-2 tm-home-box-1-center">
            <img src="img/index-01.jpg" alt="image" class="img-responsive">
            <a href="<?=\yii\helpers\Url::toRoute(['hotel/index' ,'Hotel[destinationCity]'=>'Berlin','Hotel[maxStarRating]'=>5])?>">
                <div class="tm-green-gradient-bg tm-city-price-container">
                    <span>Berlin</span>
                </div>
            </a>
            <div class="tm-green-gradient-bg tm-city-price-container">
                     <span>
                         <?= \kartik\rating\StarRating::widget([
                             'name' => 'rating_35',
                             'value' => 5,
                             'pluginOptions' => ['displayOnly' => true]
                         ]);
                         ?>
                     </span>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="tm-home-box-1 tm-home-box-1-2 tm-home-box-1-right">
            <img src="img/index-02.jpg" alt="image" class="img-responsive">
            <a href="<?=\yii\helpers\Url::toRoute(['hotel/index','Hotel[destinationCity]'=>'Paris','Hotel[maxStarRating]'=>5])?>">
                <div class="tm-red-gradient-bg tm-city-price-container">
                    <span>Paris</span>
                </div>
            </a>
            <div class="tm-red-gradient-bg tm-city-price-container">
                     <span>
                        <?= \kartik\rating\StarRating::widget([
                            'name' => 'rating_35',
                            'value' => 5,
                            'pluginOptions' => ['displayOnly' => true]
                        ]);
                        ?>
                     </span>
            </div>
        </div>
    </div>
</div>