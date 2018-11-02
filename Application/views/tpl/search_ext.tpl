[{assign var=sModuleUrl value=$oViewConf->getModuleUrl('mxajaxsearch')}]
[{oxscript include="`$sModuleUrl`/out/src/js/mxAjaxSearch.js"}]
[{oxstyle include="`$sModuleUrl`/out/src/css/mxAjaxSearch.css"}]
[{$smarty.block.parent}]
<div class="modal fade" id="ajaxsearch" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">[{oxmultilang ident="MXAJAXSEARCH_SEARCHRESULTSFOR"}]: <span id="searchTerm"></span></h4>
            </div>
            <div class="modal-body">
                <p>[{oxmultilang ident="MXAJAXSEARCH_NOSEARCHRESULTS"}]</p>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
