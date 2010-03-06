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
 * Table tl_timeline_event
 */
$GLOBALS['TL_DCA']['tl_timeline_event'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'ptable'                      => 'tl_timeline',
		'enableVersioning'            => true,
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 4,
			'fields'                  => array('start DESC'),
			'panelLayout'             => 'filter;search,limit',
			'headerFields'            => array('name', 'source', 'wiki'),
			'child_record_callback'   => array('tl_timeline_event', 'listEvents')
		),
		'global_operations' => array
		(
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset();"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_timeline_event']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_timeline_event']['copy'],
				'href'                => 'act=paste&amp;mode=copy',
				'icon'                => 'copy.gif',
				'attributes'          => 'onclick="Backend.getScrollOffset();"'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_timeline_event']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_timeline_event']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'                => array('durationEvent'),
		'default'                     => 'title,durationEvent,start,end;description,image;link,caption,icon;color,textColor,cssClass;published',
		'1'                           => 'title,durationEvent,start,latestStart,end,earliestEnd;description,image;link,caption;color,textColor,cssClass;tapeImage,tapeRepeat;published',
	),

	// Fields
	'fields' => array
	(
		'title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_event']['title'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'search'                  => true,
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255)
		),
		'start' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_event']['start'],
			'inputType'               => 'iso8601',
			'exclude'                 => true,
			'eval'                    => array('mandatory'=>true, 'maxlength'=>26, 'datepicker'=>$this->getDatePickerString()),
		),
  		'durationEvent' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_event']['durationEvent'],
			'inputType'               => 'radio',
			'exclude'                 => true,
			'filter'                  => true,
			'default'                 => '0',
			'options'                 => array(''=>&$GLOBALS['TL_LANG']['MSC']['no'], '1'=>&$GLOBALS['TL_LANG']['MSC']['yes']),
			'eval'                    => array('submitOnChange'=>true),
		),
		'latestStart' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_event']['latestStart'],
			'inputType'               => 'iso8601',
			'exclude'                 => true,
			'eval'                    => array('maxlength'=>26, 'datepicker'=>$this->getDatePickerString()),
		),
		'end' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_event']['end'],
			'inputType'               => 'iso8601',
			'exclude'                 => true,
			'eval'                    => array('maxlength'=>26, 'datepicker'=>$this->getDatePickerString()),
		),
		'earliestEnd' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_event']['earliestEnd'],
			'inputType'               => 'iso8601',
			'exclude'                 => true,
			'eval'                    => array('maxlength'=>26, 'datepicker'=>$this->getDatePickerString()),
		),
		'link' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_event']['link'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'eval'                    => array('rgxp'=>'url', 'decodeEntities'=>true, 'maxlength'=>255),
			'wizard' => array
			(
				array('tl_timeline_event', 'pagePicker')
			)
		),
		'icon' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_event']['icon'],
			'inputType'               => 'fileTree',
			'exclude'                 => true,
			'eval'                    => array('fieldType'=>'radio', 'files'=>true, 'filesOnly'=>true)
		),
		'image' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_event']['image'],
			'inputType'               => 'fileTree',
			'exclude'                 => true,
			'eval'                    => array('fieldType'=>'radio', 'files'=>true, 'filesOnly'=>true)
		),
		'tapeImage' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_event']['tapeImage'],
			'inputType'               => 'fileTree',
			'exclude'                 => true,
			'eval'                    => array('fieldType'=>'radio', 'files'=>true, 'filesOnly'=>true)
		),
		'tapeRepeat' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_event']['tapeRepeat'],
			'inputType'               => 'select',
			'exclude'                 => true,
			'options'                 => array('repeat', 'repeat-x', 'repeat-y'),
		),
		'caption' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_event']['caption'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'search'                  => true,
			'eval'                    => array('maxlength'=>255)
		),
		'description' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_event']['description'],
			'inputType'               => 'textarea',
			'exclude'                 => true,
			'search'                  => true,
			'eval'                    => array('rte'=>'tinyMCE', 'decodeEntities'=>true)
		),
		'color' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_event']['color'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'eval'                    => array('maxlength'=>6, 'rgxp'=>'alnum'),
			'wizard' => array
			(
				array('tl_timeline_event', 'colorPicker')
			)
		),
		'textColor' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_event']['textColor'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'eval'                    => array('maxlength'=>6, 'rgxp'=>'alnum'),
			'wizard' => array
			(
				array('tl_timeline_event', 'colorPicker')
			)
		),
		'cssClass' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_event']['cssClass'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'filter'                  => true,
			'eval'                    => array('maxlength'=>64)
		),
		'published' => array
		(
			'exclude'                 => true,
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_event']['published'],
			'inputType'               => 'checkbox',
			'filter'                  => true,
			'eval'                    => array('doNotCopy'=>true)
		),
	)
);


/**
 * Class tl_timeline_event
 */
class tl_timeline_event extends Backend
{

	public function listEvents($row)
	{
		return '<div class="cte_type ' . ($row['published'] ? 'published' : 'unpublished') . '"><strong>' . $row['title'] . '</strong> :: ' . ISO8601TextField::parseISO8601($row['start'], $GLOBALS['TL_CONFIG']['datimFormat']) . (strlen($row['end']) ? ' - ' . ISO8601TextField::parseISO8601($row['end'], $GLOBALS['TL_CONFIG']['datimFormat']) : '') . '</div>
<div class="limit_height h64 block">
' . $row['description'] . '
</div>';
	}
	

	/**
	 * Return the color picker wizard
	 * @param object
	 * @return string
	 */
	public function colorPicker(DataContainer $dc)
	{
		return ' ' . $this->generateImage('pickcolor.gif', $GLOBALS['TL_LANG']['MSC']['colorpicker'], 'style="vertical-align:top; cursor:pointer;" onclick="Backend.pickColor(\'ctrl_'.$dc->field.'\')"');
	}
	
	
	/**
	 * Return the link picker wizard
	 * @param object
	 * @return string
	 */
	public function pagePicker(DataContainer $dc)
	{
		$strField = 'ctrl_' . $dc->field . (($this->Input->get('act') == 'editAll') ? '_' . $dc->id : '');
		return ' ' . $this->generateImage('pickpage.gif', $GLOBALS['TL_LANG']['MSC']['pagepicker'], 'style="vertical-align:top; cursor:pointer;" onclick="Backend.pickPage(\'' . $strField . '\')"');
	}
}
