<?php

/**
 * This file is part of a maexware solutions module.
 *
 * This maexware solutions module is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This maexware solutions module is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with maexware ajaxsearch module.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @link      https://www.maexware-solutions.de
 * @copyright (C) maexware solutions GmbH 2018
 */

namespace maexware\ajaxsearch\Extensions\Application\Controller;

use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Request;


class SearchController extends SearchController_parent
{

    /**
     * Ajax template name.
     * @var string
     */
    protected $_sAjaxThisTemplate = 'ajax_result.tpl';

    /**
     * Forms search navigation URLs, executes parent::render() and
     * returns name of template to render search::_sThisTemplate.
     *
     * @return  string  current template file name
     */
    public function render()
    {
        if(Registry::get(Request::class)->getRequestEscapedParameter('searchajax')) {
            $this->_aViewData['iCount'] = $this->_iAllArtCnt;
            $this->_aViewData['oResult'] = $this->startAjaxSearch();
            $this->_sThisTemplate = $this->_sAjaxThisTemplate;
        }
        return parent::render();
    }

    public function startAjaxSearch() {


        $myConfig = $this->getConfig();
        $oConfig = Registry::getConfig();

        $sSearchParamForQuery = trim(Registry::get(Request::class)->getRequestEscapedParameter('searchparam'));

        // searching in category ?
        $sInitialSearchCat = $this->_sSearchCatId = rawurldecode(Registry::get(Request::class)->getRequestEscapedParameter('searchcnid'));

        // searching in vendor #671
        $sInitialSearchVendor = rawurldecode(Registry::get(Request::class)->getRequestEscapedParameter('searchvendor'));

        // searching in Manufacturer #671
        $sManufacturerParameter = Registry::get(Request::class)->getRequestEscapedParameter('searchmanufacturer');
        $sInitialSearchManufacturer = $this->_sSearchManufacturer = rawurldecode($sManufacturerParameter);

        $this->_blEmptySearch = false;
        if (!$sSearchParamForQuery && !$sInitialSearchCat && !$sInitialSearchVendor && !$sInitialSearchManufacturer) {
            //no search string
            $this->_aArticleList = null;
            $this->_blEmptySearch = true;

            return false;
        }
        // config allows to search in Manufacturers ?
        if (!$oConfig->getConfigParam('bl_perfLoadManufacturerTree')) {
            $sInitialSearchManufacturer = null;
        }

        // searching ..
        /** @var oxSearch $oSearchHandler */
        $oSearchHandler = oxNew(\OxidEsales\Eshop\Application\Model\Search::class);
        $oSearchList = $oSearchHandler->getSearchArticles(
            $sSearchParamForQuery,
            $sInitialSearchCat,
            $sInitialSearchVendor,
            $sInitialSearchManufacturer,
            $this->getSortingSql($this->getSortIdent())
        );

        // list of found articles
        $this->_aArticleList = $oSearchList;
        $this->_iAllArtCnt = 0;

        // skip count calculation if no articles in list found
        if ($oSearchList->count()) {
            $this->_iAllArtCnt = $oSearchHandler->getSearchArticleCount(
                $sSearchParamForQuery,
                $sInitialSearchCat,
                $sInitialSearchVendor,
                $sInitialSearchManufacturer
            );
        }

        $iNrofCatArticles = (int) $myConfig->getConfigParam('iNrofCatArticles');
        $iNrofCatArticles = $iNrofCatArticles ? $iNrofCatArticles : 1;
        return $oSearchList;
    }

}