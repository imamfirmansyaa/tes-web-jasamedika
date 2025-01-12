<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehicleController extends Controller
{
    public function index(){
        $vehicles = Vehicle::all();
        return view('vehicle.index', [
            'vehicles' => $vehicles
        ]);
    }

    public function create(){
        return view('vehicle.create');
    }

    public function store(Request $request){

        $message = [
            'type_vehicle.required' => 'Merk Mobil Wajib Diisi!',
            'police_number.unique' => 'No. Polisi Sudah Digunakan',
            'model_vehicle.required' => 'Model Mobil Wajib Diiisi!',
            'police_number.required' => 'No. Polisi Wajib Diisi!',
            'rental_rates.required' => 'Tarif Sewa Wajib Diisi!'
        ];

        $validator = Validator::make($request->all(), [
            'type_vehicle' => 'required',
            'model_vehicle' => 'required',
            'police_number' => 'required',
            'rental_rates' => 'required',
            'status' => 'required'
        ], $message);

        if ($validator->fails()){
            return redirect()->route('vehicle.create')->withErrors($validator)->withInput();
        }

        Vehicle::create($request->all());
        return redirect()->route('vehicle.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy(Vehicle $vehicle, $id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->delete();
        return redirect()->route('vehicle.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
