<?php

namespace App\Http\Controllers;

use App\Models\Turntable;
use Illuminate\Http\Request;
use App\Exports\TurntableExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TurntableImport;

class TurntableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $turntables=Turntable::all();
        return view('turntables.index',compact('turntables')); //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('turntables.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $turntable=$request->all();
         if($img=$request->file('image')){
             $destinationPaht='imagenes/tocadiscos/';
             $name=date('YmdHis').".".$img->getClientOriginalExtension();
             $img->move($destinationPaht,$name);
             $camera['image']="$name";
         }
         Turntable::create($turntable);
 
          return redirect()->to(url('/turntables'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Turntable  $turntable
     * @return \Illuminate\Http\Response
     */
    public function show(Turntable $turntable)
    {
        return view('turntables.show',compact('turntable'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Turntable  $turntable
     * @return \Illuminate\Http\Response
     */
    public function edit(Turntable $turntable)
    {
        return view('turntables.edit',compact('turntable'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Turntable  $turntable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Turntable $turntable)
    {
        $dataturnable=request()->except('_token');
        $turntable->update($dataturnable);
        return redirect()->to(url('/turntables'));  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Turntable  $turntable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Turntable $turntable)
    {
        $turntable->delete();
        return redirect()->to(url('/turntables'));
    }
    public function exportturntablestoCSV(Request $request){
        $fileName = 'turntables.xml';
        $turntables =Turntable::all();
     
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );
     
        $columns = array('Modelo', 'Linea', 'Voltaje', 'Marca', 'voltaje','Power');
     
        $callback = function() use($turntables, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);
     
            foreach ($turntables as $turntable) {
                $row['Model']          = $turntable->Model;
                $row['Line']           = $turntable->Line;
                $row['Voltage']        = $turntable->Voltage;
                $row['Mark']        = $turntable->Mark;
                $row['Recording']          = $turntable->Recording;
                
     
                fputcsv($file, array($row['Model'], $row['Line'], $row['Voltage'], $row['Mark'], $row['Recording']));
            }
     
            fclose($file);
        };
     
        return response()->stream($callback, 200, $headers);
     }
     public function chart() {

        $turntables =Turntable::select(\DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(\DB::raw("second(created_at)"))
            ->pluck('count');

        $turntables2 = Turntable::select(\DB::raw("COUNT(*) as count"))
           ->whereBetween('Voltage', ([2, 100]))
           ->groupBy(\DB::raw("Voltage"))
           ->pluck('count');


        return view('turntables.chart')
            ->with('turntables', $turntables)
            ->with('turntables2', $turntables2);
    }


    public function cards() {
        $turntables = Turntable::all();
        return view('turntables.cards', compact('turntables'));
    }

    public function exportToXlsx() {
        return Excel::download(new TurntableExport, 'turntables.xlsx');
    }

    public function import() {
        return view('turntables.import');
    }

    public function importData(Request $request) {
        Excel::import(new TurntableImport, request()->file('excel'));
        return redirect()->to(url('turntables'));
    }
    public function importxml() {
        return view('turntables.import');
    }

    public function importDataxml(Request $request) {
        Xml::import(new TurntableImport, request()->file('.xml'));
        return redirect()->to(url('turntables'));
    }
    

     
}