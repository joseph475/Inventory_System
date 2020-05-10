<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ViewInventoryModel;
use App\Models\SalesModel;
use App\Models\SalesItemsModel;
use App\Models\SalesItemsFreebiesModel;


class SalesController extends Controller
{
    public function store(Request $request){
        // print_r($request->receipt); exit;
        // parse_str($request->getContent(),$data);
        // print_r($request->data[0]);

        $data = new SalesModel;
        $data->receipt_no = $request->receipt;
        $data->date = $request->date;
        $data->mode_of_payment = $request->modeOfPayment;
        $data->terms = $request->terms;
        $data->user_id = $request->userId;
        $data->save();

        $sales_id = SalesModel::select('id')->where('receipt_no', $request->receipt)->first();
        $sales_id = $sales_id->id;

        // echo $sales_id;
        $item_counter = count($request->data);

        for($i = 0; $i < $item_counter; $i++){
            // print_r($request->data[$i]['item_code']);
            $items = new SalesItemsModel;
            $items->sales_id = $sales_id;
            $items->item_id = $request->data[$i]['item_code'];
            $items->save();

            // $item_id = SalesItemsModel::select('item_id')->where('sales_id', $sales_id)->first();
            // $item_id = $item_id->item_id;

            // echo($item_id);
            // if(count($request->data[$i]['freebies']) > 0){
            for($j = 0; $j < count($request->data[$i]['freebies']); $j++){
                // foreach($request->data[$i]['freebies'] as $key => $freebies){
                $freebie = new SalesItemsFreebiesModel;
                $freebie->item_id = $items->item_id;
                $freebie->freebies_id = $request->data[$i]['freebies'][$j];
                // print_r($request->data[$i]['freebies'][$j]); exit;
                $freebie->save();
            }
        }

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
