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

        <div class="page-buttons">
            <div class="button-content">
                <a class="btn btn-1 modal-trigger add" href="#myModal">
                    <i class="material-icons left">add</i>
                    Add {{ $pageTitle1 }}
                </a>
            </div>
        </div>
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
        
        
        <div id="myModal" class="modal bottom-sheet">
            <div class="modal-content">
                <div class="row">
                    <div class="col s12 m12">
                        <h4>Add {{ $pageTitle1 }}</h4>
                    </div>
                </div>
                <div class="row mt20 data-id" data-id="">
                    <div class="col s12 m12">
                        <input  placeholder="Description" id="description" type="text" class="validate">
                    </div>
                    @if($pageTitle == 'Freebies')
                        <div class="col s12 m12">
                            <input  placeholder="Cost" id="cost" type="number" class="validate">
                        </div>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!"  class="modal-close waves-effect waves-green btn btn-1 right">
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
    <script src="{{ asset('/js/pages/Manage/index.js') }}"></script>
@stop