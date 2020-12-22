<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Payment;
use App\PaypalSetup;
use Omnipay\Omnipay;
use App\Advertisement;
use Str;
use Illuminate\Http\Request;
use App\SetAdvertisementCharge;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{

    public $gateway;

    // public function __construct()
    // {
    //     $this->gateway = Omnipay::create('PayPal_Rest');
    //     $this->gateway->setClientId('AXdvmO1ybSALfd9XoT1FM6SNDX6j-z0gCs7d6049oGFFl0-Tr8wLvwltEsprt87vdNQ426JvyC_piSdF');
    //     $this->gateway->setSecret('ED2pcVUsB_ocz5HqsfdhUmEJE2WikDOM9zytt_-Cum5BCZGJvPApEnUMEu36GBNrdu71bchBrtibBgzg');
    //     $this->gateway->setTestMode(true); //set it to 'false' when go live
    // }

    public function index()
    {
        return view('payment');
    }

    public function charge(Request $request)
    {


            try {
                $response = $this->gateway->purchase(array(
                    'amount' => $_GET['sadasdas'],
                    'currency' => 'USD',
                    'returnUrl' => url('paymentsuccess'),
                    'cancelUrl' => url('paymenterror'),
                ))->send();

                if ($response->isRedirect()) {
                    // $data = [
                    //     'name' => $request->name,
                    //     'user_id' =>Auth::user()->id,
                    // ];
                    // if ($request->hasFile('image')) {
                    //     $data['image'] = $request->file('image')
                    //         ->store('uploads', 'public');
                    // }
                    // Advertisement::create($data);
                    $getData = [
                        'starting_time' => $_GET['starting_time'],
                        'ending_time' => $_GET['ending_time'],
                        'date' => $_GET['date'],
                        'doctor_id' => $_GET['doctor_id'],
                        'id' => $_GET['id'],
                        'total' => $_GET['sadasdas'],
                        'service' => $_GET['service'],
                        'booking' => $_GET['booking']
                    ];
                    Session::put('data',$getData);
                    $response->redirect(); // this will automatically forward the customer
                } else {
                    // not successful
                    return $response->getMessage();
                }
            } catch(Exception $e) {
                return $e->getMessage();
            }

    }

    public function payment_success(Request $request)
    {

        // Once the transaction has been approved, we need to complete it.
        if ($request->input('paymentId') && $request->input('PayerID'))
        {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id'             => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId'),
            ));
            $response = $transaction->send();

            if ($response->isSuccessful())
            {
                $data = Session::get('data');
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
                    // The customer has successfully paid.
                    $arr_body = $response->getData();

                    // Insert transaction data into the database
                    $isPaymentExist = Payment::where('payment_id', $arr_body['id'])->first();

                if(!$isPaymentExist)
                {
                    $payment = new Payment;
                    $payment->payment_id = $arr_body['id'];
                    $payment->payer_id = $arr_body['payer']['payer_info']['payer_id'];
                    $payment->payer_email = $arr_body['payer']['payer_info']['email'];
                    $payment->amount = $arr_body['transactions'][0]['amount']['total'];
                    $payment->currency = 'USD';
                    $payment->payment_status = $arr_body['state'];
                    $payment->save();


                }

                Session::flash('success', 'Successfully Saved!');

                return redirect('admin/invoice/booking/'.$bookingData->id);
            } else {
                return $response->getMessage();
            }
        } else {
            return 'Transaction is declined';
        }
    }

    public function payment_error()
    {
        return 'User is canceled the payment.';
    }

}
