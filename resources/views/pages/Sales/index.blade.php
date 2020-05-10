@extends('layouts.app')

@section('meta')
    {{-- <meta http-equiv="refresh" content="300" /> --}}
@stop

@section('content')

<div class="row dashboard-page">
    <div id="page-header">

        <div class="page-title" 
            page-title="{{ $pageTitle }}"
            page-title1="{{ $pageTitle1 }}">
            Add {{ $pageTitle }}
        </div>

        {{-- <div class="page-buttons">
            <div class="button-content">
                <a class="btn btn-1 modal-trigger add" href="#myModal">
                    <i class="material-icons left">add</i>
                    Add {{ $pageTitle1 }}
                </a>
            </div>
        </div> --}}
        
    </div>
    <div class="content mx20">
        <div class="card">
            <div class="row mt20 pt15 mb0">
                <div class="input-field col s12 m3">
                    <input placeholder="" value="{{ date("yy/m/d") }}" id="date" type="text" class="datepicker validate valid">
                    <label for="date" class="active">Date</label>
                </div>
                <div class="input-field col s12 m3">
                    <input placeholder="" value="" id="receipt" type="number" class="validate">
                    <label for="receipt" class="active">Receipt #</label>
                </div>
                <div class="input-field col s12 m3">
                    <select id="modeOfPayment">
                        <option value="Cash" selected>Cash</option>
                        <option value="Home Credit">Home Credit</option>
                        <option value="BDO">BDO</option>
                        <option value="BPI">BPI</option>
                        <option value="Metrobank">Metrobank</option>
                    </select>
                    <label>Mode of Payment</label>
                </div>
                <div class="input-field col s12 m3 hidden" id="termsCont">
                    <select id="paymentTerms">
                        <option value="3 Months" selected>3 Months</option>
                        <option value="6 Months">6 Months</option>
                        <option value="12 Months">12 Months</option>
                    </select>
                    <label>Home Credit Terms</label>
                </div>
            </div>
            <div class="row mb0">
                <div class="col s12">
                    
                    <p class="mb0">
                        <h6 class="mr10 d-inline-block">Checkout Quantity:</h6>
                        {{-- <label class="mr20 d-inline-block">
                            <input class="with-gap" id="addSingle" name="group1" type="radio" checked />
                            <span>Single</span>
                        </label>
                        <label class="mr30 d-inline-block">
                            <input class="with-gap" id="addMultiple" name="group1" type="radio"/>
                            <span>Multiple</span>
                        </label> --}}
                        <span class="d-inline-block input-field my0">
                            <input style="width: 65px;" value="1" id="quantity" type="number" min="1" class="validate valid center-align">
                            <a class="btn btn-1" id="cloneRow" href="javascript:void(0)">Ok</a>
                        </span>
                    </p>
                </div>
            </div>

            <div class="divider"></div>
            <div class="" id="rowTemplate">
                <div class="row rowData pt20">
                    {{--  <a class="btn-floating btn-small waves-effect waves-light red"><i class="material-icons">close</i></a>  --}}
                    <div class="input-field col m3 s12">
                        <input placeholder="" value="" class="imeis validate" type="number" autocomplete="off">
                        <label for="imei" class="active">IMEI</label>
                    </div>
                    <div class="input-field col m3 s12">
                        <input placeholder="" value="" class="models" type="text" disabled>
                        <label for="model" class="active">Model</label>
                    </div>
                    <div class="input-field col m3 s12">
                        <input placeholder="" value="" class="brands" type="text" disabled>
                        <label for="brand" class="active">Brand</label>
                    </div>
                    <div class="input-field col m3 s12">
                        <input placeholder="" value="" class="colors" type="text" disabled>
                        <label for="color" class="active">Color</label>
                    </div>
                    <div class="input-field col m3 s12">
                        <input placeholder="" value="0" class="prices" type="number" step="0.01" min="0" disabled>
                        <label for="price" class="active">Price</label>
                    </div>
                    <div class="input-field col m3 s12">
                        <div class="cmbfreebiescont">
                        </div>
                    </div>
                </div>
            </div>
            

            <div class="divider"></div>

            <div class="itemContainer">
               
            </div>
            <div class="row pt20 pb10">
                <div class="input-field col m3 s12">
                    <input placeholder="0"  id="total" class="total" type="number" step="0.01" disabled>
                    <label for="total" class="active">Total</label>
                </div>
                <div class="input-field col m2 s12">
                    <a class="btn btn-1 d-block" id="submit" href="javascript:void(0)">Save</a>
                </div>
                {{--  <div class="input-field my0">  --}}
                 
                    
                {{--  </div>  --}}
            </div>
        </div>
    </div>

</div>
@endsection

@section('pagejs')
    <script src="{{ asset('/js/pages/'.$pageTitle.'/index.js') }}"></script>
@stop