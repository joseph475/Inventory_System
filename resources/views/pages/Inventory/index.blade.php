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
            Manage {{ $pageTitle }}
        </div>

        {{--  <div class="page-buttons">
            <div class="button-content">
                <a class="btn btn-1 add" href="/Inventory/AddItem">
                    <i class="material-icons left">add</i>
                    Add {{ $pageTitle1 }}
                </a>
            </div>
        </div>  --}}
    </div>
    
    @include('partials.preloader')

    <div class="content">
        <div class="filters">
            <div class="left-filter"></div>
            <div class="right-filter">
                <div class="search-content">
                    @include('partials.search')
                </div>
            </div>
        </div>    
        
        {{--  Table  --}}
        @include('partials.table')       
        
        <div id="myModal" class="modal modal-fixed-footer">
            <div class="modal-content">
                <div class="row">
                    <div class="col s12 m12">
                        <h4>Add {{ $pageTitle1 }}</h4>
                    </div>
                </div>
                <div class="row mt20 data-id" data-id="">
                    <div class="input-field col s12 m4 mb25">
                        <input  placeholder="IMEI" id="imei" type="text" class="validate" autocomplete="off">
                        <label for="imei">IMEI</label>
                    </div>
                    <div class="input-field col s12 m4 mb25">
                        <select id="modelCmb">
                        </select>
                        <label for="modelCmb">Model</label>
                    </div>
                    <div class="input-field col s12 m4 mb25">
                        <select id="brandCmb">
                        </select>
                        <label for="brandCmb">Brand</label>
                    </div>
                    <div class="input-field col s12 m4 mb25">
                        <select id="categoryCmb">
                        </select>
                        <label for="categoryCmb">Category</label>
                    </div>
                    <div class="input-field col s12 m4 mb25">
                        <select id="colorCmb">
                        </select>
                        <label for="colorCmb">Color</label>
                    </div>
                    <div class="input-field col s12 m4 mb25">
                        <select id="supplierCmb">
                        </select>
                        <label for="supplierCmb">Supplier</label>
                    </div>
                    <div class="input-field col s12 m4 mb0">
                        <input id="cost" type="number" class="validate" placeholder="0" step="0.01" min="0" autocomplete="off">
                        <label for="cost">Cost</label>
                    </div>
                    <div class="input-field col s12 m4 mb0">
                        <input id="price" type="number" class="validate" placeholder="0" step="0.01" min="0" autocomplete="off">
                        <label for="price">Price</label>
                    </div>
                    <div class="input-field col s12 m4 mb0">
                        <input  placeholder="Remarks" id="remarks" type="text" class="validate">
                        <label for="remarks">Remarks</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:void(0)"  class="modal-close waves-effect waves-green btn btn-1 right">
                    Cancel
                </a>
                <button id="submit" class="modal-close waves-effect waves-green btn btn-1 right">
                    Save
                </button>
            </div>
        </div>
    </div>

</div>
@endsection

@section('pagejs')
    <script src="{{ asset('/js/pages/'. $pageTitle .'/index.js') }}"></script>
@stop