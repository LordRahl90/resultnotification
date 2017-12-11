<?php

namespace App\Jobs;

use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;

class SendNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $message;
    public $phone;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($message,$phone)
    {
        $this->message=$message;
        $this->phone=$phone;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $owneremail="tolaabbey001@hotmail.com";
        $subacct="FPEALERT";
        $subacctpwd="fabregas";
        $sendto="08155126203";
        $sender="RESULT";
        $message="This is a test";


        $client=new Client();
        $loginUrl="http://www.smslive247.com/http/index.aspx?cmd=login&owneremail=$owneremail&subacct=$subacct&subacctpwd=$subacctpwd";
        $loginResponse=$client->request('GET',$loginUrl);

        dd($loginResponse->getBody()->getContents());


//        $url="http://www.smslive247.com/http/index.aspx?cmd=sendquickmsg&owneremail=$owneremail
//         &subacct=$subacct&subacctpwd=$subacctpwd&message=$message&sender=$sender&sendto=$sendto&msgtype=0";

        $client=new Client();
        $response=$client->request('GET',$url);
        Log::info($response->getBody()->getContents());

//        if ($f = @fopen($url, "r")) {
//            $answer = fgets($f, 255);
//            if (substr($answer, 0, 1) == "+") {
//                Log::info("SMS to $sendto was successful.");
//            } else {
//                Log::info("an error has occurred: [$answer].");
//            }
//        }
//        else{
//            Log::info("Error: URL could not be opened.");
//        }

        Log::info($this->phone);
        Log::info($this->message);
        Log::info("Process done!!");
    }
}
