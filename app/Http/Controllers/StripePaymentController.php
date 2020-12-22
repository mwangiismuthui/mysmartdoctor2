<?php
   
namespace App\Http\Controllers;
   
use Stripe;
use Session;
use App\Booking;
use Stripe\Charge;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
   
class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('front-end.stripe');
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        $data = Session::get('data'); 

        Stripe\Stripe::setApiKey('sk_test_51HihYYJShVFg8m38LXcQwoNP8MQuBw20m20RR0ByLcwovmMAp55p5hsgJmXLigCsawQ8Y6fapu7lafpzbdQZnGNN00UExrDv2T');
        Stripe\Charge::create ([
                "amount" => $data['total'],
                "currency" => "USD",
                "source" => $request->stripeToken,
                "description" => "Test payment from" 
        ]);

                $booking = Booking::where('doctor_id', $data['doctor_id'])
                ->where('date', $data['date'])
                ->latest()->first();
                if ($booking) {
                    $booking_no = $booking->booking_no  + 1;
                } else {
                    $booking_no = 1;
                }
                $bookingData = Booking::create([
                'date'=>$data['date'],
                'time'=>$data['starting_time'],
                'patient_id'=>Auth::user()->patient->id,
                'doctor_id'=>$data['doctor_id'],
                'booking_no'=>$booking_no,
                'total'=>$data['total'],
                'professional_fee'=>$data['booking'],
                'service_fee'=>$data['service'],
                'video_call_url'=>'room/join/'.Str::random(40)
                ]); 
                DB::table('doctor_availables')->where('id',$data['id'])->update(['status'=>'booked']);
  
        Session::flash('success', 'Payment successful!');
          
        return redirect('dashboard');
    }
}
