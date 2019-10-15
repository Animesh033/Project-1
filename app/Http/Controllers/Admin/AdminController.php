<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; //added

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File; //added
use Excel;
use App\Models\Admin\TicFile;
class AdminController extends Controller
{
   	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home');
    }
    public function importExcel(Request $request){
        //validate the xls file
        $this->validate($request, array(
            'file' => 'required'
        ));
 
        if($request->hasFile('file')){
            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
 
                $path = $request->file->getRealPath();
                $data = Excel::load($path, function($reader) {
                })->get();
                dd($data);
                if(!empty($data) && $data->count()){
 
                    foreach ($data as $key => $value) {
                        $insert[] = [
                        'name' => $value->name,
                        'empcode' => $value->empcode,
                        'tic' => $value->tic,
                        ];
                    }
 
                    if(!empty($insert)){
 
                        $insertData = DB::table('students')->insert($insert);
                        if ($insertData) {
                            $request->session()->flash('status', 'Your Data has successfully imported!'); // 5.7 v
                            // Session::flash('success', 'Your Data has successfully imported.'); // ~ 5.4 v laravel
                        }else {        
                            $request->session()->flash('error', 'Error inserting the data..');                
                            // Session::flash('error', 'Error inserting the data..');
                            return back();
                        }
                    }
                }
 
                return back();
 
            }else {
                $request->session()->flash('error', 'File is a '.$extension.' file.!! Please upload a valid xls/csv file..!!');  
                // Session::flash('error', 'File is a '.$extension.' file.!! Please upload a valid xls/csv file..!!');
                return back();
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeTicFile(Request $request)
    {

        $this->validate($request, [
            'filename' => 'required',
        ]);
        if($request->hasfile('filename'))
        {
            $data = [];
            $data2 = [];

            foreach($request->file('filename') as $file)
            {
                $name=$file->getClientOriginalName();
                $extension = $file->extension();
                // dd($extension);
                if ($extension == "pdf") {
                    $file->move(public_path().'/img/uploads/', $name);  
                    $data[] = $name;  
                }else{
                    $data2[] = $name;
                }              
            }
            if(isset($data) && count($data) > 0 && count($data2) == 0) { // your code goes here 
                $file= new TicFile(); //Model
         
                // $file->name=json_encode($data);// initial code

                $file->name=implode(',', $data);


                $file->save();

                return back()->with('success', 'Your files has been successfully added!');
            }else if(isset($data2) && count($data2) > 0 && count($data) == 0){ // your error message to show or some logic 

                $request->session()->flash('error', 'Invalid file(s) not uploaded.!! Please upload a valid pdf file..!!');
                return back();
            
            }else{
                $file= new TicFile(); //Model
         
                // $file->name=json_encode($data);// initial code

                $file->name=implode(',', $data);


                $file->save();

                $validFile = implode(',', $data);
                $invalidFile = implode(',', $data2);
                $request->session()->flash('error', $invalidFile.' Invalid file(s) not uploaded.!! Please upload a valid pdf file..!!'.$validFile. ' file(s) uploaded successfully!');
                return back();

            }
        }
    }
}
