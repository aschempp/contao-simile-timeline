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
$GLOBALS['TL_LANG']['tl_timeline_band']['name']				= array('Name', 'Please enter a name for this band. The name is not visible to visitors, you need it to reference this band.');
$GLOBALS['TL_LANG']['tl_timeline_band']['theme']			= array('Theme', 'You can select a custom theme for this band.');
$GLOBALS['TL_LANG']['tl_timeline_band']['width']			= array('Band width', 'Please enter how much percent of the Timeline\'s space this band takes up.');
$GLOBALS['TL_LANG']['tl_timeline_band']['intervalUnit']		= array('Interval unit', 'Please select a time unit for this band.');
$GLOBALS['TL_LANG']['tl_timeline_band']['intervalPixels']	= array('Interval pixels', 'Please enter the number of pixels that the time unit above is mapped to, e.g., 100.');
$GLOBALS['TL_LANG']['tl_timeline_band']['showEventText']	= array('Show event text', 'Please specify whether event titles are to be painted.');
$GLOBALS['TL_LANG']['tl_timeline_band']['date']				= array('Initial date/time', 'Please enter date/time on which the band should be centered initially. If you leave this field blank, the default is the current date/time.');
$GLOBALS['TL_LANG']['tl_timeline_band']['timeZone']			= array('Time zone', 'Please select a number specifying the time zone in which the band will be marked with date/time intervals. For example, to have hourly labels on the band painted by Eastern Standard Time, select -5.');
$GLOBALS['TL_LANG']['tl_timeline_band']['syncWith']			= array('Sync with', 'Please select another band you want to sync this band with.');
$GLOBALS['TL_LANG']['tl_timeline_band']['highlight']		= array('Highlight', 'Please check here if you want to highlight the timespan of the synced band on this band.');
$GLOBALS['TL_LANG']['tl_timeline_band']['overview']		    = array('Overview', 'Please check here to enable "overview" for this band. Usually, a lower band acts as a zoomed-out overview for an upper band and it does not have to show as much detail as the upper band.');


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_timeline_band']['new']				= array('New band', 'Create a new band for this Timeline');
$GLOBALS['TL_LANG']['tl_timeline_band']['show']				= array('Event details', 'Show details of band ID %s');
$GLOBALS['TL_LANG']['tl_timeline_band']['cut']				= array('Move event', 'Move band ID %s');
$GLOBALS['TL_LANG']['tl_timeline_band']['copy']				= array('Duplicate event', 'Duplicate band ID %s');
$GLOBALS['TL_LANG']['tl_timeline_band']['delete']			= array('Delete event', 'Delete band ID %s');
$GLOBALS['TL_LANG']['tl_timeline_band']['edit']				= array('Edit event', 'Edit band ID %s');
$GLOBALS['TL_LANG']['tl_timeline_band']['editheader']		= array('Edit Timeline', 'Edit the Timeline for this bands');
$GLOBALS['TL_LANG']['tl_timeline_band']['pasteafter']		= array('Paste at the beginning', 'Paste after band ID %s');
$GLOBALS['TL_LANG']['tl_timeline_band']['pastenew']			= array('Create a new band at the beginning', 'Create a new band after band ID %s');


/**
 * References
 */
$GLOBALS['TL_LANG']['tl_timeline_band']['ClassicTheme'] = 'Default (Classic Theme)';
$GLOBALS['TL_LANG']['tl_timeline_band']['intervalUnit_ref'] = array
(
	'Timeline.DateTime.MILLISECOND'							=> 'Milisecond',
	'Timeline.DateTime.SECOND'								=> 'Second',
	'Timeline.DateTime.MINUTE'								=> 'Minute',
	'Timeline.DateTime.HOUR'								=> 'Hour',
	'Timeline.DateTime.DAY'									=> 'Day',
	'Timeline.DateTime.WEEK'								=> 'Week',
	'Timeline.DateTime.MONTH'								=> 'Month',
	'Timeline.DateTime.YEAR'								=> 'Year',
	'Timeline.DateTime.DECADE'								=> 'Decade',
	'Timeline.DateTime.CENTURY'								=> 'Century',
	'Timeline.DateTime.MILLENNIUM'							=> 'Millennium',
);
$GLOBALS['TL_LANG']['tl_timeline_band']['timezone_ref'] = array
(
	'-12'	=> 'GMT -12',
	'-11'	=> 'GMT -11',
	'-10'	=> 'GMT -10',
	'-9'	=> 'GMT -9',
	'-8'	=> 'GMT -8',
	'-7'	=> 'GMT -7',
	'-6'	=> 'GMT -6',
	'-5'	=> 'GMT -5',
	'-4'	=> 'GMT -4',
	'-3'	=> 'GMT -3',
	'-2'	=> 'GMT -2',
	'-1'	=> 'GMT -1',
	'0'		=> 'GMT',
	'+1'	=> 'GMT +1',
	'+2'	=> 'GMT +2',
	'+3'	=> 'GMT +3',
	'+4'	=> 'GMT +4',
	'+5'	=> 'GMT +5',
	'+6'	=> 'GMT +6',
	'+7'	=> 'GMT +7',
	'+8'	=> 'GMT +8',
	'+9'	=> 'GMT +9',
	'+10'	=> 'GMT +10',
	'+11'	=> 'GMT +11',
	'+12'	=> 'GMT +12',
);

