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
    $url = 'https://api.ipfind.com/?ip=137.97.95.147';
    $apidata = $this->apiCall($url);
   $longitude = $apidata->longitude;
   $latitude = $apidata->latitude;
   return $this->getWeather($latitude,$longitude);
  }
  public function getWeather(int|float $latitude,int|float $longitude):void
  {
    $url = 'https://api.openweathermap.org/data/2.5/weather?lat='.$latitude.'&lon='.$longitude.'&appid=7de46e453e1e91be61b09af02bcfbc7b&units=metric';
    
    $apidata = $this->apiCall($url);
    $this->details[] = $apidata;
  }

}
