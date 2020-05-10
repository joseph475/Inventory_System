
// let myData = [];
let cmbs = ['#modelCmb', '#brandCmb', '#categoryCmb', '#colorCmb', '#supplierCmb'];
let validateSingle = ['#imei', '#cost','#price'];
let validateMultiple = ['#cost','#price', '.imeis'];


$(document).ready(() =>{
    loadCmb('Models', '#modelCmb');
    loadCmb('Brands', '#brandCmb');
    loadCmb('Categories', '#categoryCmb');
    loadCmb('Colors', '#colorCmb');
    loadCmb('Suppliers', '#supplierCmb');
})
$(document).on('click', '#addSingle', () => {
    $('.IMEIcontainer').html('');
    $('#quantity').attr('disabled', true);
    $('.showIMEI').attr('disabled', true);
    $('#quantity').val('1');
    $('#imei').attr('disabled', false); 
})
$(document).on('click', '#addMultiple', () => {
    $('#quantity').attr('disabled', false);
    $('.showIMEI').attr('disabled', false);
    $('#imei').attr('disabled', true);
})
$(document).on('click', '.showIMEI', () => {    
    let quantity = $('#quantity').val();
    if(quantity > 0){
        let myString = '';
        $('.IMEIcontainer').html('');
        for(let i = 1; i <= quantity; i++){
            myString += `<div class="input-field col s3 my0"><div class="card"><div class="card-content p10">`+
            `<input placeholder="IMEI ${i}" id="IMEI${i}" type="number" class="validate imeis">` +
            `</div></div></div>`;
        }
        $('.IMEIcontainer').append(myString);
        $('.IMEIcontainer').addClass('card-content');
    }
    else{
        displayMessage('Quantity not valid', '');
    }
    
    
})
$('#submit').on('click', () => {
    let myIMEIS = [];

    if($('#addSingle').is(':checked')){
        myIMEIS.push($('#imei').val());
    } 
    else{
        $('.imeis').each(function(i, obj) {
            myIMEIS.push($(this).val());
        });    
    }

    let myData = {
        item_code: myIMEIS,
        model_id: $('#modelCmb').val(), 
        brand_id: $('#brandCmb').val(), 
        category_id: $('#categoryCmb').val(), 
        color_id: $('#colorCmb').val(), 
        supplier_id: $('#supplierCmb').val(), 
        cost: $('#cost').val(),
        price: $('#price').val(),
        remarks: $('#remarks').val(),
        user_id: userId,
    }
    console.log(myData);
    if($('#addSingle').is(':checked')){
        if(checkValid(validateSingle) && checkifValidated(cmbs)){
            saveData(`Save ${pageTitle1}?`, myData); 
        }
        else{ displayMessage('Please validate all Fields'); }
    }
    else{
        if(checkValid(validateMultiple) && checkifValidated(cmbs)){
            saveData(`Save ${pageTitle1}?`, myData);
        }
        else{ displayMessage('Please validate all Fields'); }
    }
})