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
 * along with maexware solutions AdminDashboard modul.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @link      https://www.maexware-solutions.de
 * @copyright (C) maexware solutions GmbH 2018
 */

/**
 * Metadata version
 */

$sMetadataVersion = '2.1';


/**
 * Module information
 */
$aModule = [
    'id'           => 'mxajaxsearch',
    'title'       => [
        'en' => '[<span style="color:blue;">mae</span><span style="font-weight:bold;">X</span><span style="color:blue;">ware</span>] Ajax Suche',
        'de' => '[<span style="color:blue;">mae</span><span style="font-weight:bold;">X</span><span style="color:blue;">ware</span>] Ajax search',
    ],
    'description' => [
        'en' => 'Simple ajax search modal for OXID search in header',
        'de' => 'Einfache Ajax Suche im Modal für OXID Suche im Header',
    ],
    'thumbnail'   => 'maexware.png',
    'version'     => '0.3',
    'author'      => 'maexware solutions GmbH',
    'url'         => 'https://www.maexware-solutions.de',
    'email'       => 'info@maexware-solutions.de',

    'extend'       => [
        \OxidEsales\Eshop\Application\Controller\SearchController::class => \maexware\AjaxSearch\Extensions\Application\Controller\SearchController::class,
    ],
    'controllers' => [
    ],
    'templates' => [
        "ajax_result.tpl"=> "mx/ajaxsearch/Application/views/tpl/ajax_result.tpl",
    ],
    'blocks' => [
        ['template' => 'widget/header/search.tpl', 'block'=>'widget_header_search_form', 'file'=>'Application/views/tpl/search_ext.tpl'],
    ],
    'settings' => [
        [
            'group' => 'mxAjaxSearch',
            'name'  => 'mxAjaxSearch_maxSearchItems',
            'type'  => 'str',
            'value' => '15'
        ],
    ]
];