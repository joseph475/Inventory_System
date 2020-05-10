
var modal = $('#myModal');
var checkifvalid = ['#imei', '#cost', '#price'];
var myData = []

$(document).ready(function(){
    loadData(pageTitle, curpage);
    loadCmb('Models', '#modelCmb');
    loadCmb('Brands', '#brandCmb');
    loadCmb('Colors', '#colorCmb');
    loadCmb('Categories', '#categoryCmb');
    loadCmb('Suppliers', '#supplierCmb');
});

$(document).on('click', '.edit', function() {

    let tr = $(this).closest('tr');
    let id = tr.attr('data-id');

    getById(pageTitle, id, populateModal);
})

function populateModal(data){
    console.log(data);
    let id = data.id;
    let IMEI = data.item_code;
    let brand_id = data.brand_id;
    let category_id = data.category_id;
    let color_id = data.color_id;
    let model_id = data.model_id;
    let supplier_id = data.supplier_id;
    // let brand = data.brand;
    // let category = data.category;
    // let color = data.color;
    // let model = data.model;
    // let supplier = data.supplier;
    let cost = data.cost;
    let price = data.price;
    let remarks = data.remarks;

    modal.find('h4').html(`Update ${pageTitle1}`);  
    modal.find('.data-id').attr('data-id', id);

    modal.find('#imei').val(IMEI).addClass('valid');
    modal.find('#cost').val(cost).addClass('valid');
    modal.find('#price').val(price).addClass('valid');

    modal.find('#modelCmb').val(model_id);
    modal.find('#brandCmb').val(brand_id);
    modal.find('#colorCmb').val(color_id);
    modal.find('#categoryCmb').val(category_id);
    modal.find('#supplierCmb').val(supplier_id);
    
    $('select').formSelect();

    if(remarks != null){ 
        modal.find('#remarks').val(remarks).addClass('valid');
    }

    // loadCmb('Models', '#modelCmb', model_id);
    // loadCmb('Brands', '#brandCmb', brand_id);
    // loadCmb('Colors', '#colorCmb', color_id);
    // loadCmb('Categories', '#categoryCmb', category_id);
    // loadCmb('Suppliers', '#supplierCmb', supplier_id);

}

$(document).on('click', '.delete', function(){ 
    let id = $(this).closest('tr').attr('data-id');
    deleteData(`Delete ${pageTitle1}?`, id);
});

$(document).on('click', '#submit', function () {
    if(checkValid(checkifvalid)){
        myData = {
            id: modal.find('.data-id').attr('data-id'), 
            item_code: modal.find('#imei').val(),
            cost: modal.find('#cost').val(),
            price: modal.find('#price').val(),
            remarks: modal.find('#remarks').val(),
            category_id: modal.find('#categoryCmb').val(),
            model_id: modal.find('#modelCmb').val(),
            brand_id: modal.find('#brandCmb').val(),
            color_id: modal.find('#colorCmb').val(),
            supplier_id: modal.find('#supplierCmb').val(), 
            user_id: userId,
        }
        console.log(myData);
        saveData(`Update ${pageTitle1}?`, myData, 'PUT');
    }
    else{ displayMessage('Please Validate all fields', ''); }
})