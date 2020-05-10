<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ColorsModel;
use App\Models\InventoryModel;

class ColorsController extends Controller
{
    public function index(Request $request)
    {
        $data = ColorsModel::where('name', 'LIKE', "%{$request->search}%")
        ->orderBy('id', 'desc')
        ->paginate(10);
        return $data;
    }
    public function ascOrder(Request $request)
    {
        $data = ColorsModel::where('name', 'LIKE', "%{$request->search}%")
        ->orderBy('name', 'asc')
        ->get();
        return $data;
    }
    public function store(Request $request)
    {   
        if($request->id){
            $data = ColorsModel::findOrFail($request->id);
            $data->name = $request->name;
            $data->save();
            return $data;
        }
        else{
            $data = ColorsModel::create($request->all());
            return $data;
        }
    }

    public function destroy($id)
    {
        $checkdata = InventoryModel::where('brand_id', $id)->first();

        if(!$checkdata){
            ColorsModel::destroy($id);
            return ['status' => 1];
        }
        else{
            return ['status' => 0];
        }
    }
}
