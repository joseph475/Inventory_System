
var modal = $('#myModal');
var checkifvalid = [];
var myData = []
$(document).ready(loadData(pageTitle, curpage));

$(document).on('click', '#submit', function () {
    switch(pageTitle){
        case 'Freebies':
            checkifvalid = ['#description','#cost'];
            myData = {
                id: modal.find('.data-id').attr('data-id'), 
                name: modal.find('#description').val(),
                cost: modal.find('#cost').val(),
            }
        break;

        default:
            checkifvalid = ['#description'];
            myData = {
                id: modal.find('.data-id').attr('data-id'), 
                name: modal.find('#description').val() 
            }
    }
    if(checkValid(checkifvalid)){
        saveData(`Save ${pageTitle1}?`, myData);
    }
    else{ displayMessage('Please Validate all fields', ''); }
})

$(document).on('click', '.add', function () { 
    modal.find('.data-id').attr('data-id', '');
    modal.find('#description').val('');
    if(pageTitle == 'Freebies'){ modal.find('#cost').val(''); }
    modal.find('h4').html(`Add ${pageTitle1}`);
})

$(document).on('click', '.edit', function () {
    let id = $(this).closest('tr').attr('data-id');
    let description = $(this).closest('tr').find('.data-name').attr('data-name');
    if(pageTitle == 'Freebies'){
        let cost = $(this).closest('tr').find('.data-cost').attr('data-cost');
        modal.find('#cost').val(cost);
        modal.find('#cost').addClass('valid');
    }
    modal.find('.data-id').attr('data-id', id);
    modal.find('#description').val(description);
    modal.find('#description').addClass('valid');
    modal.find('h4').html(`Update ${pageTitle1}`);
})
$(document).on('click', '.delete', function(){ 
    let id = $(this).closest('tr').attr('data-id');
    deleteData(`Delete ${pageTitle1}?`, id);
});
