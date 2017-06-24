<?php

namespace app\models;

use app\lib\DataRetrieving;
use yii\base\Exception;
use yii\base\Model;

/**
 * Hotel is the model which will use in the controllers
 * his responsibility is to give the controllers the data they want
 * @property date $minTripStartDate
 * @property date $maxTripStartDate
 * @property integer $lengthOfStay
 * @property string $destinationCity
 * @property integer $maxStarRating
 * @property integer $minStarRating

 */
class Hotel extends Model
{
    public $minTripStartDate;
    public $maxTripStartDate;
    public $lengthOfStay;
    public $destinationCity;
    public $maxStarRating;
    public $minStarRating;

    /**
     * this function implement the rules for each attribute
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // the minTripStartDate, maxTripStartDate attributes are required
            [['minTripStartDate', 'maxTripStartDate'], 'required'],
            // the destinationCity attribute should be a valid string
            ['destinationCity', 'string'],
            // the minTripStartDate and maxTripStartDate attribute should be a valid Date in the provided formate
            [['minTripStartDate','maxTripStartDate'], 'date','format' => 'yyyy-MM-dd'],
            // the lengthOfStay attribute shouldn't has value less than 1
            [['lengthOfStay'],'integer' ,'min' => 1],
            // the lengthOfStay attribute shouldn't has value less than 0
            [['maxStarRating','minStarRating'],'integer' ,'min' => 0],
            // the minTripStartDate attribute shouldn't has value less than the current date
            ['minTripStartDate','validateDate' ,'skipOnEmpty' => false, 'skipOnError' => false],
        ];
    }


    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'minTripStartDate' => 'Min Trip Start Date',
            'maxTripStartDate' => 'Max Trip Start Date',
            'lengthOfStay'     => 'length Of Stay',
            'destinationCity ' => 'Destination City',
            'maxStarRating'    => 'Max Star Rating',

        ];
    }

    /**
     * @param $attribute $attribute current attribute which will check the value of it
     * will check if the attribut has value less than the current data and then add error message
     */
    public function validateDate($attribute)
    {
        if (strtotime($this->$attribute) < time() ) {
            $this->addError($attribute, 'the Selected Time must be large than the current Date');
        }
    }

    /**
     * call the actual request to get most comfortable hotels  .
     * @return array of hotels
     * @catch Exception to write it in log file and return empty array
     */
    public function getMostComfortableHotels(){
        $dataModel = DataRetrieving::getInstance();
        try {
            return $dataModel->getMostComfortableHotels();

        } catch (Exception $e) {
            \Yii::info("getMostComfortableHotels Exception {$e->getMessage()}");
            return [];
        }
    }

    /**
     * call the actual request to get recomended hotels.
     * @return array of hotels
     * @catch Exception to write it in log file and return empty array
     */
    public function getRecomendedHotels(){
        $dataModel = DataRetrieving::getInstance();
        return $dataModel->getRecomendedHotels();
    }

    /**
     * call the actual request to get target hotels  .
     * @return array of hotels
     */
    public function getTargetHotels($params){
        $dataModel = DataRetrieving::getInstance();
        try {
            return $dataModel->getTargetHotels($params);
        } catch (Exception $e) {
            \Yii::info("getTargetHotels Exception {$e->getMessage()}");
            return [];
        }
    }

}
