<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\Process\Process;
use App\Oldunit;
use App\Newunit;
use Session;

class StatisticalController extends Controller
{
    public function index() {

      $all = Newunit::all();

      foreach($all as $list){
        $faq = Newunit::findOrFail($list->id);
        $old = Oldunit::where('pucode', $list->pucode)->first();
        if(!empty($old)){
          $faq->status = "Old";
          $faq->oldunit_id = $old->id;
          $faq->oldtotal = $old->total;
          $faq->difference = $list->total - $old->total;
          $faq->percentage = round((($list->total - $old->total)/$list->total) * 100,2);
        }
        else{
          $faq->status = "New";
          $faq->oldtotal = 0;
          $faq->difference = 0;
          $faq->percentage = 0;
        }
        $faq->save();

      }



      // $faq = Newunit::findOrFail($request->faq_id);
      // $faq->language_id = $request->language_id;
      // $faq->question = $request->question;
      // $faq->answer = $request->answer;
      // $faq->serial_number = $request->serial_number;
      // $faq->category_id = $request->category_id;
      // $faq->save();
    }

   

    public function getIncrease($type, $id="", $pu="") {

      $lgadata = Newunit::selectRaw('lga as label, (SUM(difference)/SUM(total))*100 AS y')->groupBy('lga')->get();
      if($id!=""){
        $ward = Newunit::selectRaw('ward as label, (SUM(difference)/SUM(total))*100 AS y')->where('lga', $id)->groupBy('ward')->get();
        $data['warddata'] = $ward;
        $data['lganame'] = $id;
        $data['wardtable'] = Newunit::selectRaw('ward, lga, SUM(total) as total, SUM(oldtotal) as oldtotal, SUM(difference) as difference, (SUM(difference)/SUM(total))*100 AS y')->where('lga', $id)->groupBy('lga')->groupBy('ward')->orderBy('ward', 'asc')->get();
      }
      if($pu!=""){
        $pudata = Newunit::selectRaw('pu as label, (difference/total)*100 AS y')->where('lga', $id)->where('ward', $pu)->get();
        $data['pudata'] = $pudata;
        $data['wardname'] = $pu;
        $data['putable'] = Newunit::selectRaw('ward, lga, pu, total, oldtotal, difference, (difference/total)*100 AS y, status')->where('lga', $id)->where('ward', $pu)->orderBy('pu', 'asc')->get();
      }

      //return $pudata;


      $data['lgadata'] = $lgadata;
      $data['lga'] = Newunit::select('lga')->distinct()->orderBy('lga', 'asc')->get();
      $data['lgatable'] = Newunit::selectRaw('lga as lga, SUM(total) as total, SUM(oldtotal) as oldtotal, SUM(difference) as difference, (SUM(difference)/SUM(total))*100 AS y')->groupBy('lga')->orderBy('lga', 'asc')->get();



      
    return view('admin.statistics.index', $data);
    }



   
}
