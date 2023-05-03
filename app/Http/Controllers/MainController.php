<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Goutte;
class MainController extends Controller
{

    private $results =array();

   public function index()
   {
    //     $crawler = Goutte::request('GET', 'https://www.filgoal.com/matches/?date='.$date);

    $page=new Client();
    $url='https://www.worldometers.info/world-population/egypt-population/';
    $url2='https://www.worldometers.info/coronavirus/';
    $page = Goutte::request('GET', $url2);

    // echo $page->filter('.maincounter-number')->text();

    $page->filter('#maincounter-wrap')->each(function($item){


            $this->results[$item->filter('h1')->text()]=$item->filter('.maincounter-number')->text();

    });
    $data = $this->results;


    //  return $data;



     return view('index',compact('data'));
   }
}
