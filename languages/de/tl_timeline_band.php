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
$GLOBALS['TL_LANG']['tl_timeline_band']['name']				= array('Name', 'Bitte geben Sie einen Name für dieses Band ein. Der Name ist für Besucher Ihrer Seite nicht sichtbar, er wird als Referenz benötigt.');
$GLOBALS['TL_LANG']['tl_timeline_band']['theme']			= array('Thema', 'Sie können für dieses Band ein eigenes Thema wählen.');
$GLOBALS['TL_LANG']['tl_timeline_band']['width']			= array('Band Breite', 'Bitte geben Sie an wie viel Prozent der Höhe der Zeitlinie dieses Band einnehmen soll.');
$GLOBALS['TL_LANG']['tl_timeline_band']['intervalUnit']		= array('Zeiteinheit', 'Bitte wählen Sie eine Zeiteinheit für dieses Band.');
$GLOBALS['TL_LANG']['tl_timeline_band']['intervalPixels']	= array('Pixel pro Zeiteinheit', 'Bitte geben Sie an wieviele Pixel eine Zeiteinheit ausmachen soll (z.B. 100).');
$GLOBALS['TL_LANG']['tl_timeline_band']['showEventText']	= array('Ereignistitel anzeigen', 'Bitte wählen Sie ob Ereignistitel auf der Zeitlinie angezeigt werden sollen.');
$GLOBALS['TL_LANG']['tl_timeline_band']['date']				= array('Startdatum / -zeit', 'Geben Sie Datum und Zeit ein, an welchem die Zeitlinie anfangs zentriert werden soll. Wenn Sie dieses Feld leer lassen, wird das aktuelle Datum und Zeit verwendet.');
$GLOBALS['TL_LANG']['tl_timeline_band']['timeZone']			= array('Zeitzone', 'Bitte wählen Sie die Zeitzone in der sich Ereignisse in diesem Band befinden.');
$GLOBALS['TL_LANG']['tl_timeline_band']['syncWith']			= array('Sync mit', 'Wählen Sie ein zweites Band wenn mit diesem synchronisiert werden soll.');
$GLOBALS['TL_LANG']['tl_timeline_band']['highlight']		= array('Hervorheben', 'Klicken Sie hier wenn die Zeitspanne des synchronisierten Band auf diesem hervorgehoben werden soll.');
$GLOBALS['TL_LANG']['tl_timeline_band']['overview']		    = array('Übersicht', 'Klicken Sie hier um den Übersichts-Modus für dieses Band zu aktivieren. Im Normalfall zeigt das tiefere Band eine Übersicht für ein oberes Band an, und muss nicht alle Details anzeigen.');


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_timeline_band']['new']				= array('Neues Band', 'Ein neues Ereignis erstellen');
$GLOBALS['TL_LANG']['tl_timeline_band']['show']				= array('Banddetails', 'Details des Ereignis ID %s anzeigen');
$GLOBALS['TL_LANG']['tl_timeline_band']['edit']				= array('Band bearbeiten', 'Ereignis ID %s bearbeiten');
$GLOBALS['TL_LANG']['tl_timeline_band']['cut']				= array('Band verschieben', 'Band ID %s verschieben');
$GLOBALS['TL_LANG']['tl_timeline_band']['copy']				= array('Band duplizieren', 'Ereignis ID %s duplizieren');
$GLOBALS['TL_LANG']['tl_timeline_band']['delete']			= array('Band löschen', 'Ereignis ID %s löschen');
$GLOBALS['TL_LANG']['tl_timeline_band']['editheader']		= array('Zeitlinie bearbeiten', 'Zeitlinie für diese Ereignisse bearbeiten');
$GLOBALS['TL_LANG']['tl_timeline_band']['pasteafter']		= array('Am Anfang einfügen', 'Nach dem Band ID %s einfügen');
$GLOBALS['TL_LANG']['tl_timeline_band']['pastenew']			= array('Neues Band am Anfang erstellen', 'Neues Band nach dem Band ID %s erstellen');


/**
 * References
 */
$GLOBALS['TL_LANG']['tl_timeline_band']['ClassicTheme'] = 'Standard (Klassische Thema)';
$GLOBALS['TL_LANG']['tl_timeline_band']['intervalUnit_ref'] = array
(
	'Timeline.DateTime.MILLISECOND'							=> 'Milisekunde',
	'Timeline.DateTime.SECOND'								=> 'Sekunde',
	'Timeline.DateTime.MINUTE'								=> 'Minute',
	'Timeline.DateTime.HOUR'								=> 'Stunde',
	'Timeline.DateTime.DAY'									=> 'Tag',
	'Timeline.DateTime.WEEK'								=> 'Woche',
	'Timeline.DateTime.MONTH'								=> 'Monat',
	'Timeline.DateTime.YEAR'								=> 'Jahr',
	'Timeline.DateTime.DECADE'								=> 'Jahrzehnt',
	'Timeline.DateTime.CENTURY'								=> 'Jahrhundert',
	'Timeline.DateTime.MILLENNIUM'							=> 'Jahrtausend',
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
