<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;
use Excel;
use File;
class StudentController extends Controller
{
    //
    public function index()
    {
        return view('admin.home');
    }
    public function import(Request $request){
        //validate the xls file
        $this->validate($request, array(
            'file'      => 'required'
        ));
 
        if($request->hasFile('file')){
            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
 
                $path = $request->file->getRealPath();
                $data = Excel::load($path, function($reader) {
                })->get();
                if(!empty($data) && $data->count()){
 
                    foreach ($data as $key => $value) {
                        $insert[] = [
                        'name' => $value->name,
                        'email' => $value->email,
                        'phone' => $value->phone,
                        ];
                    }
 
                    if(!empty($insert)){
 
                        $insertData = DB::table('students')->insert($insert);
                        if ($insertData) {
                        	$request->session()->flash('status', 'Task was successful!'); // 5.7 v
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
}
