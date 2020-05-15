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
            {{ $pageTitle }}
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
        
    </div>

</div>
@endsection

@section('pagejs')
    <script src="{{ asset('/js/pages/Sales/salesReport.js') }}"></script>
@stop