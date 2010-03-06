<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * TYPOlight webCMS
 * Copyright (C) 2005 Leo Feyer
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at http://www.gnu.org/licenses/.
 *
 * PHP version 5
 * @copyright  Andreas Schempp 2008
 * @author     Andreas Schempp <andreas@schempp.ch
 * @license    LGPL
 */



/**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_timeline']['name']			= array('Name', 'Please enter a name for this Timeline. The name is not visible to visitors, you need it to reference this Timeline.');
$GLOBALS['TL_LANG']['tl_timeline']['source']		= array('Source', 'Please select where event information is coming from.');
$GLOBALS['TL_LANG']['tl_timeline']['calendar']		= array('Calendars', 'Please select one or multiple calendar archives to be displayed.');
$GLOBALS['TL_LANG']['tl_timeline']['url']			= array('URL', 'Please enter a full url to the RSS/Atom feed.');
$GLOBALS['TL_LANG']['tl_timeline']['orientation']	= array('Orientation', 'Please select if you want to draw this Timeline horizontal or vertical.');
$GLOBALS['TL_LANG']['tl_timeline']['height']		= array('Height', 'Please enter the overall height of this Timeline.');
$GLOBALS['TL_LANG']['tl_timeline']['border']		= array('Border', 'Add a valid CSS setting for the border of your Timeline. Something like "1px solid #aaa".');
$GLOBALS['TL_LANG']['tl_timeline']['nolink']		= array('Don\'t link', 'Do not link calendar events to their detail view.');
$GLOBALS['TL_LANG']['tl_timeline']['wiki']			= array('Add wiki reference', 'Timeline can display an url for each event which is build upon the event name and a given url.');
$GLOBALS['TL_LANG']['tl_timeline']['wikiurl']		= array('Wiki URL', 'Please enter the base url to your wiki or website.');
$GLOBALS['TL_LANG']['tl_timeline']['wikisection']	= array('Wiki Section', 'Please enter the name to your wiki section (if applicable).');
$GLOBALS['TL_LANG']['tl_timeline']['fallback']		= array('Javascript fallback', 'This text will be displayed on browsers without JavaScript support.');


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_timeline']['new']			= array('New Timeline', 'Create a new Timeline');
$GLOBALS['TL_LANG']['tl_timeline']['show']			= array('Timeline details', 'Show details of Timeline ID %s');
$GLOBALS['TL_LANG']['tl_timeline']['edit']			= array('Edit Timeline', 'Edit Timeline ID %s');
$GLOBALS['TL_LANG']['tl_timeline']['copy']			= array('Duplicate Timeline', 'Duplicate Timeline ID %s');
$GLOBALS['TL_LANG']['tl_timeline']['delete']		= array('Delete Timeline', 'Delete Timeline ID %s');
$GLOBALS['TL_LANG']['tl_timeline']['bands']			= array('Bands', 'Manage bands for this Timeline');
$GLOBALS['TL_LANG']['tl_timeline']['event']			= array('Events', 'Manage events for this Timeline');
$GLOBALS['TL_LANG']['tl_timeline']['themes']		= array('Themes', 'Create custom timeline themes');


/**
 * References
 */
$GLOBALS['TL_LANG']['tl_timeline']['events']		= 'Timeline Events';
$GLOBALS['TL_LANG']['tl_timeline']['calendar']		= 'TYPOlight calendar module';
$GLOBALS['TL_LANG']['tl_timeline']['feed']			= 'RSS/Atom Feed';
$GLOBALS['TL_LANG']['tl_timeline']['horizontal']	= 'Horizontal';
$GLOBALS['TL_LANG']['tl_timeline']['vertical']		= 'Vertical';


/**
 * Defaults
 */
$GLOBALS['TL_LANG']['tl_timeline']['fallback_default'] = 'This page uses Javascript to show you a Timeline. Please enable Javascript in your browser to see the full page. Thank you.';