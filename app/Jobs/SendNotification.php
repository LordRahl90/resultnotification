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
        $sendto=$this->phone;
        $sender="RESULT";
        $message=$this->message;

        $client=new Client();
        $loginUrl="http://www.smslive247.com/http/index.aspx?cmd=login&owneremail=$owneremail&subacct=$subacct&subacctpwd=$subacctpwd";
        $loginResponse=$client->request('GET',$loginUrl);

        $responseContent=$loginResponse->getBody()->getContents();

        $status=substr($responseContent,0,2);

        if($status!="OK"){
            Log::info("An error occurred while attempting to login");
            return;
        }
        $sessionId=substr($responseContent,4,strlen($responseContent));

        $url="http://www.smslive247.com/http/index.aspx?cmd=sendmsg&sessionid=$sessionId&message=$message &sender=$sender&sendto=$sendto&msgtype=0";
        $client=new Client();
        $response=$client->request('GET',$url);
        $messageContent=$response->getBody()->getContents();
        $messageStatus=substr($messageContent,0,2);
        if($messageStatus!="OK"){
            Log::info("An error occurred while sending the SMS to ".$sendto);
            return;
        }

        Log::info("Message Sent Successfully to ".$sendto);
    }
}
