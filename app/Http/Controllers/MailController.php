<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail; 

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller {
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
      $data = array('name'=>"Virat Gandhi");
      Mail::send('mail', $data, function($message) {
         $message->to('hountluc@gmail.com', 'Tutorials Point')->subject
            ('Rapport Laravel HTML Testing Mail');
         $message->from('lhountondji@sbin.bj','Virat Gandhi');
      });
      echo "HTML Email Sent. Check your inbox.";
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
}
