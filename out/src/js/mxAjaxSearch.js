var searchTimeout = 1;
var thisinputval;

function startSearch(searchParam) {
    $('#ajaxsearch .modal-body').load(sBaseUrl+"cl=search&searchajax=1&searchparam="+searchParam, function() {});
    $('#ajaxsearch').modal('show');
}

function htmlEntities(str) {
    return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}

$(document).ready(function(){
    $(".search input[type=text]").on("keyup", function(event){
        thisinputval = event;
        if(searchTimeout){
            clearTimeout(searchTimeout);
        }

        searchTimeout = setTimeout(function() {
            $('#ajaxsearch .modal-body').empty();
            $('#ajaxsearch #searchTerm').empty();
            searchstring = htmlEntities($(thisinputval.target).val());
            if (searchstring != '') {
                $('#ajaxsearch #searchTerm').html(searchstring);
                startSearch(searchstring);
            }
        }, 1000);
    });
});