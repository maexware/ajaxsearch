var searchTimeout = 1;
var thisinputval;
var searchform;

function startSearch(searchParam,actID) {
    $('#ajaxsearch .modal-body').load(sBaseUrl+"cl=search&searchajax=1&searchparam="+searchParam, function() {});
    if (searchform == undefined) {
        searchform = $('form.search');
    }
    //$('#ajaxsearch #searchTerm').html(searchform);
    $('#ajaxsearch').modal('show');
    //$('#'+actID).focus();
    if (actID == 'searchParam') {
        $('#searchTerm').val($('#searchParam').val());
    } else {
        $('#searchParam').val($('#searchTerm').val());
    }
    document.getElementById(actID).focus();
}

function htmlEntities(str) {
    return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}

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
            if (searchstring != '') {
                $('#ajaxsearch #searchTerm').html(searchstring);
                startSearch(searchstring,actID);
            }
        }, 1000);
    });
});

$('#ajaxsearch').on('hidden.bs.modal', function () {
    document.getElementById("searchParam").focus();
})