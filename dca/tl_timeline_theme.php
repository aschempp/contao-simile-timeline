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
 * @copyright  Andreas Schempp 2009
 * @author     Andreas Schempp <andreas@schempp.ch
 * @license    LGPL
 */


/**
 * Table tl_timeline_theme
 */
$GLOBALS['TL_DCA']['tl_timeline_theme'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
//		'closed'                      => true,
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
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset();"'
			),
			'back' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['backBT'],
				'href'                => 'table=tl_timeline',
				'class'               => 'header_back',
				'attributes'          => 'onclick="Backend.getScrollOffset();"'
			),
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_timeline_theme']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_timeline_theme']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_timeline_theme']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_timeline_theme']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'default'                     => 'name;mouseWheel,firstDayOfWeek;ether_backgroundColors,ether_highlightColor,ether_highlightOpacity;ether_interval_line_show,ether_interval_line_color,ether_interval_line_opacity,ether_interval_weekend_color,ether_interval_weekend_opacity,ether_interval_marker_hAlign,ether_interval_marker_vAlign;event_track_offset,event_track_height,event_track_gap;event_instant_lineColor,event_instant_impreciseColor,event_instant_impreciseOpacity,event_instant_showLineForNoText;event_duration_color,event_duration_opacity,event_duration_impreciseColor,event_duration_impreciseOpacity;event_label_insideColor,event_label_outsideColor,event_label_width;event_highlightColors,event_bubble_size'
	),

	// Fields
	'fields' => array
	(
		'name' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_theme']['name'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'search'                  => true,
			'eval'                    => array('mandatory'=>true, 'unique'=>true, 'maxlength'=>255)
		),
		'mouseWheel' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_theme']['mouseWheel'],
			'inputType'               => 'select',
			'exclude'                 => true,
			'default'                 => 'scroll',
			'options'                 => array('default', 'zoom', 'scroll'),
			'reference'				  => &$GLOBALS['TL_LANG']['tl_timeline_theme'],
		),
		'firstDayOfWeek' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_theme']['firstDayOfWeek'],
			'inputType'               => 'select',
			'exclude'                 => true,
			'default'                 => 0,
			'options'                 => array(0, 1, 2, 3, 4, 5, 6),
			'reference'               => &$GLOBALS['TL_LANG']['DAYS'],
		),
		'ether_backgroundColors' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_theme']['ether_backgroundColors'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'default'                 => array("eeeeee","dddddd","cccccc","aaaaaa"),
			'eval'                    => array('maxlength'=>6, 'rgxp'=>'alnum', 'multiple'=>true, 'size'=>4),
		),
		'ether_highlightColor' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_theme']['ether_highlightColor'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'default'                 => 'ffffff',
			'eval'                    => array('maxlength'=>6, 'rgxp'=>'alnum'),
			'wizard' => array
			(
				array('tl_timeline_theme', 'colorPicker')
			)
		),
		'ether_highlightOpacity' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_theme']['ether_highlightOpacity'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'default'				  => '50',
			'eval'                    => array('maxlength'=>3, 'rgxp'=>'digit')
		),
		'ether_interval_line_show' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_theme']['ether_interval_line_show'],
			'inputType'               => 'checkbox',
			'exclude'                 => true,
			'default'				  => '1',
		),
		'ether_interval_line_color' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_theme']['ether_interval_line_color'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'default'                 => 'aaaaaa',
			'eval'                    => array('maxlength'=>6, 'rgxp'=>'alnum'),
			'wizard' => array
			(
				array('tl_timeline_theme', 'colorPicker')
			)
		),
		'ether_interval_line_opacity' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_theme']['ether_interval_line_opacity'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'default'				  => '25',
			'eval'                    => array('maxlength'=>3, 'rgxp'=>'digit')
		),
		'ether_interval_weekend_color' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_theme']['ether_interval_weekend_color'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'default'                 => 'ffffe0',
			'eval'                    => array('maxlength'=>6, 'rgxp'=>'alnum'),
			'wizard' => array
			(
				array('tl_timeline_theme', 'colorPicker')
			)
		),
		'ether_interval_weekend_opacity' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_theme']['ether_interval_weekend_opacity'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'default'				  => '30',
			'eval'                    => array('maxlength'=>3, 'rgxp'=>'digit')
		),
		'ether_interval_marker_hAlign' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_theme']['ether_interval_marker_hAlign'],
			'inputType'               => 'select',
			'exclude'                 => true,
			'default'                 => 'Bottom',
			'options'                 => array('Top', 'Center', 'Bottom'),
		),
		'ether_interval_marker_vAlign' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_theme']['ether_interval_marker_vAlign'],
			'inputType'               => 'select',
			'exclude'                 => true,
			'default'                 => 'Right',
			'options'                 => array('Left', 'Middle', 'Right'),
		),
		'event_track_offset' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_theme']['event_track_offset'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'default'                 => '0.5',
			'eval'                    => array('maxlength'=>6, 'rgxp'=>'digit')
		),
		'event_track_height' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_theme']['event_track_height'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'default'                 => '1.5',
			'eval'                    => array('maxlength'=>6, 'rgxp'=>'digit')
		),
		'event_track_gap' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_theme']['event_track_gap'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'default'                 => '0.5',
			'eval'                    => array('maxlength'=>6, 'rgxp'=>'digit')
		),
		'event_instant_lineColor' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_theme']['event_instant_lineColor'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'default'                 => '58a0dc',
			'eval'                    => array('maxlength'=>6, 'rgxp'=>'alnum'),
			'wizard' => array
			(
				array('tl_timeline_theme', 'colorPicker')
			)
		),
		'event_instant_impreciseColor' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_theme']['event_instant_impreciseColor'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'default'                 => '58a0dc',
			'eval'                    => array('maxlength'=>6, 'rgxp'=>'alnum'),
			'wizard' => array
			(
				array('tl_timeline_theme', 'colorPicker')
			)
		),
		'event_instant_impreciseOpacity' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_theme']['event_instant_impreciseOpacity'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'default'				  => '20',
			'eval'                    => array('maxlength'=>3, 'rgxp'=>'digit')
		),
		'event_instant_showLineForNoText' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_theme']['event_instant_showLineForNoText'],
			'inputType'               => 'checkbox',
			'exclude'                 => true,
			'default'				  => '1',
		),
		'event_duration_color' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_theme']['event_duration_color'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'default'                 => '58a0dc',
			'eval'                    => array('maxlength'=>6, 'rgxp'=>'alnum'),
			'wizard' => array
			(
				array('tl_timeline_theme', 'colorPicker')
			)
		),
		'event_duration_opacity' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_theme']['event_duration_opacity'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'default'				  => '100',
			'eval'                    => array('maxlength'=>3, 'rgxp'=>'digit')
		),
		'event_duration_impreciseColor' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_theme']['event_duration_impreciseColor'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'default'                 => '58a0dc',
			'eval'                    => array('maxlength'=>6, 'rgxp'=>'alnum'),
			'wizard' => array
			(
				array('tl_timeline_theme', 'colorPicker')
			)
		),
		'event_duration_impreciseOpacity' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_theme']['event_duration_impreciseOpacity'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'default'				  => '20',
			'eval'                    => array('maxlength'=>3, 'rgxp'=>'digit')
		),
		'event_label_insideColor' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_theme']['event_label_insideColor'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'default'                 => 'ffffff',
			'eval'                    => array('maxlength'=>6, 'rgxp'=>'alnum'),
			'wizard' => array
			(
				array('tl_timeline_theme', 'colorPicker')
			)
		),
		'event_label_outsideColor' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_theme']['event_label_outsideColor'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'default'                 => '000000',
			'eval'                    => array('maxlength'=>6, 'rgxp'=>'alnum'),
			'wizard' => array
			(
				array('tl_timeline_theme', 'colorPicker')
			)
		),
		'event_label_width' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_theme']['event_label_width'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'default'                 => '200',
			'eval'                    => array('maxlength'=>6, 'rgxp'=>'digit')
		),
		'event_highlightColors' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_theme']['event_highlightColors'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'default'                 => array("ffff00","ffc000","ff0000","0000ff"),
			'eval'                    => array('maxlength'=>6, 'rgxp'=>'alnum', 'multiple'=>true, 'size'=>4),
		),
		'event_bubble_size' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_theme']['event_bubble_size'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'default'                 => array(250,125),
			'eval'                    => array('maxlength'=>6, 'rgxp'=>'digit', 'multiple'=>true, 'size'=>2),
		),
	),
);



/**
 * Class tl_timeline_theme
 */
class tl_timeline_theme extends Backend
{
	/**
	 * Return the color picker wizard
	 * @param object
	 * @return string
	 */
	public function colorPicker(DataContainer $dc)
	{
		return ' ' . $this->generateImage('pickcolor.gif', $GLOBALS['TL_LANG']['MSC']['colorpicker'], 'style="vertical-align:top; cursor:pointer;" onclick="Backend.pickColor(\'ctrl_'.$dc->field.'\')"');
	}
}

