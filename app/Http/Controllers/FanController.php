<?php

namespace App\Http\Controllers;

use App\Models\Fan;
use Illuminate\Http\Request;

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
        $fan=request()->except('_token');
        Fan::insert($fan);
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
        $fileName = 'fan.csv';
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

    }

