<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BrandsModel;
use App\Models\InventoryModel;

class BrandsController extends Controller
{
    public function index(Request $request)
    {
        $data = BrandsModel::where('name', 'LIKE', "%{$request->search}%")
        ->orderBy('id', 'desc')
        ->paginate(10);
        return $data;
    }
    public function ascOrder(Request $request)
    {
        $data = BrandsModel::where('name', 'LIKE', "%{$request->search}%")
        ->orderBy('name', 'asc')
        ->get();
        // ->paginate(10);
        return $data;
    }
    public function store(Request $request)
    {   
        if($request->id){
            $data = BrandsModel::findOrFail($request->id);
            $data->name = $request->name;
            $data->save();
            return $data;
        }
        else{
            $data = BrandsModel::create($request->all());
            return $data;
        }
    }

    public function destroy($id)
    {
        $checkdata = InventoryModel::where('brand_id', $id)->first();

        if(!$checkdata){
            BrandsModel::destroy($id);
            return ['status' => 1];
        }
        else{
            return ['status' => 0];
        }
    }
}
