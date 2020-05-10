<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoriesModel;
use App\Models\InventoryModel;

class CategoriesController extends Controller
{
    public function index(Request $request)
    {
        $data = CategoriesModel::where('name', 'LIKE', "%{$request->search}%")
        ->orderBy('id', 'desc')
        ->paginate(10);
        return $data;
    }
    public function ascOrder(Request $request)
    {
        $data = CategoriesModel::where('name', 'LIKE', "%{$request->search}%")
        ->orderBy('name', 'asc')
        ->get();
        return $data;
    }
    public function store(Request $request)
    {   
        if($request->id){
            $data = CategoriesModel::findOrFail($request->id);
            $data->name = $request->name;
            $data->save();
            return $data;
        }
        else{
            $data = CategoriesModel::create($request->all());
            return $data;
        }
    }

    public function destroy($id)
    {
        $checkdata = InventoryModel::where('category_id', $id)->first();

        if(!$checkdata){
            CategoriesModel::destroy($id);
            return ['status' => 1];
        }
        else{
            return ['status' => 0];
        }
    }
}
