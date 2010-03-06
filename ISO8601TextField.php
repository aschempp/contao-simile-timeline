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


class ISO8601TextField extends TextField
{
	protected function validator($varInput)
	{
		$varInput = parent::validator($varInput);
		
		// Abort if error
		if ($this->hasErrors())
			return $varInput;
		
		
		// Check if user entered a "TYPOlight" date
		$objDate = new Date();
		if (preg_match('/'. $objDate->getRegexp($GLOBALS['TL_CONFIG']['datimFormat']) .'/i', $varInput))
		{
			$objDate = new Date($varInput, $GLOBALS['TL_CONFIG']['datimFormat']);
			$strISO = date('c', $objDate->timestamp);
		}
		
		// Check if user entered a "TYPOlight" date + time
		elseif (preg_match('/'. $objDate->getRegexp($GLOBALS['TL_CONFIG']['dateFormat']) .'/i', $varInput))
		{
			$objDate = new Date($varInput, $GLOBALS['TL_CONFIG']['dateFormat']);
			$strISO = date('c', $objDate->timestamp);
		}
		
		// Try to interpret date
		else
		{
			$strISO = ISO8601TextField::parseISO8601($varInput);
			
			if ($strISO === false)
			{
				$strISO = '';
				
				if ($this->mandatory)
				{
					$this->addError($GLOBALS['TL_LANG']['ERR']['iso8601']);
				}
			}
		}
		
		
		return $strISO;
	}
	
	
	public static function parseISO8601($varInput, $strFormat='c')
	{
		$blnNeg = false;
			
		if (substr($varInput, 0, 1) == '-')
		{
			$blnNeg = true;
			$varInput = substr($varInput, 1);
		}
		elseif (substr($varInput, 0, 1) == '+')
		{
			$varInput = substr($varInput, 1);
		}
		
		if (preg_match('@([0-9]{4})(-?([0-9]{2})(-?([0-9]{2})([t| ]?([0-9]{2})(:?([0-9]{2})(:?([0-9]{2}))?)?)?)?)?(([+|-| ]{1})([0-9]{1,2})[:| ]?([0-9]{1,2}))?@i', $varInput, $arrMatch))
		{
			$year	= $arrMatch[1];
			$month	= isset($arrMatch[3])  ? $arrMatch[3]  : '00';
			$day	= isset($arrMatch[5])  ? $arrMatch[5]  : '00';
			$hour	= isset($arrMatch[7])  ? $arrMatch[7]  : '00';
			$minute	= isset($arrMatch[9])  ? $arrMatch[9]  : '00';
			$second	= isset($arrMatch[11]) ? $arrMatch[11] : '00';
			$offOp	= isset($arrMatch[13]) ? ($arrMatch[13] == '-' ? '-' : '+') : '+';
			$offH	= isset($arrMatch[14]) ? $arrMatch[14] : '00';
			$offM	= isset($arrMatch[15]) ? $arrMatch[15] : '00';
			
			
			$strFormat = str_replace('c', ($blnNeg ? '-' : '').$year.'-'.$month.'-'.$day.'T'.$hour.':'.$minute.':'.$second.$offOp.$offH.':'.$offM, $strFormat);
			
			$strFormat = str_replace('d', $day,		$strFormat);
			$strFormat = str_replace('g', ($hour > 12 ? (substr(($hour-12), 0, 1)=='0' ? substr($hour, 1) : $hour) : (substr($hour, 0, 1)=='0' ? substr($hour, 1) : $hour)), $strFormat);
			$strFormat = str_replace('G', (substr($hour, 0, 1)=='0' ? substr($hour, 1) : $hour), $strFormat);
			$strFormat = str_replace('h', ($hour > 12 ? str_pad(($hour-12), 2, '0', STR_PAD_LEFT) : $hour), $strFormat);
			$strFormat = str_replace('H', $hour,	$strFormat);
			$strFormat = str_replace('i', $minute,	$strFormat);
			$strFormat = str_replace('m', $month,	$strFormat);
			$strFormat = str_replace('s', $second,	$strFormat);
			$strFormat = str_replace('Y', $year,	$strFormat);
		}
		else
		{
			return false;
		}
		
		return $strFormat;
	}
}

