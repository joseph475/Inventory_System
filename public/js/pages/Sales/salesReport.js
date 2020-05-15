
// var modal = $('#myModal');
var checkifvalid = [];
var myData = []
$(document).ready(loadData(pageTitle, curpage));

$(document).on('click', '#submit', function () {

})

// $(document).on('click', '.add', function () { 
//     modal.find('.data-id').attr('data-id', '');
//     modal.find('#description').val('');
//     if(pageTitle == 'Freebies'){ modal.find('#cost').val(''); }
//     modal.find('h4').html(`Add ${pageTitle1}`);
// })

$(document).on('click', '.edit', function () {
    // let id = $(this).closest('tr').attr('data-id');
})
$(document).on('click', '.delete', function(){ 
    let id = $(this).closest('tr').attr('data-id');
    deleteData(`Delete ${pageTitle1}?`, id);
});
