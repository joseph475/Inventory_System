var checkifvalid = ['#date','#receipt'];
let cmb = `<select class="cmbFreebies" Multiple></select><label>Freebies</label>`;
let template = $('#rowTemplate').html();
let container = $('.itemContainer');

$(document).ready(function(){
    $(".datepicker").datepicker({ format: "yyyy/mm/dd" });
    loadCmb('Freebies', '.cmbFreebies', 'none');
    $('#rowTemplate').find('.cmbfreebiescont').append(cmb);
});

$(document).on('click','#cloneRow', function(){
    let quantity = $('#quantity').val();

    if(quantity > 1){
        $('.itemContainer').html('');
        for(let i = 2; i <= quantity; i++){
            container.find('.cmbfreebiescont').html('');
            container.append(template);
            container.find('.row').append('<a class="btn-floating btn-small waves-effect waves-light red removeRow"><i class="material-icons">close</i></a>');
            container.find('.cmbfreebiescont').append(cmb);
            container.append('<div class="divider"></div>');
        }
        loadCmb('Freebies', '.cmbFreebies', 'none');
        $('select').formSelect();
    }
    else{ $('.itemContainer').html(''); }

})
$(document).on('click', '.removeRow', function(){
    $(this).closest('.row').remove();
    computeTotal();
})

$(document).on('focusout','.imeis', function(e) {
    if(checkValid($(this))){
        let imei = $(this).val();
        let row = $(this).closest('.row');

        getById(pageTitle, imei, populateTextFields);

        function populateTextFields(data){
            row.find('.models').val(data.model);
            row.find('.brands').val(data.brand);
            row.find('.colors').val(data.color);
            row.find('.prices').val(data.price);

            computeTotal();
        }    
        
    }
});

function computeTotal(){
    var total = 0;
    $('.prices').each(function(i, obj) {
        total += parseInt($(this).val());
        $('#total').val(total);
    });
    
}

$(document).on('click', '#submit', function() {
    let myData = [];
    let imeiAndFreebies = [];
    let tempData = [];

    $('.rowData').each(function(i, obj) {
        let imei = $(this).find('.imeis').val();
        let freebies = $(this).find('.cmbFreebies').val();
        if(imei != ''){
            imeiAndFreebies = {
                item_code: imei,
                freebies: freebies
            }    
            tempData.push(imeiAndFreebies);
        }
    });

    myData = {
        date: $('#date').val(),
        receipt: $('#receipt').val(),
        modeOfPayment: $('#modeOfPayment').val(),
        terms: (modeOfPayment == 'Home Credit')? $('#terms').val(): 'N/A',
        data: tempData,
        userId: userId,
    }

    // console.log(JSON.stringify(myData));
    if(checkValid(checkifvalid)){
        saveData(`Save ${pageTitle1}?`, myData);
    }
    else{ displayMessage('Please Validate all fields', ''); }
})

$(document).on('change', '#modeOfPayment', function(){
    // alert($(this).val());
    if($(this).val() == 'Home Credit'){
        $('#termsCont').removeClass('hidden');
    }
    else{
        $('#termsCont').addClass('hidden');
    }
}) 