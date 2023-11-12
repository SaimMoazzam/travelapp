<?php

namespace App\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
use App\Models\Admin\Services\Tours;
use Illuminate\Http\Request;

class TourContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=[];
        $data['tablename'] = 'tour';
        $data['tablename_plural'] = 'tours';
        $data['tours'] = Tours::orderBy('name', 'ASC')->get();
        $data['tours_json'] = json_encode($data['tours']);
        return view('admin.services.tour.list')->with($data);
    }

    public function store(Request $request){
        // dd($request);
        
        // $newHotel = new Hotels;
        // $newHotel->name = $request->name;
        // $newHotel->location = $request->location;

        // $newHotel->save();

        // return redirect()->route('admin.list.hotel');  
        
        $tourID = $request->id;
  
        $tourrow   =   Tours::updateOrCreate(
                    [
                     'id' => $tourID
                    ],
                    [
                    'name' => $request->name, 
                    'category' => $request->category,
                    'amount' => $request->amount,
                    'description' => $request->description,
                    ]);    
                          
        return Response()->json($tourrow);
    }

    public function edit(Request $request){
        $editTour = Tours::find($request->id);
       
        return Response()->json($editTour);
    }
    
    public function update(Request $request){
        $updateTour = Tours::find($request->id);
        $updateTour->name= $request->name;
        $updateTour->category= $request->category;
        $updateTour->amount= $request->amount;
        $updateTour->description= $request->description;
        $updateTour->save();
        return Response()->json($updateTour);
        
    }

    public function delete(Request $request){
        $deletedTour = Tours::find($request->id)->delete();

        return Response()->json($deletedTour);
    }
}
