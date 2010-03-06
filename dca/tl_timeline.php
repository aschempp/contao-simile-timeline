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
 * Table tl_timeline
 */
$GLOBALS['TL_DCA']['tl_timeline'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'ctable'                      => array('tl_timeline_event'),
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 1,
			'fields'                  => array('name'),
			'flag'                    => 1,
			'panelLayout'             => 'search,filter,limit',
		),
		'label' => array
		(
			'fields'                  => array('name'),
			'format'                  => '%s'
		),
		'global_operations' => array
		(
			'themes' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_timeline']['themes'],
				'href'                => 'table=tl_timeline_theme',
				'class'               => 'header_timeline_themes',
				'attributes'          => 'onclick="Backend.getScrollOffset();"'
			),
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset();"'
			),
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_timeline']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif',
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_timeline']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_timeline']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_timeline']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			),
			'bands' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_timeline']['bands'],
				'href'                => 'table=tl_timeline_band',
				'icon'                => 'system/modules/simile-timeline/html/band.png'
			),
			'event' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_timeline']['event'],
				'href'                => 'table=tl_timeline_event',
				'icon'                => 'system/modules/simile-timeline/html/events.jpg',
				'button_callback'     => array('tl_timeline', 'eventsButton'),
			),
		)
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'                => array('source', 'wiki'),
		'default'                     => 'name;source',
		'events'                      => 'name;source;orientation,height,border;wiki;fallback',
		'calendar'                    => 'name;source,calendars;orientation,height,border;nolink,wiki;fallback',
		'feed'                        => 'name;source,url;orientation,height,border;wiki;fallback',
	),
	
	// Subpalettes
	'subpalettes' => array
	(
		'wiki'                        => 'wikiurl,wikisection',
	),

	// Fields
	'fields' => array
	(
		'name' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline']['name'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'search'                  => true,
			'eval'                    => array('mandatory'=>true, 'unique'=>true, 'maxlength'=>255)
		),
		'source' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline']['source'],
			'inputType'               => 'radio',
			'exclude'                 => true,
			'filter'                  => true,
			'default'                 => 'events',
			'options'                 => array('events', 'calendar', 'feed'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_timeline'],
			'eval'                    => array('mandatory'=>true, 'submitOnChange'=>true)
		),
		'calendars' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline']['calendars'],
			'inputType'               => 'checkbox',
			'exclude'                 => true,
			'foreignKey'              => 'tl_calendar.title',
			'eval'                    => array('mandatory'=>true, 'multiple'=>true)
		),
		'url' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline']['url'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'rgxp'=>'url', 'decodeEntities'=>true, 'maxlength'=>255)
		),
		'orientation' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline']['orientation'],
			'inputType'               => 'radio',
			'exclude'                 => true,
			'default'                 => 'horizontal',
			'options'                 => array('horizontal', 'vertical'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_timeline']['orientation_ref'],
			'eval'                    => array('mandatory'=>true)
		),
		'height' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline']['height'],
			'inputType'               => 'inputUnit',
			'exclude'                 => true,
			'options'                 => array('px', '%', 'em', 'pt', 'pc', 'in', 'cm', 'mm'),
			'eval'                    => array('includeBlankOption'=>true, 'rgxp'=>'alnum', 'mandatory'=>true)
		),
		'border' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline']['border'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'default'                 => '1px solid #aaa',
			'eval'                    => array('maxlength'=>255),
		),
		'nolink' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline']['nolink'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
		),
		'wiki' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline']['wiki'],
			'exclude'                 => true,
			'filter'                  => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true),
		),
		'wikiurl' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline']['wikiurl'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'search'                  => true,
			'eval'                    => array('maxlength'=>255, 'rgxp'=>'url', 'mandatory'=>true),
		),
		'wikisection' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline']['wikisection'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'eval'                    => array('maxlength'=>255),
		),
		'fallback' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline']['fallback'],
			'inputType'               => 'textarea',
			'exclude'                 => true,
			'search'                  => true,
			'default'                 => &$GLOBALS['TL_LANG']['tl_timeline']['fallback_default'],
			'eval'                    => array('rte'=>'tinyMCE', 'decodeEntities'=>true)
		),
	),
);


class tl_timeline extends Backend
{
	/**
	 * Hide events button if source is not timeline events
	 */
	public function eventsButton($row, $href, $label, $title, $icon, $attributes)
	{
		if ($row['source'] != 'events')
			return '';
		
		return '<a href="'.$this->addToUrl($href.'&amp;id='.$row['id']).'" title="'.specialchars($title).'"'.$attributes.'>'.$this->generateImage($icon, $label).'</a> ';
	}
}
