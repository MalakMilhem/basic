<?php
/**
 * Created by PhpStorm.
 * User: malak
 * Date: 6/23/17
 * Time: 4:11 PM
 */

namespace app\lib;

/**
 * DataRetrieving this is a small library that handel the requests to the outside url's it contain :
 * getMostComfortableHotels, getRecomendedHotels and getTargetHotels functions and use singlton design patters to
 * create one instance in each request
 *
 * To add a new function, make sure to add the url as static attribute so in future it is easy to change
 * it without go throw al the code
 *
 */
class DataRetrieving
{
     // @var DataRetrieving The reference to *DataRetrieving* instance of this class
    private static $instance = null;

    // @var the basic url for the outside api
    const BASIC_URL = 'https://offersvc.expedia.com/offers/v2/getOffers';
    // @var $params array the query params should it be the each request
    public $params = [];

    //the __construct to initialize the object with important params
    function __construct(){
        $this->params['scenario']    = 'deal-finder';
        $this->params['page']        = 'foo';
        $this->params['uid']         = \Yii::$app->user->isGuest?'foo':\Yii::$app->user->name;
        $this->params['productType'] = 'Hotel';
    }

    /**
     * Returns the *DataRetrieving* instance of this class
     * @return DataRetrieving The *DataRetrieving* instance.
     */
    public static function getInstance()
    {
        if (!isset(static::$instance)) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    /**
     * call the actual request to get Comfortable hotels .
     * @param int $limit number of data wich should return
     * @return array of hotels
     * @catch Exception to write it in log file and return empty array
     */
    public function getMostComfortableHotels(int $limit=4){
        //create new object from webService library and pass the url and params to it
        $webService = new WebService(self::BASIC_URL);
        $webService->timeout = 10;
        //here we get the hotels based on the minStarRating criteria
        $webService->params  =  $this->params + ['minStarRating'=>5];
        //send the request by using webservice object .
        try {
            $response = $webService->get()->getResponseAsJsonObject(true);
            $result = [];
            for ($count = 0; $count < $limit; $count++) {
                $result[] = $response['offers']['Hotel'][$count];
            }
            return $result;
            // catch the exception for ex: timeout or empty data
        } catch (\Exception $e) {
            \Yii::info("getMostComfortableHotels Exception {$e->getMessage()}");
            return [];
        }
    }

    /**
     * call the actual request to get Recomended hotels .
     * @param int $limit number of data wich should return
     * @return array of hotels
     * @catch Exception to write it in log file and return empty array
     */
    public function getRecomendedHotels(int $limit=10){
        //create new object from webService library and pass the url and params to it
        $webService = new WebService(self::BASIC_URL);
        $webService->timeout = 10;
        //here we get the hotels based on the minGuestRating criteria
        $webService->params  =  $this->params + ['minGuestRating'=>5];
        //send the request by using webservice object .
        try {
            $response = $webService->get()->getResponseAsJsonObject(true);
            $result = [];
            for ($count = 0; $count < $limit; $count++) {
                $result[] = $response['offers']['Hotel'][$count];
            }
            return $result;
            // catch the exception for ex: timeout or empty data
        }catch (\Exception $e) {
            \Yii::info("getRecomendedHotels Exception {$e->getMessage()}");
            return [];
        }
    }


    /**
     * call the actual request to get target hotels .
     * @param array $params  user critira
     * @return array of hotels
     * @catch Exception to write it in log file and return empty array
     */
    public function getTargetHotels($params){
        //create new object from webService library and pass the url and params to it
        $webService = new WebService(self::BASIC_URL);
        $webService->timeout = 10;
        //here we get the hotels based on the user search criteria
        $webService->params  =  $this->params + $params;
        //send the request by using webservice object .
        try {
            $result = $webService->get()->getResponseAsJsonObject(true);
            return empty($result['offers']['Hotel']) ? [] : $result['offers']['Hotel'];
            // catch the exception for ex: timeout or empty data
        }catch (\Exception $e) {
            \Yii::info("getTargetHotels Exception {$e->getMessage()}");
            return [];
        }
    }

}