<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;

class Wbtc extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wbtc:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected $client;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->client = new \GuzzleHttp\Client(['cookies' => true]);
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('爬取 https://58.com 站点中 ...');

        // $res = $this->client->request('POST', 'https://passport.58.com/login/pc/dologin', [
        //     'form_params' => [
        //         'email' => '18511337033',
        //         'password' => 'layg1025'
        //     ]
        // ]);

        $url = 'http://bj.58.com/chuzu/0/j2/?PGTID=0d3090a7-0000-1736-ea0c-6d79499dc6a6&ClickID=2';
        $content = file_get_contents($url);
        // $content = iconv("gb2312", "utf-8//IGNORE",$content);
        $reg = "|<div class=\"des\">(.*?)<\/div>|is"; 
        $res = preg_match_all($reg, $content, $match);
        // dump($match[1]);
        
        foreach ($match[1] as $key => $value) {
            if ($key == 2) {
                $h2 = "|<h2[^>]*>(.*?)<\/h2>|is";
                preg_match_all($h2, $value, $mat);
                dump($mat);
                die;
            }
        }

    }
}
