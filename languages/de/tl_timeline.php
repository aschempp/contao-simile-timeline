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
$GLOBALS['TL_LANG']['tl_timeline']['name']			= array('Name', 'Bitte geben Sie einen Namen für diese Zeitlinie ein. Der Name ist für Besucher Ihrer Webseite nicht sichtbar, er wird lediglich als Referenz benötigt.');
$GLOBALS['TL_LANG']['tl_timeline']['source']		= array('Quelle', 'Bitte wählen Sie woher Ereignisinformationen abgerufen werden sollen.');
$GLOBALS['TL_LANG']['tl_timeline']['calendar']		= array('Kalender', 'Bitte wählen Sie einen oder mehrere Kalender welche angezeigt werden sollen.');
$GLOBALS['TL_LANG']['tl_timeline']['url']			= array('URL', 'Bitte geben Sie eine vollständige URL zu einem RSS/Atom Feed ein.');
$GLOBALS['TL_LANG']['tl_timeline']['orientation']	= array('Orientierung', 'Bitte wählen Sie ob die Zeitlinie horizontal oder vertikal gezeichnet werden soll.');
$GLOBALS['TL_LANG']['tl_timeline']['height']		= array('Höhe', 'Bitte geben Sie die Gesamthöhe dieser Zeitlinie ein.');
$GLOBALS['TL_LANG']['tl_timeline']['border']		= array('Umrandung', 'Geben Sie eine gültige CSS-Definition für den Rand dieser Zeitlinie ein. Z.B. "1px solid #aaa".');
$GLOBALS['TL_LANG']['tl_timeline']['nolink']		= array('Nicht verknüpfen', 'Kalender-Ereignisse nicht mit deren Detailansicht verlinken.');
$GLOBALS['TL_LANG']['tl_timeline']['wiki']			= array('Wiki-Referenz hinzufügen', 'Es kann zu jedem Ereignis ein Link anzeigen, welcher sich aus dem Ereignisnamen und einer URL zusammensetzt.');
$GLOBALS['TL_LANG']['tl_timeline']['wikiurl']		= array('Wiki URL', 'Bitte geben Sie die Basisurl zu Ihrem Wiki oder Ihrer Webseite ein.');
$GLOBALS['TL_LANG']['tl_timeline']['wikisection']	= array('Wiki Sektion', 'Bitte geben Sie den Namen Ihrer Wiki-Sektion ein (falls zutreffend).');
$GLOBALS['TL_LANG']['tl_timeline']['fallback']		= array('Alternativer Inhalt', 'Bitte geben Sie hier einen alternativen Inhalt ein, falls die Zeitlinie nicht geladen werden kann (Javascript fallback).');


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_timeline']['new']			= array('Neue Zeitlinie', 'Eine neue Zeitlinie erstellen');
$GLOBALS['TL_LANG']['tl_timeline']['show']			= array('Zeitliniendetails', 'Details der Zeitlinie ID %s anzeigen');
$GLOBALS['TL_LANG']['tl_timeline']['edit']			= array('Zeitlinie bearbeiten', 'Zeitlinie ID %s bearbeiten');
$GLOBALS['TL_LANG']['tl_timeline']['copy']			= array('Zeitlinie duplizieren', 'Zeitlinie ID %s duplizieren');
$GLOBALS['TL_LANG']['tl_timeline']['delete']		= array('Zeitlinie löschen', 'Zeitlinie ID %s löschen');
$GLOBALS['TL_LANG']['tl_timeline']['bands']			= array('Bänder', 'Bänder für diese Zeitlinie verwalten');
$GLOBALS['TL_LANG']['tl_timeline']['event']			= array('Ereignisse', 'Ereignisse für diese Zeitlinie verwalten');
$GLOBALS['TL_LANG']['tl_timeline']['themes']		= array('Themen', 'Ein eigenes Thema für Zeitlinien erstellen');


/**
 * References
 */
$GLOBALS['TL_LANG']['tl_timeline']['events']		= 'Zeitlinien-Ereignisse';
$GLOBALS['TL_LANG']['tl_timeline']['calendar']		= 'TYPOlight Kalender-Modul';
$GLOBALS['TL_LANG']['tl_timeline']['feed']			= 'RSS/Atom Feed';
$GLOBALS['TL_LANG']['tl_timeline']['horizontal']	= 'Horizontal';
$GLOBALS['TL_LANG']['tl_timeline']['vertical']		= 'Vertikal';


/**
 * Defaults
 */
$GLOBALS['TL_LANG']['tl_timeline']['fallback_default'] = 'Diese Seite verwendet Javascript um Ihnen eine Zeitlinie anzuzeigen. Bitte aktivieren Sie Javascript in Ihren Browser um die Zeitlinie zu sehen. Danke.';
