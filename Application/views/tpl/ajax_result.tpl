<div class="row equalHeight">
    [{if $oResult|count > 1}]
        [{math assign="countBoxRow" equation='y*x' x=4 y=$iCount}]
        [{foreach from=$oResult item=product name=ajaxsearch}]
        <div class="col-md-3">
            [{assign var="_sTitle" value="`$_oBoxProduct->oxarticles__oxtitle->value` `$_oBoxProduct->oxarticles__oxvarselect->value`"|strip_tags}]
            <a href="[{$product->getLink()}]" class="thumbnail">
                [{if $product->getThumbnailUrl()}]<img src="[{$product->getThumbnailUrl()}]" alt="[{$product->oxarticles__oxtitle->value}]">[{/if}]
                <center>[{$product->oxarticles__oxtitle->value}]</center>
            </a>
        </div>
        [{if $smarty.foreach.ajaxsearch.iteration is div by 4}]</div><div class="row equalHeight">[{/if}]
        [{if $smarty.foreach.ajaxsearch.iteration == $iCount}]</div>[{/if}]
        [{/foreach}]
    [{else}]
        <div class="col-md-12">
            <p>[{oxmultilang ident="MXAJAXSEARCH_NOSEARCHRESULTS"}]</p>
        </div>
    [{/if}]
</div>
