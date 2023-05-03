<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Goutte;
class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'maysara';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $date=Carbon::now()->format('Y-m-d');
        echo $date;
        $crawler = Goutte::request('GET', 'https://www.filgoal.com/matches/?date='.$date);

        $crawler->filter('#match-list-viewer')->each(function ($node) {
        //   dump($node->text());
          $jomb =  $node->filter('h6')->each(function($node){
                return $node->text();
            });

            $matches= $node->filter('.mc-block .cin_cntnr')->each(function($node){
                return $clubs = $node->filter('.c-i-next')->each(function($node){
                    $first = $node->filter('.f')->each(function($node){
                        $aname=$node->filter('.a')->each(function($node){
                            return $node->text();
                        });
                       $scor= $node->filter('.b')->each(function($node){
                            return $node->text();
                        });
                        return [
                            'aname'=>$aname,
                            'scor'=>$scor,
                        ];


                    });

                    $second = $node->filter('.s')->each(function($node){

                        $ename=$node->filter('.a')->each(function($node){
                            return $node->text();
                        });
                       $scor= $node->filter('.b')->each(function($node){
                            return $node->text();
                        });
                        return [
                            'ename'=>$ename,
                            'scor'=>$scor,
                        ];

                    });




                    $med = $node->filter('.m')->each(function($node){
                        return $node->text();
                    });
                    return [
                        'first'=>$first,
                        'second'=>$second,
                        'med'=>$med,
                    ];
                });
            });

            dd($jomb , $matches);
    });
        return 0;
    }
}
