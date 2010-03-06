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
$GLOBALS['TL_LANG']['tl_timeline_event']['title']			= array('Title', 'Please enter a text title that goes next to the tape in the Timeline. Also shown in the bubble.');
$GLOBALS['TL_LANG']['tl_timeline_event']['start']			= array('Start', 'Please enter the start date and time.');
$GLOBALS['TL_LANG']['tl_timeline_event']['latestStart']		= array('Latest start', 'Please enter the lastet start date and time for imprecise beginnings.');
$GLOBALS['TL_LANG']['tl_timeline_event']['end']				= array('End', 'Please enter the end date and time.');
$GLOBALS['TL_LANG']['tl_timeline_event']['earliestEnd']		= array('Earliest end', 'Please enter the earliest end date and time for imprecise ends.');
$GLOBALS['TL_LANG']['tl_timeline_event']['durationEvent']	= array('Duration event', 'Please choose if the event occurs over a time duration.<br />If yes, the event will be drawn as a dark blue tape. The tape color is set with the color attribute.<br />If no, the event is focused on a specific "instant" (shown with the icon).');
$GLOBALS['TL_LANG']['tl_timeline_event']['icon']			= array('Icon', 'This image will appear next to the title text in the timeline if not a duration event. If a start and end date are supplied, the icon is not shown. If icon attribute is not set, a default icon from the theme is used.');
$GLOBALS['TL_LANG']['tl_timeline_event']['image']			= array('Image', 'Please select an image that will be displayed in the bubble.');
$GLOBALS['TL_LANG']['tl_timeline_event']['link']			= array('Title link', 'Please enter an url if you\'d like the bubble\'s title text to be a hyper-link to this address.');
$GLOBALS['TL_LANG']['tl_timeline_event']['color']			= array('Color', 'Please enter the color of the text and tape (duration events) to display in the timeline.');
$GLOBALS['TL_LANG']['tl_timeline_event']['textColor']		= array('Text color', 'Please enter the color for the label text on the timeline. If not set, then the color attribute will be used.');
$GLOBALS['TL_LANG']['tl_timeline_event']['tapeImage']		= array('Tape image', 'Sets the background image for the event\'s tape (or \'bar\') on the Timeline. Overrides the color setting for the tape.');
$GLOBALS['TL_LANG']['tl_timeline_event']['tapeRepeat']		= array('Tape image repeat', 'Sets the repeat style for the event\'s tape image on the Timeline.');
$GLOBALS['TL_LANG']['tl_timeline_event']['caption']			= array('Caption', 'Additional event information shown when mouse is hovered over the Timeline tape or label. Uses the html title property. Looks like a tooltip. Plain text only.');
$GLOBALS['TL_LANG']['tl_timeline_event']['cssClass']		= array('CSS class', 'Added to the HTML classnames for the event\'s label and tape divs.');
$GLOBALS['TL_LANG']['tl_timeline_event']['description']		= array('Description', 'Will be displayed inside the bubble with the event\'s title and image.');
$GLOBALS['TL_LANG']['tl_timeline_event']['published']		= array('Published', 'Unless you choose this option the event is not visible on the Timeline.');



/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_timeline_event']['new']				= array('New event', 'Create a new event on this Timeline');
$GLOBALS['TL_LANG']['tl_timeline_event']['show']			= array('Event details', 'Show details of event ID %s');
$GLOBALS['TL_LANG']['tl_timeline_event']['copy']			= array('Duplicate event', 'Duplicate event ID %s');
$GLOBALS['TL_LANG']['tl_timeline_event']['delete']			= array('Delete event', 'Delete event ID %s');
$GLOBALS['TL_LANG']['tl_timeline_event']['edit']			= array('Edit event', 'Edit event ID %s');
$GLOBALS['TL_LANG']['tl_timeline_event']['editheader']		= array('Edit Timeline', 'Edit the Timeline for this events');

