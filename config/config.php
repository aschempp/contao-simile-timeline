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
 * Back end modules
 */
$GLOBALS['BE_MOD']['content']['simile-timeline'] = array
(
	'tables'		=> array('tl_timeline', 'tl_timeline_event', 'tl_timeline_band', 'tl_timeline_theme'),
	'icon'			=> 'system/modules/simile-timeline/html/icon.png',
	'stylesheet'	=> 'system/modules/simile-timeline/html/style.css',
);


/**
 * Front end modules
 */
$GLOBALS['FE_MOD']['application']['simile-timeline'] = 'ModuleSimileTimeline';


/**
 * Backend widgets
 */
$GLOBALS['BE_FFL']['iso8601'] = 'ISO8601TextField';