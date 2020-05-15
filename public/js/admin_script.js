var curpage = 1;
var userId = 1;
var mytable = $('#myTable');
var sideNavIsOpen = 1;

sessionStorage.setItem('cursection', 1);

var $loading = $('.loader').hide();
var $dimScreem = $('#dimScreen').hide();

let pageTitle = $('.page-title').attr('page-title');
let pageTitle1 = $('.page-title').attr('page-title1');

$(document).ready(function ($) {
    jconfirm.defaults = { content: '', theme: 'dark', boxWidth: '35%', useBootstrap: false };
    // if ($(".roomTypeDropDown").length){ loadRoomTypesDropdown() }
    $(window).on('load', function () {
        $('.loader').fadeOut('fast', function () { $(this).hide(); });
        $('#dimScreen').fadeOut('fast', function () { $(this).hide(); });
    });

    $('.dropdownArr').on('click', function () {
        $(this).find('.arrow').toggleClass("arrowRotate");
    })
    
})
$(document).ajaxStart(function () {
    $loading.show();
    $dimScreem.show();
}).ajaxStop(function () {
    setTimeout(function () {
        $loading.hide();
        $dimScreem.hide();
    }, 500);
})
function ckEditorInit(selector) {
    CKEDITOR.replace(selector, {
        uiColor: '#d9d9d9'
    });
}
function checkValid(checkifvalid) {
    for (i = 0; i < checkifvalid.length; i++) {
        if (!$(checkifvalid[i]).hasClass('valid')) {
            return false;
        }
    }
    return true;
}
function checkifValidated(checkifvalid) {
    for (i = 0; i < checkifvalid.length; i++) {
        if (!$(checkifvalid[i]).val()) {
            return false;
        }
    }
    return true;
}
var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
}
function displayMessage(title, content = '') {
    $.alert({
        title: title,
        content: content,
        theme: 'dark',
        boxWidth: '35%',
        useBootstrap: false,
    });
}
function displayDialog(title, content = '') {
    $.dialog({
        title: title,
        content: content,
        theme: 'material',
        boxWidth: '35%',
        useBootstrap: false,
    });
}
function convert(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
function removeComma(str) {
    var mystr = str.replace(",", "");
    return mystr;
}
function format_date(date1){
    var today = new Date(date1);
    var dd = today.getDate();
    var mm = today.getMonth() + 1;
    var yyyy = today.getFullYear();
    
    if (dd < 10) {
        dd = '0' + dd
    }

    if (mm < 10) {
        mm = '0' + mm
    } 

    mydate =  mm + '/' + dd + '/'  + yyyy;
    return mydate;
}
$(document).on('click', '.sidenav-trigger', function(){
    // alert(window.innerWidth)
    if(window.innerWidth >= '993'){
        if(sideNavIsOpen != 1){
            $('.sidenav').css('left', '0');
            $('main, .nav-wrapper, #dimScreen').css('padding-left', '300px');
            sideNavIsOpen = 1;
       }
       else{
    
            $('.sidenav').css('left', '-300px');
            $('main, .nav-wrapper, #dimScreen').css('padding-left', '0px');
            sideNavIsOpen = 0;
       }
    }
   
})
window.onscroll = function () { stickyPageHeader() };

var pageheader = document.getElementById("page-header");

if (document.body.contains(pageheader)) {
    var sticky = pageheader.offsetTop;

    function stickyPageHeader() {
        if (window.pageYOffset > sticky) {
            pageheader.classList.add("sticky");
        } else {
            pageheader.classList.remove("sticky");
        }
    }
}

// processing js
function loadData(pageTitle, curpage, search = '') {
    sessionStorage.setItem("curpage", curpage);
    $.ajax({
        url: '../api/' + pageTitle,
        data: {
            page: curpage,
            search: search
        },
        type: 'get',
        dataType: 'json',
        success: function (data) {
            generateTable(data.data);
            $.getScript("js/pagination.js", function () {  // load pagination
                createPagination(data.from, data.to, data.total, data.last_page, "loadData", search);
                $('#page_' + curpage).addClass("activePage");
            });
        },
        error: function (jqXHR, textStatus, errorThrown) {
            displayDialog(aaa.responseJSON.message);
        }
    });
}
function getById(pageTitle, id, callback) {
    $.ajax({
        url: `../api/${pageTitle}/${id}`,
        data: {},
        type: 'get',
        dataType: 'json',
        success: function (data) {
            callback(data);
        },
        error: function (aaa) {
            switch(pageTitle){
                case('Sales'):
                M.toast({ html: `IMEI not Found` });
                break;
                default:
                    displayDialog(aaa.responseJSON.message);
            }
            
        }
    });
}
function generateTable(data) {
    if (data.length > 0) {
        var myButtons = [];
        switch (pageTitle) {
            case 'Brands':
            case 'Categories':
            case 'Colors':
            case 'Suppliers':
            case 'Models':
            case 'Freebies':
            case 'Inventory':
            case 'Sales Report':
                myButtons = ['edit', 'delete'];
                break;
        }

        mytable.find('#myTbody').html('');
        mytable.find('#myThead tr').html('');

        let keys = Object.keys(data[0]);

        keys.forEach((key) => {
            if (key != 'id') {
                mytable.find('#myThead tr').append(`<th>${key.toUpperCase()}</th>`);
            }
        });

        myButtons.length > 0 ? mytable.find('#myThead tr').append(`<th style="width:15%;">ACTIONS</th>`) : '';

        let myText = '';

        data.forEach((item) => {
            let test = Object.values(item)[0];

            myText += `<tr data-id='${test}'>`;

            for (let [key, value] of Object.entries(item)) {
                if (key != 'id') {
                    if(key != 'date'){
                        myText += `<td class="data-${key}" style=" ${key == 'model' ? 'font-weight:bold' : ''}" data-${key}='${value}'>${value}</td>`;
                    }
                    else{
                        myText += `<td class="data-${key}" data-${key}='${value}'>${format_date(value)}</td>`;
                    }
                }
            }

            if (myButtons.length > 0) {
                myText += '<td class="actionButtons">';
                myButtons.forEach((action) => {
                    if (action == 'edit') {
                        action = `<a class="btn btn-2 btn-flat mr5 edit modal-trigger" href="#myModal"><i class="far fa-edit"></i></a>`;
                    }
                    else if (action == 'delete') {
                        action = `<a class="btn btn-2 btn-flat mr5 delete"><i class="far fa-trash-alt"></i></a>`;
                    }
                    myText += `${action}`;
                })
                myText += '</td>';
            }
            myText += '</tr>';
        })

        mytable.find('#myTbody').append(myText);
    }
    else{
        mytable.find('#myTbody').html('');
        M.toast({ html: `No Record Found!!!` });
    }
}
function saveData(confirmMessage, myData, method ='POST') {
    $.confirm({
        title: `${confirmMessage}`,
        content: '',
        buttons: {
            cancel: function () { },
            confirm: function () {
                $.ajax({
                    url: `../api/${pageTitle}`,
                    type: `${method}`,
                    data: myData,
                    dataType: 'json',
                    success: function (data) {
                        M.toast({ html: `Saved Succesfully` });
                            switch (pageTitle) {
                                case 'Add Inventory':
                                case 'Sales':
                                    location.reload();
                                    break;
                                default:
                                    loadData(pageTitle, 1);
                                    clearmodal();
                            }
                    },
                    error: function (aaa, bbb, ccc) {
                        displayDialog(aaa.responseJSON.message);
                    }
                });
            }
        }
    });
}
function deleteData(confirmMessage, id) {
    $.confirm({
        title: `${confirmMessage}`,
        content: '',
        buttons: {
            cancel: function () { },
            confirm: function () {
                $.ajax({
                    url: `../api/${pageTitle}/${id}`,
                    type: 'DELETE',
                    dataType: 'json',
                    success: function (data) {
                        if (data.status == 1) {
                            M.toast({ html: `Deleted Succesfully` });
                            loadData(pageTitle, 1);
                        }
                        else {
                            M.toast({ html: `Something went wrong!!!` });
                        }
                        // clearmodal();
                    },
                    error: function (aaa, bbb, ccc) {
                        displayDialog(aaa.responseJSON.message);
                    }
                });
            }
        }
    });
}
function loadCmb(api, cmb, selected = '') {
    $.ajax({
        url: `../api/${api}/${api}Asc`,
        data: {},
        type: 'get',
        dataType: 'json',
        // async: false,
        success: function (data) {
            $(`${cmb}`).html("");
            let myOption = '';
            if (selected == '') {
                myOption += '<option value="" disabled selected></option>';
            }

            data.forEach((item, index) => {
                myOption += `<option value="${item.id}" ${selected == item.id ? 'selected' : ''}>${item.name}</option>`;
            })

            $(`${cmb}`).append(myOption);
            // M.AutoInit();

            $(document).ready(function () { $('select').formSelect(); });
        },
        error: function (aaa) {
            displayDialog(aaa.responseJSON.message);
        }
    });
}
function clearmodal() {
    $.each(checkifvalid, function (i, v) {
        $(v).removeClass('valid');
        modal.find(v).val(null);
    });
    M.AutoInit();
}