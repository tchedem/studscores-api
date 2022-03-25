<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
// use Illuminate\Http\Client\ConnectionException;
use Mail;
use Carbon\Carbon;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller {

    public function extraction_mailler(){

    }

   //  public function api_email($user_email, $clientMesssage) {
    public function api_email($user_email, $clientMesssage) {
         dd($user_email);
        $data = array('name'=>"StudScore API");
        Mail::send('mail', $data, function($message) use($user_email, $clientMesssage) { dd($user_email);
            $message->to('hountluc@gmail.com', 'Tutorials Point')->subject
               ('Rapport Laravel HTML Testing Mail');
            $message->from('lhountondji@sbin.bj','Virat Gandhi');
        });
    }


   public function basic_email() {

      $data = array('name'=>"StudScore API");

      Mail::send(['text'=>'mail'], $data, function($message) {
         $message->to('hountluc@gmail.com', 'Tutorials Point')->subject
            ('Laravel Basic Testing Mail');
         $message->from('stuscore@api.test','Virat Gandhi');
      });

      echo "Basic Email Sent. Check your inbox.";

   }

    public function html_email() {
        // dd(Carbon::now()->format('H:i:m'));
        // date_default_timezone_set('Europe/Paris');
        // dd(date('d-m-y h:i:s'));
        $tableName = 'Table name';
        $format = 'json';
        $data = array('email'=>'hountluc@gmail.com', 'name'=>"Username", "tableName"=>'Table name', "format"=>"json");

        try {
            Mail::send('mail', $data, function($message) use ($data) {
                $message->to($data['email'], 'Username')->subject("Notification d'extraction");
                $message->from('studscoresapi@gmail.com','Studscore API');
            });
            if(1){
                echo "HTML Email Sent. Check your inbox.";
            }else{
                return "hey";
            }


        } catch(\Exception $e)
        {
            //log error
            return ("Mail didn't send");
        }

    }

   public function attachment_email() {
      $data = array('name'=>"Virat Gandhi");
      Mail::send('mail', $data, function($message) {
         $message->to('lhountondji@sbin.bj', 'Tutorials Point')->subject
            ('Laravel Testing Mail with Attachment');
         $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
         $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
         $message->from('xyz@gmail.com','Virat Gandhi');
      });
      echo "Email Sent with attachment. Check your inbox.";
   }


   public function extractionsMailler($user_email, $username, $tableName, $format){

    // $data = array('email'=>'hountluc@gmail.com', 'name'=>"Username", "tableName"=>'Table name', "format"=>"json");
    $data = array('userEmail'=>$user_email, 'name'=>$username, "tableName"=>$tableName, "format"=>$format);

        try {

            Mail::send('mail', $data, function($message) use ($data) {
                $message->to($data['userEmail'], $data['name'])->subject("Notification d'extraction");
                $message->from('studscoresapi@gmail.com','Studscore API');
            });
            return true;

        } catch(\Exception $e)
        {
            //log error
            return false;
        }
    }

}
