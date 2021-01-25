<?php

namespace App\Http\Controllers\Api;

use App\Employe;
use App\Http\Controllers\Controller;
use App\Helpers\HStatushttp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Collections\SheetCollection;
use Maatwebsite\Excel\Writers\LaravelExcelWriter;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Readers\LaravelExcelReader;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Employe::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    /**
     * @param Request $request
     * @return JSON $response
     */
    public function import(Request $request)
    {
        $newFileName = time().$request->file('file')->getClientOriginalName();
        $request->file->move(\storage_path('app/public/'),$newFileName);
        
        Excel::load(\storage_path('app/public/'.$newFileName), function(LaravelExcelReader $reader) {
            Employe::insert($reader->all()->toArray());
        });
        Storage::disk('local')->delete($newFileName);
        return response()->json();
    }

    public function export(Request $request)
    {
        $newFileName = time().'_exportEmployes';
        Excel::create($newFileName, function(LaravelExcelWriter $excel) {

            // Set the title
            $excel->setTitle('Employes BackUp '. time());
            
            // Chain the setters
            $excel->setCreator('emquTest')
                  ->setCompany('emqu');
                  
            $excel->sheet('Sheetname', function($sheet) {
                
                $sheet->with(Employe::all()->makeHidden('id'));
            });
        })->download('csv');
        return response()->json(['message' => 'generated']);

    }
}
