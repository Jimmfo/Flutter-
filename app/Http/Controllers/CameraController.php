<?php

namespace App\Http\Controllers;

use App\Models\Camera;
use Illuminate\Http\Request;

class CameraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cameras=Camera::all();
        return view('cameras.index',compact('cameras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cameras.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $camera=request()->except('_token');
        Camera::insert($camera);
         return redirect()->to(url('/cameras'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Camera  $camera
     * @return \Illuminate\Http\Response
     */
    public function show(Camera $camera)
    {
        return view('cameras.show',compact('camera'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Camera  $camera
     * @return \Illuminate\Http\Response
     */
    public function edit(Camera $camera)
    {
        return view('cameras.edit',compact('camera'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Camera  $camera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Camera $camera)
    {
        $datacamera=request()->except('_token');
        $camera->update($datacamera);
        return redirect()->to(url('/cameras'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Camera  $camera
     * @return \Illuminate\Http\Response
     */
    public function destroy(Camera $camera)
    {
        $camera->delete();
        return redirect()->to(url('/cameras'));

    }


    public function exportCamerastoCSV(Request $request){
        $fileName = 'camera.csv';
        $cameras = Camera::all();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('Color', 'Descripción', 'Linea', 'Vendedor', 'Conectivida','ISO conectividad');

        $callback = function() use($cameras, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($cameras as $camera) {
                $row['Color']          = $camera->Color;
                $row['Description']    = $camera->Description;
                $row['Line']            = $camera->Line;
                $row['Seller']          = $camera->Seller;
                $row['Connectivity']     = $camera->Connectivity;
                $row['ISOsensitivity']   = $camera->ISOsensitivity;
                

                fputcsv($file, array($row['Color'], $row['Description'], $row['Line'], $row['Seller'], $row['Connectivity'], $row['ISOsensitivity']));
            }

            fclose($file);
        };

        return response()->stream($callback,200, $headers);
    }


}