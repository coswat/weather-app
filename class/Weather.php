<?php
declare(strict_types=1);
require 'ApiCall.php';

class Weather extends ApiCall{
  private string $ip;
  private array $details;
  public function __construct(string $ip){
    $this->ip = $ip;
  }
    public function load()
  {
    return $this->details;
    
  }
  public function getInfo():?string
  {
    $url = 'https://api.ipfind.com/?ip='.$this->ip.'';
    $apidata = $this->apiCall($url);
   $longitude = $apidata->longitude;
   $latitude = $apidata->latitude;
   return $this->getWeather($latitude,$longitude);
  }
  private function getWeather(int|float $latitude,int|float $longitude):void
  {
    //to get api key go https://openweathermap.org
    $apikey = 'API KEY HERE';
    $url = 'https://api.openweathermap.org/data/2.5/weather?lat='.$latitude.'&lon='.$longitude.'&appid='.$apikey.'&units=metric';
    
    $apidata = $this->apiCall($url);
    $this->details[] = $apidata;
  }

}
