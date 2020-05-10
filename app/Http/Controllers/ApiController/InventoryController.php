<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InventoryModel;
use App\Models\ViewInventoryModel;
use App\Models\ViewInventoryModelForUpdate;

class InventoryController extends Controller
{
    public function index(Request $request)
    {
        $inventory = ViewInventoryModel::orderBy('created_at', 'asc')
        ->where('imei', 'LIKE', "%{$request->search}%")
        ->orWhere('brand', 'LIKE', "%{$request->search}%")
        ->orWhere('category', 'LIKE', "%{$request->search}%")
        ->orWhere('color', 'LIKE', "%{$request->search}%")
        ->orWhere('model', 'LIKE', "%{$request->search}%")
        ->orWhere('supplier', 'LIKE', "%{$request->search}%")
        ->orderBy('id', 'desc')
        ->paginate(10);
        return $inventory;
    }
    public function store(Request $request)
    {   
        if ($request->isMethod('put')) {
                $data = InventoryModel::findOrFail($request->id);

                $data->item_code = $request->item_code;
                $data->model_id = $request->model_id;
                $data->brand_id = $request->brand_id;
                $data->category_id = $request->category_id;
                $data->color_id = $request->color_id;
                $data->supplier_id = $request->supplier_id;
                $data->cost = $request->cost;
                $data->price = $request->price;
                $data->remarks = $request->remarks;
                $data->user_id = $request->user_id;
                $data->save();
                return $data;
        }
        else{
            $counter = count($request->item_code);

            foreach($request->item_code as $item){
                $data = new InventoryModel;
                $data->item_code = $item;
                $data->model_id = $request->model_id;
                $data->brand_id = $request->brand_id;
                $data->category_id = $request->category_id;
                $data->color_id = $request->color_id;
                $data->supplier_id = $request->supplier_id;
                $data->cost = $request->cost;
                $data->price = $request->price;
                $data->remarks = $request->remarks;
                $data->user_id = $request->user_id;
                $data->save();
            }
            return $data;
        }
    }
    public function destroy($id)
    {
        if(InventoryModel::destroy($id)){
            return ['status' => 1];
        }
        else{
            return ['status' => 0];
        }
    }
    public function show($id)
    {
        $data = InventoryModel::findOrFail($id);
        // $data = ViewInventoryModelForUpdate::findOrFail($id);
        return $data;
    }
}
