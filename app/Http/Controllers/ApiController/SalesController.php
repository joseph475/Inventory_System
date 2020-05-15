<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ViewInventoryModel;
use App\Models\SalesModel;
use App\Models\SalesItemsModel;
use App\Models\SalesItemsFreebiesModel;
use App\Models\InventoryModel;
use App\Models\FreebiesModel;

class SalesController extends Controller
{
    public function index(Request $request)
    {
        $data = SalesModel::where('receipt', 'LIKE', "%{$request->search}%")
        ->orderBy('id', 'desc')
        ->paginate(10);
        return $data;
    }

    public function store(Request $request){
        // print_r($request->receipt); exit;
        // parse_str($request->getContent(),$data);
        // print_r($request->data[0]);
        // exit;
        $data = new SalesModel;
        $data->receipt = $request->receipt;
        $data->date = $request->date;
        $data->payment_mode = $request->modeOfPayment;
        $data->terms = $request->terms;
        $data->gross_income = $request->gross;
        $data->expenses = 0;
        $data->net_income = 0;
        $data->user_id = $request->userId;
        $data->save();

        $sales_id = SalesModel::select('id')->where('receipt', $request->receipt)->first();
        $sales_id = $sales_id->id;

        $item_counter = count($request->data);

        $item_total_price = 0;
        $freebies_total_price = 0;

        for($i = 0; $i < $item_counter; $i++){
            $items = new SalesItemsModel;
            $items->sales_id = $sales_id;

            $item_id = InventoryModel::select('id')->where('item_code', $request->data[$i]['item_code'])->first();
            $item_id->is_available = 0;
            $item_id->save();

            $items->item_id = $item_id->id;
            
            $item_price = InventoryModel::findOrFail($items->item_id);
            $item_total_price = $item_total_price + $item_price->cost;

            $items->save();

            for($j = 0; $j < count($request->data[$i]['freebies']); $j++){
                $freebie = new SalesItemsFreebiesModel;
                $freebie->item_id = $items->item_id;
                $freebie->freebies_id = $request->data[$i]['freebies'][$j];

                $freebies_price = FreebiesModel::findOrFail($freebie->freebies_id);
                $freebies_total_price = $freebies_total_price + $freebies_price->cost;

                $freebie->save();
            }
        }
        $data = SalesModel::findOrFail($sales_id);
        
        $data->expenses = $item_total_price + $freebies_total_price;
        $data->net_income = $request->gross - $data->expenses;
        $data->save();

        return $data;
    }


    public function show($id)
    {
        $data = ViewInventoryModel::where('IMEI', $id)->first();
        // print_r($data); exit;
        // $data = ViewInventoryModelForUpdate::findOrFail($id);
        return $data;
    }
}
