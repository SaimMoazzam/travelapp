<?php
namespace App\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
use App\Models\Admin\Services\Hotels;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function index() {
        $data=[];
        $data['heading'] = 'Hotels';
        $data['hotels'] = Hotels::all();
        $data['hotels_json'] = json_encode($data['hotels']);
        return view('admin.services.hotel.list')->with($data);
    }

    // public function getHotels(Request $request){
    //     return $request->all();
    // }

    public function store(Request $request){
        // dd($request);
        
        // $newHotel = new Hotels;
        // $newHotel->name = $request->name;
        // $newHotel->location = $request->location;

        // $newHotel->save();

        // return redirect()->route('admin.list.hotel');  
        
        $hotelID = $request->id;
  
        $hotelrow   =   Hotels::updateOrCreate(
                    [
                     'id' => $hotelID
                    ],
                    [
                    'name' => $request->name, 
                    'location' => $request->location,
                    ]);    
                          
        return Response()->json($hotelrow);
    }

    public function editHotel(Request $request){
        $editHotel = Hotels::find($request->id);
       
        return Response()->json($editHotel);
    }
    
    public function updateHotel(Request $request){
        $updateHotel = Hotels::find($request->id);
        $updateHotel->name= $request->name;
        $updateHotel->location= $request->location;
        $updateHotel->save();
        return Response()->json($updateHotel);
        
    }

    public function deleteHotel(Request $request){
        $deletedHotel = Hotels::find($request->id)->delete();

        return Response()->json($deletedHotel);
    }
}
