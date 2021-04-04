<?php

namespace App\Http\Controllers;

use App\Models\Turntable;
use Illuminate\Http\Request;

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
        $turntable=request()->except('_token');
        Turntable::insert($turntable);
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
        $fileName = 'turntables.csv';
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
     
}
