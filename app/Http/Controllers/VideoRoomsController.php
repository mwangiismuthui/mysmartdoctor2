<?php 

namespace App\Http\Controllers;

use Auth;
use App\Booking;
use Twilio\Rest\Client;
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VideoGrant;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request; 
 
   

class VideoRoomsController extends Controller
{
	protected $sid;
	protected $token;
	protected $key;
	protected $secret;

	public function __construct()
	{
	   $this->sid = "ACbb8fe036574535c66804f772ec6d6545";
	   $this->token = "cc8cb9c51189a4a0a05b57634807902e";
	   $this->key = "SK456cd0b394b308b8d86f9d29e44af651";
	   $this->secret = "Lj4p0seTSo6aZg7a5xYUNpcDGcAAr70g";
	}
	public function index()
	{
	   $rooms = [];
	   try {
	       $client = new Client($this->sid, $this->token);
	       $allRooms = $client->video->rooms->read([]);

	        $rooms = array_map(function($room) {
	           return $room->uniqueName;
	        }, $allRooms);

	   } catch (Exception $e) {
	       echo "Error: " . $e->getMessage();
	   }
	   return view('video.index', ['rooms' => $rooms]);
	}
	public function createRoom(Request $request)
	{
	   $client = new Client($this->sid, $this->token);

	   $exists = $client->video->rooms->read([ 'uniqueName' => $request->roomName]);

	   if (empty($exists)) {
	       $client->video->rooms->create([
	           'uniqueName' => $request->roomName,
	           'type' => 'group',
	           'recordParticipantsOnConnect' => false
	       ]);

	       \Log::debug("created new room: ".$request->roomName);
	   }

	   return redirect()->action('VideoRoomsController@joinRoom', [
	       'roomName' => $request->roomName
	   ]);
	}
	public function joinRoom($roomName,$id)
	{
        Booking::find($id)->update(['call_status' => '1']);

	   // A unique identifier for this user
	   $identity = Auth::user()->name;

	   \Log::debug("joined with identity: $identity");
	   $token = new AccessToken($this->sid, $this->key, $this->secret, 3600, $identity);

	   $videoGrant = new VideoGrant();
	   $videoGrant->setRoom($roomName);

	   $token->addGrant($videoGrant);

	   return view('video.room', [ 'accessToken' => $token->toJWT(), 'roomName' => $roomName ]);
	}
}