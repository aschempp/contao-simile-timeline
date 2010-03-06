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
 * Fields
 */
$GLOBALS['TL_LANG']['tl_timeline_theme']['name']								= array('Name', 'Bitte geben Sie einen Namen für dieses Thema ein.');
$GLOBALS['TL_LANG']['tl_timeline_theme']['mouseWheel']							= array('Mausrad', '');
$GLOBALS['TL_LANG']['tl_timeline_theme']['firstDayOfWeek']						= array('Erster Tag der Woche', 'Bitte wählen Sie den ersten Tag der Woche.');
$GLOBALS['TL_LANG']['tl_timeline_theme']['ether_backgroundColors']				= array('Zeitlinie: Hintergrundfarben', '');
$GLOBALS['TL_LANG']['tl_timeline_theme']['ether_highlightColor']				= array('Zeitlinie: Hervorgehoben-Farbe', '');
$GLOBALS['TL_LANG']['tl_timeline_theme']['ether_highlightOpacity']				= array('Zeitlinie: Hervorgehoben-Deckkraft', 'Bitte eben Sie einen Deckkraft-Wert zwischen 0 und 100% ein.');
$GLOBALS['TL_LANG']['tl_timeline_theme']['ether_interval_line_show']			= array('Zeitlinie: Intervall-Linie anzeigen', '');
$GLOBALS['TL_LANG']['tl_timeline_theme']['ether_interval_line_color']			= array('Zeitlinie: Intervall-Linienfarbe', '');
$GLOBALS['TL_LANG']['tl_timeline_theme']['ether_interval_line_opacity']			= array('Zeitlinie: Intervall-Liniendeckkraft', 'Bitte eben Sie einen Deckkraft-Wert zwischen 0 und 100% ein.');
$GLOBALS['TL_LANG']['tl_timeline_theme']['ether_interval_weekend_color']		= array('Zeitlinie: Intervall-Wochenendfarbe', '');
$GLOBALS['TL_LANG']['tl_timeline_theme']['ether_interval_weekend_opacity']		= array('Zeitlinie: Intervall-Wochenenddeckkraft', 'Bitte eben Sie einen Deckkraft-Wert zwischen 0 und 100% ein.');
$GLOBALS['TL_LANG']['tl_timeline_theme']['ether_interval_marker_hAlign']		= array('Zeitlinie: Horizontale Ausrichtung der Intervall-Markierung', '');
$GLOBALS['TL_LANG']['tl_timeline_theme']['ether_interval_marker_vAlign']		= array('Zeitlinie: Vertikale Ausrichtung der Intervall-Markierung', '');
$GLOBALS['TL_LANG']['tl_timeline_theme']['event_track_offset']					= array('Ereignisse: Spur-Abstand', 'Bitte geben Sie eine Grösse in Pixeln ein.');
$GLOBALS['TL_LANG']['tl_timeline_theme']['event_track_height']					= array('Ereignisse: Spurhöhe', 'Bitte geben Sie eine Grösse in Pixeln ein.');
$GLOBALS['TL_LANG']['tl_timeline_theme']['event_track_gap']						= array('Ereignisse: Spur-Lücke', 'Bitte geben Sie eine Grösse in Pixeln ein.');
$GLOBALS['TL_LANG']['tl_timeline_theme']['event_instant_lineColor']				= array('Ereignisse: Augenblick Linienfarbe', '');
$GLOBALS['TL_LANG']['tl_timeline_theme']['event_instant_impreciseColor']		= array('Ereignisse: Augenblick Ungenauigkeitsfarbe', '');
$GLOBALS['TL_LANG']['tl_timeline_theme']['event_instant_impreciseOpacity']		= array('Ereignisse: Augenblick Ungenauigkeitsdeckkraft', 'Bitte eben Sie einen Deckkraft-Wert zwischen 0 und 100% ein.');
$GLOBALS['TL_LANG']['tl_timeline_theme']['event_instant_showLineForNoText']		= array('Ereignisse: Augenblick: Linie ohne Text anzeigen', '');
$GLOBALS['TL_LANG']['tl_timeline_theme']['event_duration_color']				= array('Ereignisse: Laufzeit-Farbe', '');
$GLOBALS['TL_LANG']['tl_timeline_theme']['event_duration_opacity']				= array('Ereignisse: Laufzeit-Deckkraft', 'Bitte eben Sie einen Deckkraft-Wert zwischen 0 und 100% ein.');
$GLOBALS['TL_LANG']['tl_timeline_theme']['event_duration_impreciseColor']		= array('Ereignisse: Laufzeit Ungenauigkeitsfarbe', '');
$GLOBALS['TL_LANG']['tl_timeline_theme']['event_duration_impreciseOpacity']		= array('Ereignisse: Laufzeit Ungenauigkeitsdeckkraft', 'Bitte eben Sie einen Deckkraft-Wert zwischen 0 und 100% ein.');
$GLOBALS['TL_LANG']['tl_timeline_theme']['event_label_insideColor']				= array('Ereignisse: Etikettenfarbe innen', '');
$GLOBALS['TL_LANG']['tl_timeline_theme']['event_label_outsideColor']			= array('Ereignisse: Etikettenfarbe aussen', '');
$GLOBALS['TL_LANG']['tl_timeline_theme']['event_label_width']					= array('Ereignisse: Etikettenbreite', 'Bitte geben Sie eine Grösse in Pixeln ein.');
$GLOBALS['TL_LANG']['tl_timeline_theme']['event_highlightColors']				= array('Ereignisse: Hervorgehobenen-Farben', '');
$GLOBALS['TL_LANG']['tl_timeline_theme']['event_bubble_size']					= array('Ereignisse: Grösse der Blase', 'Bitte geben Sie Breite und Höhe der Blase ein.');


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_timeline_theme']['new']			= array('Neues Thema', 'Ein neues Thema erstellen');
$GLOBALS['TL_LANG']['tl_timeline_theme']['show']		= array('Themendetails', 'Details des Thema ID %s anzeigen');
$GLOBALS['TL_LANG']['tl_timeline_theme']['edit']		= array('Thema bearbeiten', 'Thema ID %s bearbeiten');
$GLOBALS['TL_LANG']['tl_timeline_theme']['copy']		= array('Thema duplizieren', 'Thema ID %s duplizieren');
$GLOBALS['TL_LANG']['tl_timeline_theme']['delete']		= array('Thema löschen', 'Thema ID %s löschen');


/**
 * References
 */
$GLOBALS['TL_LANG']['tl_timeline_theme']['default'] = 'Standard';
$GLOBALS['TL_LANG']['tl_timeline_theme']['scroll'] = 'Scrollen';
$GLOBALS['TL_LANG']['tl_timeline_theme']['zoom'] = 'Zoomen';
