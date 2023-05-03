<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;
class KooraNewsController extends Controller
{
  public function koora()
  {
    $client = new Client();
    $crawler = $client->request('GET', 'https://www.filgoal.com/articles');

    $news=[];

    $index=0;

    $crawler->filter('#list-box ul  li')->each(function ($node)use(&$news,&$index) {
        // print $node->text()."\n";
        // Title
        $node->filter('a div h6')->each(function($node)use(&$news,&$index){

            $news[$index]['title']=$node->text();

        });
            // body
        $node->filter('a div p')->each(function($node)use(&$news,&$index){

            $news[$index]['body']=$node->text();



        });

        // img
        $node->filter('a img')->each(function($node)use(&$news,&$index){

            if(empty($node->attr('data-src')))return;
            $news[$index]['img']='https:'.$node->attr('data-src');


        });
        $index++;

    });
    return view('ss',compact('news'));
  }
}
