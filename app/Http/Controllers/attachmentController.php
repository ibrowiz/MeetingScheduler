<?php
namespace App\Http\Controllers;
set_time_limit(4000); 

use Illuminate\Http\Request;
use PhpImap\Mailbox as ImapMailbox;
use PhpImap\IncomingMail;
use PhpImap\IncomingMailAttachment;
use DateTime;
use App\Models\Meeting;
use App\Services\SocketClient;
use App\Models\Room;

class attachmentController extends Controller
{

    protected $update = false;
    protected $socket = null;


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index(){

        $this->socket = new SocketClient;

        $rooms = Room::get();

        foreach($rooms as $room)
        {

            $mails = $this->connect(trim($room->mail_server), trim($room->room_email), trim($room->password), trim($room->port));
            
            rsort($mails);
            if(!$mails) 
            {
                die('Mailbox is empty');
            }

            $count2 = 0;

            for($i = 0; $i< count($mails); $i++)
            {
                
                $mail = $this->mailbox->getMail($mails[$i]);
                $this->saveMail($mail, trim($room->room_email));
            }

            if($this->update == true){

                $this->socket->message($room->room_email, 'Room Update');
                echo "Updated <br/>";
                $this->update = false;

            }

        }

        shell_exec('rm -r '. __DIR__."/my_attachments/*");

    }


    public function connect($server, $email, $password, $port="993"){

        try{


             $this->mailbox = new ImapMailbox('{'.$server.':'.$port.'/imap/ssl/novalidate-cert}INBOX', $email, $password, __DIR__."/my_attachments", 'utf-8');

            return $this->mailbox->searchMailbox('ALL');

        }catch(\Exception $e){

            throw new \Exception("Connection Error");
        }

    }

    public function saveMail($mail, $room_email){


        $content = $mail->textHtml;
        //match only meeting invites
        preg_match('/BEGIN:VCALENDAR/',$content,$vcal);

        if(!empty($vcal[0]))
        {


            //$count2++;

            $contents = preg_replace('/<[^>]*>/', '', $content);//extract all html tags

            $contents1 = preg_replace("/[\n\r]/","",$contents);

            $str = $contents1;
            $word1 = 'DTSTART;TZID=';
            $word2 = 'D';
            $word3 = 'DTEND;TZID=';
            $word5 = 'DESCRIPTION';
            $word6 = '______________________';

            preg_match('/'.preg_quote($word1).'(.*?)'.preg_quote($word2).'/s', $str, $match);
            if(!isset($match[1])){
                
                preg_match('/'.preg_quote("DTSTART").'(.*?)'.preg_quote("D").'/s', $str, $match);

            }
            preg_match('/'.preg_quote($word3).'(.*?)'.'(D|AS|ST)'.'/s', $str, $match1);
            if(!isset($match1[1])){
                
                preg_match('/'.preg_quote("DTEND").'(.*?)'.preg_quote("DESCRIPTION").'/s', $str, $match1);

            }
            preg_match('/'.preg_quote($word5).'(.*?)'.preg_quote($word6).'/s', $str, $des);
            $newDes = explode('\n',$des[1]);
            preg_match('/'.'RRULE:FREQ='.'(.*?)'.';'.'/s', $str, $freq);
            preg_match('/'.'COUNT='.'(.*?)'.';'.'/s', $str, $count);
            preg_match('/'.'BYMONTHDAY='.'(.*?)'.'(UID:|;)'.'/s', $str, $byMonthDay);
            preg_match('/'.'BYDAY='.'(.*?)'.';'.'/s', $str, $byWeekDay);
            preg_match('/'.'INTERVAL='.'(.*?)'.'(S|;)'.'/s', $str, $interval);
            preg_match('/'.'BYMONTH='.'(.*?)'.'(UID:|;)'.'/s', $str, $byMonth);

            preg_match('/'.'OPAQUEUID:'.'(.*?)'.';'.'/s', $str, $opaqueuid);
            preg_match('/'.'SEQUENCE:'.'(.*?)'.'SUMMARY'.'/s', $str, $sequence);
            $byMonths;
            
            if(!empty($byMonth)){
                $byMonths = preg_replace('/\s+/','', $byMonth[1]);
            }

            preg_match('/'.'(LOCATION;LANGUAGE=en-GB:|LOCATION;LANGUAGE=en-US:|LOCATION:)'.'(.*?)'.'(ORGANIZER|X-MICROSOFT)'.'/s', $str, $location);
            preg_match('/[0-9]{8}T[0-9]{6}/',$match[1],$startstr);

            // dd($str);
            
            preg_match('/[0-9]{8}T[0-9]{6}/',$match1[1],$endstr);


            $byMthDy = 0;
            $listDay;

            //convert start time from ical to datetime
            $eventstrt = array('DTSTART'=>$startstr[0]);
            $startT = strtotime($eventstrt['DTSTART']);
            $rep = preg_replace('/T/',' ',date(DateTime::RFC3339,$startT));
            $repStart = explode("+",$rep);
            
            // dd($repStart);

            //convert end time from ical to datetime
            $eventend = array('DTEND'=>$endstr[0]);
            $endT = strtotime($eventend['DTEND']);
            $repEnd = preg_replace('/T/',' ',date(DateTime::RFC3339, $endT));
            $end = explode("+",$repEnd);



            //foreach ($meetings as $key => $value) {
            $loca = isset($location[2])? $location[2] : "";
            $res = Meeting::where('subject', $mail->subject)->where('from', $mail->fromName)->where('start_time', $repStart[0])->where('end_time', $end[0])->where('location',$loca)->first();

            // dd( isset($opaqueuid[1]) ? $opaqueuid[1] : null );

            //echo "<br/>" . is_null($res);
            //dd( is_null($res) );
            if( is_null($res) )
            {



                if(isset($repStart[0]) && isset($end[0]) ){
                    //save to database
                    $m = new Meeting;
                    $m->subject = $mail->subject;

                    if(count($newDes)<=3)
                    {
                        $newDesc = preg_replace('/(;LANGUAGE=en-GB:|:|;LANGUAGE=en-US)/','',$newDes[0]);
                        $m->description = $newDesc;
                    }
                    else
                    {
                        $m->description = isset($newDes[7]) ? $newDes[7] : $mail->subject;
                    }

                    $m->room_email = $room_email;
                    $m->from = $mail->fromName;
                    $m->from_mail = $mail->fromAddress;
                    $m->start_time =$repStart[0];
                    $m->end_time = $end[0];

                    $m->uuid = isset($opaqueuid[1]) ? $opaqueuid[1] : null;
                    $m->sequence = isset($sequence[1]) ? $sequence[1] : 0;

                    if(isset($count[1]))
                    {
                        $m->count = $count[1];
                    }
                    if(isset($byMonth[1]))
                    {
                        $m->month_of_year = $byMonths;
                    }
                    if(isset($byWeekDay[1]))
                    {
                        $listDay = preg_replace('/SEQUENCE:'.'(.*?)'.'SUMMARY/','',$byWeekDay[1]);
                        if(isset($listDay))
                        {
                            $m->day_s_of_week = $listDay;
                        }
                    }
                    if(isset($byMonthDay[1]))
                    {
                        preg_match('/[0-9]{1,2}/',$byMonthDay[1],$byMthDy);
                        $m->day_of_month = $byMthDy[0];
                    }
                    if(isset($freq[1]))
                    {
                        $m->frequency = $freq[1];
                    }
                    
                    $m->location = $loca;
                    if(isset($interval[1]))
                    {
                        $m->interval = $interval[1];
                    }

                    $m->save();

                    $this->update = true;

                }

            }
        }

    }

}

