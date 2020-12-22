<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use PDF;
use Artisan;
use App\Blog;
use App\Chat;
use App\Page;
use App\DoctorAvailable;
use App\Doctor;
use App\Prescription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $doctors= Doctor::all();
        return view('front-end.doctor-list',compact('doctors'));
    }
    public function page($slug)
    {
        $page= Page::where('slug',$slug)->first();
        return view('front-end.page',compact('page'));
    }
    public function blogShow($id)
    {
        $blog= Blog::find($id);
        return view('front-end.blog',compact('blog'));
    }
    public function search(Request $request)
    {
        $keyword = $request->get('search');
        $doctors= Doctor::where('given_name', 'LIKE', "%$keyword%")
                 ->orWhere('specialization', 'LIKE', "%$keyword%")
                 ->orWhere('location', 'LIKE', "%$keyword%")
                ->latest()->get();
                // dd($doctors);
        return view('front-end.doctor-list',compact('doctors'));
    }
    public function detail($id)
    {
        $doctor= Doctor::findOrFail($id);
            // dd($doctor);
            // $doctoravailable = DoctorAvailable::where('doctor_id',Auth::user()->doctor->id)->where('status',null)->whereBetween('date', [date('Y,m,d'), date('Y-m-d', strtotime("+1 week"))])
            $doctoravailable = DoctorAvailable::where('doctor_id',$id)->where('status',null)->whereBetween('date', [date('Y,m,d'), date('Y-m-d', strtotime("+1 week"))])
            ->orderBy('date','asc')
            ->get();
        // dd($doctoravailable);
        return view('front-end.doctor-booking',compact('doctor','doctoravailable'));
    }

    // pdf for pric download
    public function generatePDF($id)
    {
        $prescription = Prescription::findOrFail($id);
        // dd($prescription);
        // return view('admin.prescription.show', compact('prescription'));

        $data = [
            'name' => $prescription->name,
            'age'=> $prescription->age,
            'sex'=> $prescription->sex,
            'drug_name'=> $prescription->drug_name,
            'frequency'=> $prescription->frequency,
            'number_of_days'=> $prescription->number_of_days,
            'instructions'=> $prescription->instructions,
            'dr_name'=> $prescription->dr_name,
            'registration_number'=> $prescription->registration_number,
            'digital_signature'=> $prescription->digital_signature,
        ];
        $pdf = PDF::loadView('pdf', $data);

        return $pdf->download('itsolutionstuff.pdf');
    }
    public function xray(Request $request)
    {
        $data = $request->except('_token','doctor_id', 'patient_id','save_send');
        if ($request->hasFile('external_source')) {
            $data['external_source'] = $request->file('external_source')
                ->store('uploads', 'public');
        }

        $info =  DB::table('doctor_xray')->insertGetId($data);
        $data =[];
        if ($request->save_send == 'SAVE & SEND') {
            $data['from'] = Auth::user()->id;
            $data['to'] = $request->patient_id;
            $address = url('admin/xray/message/'.$info);
            $html = '<a href='.$address.'>Xray click here for download and show</a>';
            $data['content'] = $html;
            Chat::create($data);
         }
        return redirect()->back();
    }
    public function referral(Request $request)
    {
        $data = $request->except('_token','doctor_id', 'patient_id','save_send');
        $info =  DB::table('doctor_referral')->insertGetId($data);
        $data =[];
        if ($request->save_send == 'SAVE & SEND') {
            $data['from'] = Auth::user()->id;
            $data['to'] = $request->patient_id;
            $address = url('admin/referral/message/'.$info);
            $html = '<a href='.$address.'>referral letter click here for download and show</a>';
            $data['content'] = $html;
            Chat::create($data);
         }
        return redirect()->back();
    }
    public function referralShow($id)
    {
        $referral = DB::table('doctor_referral')->where('id',$id)->first();
        return view('admin.prescription.referral',compact('referral'));
    }
    public function certificate(Request $request)
    {
        $data = $request->except('_token','doctor_id', 'patient_id','save_send');
        $info =  DB::table('doctor_certification')->insertGetId($data);
        $data =[];
        if ($request->save_send == 'SAVE & SEND') {
            $data['from'] = Auth::user()->id;
            $data['to'] = $request->patient_id;
            $address = url('admin/certificate/message/'.$info);
            $html = '<a href='.$address.'>medical certoficate  click here for download and show</a>';
            $data['content'] = $html;
            Chat::create($data);
        }
        return redirect()->back();
    }
    public function certificateShow($id)
    {
        $certoficate  = DB::table('doctor_certification')->where('id',$id)->first();
        return view('admin.prescription.certoficate',compact('certoficate'));
    }
    public function labReport(Request $request)
    {
        // dd($request->all());
        $data = $request->except('_token','doctor_id', 'patient_id','save_send');
        if ($request->hasFile('external_source')) {
            $data['external_source'] = $request->file('external_source')
                ->store('uploads', 'public');
        }

        $info =  DB::table('doctor_lab_report')->insertGetId($data);
        $data =[];
        if ($request->save_send == 'SAVE & SEND') {
            $data['from'] = Auth::user()->id;
            $data['to'] = $request->patient_id;
            $data['content'] = url('/admin/lab-report/message/'.$info);
            $html = '<a href='.$data['content'].'>Lab report click here for download and show</a>';
            $data['content'] = $html;
            Chat::create($data);
         }
        return redirect()->back();
    }
    public function xrayShow($id)
    {
        $xray = DB::table('doctor_xray')->where('id',$id)->first();
        return view('admin.prescription.xray',compact('xray'));
    }
    public function labReportShow($id)
    {
        $labReport = DB::table('doctor_lab_report')->where('id',$id)->first();
        return view('admin.prescription.lab-report',compact('labReport'));
    }
    public function crud2index()
    {
        return view('crud2');
    }

    public function crudIndex()
    {
        return view('crud');
    }

    public function jsonSave(Request $request)
    {
        $request->validate([
            'modelName' => 'required',
        ]);
        $validate = [];
        $formdata = [];
        $relationships = [];
        $foreign_keys = [];
        DB::table('crud')->truncate();
        $myFile = "data.json";
        $arr_data = [];

        try
        {
            if ($request->name != null) {
                foreach ($request->name as $i => $value) {
                    $formdata[$i] = [
                        'name' => $request->name[$i],
                        'type' => $request->type[$i],
                    ];
                }
            }

            if ($request->referencesTable != null) {
                foreach ($request->referencesTable as $i => $value) {
                    if ($request->referencesTable[$i] != null) {
                        $foreign_keys[$i] = [
                            "column" => $request->name[$i],
                            "references" => $request->referencesField[$i],
                            "on" => $request->referencesTable[$i],
                            "onDelete" => "cascade",

                        ];
                    }
                }
            }
            $foreign_keys = array_values($foreign_keys);
            if ($request->name) {
                foreach ($request->name as $i => $value) {
                    if ($request->required[$i] != 'not') {
                        $validate[$i] = [
                            'field' => $request->name[$i],
                            'rules' => $request->required[$i],
                        ];
                    }
                }
            }
            if ($request->rname != null) {
                foreach ($request->rname as $i => $value) {
                    $relationships[$i] = [
                        'name' => $request->rname[$i],
                        'class' => $request->class[$i],
                        'type' => $request->rtype[$i],
                    ];
                }
            }

            $final = [
                'fields' => $formdata,
                'foreign_keys' => $foreign_keys,
                'validations' => $validate,
                'relationships' => $relationships,
            ];

            $jsondata = file_get_contents($myFile);
            $final = json_encode($final);
            DB::table('crud')->insert([
                'content' => $final,
            ]);

            $arr_data = json_decode($jsondata, true);
            $jsondata = json_encode($final, JSON_PRETTY_PRINT);
            $res = DB::table('crud')->first();
            if (file_put_contents($myFile, $res->content)) {
                echo 'Data successfully saved';
            } else {
                echo "error";
            }

        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
        if ($request->name != null) {
            Artisan::call('crud:generate "' . $request->modelName . '" --fields_from_file="data.json" --view-path=admin --controller-namespace=Admin --route-group=admin --form-helper=html');
            Artisan::call('migrate');

            return redirect()->back()->with('success', 'make successfully!');

        }
        return redirect()->back()->with('error', 'error Give the input carefully!');

    }
    public function crudMaker(Request $request)
    {
        $request->validate([
            'modelName' => 'required',
        ]);

        $fields = '';
        foreach ($request->fields as $key => $value) {
            $fields .= $value;
        }
        if ($request->name != null) {
            Artisan::call("crud:generate '" . $request->modelName . "' --fields='" . $fields . "'--view-path=admin --controller-namespace=Admin --route-group=admin --form-helper=html");
            return redirect()->back()->with('success', 'make successfully!');
        }
        return redirect()->back()->with('error', 'error Give the input carefully!');

    }

}
