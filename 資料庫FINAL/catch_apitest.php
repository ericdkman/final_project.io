<?php 
/* *
 * 類名：MapCalc
 * 功能：google map 地址轉經緯度  
 * 建立者：Aidec
 * 說明：  
 */
  
class MapCalc
{
   
    function getPageData($url){ 
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);  
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect: '));
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        //curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_NOBODY, false);
        curl_setopt($ch, CURLOPT_FILETIME, true);
        curl_setopt($ch, CURLOPT_REFERER, $url);
         
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 4);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)");
        //取得原始碼
        $result['data'] = curl_exec($ch);
        //$info_tmp = curl_getinfo($ch);
        //取得info資訊
        //$result['info'] = $info_tmp;
        unset($info_tmp);
        curl_close($ch);
          
        return $result;
     }
    /** 
     * 初始化 
     * @param $apikey 金鑰 
     */ 
     function __construct($apikey=''){   
         $this->apikey = $apikey;
     } 
    /* 
     * 獲取地址經緯度 - 從google map
     */  
    public function getAddressLatLng($addr='',$apikey=''){
      $apikey = ($apikey=='') ? $this->apikey : $apikey;
  
      $url = 'http://maps.google.com/maps/api/geocode/json?address='.$addr.'&sensor=false&APIKEY='.$apikey;
      $geocode=$this->getPageData($url);
      if(isset($geocode['data'])){
        $geocode = $geocode['data'];
      } 
  
      $output= json_decode($geocode); 
      $latitude = $output->results[0]->geometry->location->lat;
      $longitude = $output->results[0]->geometry->location->lng; 
     
      return array('lat'=>$latitude,'lng'=>$longitude);
    } 
}
//使用方式
$gmap = new MapCalc('AIzaSyAzgjs1Ji_aegwfA9ITXNkura2Znmt8DYo'); //填入金鑰
$data = $gmap->getAddressLatLng('台北市信義路五段7號'); //填入地址
?>