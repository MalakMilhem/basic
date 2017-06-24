<?php
namespace app\lib;


/**
 * WebService this is a small library which send the actual request
 * get, request ,getResponse and getResponseAsJsonObject is the current function
 *
 * you can add post and put functions to refer to post and put verbs
 * @property string $url
 * @property array $params
 * @property resource $_curl
 * @property array $_response
 * @property array $timeout
 *
 */

class WebService {
    public $url;
    public $params = [];
    private $_curl;
    private $_response;

    /** @var int request timeout in seconds */
    public $timeout = 3;

    //the __construct to initialize the object with important params url and _curl
    public function __construct($url) {
        if(empty($url)) {
            throw new \Exception("URL is mandatory");
        }
        $this->url = $url;
        $this->_curl = curl_init();
        curl_setopt($this->_curl, CURLOPT_URL, 0);
    }

    /**
     * Do GET request and pass the params in the url as query string
     * @return $this
     */
    public function get() {
        curl_setopt($this->_curl,CURLOPT_RETURNTRANSFER,true);
        if (!empty($this->params)) {
            $querySting = http_build_query($this->params);
            $this->url .= '?' . $querySting;
        }
        $this->request();
        return $this;
    }


    /**
     * Sends the actual request, this method will be called implicitly when calling get() method
     * to know more visit : http://php.net/manual/en/book.curl.php
     * @throws Exception
     */
    private function request() {
        curl_setopt_array($this->_curl, [
            CURLOPT_FRESH_CONNECT => 0,
            CURLOPT_FORBID_REUSE => 0,
            CURLOPT_BINARYTRANSFER => 1,
        ]);
        curl_setopt($this->_curl, CURLOPT_URL , $this->url);
        curl_setopt($this->_curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->_curl, CURLOPT_CONNECTTIMEOUT, $this->timeout );
        curl_setopt($this->_curl , CURLOPT_TIMEOUT, $this->timeout );
        $info = curl_getinfo($this->_curl);
        \Yii::info(print_r($info,true));

        $this->_response = curl_exec($this->_curl);

        if($this->_response === false) {
            throw new \Exception(curl_errno($this->_curl) . " " . curl_error($this->_curl) . $this->url );
        }

        curl_close($this->_curl);
    }

    /**
     * Returns response as plain text
     * @return string
     */
    public function getResponse() {
        return $this->_response;
    }

    /**
     * Returns response as json object
     * @param bool $assoc :When TRUE, returned array else return std object.
     * @return mixed
     */
    public function getResponseAsJsonObject($isArray=false) {
        return json_decode($this->_response,$isArray);
    }
}
