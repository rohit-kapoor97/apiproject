<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BankDetail;
use App\Exports\DataExport;
use App\Imports\DataImport;
use Maatwebsite\Excel\Facades\Excel;

class bankController extends Controller
{
   public function bankView(){
    return view('bank');
   }


   public function bankDetail(request $request){

    $request->validate([
        'name' => ['required'],
        'account_no' => ['required'],
        'ifsc_code' => ['required']
      
    ]);

    $bank=bankDetail::create([

        'name' => $request->name,
        'acc_no' => $request->account_no,
        'ifsc_code' => $request->ifsc_code,
        'status' => $request->status,

    ]);
 

    return redirect()->route('bank.data');
   }

   public function bankdata(){
    $data=BankDetail::all();
    return view('bankDetail', compact('data'));
   }

   //excel spreedsheet
   public function export(){
     return Excel::download(new DataExport, 'data.xlsx');
    }


   public function import(request $request){
    $request->validate([
        'file'=> ['required', 'mimes:xlsx,csv']
    ]);

    $import=Excel::import(new DataImport, $request->file('file'));

    return redirect()->back()->with('message', 'file import successfully');


   }
}
