<?php

namespace App\Http\Controllers;

use App\Models\Camera;
use Illuminate\Http\Request;
use App\Exports\CameraExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CameraImport;

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
        $camera=$request->all();
        if($img=$request->file('image')){
            $destinationPaht='imagenes/camaras/';
            $name=date('YmdHis').".".$img->getClientOriginalExtension();
            $img->move($destinationPaht,$name);
            $camera['image']="$name";
        }
        Camera::create($camera);

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
        $fileName = 'camera.xml';
        $cameras = Camera::all();

        $headers = array(
            "Content-type"        => ".xml",
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
                

                fputxml($file, array($row['Color'], $row['Description'], $row['Line'], $row['Seller'], $row['Connectivity'], $row['ISOsensitivity']));
            }

            fclose($file);
        };

        return response()->stream($callback,200, $headers);
    }
    public function chart() {

        $cameras =Camera::select(\DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(\DB::raw("Minute(created_at)"))
            ->pluck('count');

        $cameras2 = Camera::select(\DB::raw("COUNT(*) as count"))
           ->whereBetween('Screensize', ([2, 100]))
           ->groupBy(\DB::raw("Screensize"))
           ->pluck('count');


        return view('cameras.chart')
            ->with('cameras', $cameras)
            ->with('cameras2', $cameras2);
    }


    public function cards() {
        $cameras = Camera::all();
        return view('cameras.cards', compact('cameras'));
    }

    public function exportToXlsx() {
        return Excel::download(new CameraExport, 'cameras.xlsx');
    }

    public function import() {
        return view('cameras.import');
    }

    public function importData(Request $request) {
        Excel::import(new CameraImport, request()->file('excel'));
        return redirect()->to(url('cameras'));
    }
    
   
}