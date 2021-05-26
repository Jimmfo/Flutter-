<?php

namespace App\Http\Controllers;

use App\Models\Fan;
use Illuminate\Http\Request;
use App\Exports\FanExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\FanImport;

class FanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fans=Fan::all();
        return view('fans.index',compact('fans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
         $fan=$request->all();
         if($img=$request->file('image')){
             $destinationPaht='imagenes/ventilador/';
             $name=date('YmdHis').".".$img->getClientOriginalExtension();
             $img->move($destinationPaht,$name);
             $camera['image']="$name";
         }
         Fan::create($fan);
 
          return redirect()->to(url('/fans'));
     }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fan  $fan
     * @return \Illuminate\Http\Response
     */
    public function show(Fan $fan)
    {
        return view('fans.show',compact('fan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fan  $fan
     * @return \Illuminate\Http\Response
     */
    public function edit(Fan $fan)
    {
        return view('fans.edit',compact('fan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fan  $fan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fan $fan)
    {
        $datafan=request()->except('_token');
        $fan->update($datafan);
        return redirect()->to(url('/fans'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fan  $fan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fan $fan)
    {
        $fan->delete();
        return redirect()->to(url('/fans'));
    }
    public function exportFanstoCSV(Request $request){
        $fileName = 'fan.xml';
        $fans = Fan::all();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('Modelo', 'Marca', 'Precio', 'Vendedor', 'voltaje','Power');

        $callback = function() use($fans, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($fans as $fan) {
                $row['Model']          = $fan->Model;
                $row['Mark']           = $fan->Mark;
                $row['Seller']         = $fan->Seller;
                $row['Voltage']        = $fan->Voltage;
                $row['Fantype']        = $fan->Fantype;
                $row['Power']          = $fan->Power;
                

                fputcsv($file, array($row['Model'], $row['Mark'], $row['Seller'], $row['Voltage'], $row['Fantype'], $row['Power']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function chart() {

        $fans =Fan::select(\DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(\DB::raw("second(created_at)"))
            ->pluck('count');

        $fans2 = Fan::select(\DB::raw("COUNT(*) as count"))
           ->whereBetween('Power', ([2, 100]))
           ->groupBy(\DB::raw("Power"))
           ->pluck('count');


        return view('fans.chart')
            ->with('fans', $fans)
            ->with('fans2', $fans2);
    }


    public function cards() {
        $fans = Fan::all();
        return view('fans.cards', compact('fans'));
    }

    public function exportToXlsx() {
        return Excel::download(new FanExport, 'fans.xlsx');
    }

    public function import() {
        return view('fans.import');
    }

    public function importData(Request $request) {
        Excel::import(new FanImport, request()->file('excel'));
        return redirect()->to(url('fans'));
    }
    
    }