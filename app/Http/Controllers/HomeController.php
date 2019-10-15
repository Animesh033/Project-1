<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin\Student;
use App\Models\Admin\TicFile;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function searchTic(Request $request)
    {
        $this->validate($request, array(
            'ticno' => 'required|numeric'
        ));
        $input = $request->ticno;
        // dd($input);
        // $collection = Student::all()->pluck('phone');
        // dd($collection);

        // $unique = $collection->unique();
        // dd($unique);
        // $phn = $unique->values()->all();
        // dd($phn);
        // $key = $unique->search($ticNo);
        // dd($key);
        $collection = Student::all();
        // dd($collection);
        $filtered = $collection->firstWhere('tic', $input);
        $filtered2 = $collection->firstWhere('empcode', $input);

        // dd($filtered);
        if($filtered != null || $filtered2 != null ){
            $collection2 = TicFile::all()->pluck('name');
            $nameCol = $collection2->unique();
            $nameCol2 = $nameCol->values()->all();
            // $nameCol3 = json_decode($nameCol, true);
            // dd($nameCol3);
            if($filtered != null){
                $ticNo = $input;
            }else{
                $ticNo = $filtered2->tic;
                // dd($ticNo);
            }

            $fn = $ticNo.".pdf";
            // dd($fn);
            foreach ($nameCol2 as $ticName) {
                // dd($ticName);
                $splitName = explode(',', $ticName);
                // dd($splitName);
                foreach ($splitName as $tnum) {
                    // dd($tnum);
                    if($tnum == $fn ){
                        $getFile = 1;
                        $file= public_path(). "/img/uploads/".$tnum;

                        if ($file) {
                            $headers = [
                              'Content-Type' => 'application/pdf',
                               ];
                            return response()->download($file, $ticNo.'.pdf', $headers);
                        }
                    }else
                    {
                        $getFile = 0;
                    }
                }
                
            }
            if($getFile == 0){
                $request->session()->flash('error', 'File is not found in our records. Please contact admin.');  
                return back();
            }
            
        }else{
            $request->session()->flash('error', 'This Tic number do not match our records.');  
            return back();
        }
    }
    // public function getDownload()
    // {
    //     //PDF file is stored under project/public/download/info.pdf
    //     $file= public_path(). "/img/uploads/7767985032.jpg";

    //     $headers = [
    //           'Content-Type' => 'application/jpg',
    //        ];

    //     return response()->download($file, '7767985032.jpg', $headers);
    // }
}
