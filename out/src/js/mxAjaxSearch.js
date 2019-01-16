var searchTimeout = 1;
var thisinputval;
var searchform;
var isFromClosing = false;

function startSearch(searchParam,actID) {
    $.ajax({
        url: sBaseUrl+"cl=search&searchajax=1&searchparam="+searchParam
    }).done(function(response) {
        $('#ajaxsearch .modal-body').html(response);
    });

    if (searchform == undefined) {
        searchform = $('form.search');
    }

    $('#ajaxsearch').modal('show');

    if (actID == 'searchParam') {
        $('#searchTerm').val($('#searchParam').val());
    } else {
        $('#searchParam').val($('#searchTerm').val());
    }
}

function htmlEntities(str) {
    return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}

$('#ajaxsearch').on('shown.bs.modal', function() {
    setTimeout(function (){
        $('#searchTerm').focus();
    }, 150);

})

$(document).ready(function(){
    $(".search input[type=text], input#searchTerm").on("keyup", function(event){
        thisinputval = event;
        var actID = thisinputval.currentTarget.attributes.id.value;

        if(searchTimeout){
            clearTimeout(searchTimeout);
        }

        searchTimeout = setTimeout(function() {
            $('#ajaxsearch .modal-body').empty();
            //$('#ajaxsearch #searchTerm').empty();
            searchstring = htmlEntities($(thisinputval.target).val());
            if (searchstring != '' && isFromClosing == false) {
                $('#ajaxsearch #searchTerm').html(searchstring);
                startSearch(searchstring,actID);
            }
            if (isFromClosing == true) {
                isFromClosing = false;
            }
        }, 1000);
    });
});

$('#ajaxsearch').on('hidden.bs.modal', function () {
    document.getElementById("searchParam").focus();
    isFromClosing = true;
});