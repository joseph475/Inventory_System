@extends('layouts.app')

@section('meta')
    {{-- <meta http-equiv="refresh" content="300" /> --}}
@stop

@section('content')

<div class="row dashboard-page">
    <div id="page-header">
        <div class="page-title" 
            page-title1="{{ $pageTitle1 }}" 
            page-title="{{ $pageTitle }}">{{ $pageTitle }}
        </div>
        {{--  <div class="page-buttons">
            <div class="button-content">
                <a class="btn btn-1" href="/Inventory">
                    <i class="material-icons left">arrow_back</i>
                    Back
                </a>
            </div>
        </div>  --}}
    </div>

    @include('partials.preloader')

    <div class="content">
        <div class="row">
            <div class="col s12 m5">
                <div class="card">
                    <div class="card-header px24 py1">
                        <p class="">
                            <label class="mr20">
                                <input class="with-gap" id="addSingle" name="group1" type="radio" checked />
                                <span>Single</span>
                            </label>
                            <label>
                                <input class="with-gap" id="addMultiple" name="group1" type="radio"  />
                                <span>Multiple</span>
                            </label>
                        </p>
                    </div>
                    <div class="divider"></div>   
                    <div class="card-content">
                        <div class="row mb0">
                            <div class="input-field col s6">
                                <input placeholder="" value="1" id="quantity" type="number" class="validate" disabled>
                                <label for="quantity" class="active">Quantity</label>
                            </div>
                            <div class="input-field col s2">
                                <a class="btn btn-1 showIMEI" href="javascript:void(0)" disabled>
                                <i class="material-icons">arrow_forward</i></a>
                            </div>
                        </div>
                        <div class="row mb0">
                            <div class="input-field col s6">
                              <input placeholder="" id="imei" type="number" class="validate" autocomplete="off">
                              <label for="imei" class="active">IMEI</label>
                            </div>
                            <div class="input-field col s6">
                                <select id="modelCmb">
                                </select>
                                <label>Model</label>
                            </div>
                        </div>
                        <div class="row mb0">
                            <div class="input-field col s6">
                                <select id="brandCmb">

                                </select>
                                <label>Brand</label>
                            </div>
                            <div class="input-field col s6">
                                <select id="categoryCmb">

                                </select>
                                <label>Category</label>
                            </div>
                        </div>
                        <div class="row mb0">
                            <div class="input-field col s6">
                                <select id="colorCmb">

                                </select>
                                <label>Color</label>
                            </div>
                            <div class="input-field col s6">
                                <select id="supplierCmb">

                                </select>
                                <label>Supplier</label>
                            </div>
                        </div>
                        <div class="row mb0">
                            <div class="input-field col s6">
                              <input id="cost" type="number" class="validate" placeholder="0" step="0.01" min="0" autocomplete="off">
                              <label for="cost" class="active">Cost</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="price" type="number" class="validate" placeholder="0" step="0.01" min="0" autocomplete="off">
                                <label for="price" class="active">Price</label>
                            </div>
                        </div>
                        <div class="row mb0">
                            <div class="input-field col s12">
                              <input placeholder="" id="remarks" type="text" class="validate">
                              <label for="remarks" class="active">Remarks</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <a class="btn btn-1" id="submit" href="javascript:void(0)">Save</a>
                    </div>
                </div>
            </div>
                
            
            <div class="col s12 m7">
                {{--  <div class="card">  --}}
                    <div class="IMEIcontainer row">

                    </div>
                {{--  </div>  --}}
            </div>
        </div>
    </div>

</div>
@endsection

@section('pagejs')
    <script src="{{ asset('/js/pages/Inventory/addInventory.js') }}"></script>
@stop