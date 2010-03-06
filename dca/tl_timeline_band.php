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
 * Table tl_timeline_band
 */
$GLOBALS['TL_DCA']['tl_timeline_band'] = array
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
			'filter'                  => true,
			'fields'                  => array('sorting'),
			'panelLayout'             => 'filter;search,limit',
			'headerFields'            => array('name', 'source', 'wiki'),
			'child_record_callback'   => array('tl_timeline_band', 'listBands')
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
				'label'               => &$GLOBALS['TL_LANG']['tl_timeline_band']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_timeline_band']['copy'],
				'href'                => 'act=paste&amp;mode=copy',
				'icon'                => 'copy.gif',
				'attributes'          => 'onclick="Backend.getScrollOffset();"'
			),
			'cut' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_timeline_band']['cut'],
				'href'                => 'act=paste&amp;mode=cut',
				'icon'                => 'cut.gif',
				'attributes'          => 'onclick="Backend.getScrollOffset();"'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_timeline_band']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_timeline_band']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'default'                     => 'name,theme;width,intervalUnit,intervalPixels,overview;syncWith,highlight;date,timeZone,showEventText',
	),

	// Fields
	'fields' => array
	(
		'name' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_band']['name'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'search'                  => true,
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255)
		),
		'theme' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_band']['theme'],
			'inputType'               => 'select',
			'exclude'                 => true,
			'foreignKey'              => 'tl_timeline_theme.name',
			'eval'                    => array('includeBlankOption'=>true, 'blankOptionLabel'=>&$GLOBALS['TL_LANG']['tl_timeline_band']['ClassicTheme'])
		),
		'width' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_band']['width'],
			'inputType'               => 'inputUnit',
			'exclude'                 => true,
			'options'                 => array('%'),
			'eval'                    => array('mandatory'=>true, 'rgxp'=>'digit')
		),
		'intervalUnit' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_band']['intervalUnit'],
			'inputType'               => 'select',
			'exclude'                 => true,
			'options'                 => array
			(
				'Timeline.DateTime.MILLISECOND',
				'Timeline.DateTime.SECOND',
				'Timeline.DateTime.MINUTE',
				'Timeline.DateTime.HOUR',
				'Timeline.DateTime.DAY',
				'Timeline.DateTime.WEEK',
				'Timeline.DateTime.MONTH',
				'Timeline.DateTime.YEAR',
				'Timeline.DateTime.DECADE',
				'Timeline.DateTime.CENTURY',
				'Timeline.DateTime.MILLENNIUM',
			),
			'reference'               => &$GLOBALS['TL_LANG']['tl_timeline_band']['intervalUnit_ref'],
			'eval'                    => array('includeBlankOption'=>true, 'mandatory'=>true)
		),
		'intervalPixels' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_band']['intervalPixels'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'default'                 => '100',
			'eval'                    => array('rgxp'=>'digit', 'mandatory'=>true)
		),
		'syncWith' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_band']['syncWith'],
			'inputType'               => 'select',
			'exclude'                 => true,
			'filter'                  => true,
			'options_callback'        => array('tl_timeline_band', 'syncWith'),
			'eval'                    => array('includeBlankOption'=>true),
		),
		'highlight' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_band']['highlight'],
			'inputType'               => 'checkbox',
			'filter'                  => true,			
		),
		'overview' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_band']['overview'],
			'inputType'               => 'checkbox',
			'exclude'                 => true,
			'filter'                  => true,
		),
		'date' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_band']['date'],
			'inputType'               => 'iso8601',
			'exclude'                 => true,
			'eval'                    => array('maxlength'=>26, 'datepicker'=>$this->getDatePickerString()),
		),
		'timeZone' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_band']['timeZone'],
			'inputType'               => 'select',
			'exclude'                 => true,
			'filter'                  => true,
			'default'                 => '0',
			'options'                 => array('-12', '-11', '-10', '-9', '-8', '-7', '-6', '-5', '-4', '-3', '-2', '-1', '0', '+1', '+2', '+3', '+4', '+5', '+6', '+7', '+8', '+9', '+10', '+11', '+12'),
			'reference'				  => &$GLOBALS['TL_LANG']['tl_timeline_band']['timezone_ref'],
			'eval'                    => array('mandatory'=>true),
		),
		'showEventText' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_timeline_band']['showEventText'],
			'inputType'               => 'checkbox',
			'exclude'                 => true,
			'filter'                  => true,
			'default'                 => '1',
		),
	)
);



/**
 * Class tl_timeline_band
 */
class tl_timeline_band extends Backend
{
	public function listBands($row)
	{
		$arrWidth = deserialize($row['width']);
		$objSync = $this->Database->prepare("SELECT * FROM tl_timeline_band WHERE id=?")->execute($row['syncWith']);
		if ($objSync->numRows)
			$strSync = $objSync->name;
		else
			$strSync = '-';
		
		return '
<div style="margin-top: -12px">
	<div style="float: left; width: 100px"><strong>' . $GLOBALS['TL_LANG']['tl_timeline_band']['name'][0] . ':</strong></div> ' . $row['name'] . '<br />
	<div style="float: left; width: 100px"><strong>' . $GLOBALS['TL_LANG']['tl_timeline_band']['width'][0] . ':</strong></div> ' . $arrWidth['value'] . $arrWidth['unit'] . '<br />
	<div style="float: left; width: 100px"><strong>' . $GLOBALS['TL_LANG']['tl_timeline_band']['intervalUnit'][0] . ':</strong></div> ' . $GLOBALS['TL_LANG']['tl_timeline_band']['intervalUnit_ref'][$row['intervalUnit']] . '<br />
	<div style="float: left; width: 100px"><strong>' . $GLOBALS['TL_LANG']['tl_timeline_band']['syncWith'][0] . ':</strong></div> ' . $strSync . '<br />
	<div style="float: left; width: 100px"><strong>' . $GLOBALS['TL_LANG']['tl_timeline_band']['overview'][0] . ':</strong></div> ' . ($row['overview'] ? $GLOBALS['TL_LANG']['MSC']['yes'] : $GLOBALS['TL_LANG']['MSC']['no']) . '
</div>';
	}
	
	
	/**
	 * Return an arraw of bands in this time line
	 */
	public function syncWith()
	{
		$objBand = $this->Database->prepare("SELECT * FROM tl_timeline_band WHERE id=?")->execute($this->Input->get('id'));
		
		if (!$objBand->numRows)
			return array();
	
		$arrBands = array();	
		$objBands = $this->Database->prepare("SELECT * FROM tl_timeline_band WHERE pid=? AND id!=?")->execute($objBand->pid, $objBand->id);
		while( $objBands->next() )
		{
			$arrBands[$objBands->id] = $objBands->name;
		}
		
		return $arrBands;
	}
}