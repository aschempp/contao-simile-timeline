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
$GLOBALS['TL_LANG']['tl_timeline_event']['title']			= array('Titel', 'Bitte geben Sie einen Titeltext ein. Dieser wird auf der Zeitlinie neben dem Ereignis und in der Blase angezeigt.');
$GLOBALS['TL_LANG']['tl_timeline_event']['start']			= array('Start', 'Bitte geben Sie Startdatum und -zeit ein.');
$GLOBALS['TL_LANG']['tl_timeline_event']['latestStart']		= array('Spätester Start', 'Bitte geben Sie das späteste Startdatum und -zeit für einen ungenauen Start ein.');
$GLOBALS['TL_LANG']['tl_timeline_event']['end']				= array('Ende', 'Bitte geben Sie Enddatum und -zeit ein.');
$GLOBALS['TL_LANG']['tl_timeline_event']['earliestEnd']		= array('Frühstes Ende', 'Bitte geben Sie das frühste Enddatum und -zeit für ein ungenaues Ende ein.');
$GLOBALS['TL_LANG']['tl_timeline_event']['durationEvent']	= array('Andauerndes Ereignis', 'Klicken Sie hier wenn dieses Ereignis über längere Zeit andauert.<br />Wenn ja, wird dieses Ereignis als Laufzeit-Leiste angezeigt.<br />Wenn nein, wird das Ereignis als "Augenblick" (mit einem Symbol) angezeigt.');
$GLOBALS['TL_LANG']['tl_timeline_event']['icon']			= array('Symbol', 'Dieses Symbol erscheint neben dem Titel auf der Zeitachse, wenn dies kein andauerndes Ereignis ist. Wenn ein Start- und Enddatum gegeben sind, wird dieses Symbol nicht angezeigt. Lassen Sie dies leer, wenn das Standardsymbol des Themas verwendet werden soll.');
$GLOBALS['TL_LANG']['tl_timeline_event']['image']			= array('Bild', 'Bitte wählen Sie in Bild welches in der Blase angezeigt werden soll.');
$GLOBALS['TL_LANG']['tl_timeline_event']['link']			= array('Titel-Link', 'Bitte geben Sie eine URL ein wenn der Titel in der Blase auf diese Adresse gelinkt werden soll.');
$GLOBALS['TL_LANG']['tl_timeline_event']['color']			= array('Farbe', 'Bitte geben Sie eine Farbe für Text und Laufzeit-Leiste (Andauernde Ereignisse) ein, welche auf der Zeitlinie verwendet werden soll.');
$GLOBALS['TL_LANG']['tl_timeline_event']['textColor']		= array('Textfarbe', 'Geben Sie eine Farbe für den Beschriftungstext auf der Zeitlinie ein. Wenn Sie dieses Feld leer lassen wird die allgemeine Farbangabe verwendet.');
$GLOBALS['TL_LANG']['tl_timeline_event']['tapeImage']		= array('Laufzeit-Bild', 'Legt ein Hintergrundbild für die Laufzeit-Linie des Ereignisses fest. Dies überschreibt die Farbangabe für die Laufzeit-Leiste.');
$GLOBALS['TL_LANG']['tl_timeline_event']['tapeRepeat']		= array('Laufzeit-Bild Wiederholung', 'Legt die Hintergrundwiederholung für das Bild der Ereignis-Laufzeit auf der Zeitlinie fest.');
$GLOBALS['TL_LANG']['tl_timeline_event']['caption']			= array('Beschriftung', 'Zusätzliche Ereignisinformationen welche beim überfahren mit der Maus auf der Zeitlinie angezeigt werden. Sieht aus wie ein Tooltip, nur reiner Text.');
$GLOBALS['TL_LANG']['tl_timeline_event']['cssClass']		= array('CSS Klasse', 'Wird der class-Eigenschaft des Ereignistitels und Laufzeit-Bandes hinzugefügt.');
$GLOBALS['TL_LANG']['tl_timeline_event']['description']		= array('Beschreibung', 'Wird in der Blase zusammen mit dem Titel und Bild des Ereignisses angezeigt.');
$GLOBALS['TL_LANG']['tl_timeline_event']['published']		= array('Veröffentlicht', 'Solange Sie diese Option nicht wählen, ist das Ereignis für die Besucher Ihrer Webseite nicht sichtbar.');



/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_timeline_theme']['new']				= array('Neues Ereignis', 'Ein neues Ereignis erstellen');
$GLOBALS['TL_LANG']['tl_timeline_theme']['show']			= array('Ereignisdetails', 'Details des Ereignis ID %s anzeigen');
$GLOBALS['TL_LANG']['tl_timeline_theme']['edit']			= array('Ereignis bearbeiten', 'Ereignis ID %s bearbeiten');
$GLOBALS['TL_LANG']['tl_timeline_theme']['copy']			= array('Ereignis duplizieren', 'Ereignis ID %s duplizieren');
$GLOBALS['TL_LANG']['tl_timeline_theme']['delete']			= array('Ereignis löschen', 'Ereignis ID %s löschen');
$GLOBALS['TL_LANG']['tl_timeline_event']['editheader']		= array('Zeitlinie bearbeiten', 'Zeitlinie für diese Ereignisse bearbeiten');
