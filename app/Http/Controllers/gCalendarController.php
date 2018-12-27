<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use Carbon\Carbon;
use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use Google_Service_Calendar_EventDateTime;
use Illuminate\Http\Request;

use Session;

class gCalendarController extends Controller
{
     protected $client;

    public function __construct()
    {
        /*$client = new Google_Client();
        $client->setAuthConfig('client_secret.json');
        $client->addScope(Google_Service_Calendar::CALENDAR);
        $client->setAccessType("offline");
        $guzzleClient = new \GuzzleHttp\Client(array('curl' => array(CURLOPT_SSL_VERIFYPEER => false)));
        $client->setHttpClient($guzzleClient);
        $this->client = $client;*/

        $client = new Google_Client();
        $client->setAuthConfig('client_secret.json');
        $client->setAccessType("offline");        // offline access
        $client->setIncludeGrantedScopes(true);   // incremental auth
        $client->addScope(Google_Service_Calendar::CALENDAR);
        $client->setRedirectUri(url('oauth2callback'));

        $guzzleClient = new \GuzzleHttp\Client(array('curl' => array(CURLOPT_SSL_VERIFYPEER => false)));
        $client->setHttpClient($guzzleClient);

        $this->client = $client;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $this->client->setAccessToken($_SESSION['access_token']);
            $service = new Google_Service_Calendar($this->client);

            $calendarId = 'primary';


            $results = $service->events->listEvents($calendarId);
            return $results->getItems();

        } else {
            return redirect()->route('oauthCallback');
        }
        */

        if (Session::has('access_token')) {
            $this->client->setAccessToken(Session::get('access_token'));
            $service = new Google_Service_Calendar($this->client);

            $calendarId = 'primary';


            $results = $service->events->listEvents($calendarId);

             foreach ($results as $key => $value) {

            //$res = Meeting::where('title', $meetings[0]['title'][2])->where('name', $meetings[0]['name'][2])->where('start_time', $meetings[0]['start_time'][2])->where('end_time', $meetings[0]['end_time'][2])->first();

            
                $m = new Meeting;
                //$m->title = $results->getItems()[0]->description;
                $m->description = $results->getItems()[0]->description;
                $m->name = $results->getItems()[0]->organizer->displayName;
                $m->start_time = trim(preg_replace('/[a-zA-Z]/',' ',$results->getItems()[0]->start->dateTime));
                $m->end_time = trim(preg_replace('/[a-zA-Z]/',' ',$results->getItems()[0]->end->dateTime));
                //$m->end_time = $results->getItems()[0]->end->dateTime;
                $m->save();
            
            
       }

        return dd($results->getItems());

            //return dd($results->getItems()[0]->description);
            //return $results->getItems();

        } else {
            return redirect()->route('oauth2Callback');
        }

    }
    public function callback(Request $request)
    {
        /*
        $client = new Google_Client();
        $client->setAuthConfigFile('client_secret.json');
        $client->setRedirectUri(url('oauth2callback'));
        $client->addScope(Google_Service_Calendar::CALENDAR
        */

        if (!$request->has('code')) {
          $auth_url = $this->client->createAuthUrl();
          return redirect($auth_url);
         // header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
        } else {
          $this->client->authenticate($request->code);
          Session::put('access_token', $this->client->getAccessToken());
          return redirect()->route('gcalendar.index'); 
        }

    }
}
