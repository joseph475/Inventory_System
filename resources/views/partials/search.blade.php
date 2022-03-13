<div class="search">
    <input class="search-field with-borders" name="search" type="text" value="{{ isset($search) ? $search : '' }}" />
    <a href="javascript:void(0)" class="btn btn-flat search-btn btn-1" id="searchbtn"><i
            class="material-icons">search</i></a>
</div>


{{-- <script type="text/javascript" src="{{ url('/js/jquery-3.3.1.min.js') }}"></script> --}}
<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>

{{-- <script type="text/javascript" src="{{ url('/js/jquery-confirm.js') }}"></script> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js">

</script>
<script src="{{ asset('/js/pages/Search/index.js') }}"></script>
