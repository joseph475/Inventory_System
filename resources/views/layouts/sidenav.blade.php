<ul id="slide-out" class="sidenav sidenav-fixed">
    <li>
        <div class="user-view">
            <a><img class="circle" src="{{ url('/images/account4.png') }}"></a>
            <p class="name">
                <span class="user">Joseph
                    <i class="tiny material-icons">arrow_drop_down</i>
                </span><br>
                Administrator
            </p>
        </div>
    </li>
    <li><a href="{{ url('/') }}"><i class="material-icons">dashboard</i>Dashboard</a></li>
    {{--  <li><a href="{{ url('/Inventory') }}"><i class="material-icons">dns</i>Inventory</a></li>  --}}
    {{-- <li><a class="collapsible-header dropdownArr"><i class="material-icons">monetization_on</i>Sales</a></li> --}}
    <ul class="collapsible collapsible-accordion">
        <li>
            <a class="collapsible-header dropdownArr"><i class="material-icons">dns</i>Inventory<i class="material-icons right arrow">arrow_drop_down</i></a>
            <div class="collapsible-body">
                <ul>
                    <li><a href="{{ url('/Inventory') }}"><i class="material-icons">keyboard_arrow_right</i>Inventory</a></li>
                </ul>
                <ul>
                    <li><a href="{{ url('/Inventory/AddItem') }}"><i class="material-icons">keyboard_arrow_right</i>Add Item</a></li>
                </ul>
            </div>
        </li>
    </ul>
    <ul class="collapsible collapsible-accordion">
        <li>
            <a class="collapsible-header dropdownArr"><i class="material-icons">monetization_on</i>Sales<i class="material-icons right arrow">arrow_drop_down</i></a>
            <div class="collapsible-body">
                <ul>
                    <li><a href="{{ url('/Sales') }}"><i class="material-icons">keyboard_arrow_right</i>Add Sales</a></li>
                </ul>
                <ul>
                    <li><a href="{{ url('/SalesReport') }}"><i class="material-icons">keyboard_arrow_right</i>Sales report</a></li>
                </ul>
            </div>
        </li>
    </ul>
    <ul class="collapsible collapsible-accordion">
        <li>
            <a class="collapsible-header dropdownArr"><i class="material-icons">settings</i>Manage<i class="material-icons right arrow">arrow_drop_down</i></a>
            <div class="collapsible-body">
                <ul>
                    <li><a href="{{ url('/ManageBrands') }}"><i class="material-icons">keyboard_arrow_right</i>Brands</a></li>
                </ul>
                <ul>
                    <li><a href="{{ url('/ManageCategories') }}"><i class="material-icons">keyboard_arrow_right</i>Categories</a></li>
                </ul>
                <ul>
                    <li><a href="{{ url('/ManageColors') }}"><i class="material-icons">keyboard_arrow_right</i>Colors</a></li>
                </ul>
                <ul>
                    <li><a href="{{ url('/ManageFreebies') }}"><i class="material-icons">keyboard_arrow_right</i>Freebies</a></li>
                </ul>
                <ul>
                    <li><a href="{{ url('/ManageModels') }}"><i class="material-icons">keyboard_arrow_right</i>Models</a></li>
                </ul>
                <ul>
                    <li><a href="{{ url('/ManageSuppliers') }}"><i class="material-icons">keyboard_arrow_right</i>Suppliers</a></li>
                </ul>
            </div>
        </li>
    </ul>
    <li><a href="{{ url('/') }}"><i class="material-icons">face</i>User Accounts</a></li>
    <ul class="collapsible collapsible-accordion">
        <li>
            <a class="collapsible-header dropdownArr"><i class="material-icons">insert_chart</i>Reports<i class="material-icons right arrow">arrow_drop_down</i></a>
            <div class="collapsible-body">
                <ul>
                    <li><a href="../api/Guests/Report" target="_blank"><i class="material-icons">monetization_on</i>Sales Report</a></li>
                </ul>
            </div>
        </li>
    </ul>

    <li><a href="logout.php"><i class="material-icons left">exit_to_app</i>Log Out</a></li>
</ul> 
