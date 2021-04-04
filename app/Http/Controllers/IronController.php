<?php

namespace App\Http\Controllers;

use App\Models\iron;
use Illuminate\Http\Request;

class IronController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $irons=iron::all();
       return view('irons.index',compact('irons')); //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('irons.create');//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $iron=request()->except('_token');
      Iron::insert($iron);
       return redirect()->to(url('/irons'));//
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\iron  $iron
     * @return \Illuminate\Http\Response
     */
    public function show(iron $iron)
    {
     return view('irons.show',compact('iron'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\iron  $iron
     * @return \Illuminate\Http\Response
     */
    public function edit(iron $iron)
    {

    return view('irons.edit',compact('iron'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\iron  $iron
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, iron $iron)
    {
    $datairon=request()->except('_token');
    $iron->update($datairon);
    return redirect()->to(url('/irons'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\iron  $iron
     * @return \Illuminate\Http\Response
     */
    public function destroy(iron $iron)
    {
    $iron->delete();
    return redirect()->to(url('/irons'));
 }
 public function exportironstoCSV(Request $request){
   $fileName = 'iron.csv';
   $irons = Iron::all();

   $headers = array(
       "Content-type"        => "text/csv",
       "Content-Disposition" => "attachment; filename=$fileName",
       "Pragma"              => "no-cache",
       "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
       "Expires"             => "0"
   );

   $columns = array('Modelo', 'Marca', 'Precio', 'Vendedor', 'voltaje','Power');

   $callback = function() use($irons, $columns) {
       $file = fopen('php://output', 'w');
       fputcsv($file, $columns);

       foreach ($irons as $iron) {
           $row['Model']          = $iron->Model;
           $row['Mark']           = $iron->Mark;
           $row['Seller']         = $iron->Seller;
           $row['Voltage']        = $iron->Voltage;
           $row['Fantype']        = $iron->Fantype;
           $row['Power']          = $iron->Power;
           

           fputcsv($file, array($row['Model'], $row['Mark'], $row['Seller'], $row['Voltage'], $row['Fantype'], $row['Power']));
       }

       fclose($file);
   };

   return response()->stream($callback, 200, $headers);
}

}
