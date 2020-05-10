<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FreebiesModel;
use App\Models\InventoryModel;

class FreebiesController extends Controller
{
    public function index(Request $request)
    {
        $data = FreebiesModel::where('name', 'LIKE', "%{$request->search}%")
        ->orderBy('id', 'desc')
        ->paginate(10);
        return $data;
    }
    public function ascOrder(Request $request)
    {
        $data = FreebiesModel::where('name', 'LIKE', "%{$request->search}%")
        ->orderBy('name', 'asc')
        ->get();
        return $data;
    }
    public function store(Request $request)
    {   
        if($request->id){
            $data = FreebiesModel::findOrFail($request->id);
            $data->name = $request->name;
            $data->cost = $request->cost;
            $data->save();
            return $data;
        }
        else{
            $data = FreebiesModel::create($request->all());
            return $data;
        }
    }

    public function destroy($id)
    {
        $checkdata = InventoryModel::where('brand_id', $id)->first();

        if(!$checkdata){
            FreebiesModel::destroy($id);
            return ['status' => 1];
        }
        else{
            return ['status' => 0];
        }
    }
}
