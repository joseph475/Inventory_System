$(document).on('click', '#searchbtn', search);

$('input[name="search"]').keypress(function (e) {
    var key = e.which;
    if (key == 13) { search(); }
});

function search() {
    let search = $('input[name="search"]').val();

    // switch (page_title) {
    //     case 'Inventory':
    //         loadData(1, search);
    //         break;
    // }
    loadData(pageTitle, 1, search)
}