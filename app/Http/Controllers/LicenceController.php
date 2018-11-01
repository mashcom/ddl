<?php

namespace App\Http\Controllers;

use App\Licence;
use App\LicenceClass;
use App\Qr;
use App\Rules\DateOfIssue;
use App\Rules\DobValid;
use Carbon\CarbonInterval;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Pusher\Pusher;
use Pusher\PusherException;
use Intervention\Image\Facades\Image;

class LicenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (isset($_GET['q'])) {
            $search_value = $_GET['q'];
            $licences = Licence::orderBy('id', 'desc')->where('name', 'like', '%' . $search_value . '%')->orWhere('national_id', 'like', '%' . $search_value . '%')
                ->orWhere('licence_no', 'like', '%' . $search_value . '%')->paginate(50);
            return view('licences', ['licences' => $licences])->with('success', 'Search results for ' . $search_value);
        }

        $licences = Licence::orderBy('id', 'desc')->paginate(30);
        return view('licences', ['licences' => $licences]);
    }


    /**
     * Search licences
     * @param $term
     * @return View
     */
    public function search($search_value)
    {
        $licences = Licence::orderBy('id', 'desc')->where('name', 'like', '%' . $search_value . '%')->orWhere('national_id', 'like', '%' . $search_value . '%')
            ->orWhere('licence_no', 'like', '%' . $search_value . '%')->get();
        return view('licences', ['licences' => $licences]);
    }


    /**
     * Show active authentication qr key
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function qr()
    {
        $qr = Qr::orderBy('id', 'desc')->first();
        return view('qr', ['qr' => $qr]);
    }

    /**
     * Update the authentication qr code
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function generateQr()
    {
        $QR = new Qr();
        $QR->code = sha1(rand(1, 9999999));
        if ($QR->save()) {
            return back()->with('success', 'QR Authentication Key Updated');

        }
        return back()->withErrors(['Error updating QR Authentication Key']);
    }

    /**
     * Authenticate through json api. Fo use by mobile device
     * @param $licence_no
     * @param $password
     * @return \Illuminate\Http\JsonResponse
     */
    public function auth($licence_no, $password)
    {
        $licence = Licence::whereLicenceNo($licence_no)->wherePassword(sha1($password))->first();
        // dd($licence);
        return response()->json($licence);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $national_id = strtoupper(trim($request->national_id));
        $request->national_id = preg_replace("^\\s^", "", $national_id);
        $request->name = trim($request->name);

        $request->dob = date_format(date_create($request->dob), 'Y');
        $request->date_of_issue = date_format(date_create($request->date_of_issue), 'd/m/Y');

        //dd($request->dob);
        $request->validate([
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:4048',
            'name' => array('required', 'regex:/^([a-zA-Z\' ]+)$/'),
            'email' => 'required|email|unique:licences',
            'national_id' => array(
                'required',
                'unique:licences',
                'regex: [^\\d{2}-?\\d{6,7}-?[A-Za-z]{1}-?\\d{2}$]'
            ),
            'gender' => 'required',
            'dob' => ['required','date',new DobValid],
            'date_of_issue' => ["required","date","after:dob",new DateOfIssue],
            'licence_no' => 'required|unique:licences|regex:[^\\d{5}?[A-Za-z]{2}$]'

        ]);

        $licence = new Licence();
        $licence->name = $request->name;
        $licence->national_id = $request->national_id;
        $licence->dob = $request->dob;
        $licence->licence_no = $request->licence_no;
        $licence->date_of_issue = $request->date_of_issue;
        $licence->gender = $request->gender;
        $licence->email = $request->email;

        $imageName = $request->licence_no . "-" . sha1(time()) . '.' . $request->image->getClientOriginalExtension();
        $path = public_path('images/' . $imageName);
        $img = Image::make($request->image->getRealPath());
        $img->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        $img->save($path);
        $licence->image = $imageName;

        if ($licence->save()) {
            $c1 = ["class1" => $request->class1, "class2" => $request->class2, "class3" => $request->class3, "class4" => $request->class4, "class5" => $request->class5];
            LicenceClass::updateOrCreate(["licence_id" => $licence->id, "class" => json_encode($c1)]);

            return back()->with('success', 'Record saved successfully');
        }
        return back()->withErrors(['Record could not be saved']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $licence = Licence::with('licence_class')->whereId($id)->first();
        $licence_class = collect(json_decode($licence->licence_class->class));
        return view('single', ['licence' => $licence, 'licence_class' => $licence_class]);

    }

    public function getScannedLicence()
    {
        $options = array(
            'cluster' => 'us2',
            'encrypted' => true
        );
        try {
            $pusher = new Pusher(
                '8b28618c2c33294ac33e',
                'fc73e9ce254e53aee8f6',
                '623321',
                $options
            );
        } catch (PusherException $e) {
        }


        $pusher->trigger('notify', 'notify-event', 10);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $licence = Licence::with('licence_class')->whereId($id)->first();
        $licence_class = collect(json_decode($licence->licence_class->class));
        return view('edit', ['licence' => $licence, 'licence_class' => $licence_class]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //  dd($request);
        $licence = Licence::find($id);
        $national_id = strtoupper(trim($request->national_id));
        $request->national_id = preg_replace("^\\s^", "", $national_id);
        $request->name = trim($request->name);


        $request->validate([
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:4048',
            'name' => array('required', 'regex:/^([a-zA-Z\' ]+)$/'),
            'national_id' => array(
                'required',
                Rule::unique('licences')->ignore($id),
                'regex: [^\\d{2}-?\\d{6,7}-?[A-Za-z]{1}-?\\d{2}$]'
            ),
            'gender' => 'required',
            'dob' => 'required|date',
            'date_of_issue' => 'required',
            'licence_no' => array(
                'required',
                'regex:[^\\d{5}?[A-Za-z]{2}$]',
                Rule::unique('licences')->ignore($id)
            ),
            'email' => array(
                'required',
                'email',
                Rule::unique('licences')->ignore($id)
            ),

        ]);


        $licence->name = $request->name;
        $licence->national_id = $request->national_id;
        $licence->dob = $request->dob;
        $licence->licence_no = $request->licence_no;
        $licence->date_of_issue = $request->date_of_issue;
        $licence->gender = $request->gender;
        $licence->email = $request->email;


        if (isset($request->image)) {
            $licence->image = $request->image;
            $imageName = sha1(time()) . '.' . $request->image->getClientOriginalExtension();
            $path = Storage('images/' . $imageName);
            $img = Image::make($request->image->getRealPath());
            $img->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img->save($path);

        }

        if ($licence->save()) {
            $c1 = ["class1" => $request->class1, "class2" => $request->class2, "class3" => $request->class3, "class4" => $request->class4, "class5" => $request->class5];
            //dd($c1);

            LicenceClass::where("licence_id", $licence->id)->update(["class" => json_encode($c1)]);

            return back()->with('success', 'Record updated successfully');
        }
        return back()->withErrors(['Record updated successfully']);

    }


    /**
     * Get user access logs
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLogs()
    {
        $logs = \App\Log::orderBy('id', 'desc')->with('licence_details')->paginate(50);
        return view('log', ['logs' => $logs]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Licence::destroy($id)) {
            return back()->with('success', 'Record deleted successfully');
        }
        return back()->withErrors('Error deleting record, please try again!');
    }


}
