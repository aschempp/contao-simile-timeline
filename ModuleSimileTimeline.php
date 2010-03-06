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


class ModuleSimileTimeline extends Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_timeline';
	
	
	/**
	 * Holds the timeline database result for this module
	 */
	protected $Timeline;


	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### SIMILE TIMELINE ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'typolight/main.php?do=modules&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}
		
		// Fetch timeline
		$objTimeline = $this->Database->prepare("SELECT * FROM tl_timeline WHERE id=?")->limit(1)->execute($this->timeline);
		
		if (!$objTimeline->numRows)
			return '';
			
		$this->Timeline = $objTimeline;

		return parent::generate();
	}


	/**
	 * Generate module
	 */
	protected function compile()
	{
		// Load timeline api
//		$GLOBALS['TL_JAVASCRIPT'][] = 'http://static.simile.mit.edu/timeline/api-2.2.0/timeline-api.js';
		$GLOBALS['TL_HEAD'][] = '<script type="text/javascript">
	Timeline_ajax_url   = "system/modules/simile-timeline/html/timeline_ajax/simile-ajax-api.js";
	Timeline_urlPrefix  = "system/modules/simile-timeline/html/timeline_js/";
	Timeline_parameters = "bundle=true";
</script>
<script src="system/modules/simile-timeline/html/timeline_js/timeline-api.js" type="text/javascript">
</script>
';
		
			
		// Fetch and compile bands
		$objBands = $this->Database->prepare("SELECT * FROM tl_timeline_band WHERE pid=? ORDER BY sorting")->execute($this->Timeline->id);
		
		if (!$objBands->numRows)
		{
			$this->loadLanguageFile('tl_timeline_event');
			throw new Exception($GLOBALS['TL_LANG']['MSC']['missingTimelineBand']);
		}
			
		$c = 0;
		$arrThemes = array();
		$arrBands = array();
		$arrBandPosition = array();
		$arrBandSync = array();
		$strBandSettings = '';
		while( $objBands->next() )
		{
			$arrWidth = deserialize($objBands->width);
			
			$strBand = sprintf('
Timeline.createBandInfo({
	eventSource:    eventSource,
	dateTimeFormat: "iso8601",
	width:          "%s",
	intervalUnit:   %s, 
	intervalPixels: %s,
	timeZone:       %s,
	showEventText:  %s,
	overview:       %s%s%s
})',
				$arrWidth['value'] . $arrWidth['unit'],
				$objBands->intervalUnit,
				$objBands->intervalPixels,
				$objBands-timeZone,
				($objBands->showEventText ? 'true' : 'false'),
				($objBands->overview ? 'true' : 'false'),
				(strlen($objBands->date) ? ",\n" . '	date: 		"' . $objBands->date . '"' : ''),
				(($objBands->theme > 0) ? ",\n" . '	theme:          theme'.$objBands->theme : '')
			);
			
			if ($objBands->theme > 0 && !isset($arrThemes['theme'.$objBands->id]))
			{
				$arrThemes['theme'.$objBands->id] = $this->parseTheme($objBands->theme);
			}
			
			// Add highlight option
			if ($objBands->highlight)
			{
				$strBandSettings .= "\n".'bandInfos[' . $c . '].highlight = true;';
			}
			
			// Prepare to sync bands
			$arrBandPosition[$objBands->id] = $c;
			if ($objBands->syncWith > 0)
			{
				$arrBandSync[$objBands->id] = $objBands->syncWith;
			}
			

			$arrBands[] = $strBand;
			$c++;
		}
		
		foreach( $arrBandSync as $band => $syncWith)
		{
			$strBandSettings .= "\n".'bandInfos['.$arrBandPosition[$band].'].syncWith = '.$arrBandPosition[$syncWith].';';
		}
		
		// Fetch events
		switch( $this->Timeline->source )
		{
			case 'calendar':
				$arrEvents = $this->parseCalendars();
				break;
			
			case 'feed':
				$arrEvents = $this->parseFeed();
				break;
				
			default:
			case 'events':
				$arrEvents = $this->parseEvents();
				break;
			
		}
		
		
		$arrHeight = deserialize($this->Timeline->height);
		
		
		$this->Template->intId = $this->id;
		$this->Template->strId = 'timeline'.$this->id;
		$this->Template->orientation = ($this->Timeline->orientation == 'horizontal' ? '' : $this->Timeline->orientation);
		$this->Template->height = $arrHeight['value'] . $arrHeight['unit'];
		$this->Template->border = $this->Timeline->border;
		$this->Template->wiki = $this->Timeline->wiki ? true : false;
		$this->Template->wikiurl = $this->Timeline->wikiurl;
		$this->Template->wikisection = $this->Timeline->wikisection;
		$this->Template->fallback = $this->Timeline->fallback;
		$this->Template->bandSettings = $strBandSettings;
		$this->Template->themes = implode("\n", $arrThemes); 
		$this->Template->bands = implode(', ', $arrBands);
		$this->Template->events = implode(', ', $arrEvents);
	}
	
	
	/**
	 * return JSON events from timeline module
	 */
	private function parseEvents()
	{
		// Fetch and compile events (we don't care if none are available)
		$objEvents = $this->Database->prepare("SELECT * FROM tl_timeline_event WHERE published=1 AND pid=? ORDER BY start DESC")->execute($this->Timeline->id);
		
		$arrEvents = array();
		while( $objEvents->next() )
		{
			$strEvent = sprintf('
{
    title: "%s",
    durationEvent: %s,
    start: "%s"%s%s%s%s%s%s%s%s%s%s%s%s
}',
				str_replace(array('"', "\n", "\r"), array('\"', ' ', ' '), $objEvents->title),
				($objEvents->durationEvent && $objEvents->end > 0 ? 'true' : 'false'),
				$objEvents->start,
				(($objEvents->durationEvent && strlen($objEvents->latestStart)) ? ",\n".'    latestStart: "' . $objEvents->latestStart . '"' : ''),
				(strlen($objEvents->end) ? ",\n".'    end: "' . $objEvents->end . '"' : ''),
				(($objEvents->durationEvent && strlen($objEvents->earliestEnd)) ? ",\n".'    earliestEnd: "' . $objEvents->earliestEnd . '"' : ''),
				(strlen($objEvents->caption) ? ",\n".'    caption: "'.str_replace(array('"', "\n", "\r"), array('\"', ' ', ' '), $objEvents->caption).'"' : ''),
				(strlen($objEvents->description) ? ",\n".'    description: "'.str_replace(array('"', "\n", "\r"), array('\"', ' ', ' '), $objEvents->description).'"' : ''),
				(strlen($objEvents->icon) ? ",\n".'    icon: "'.$objEvents->icon.'"' : ''),
				(strlen($objEvents->image) ? ",\n".'    image: "'.$objEvents->image.'"' : ''),
				(strlen($objEvents->link) ? ",\n".'    link: "'.$objEvents->link.'"' : ''),
				(strlen($objEvents->color) ? ",\n".'    color: "'.$objEvents->color.'"' : ''),
				(strlen($objEvents->textColor) ? ",\n".'    textColor: "'.$objEvents->textColor.'"' : ''),
				(strlen($objEvents->tapeImage) ? ",\n".'    tapeImage: "'.$objEvents->tapeImage.'"' . ",\n".'    tapeRepeat: "'.str_replace("'", "\'", $objEvents->tapeRepeat).'"' : ''),
				(strlen($objEvents->cssClass) ? ",\n".'    classname: "'.$objEvents->cssClass.'"' : '')
			);

			$arrEvents[] = $strEvent;
		}
		
		return $arrEvents;
	}
	
	
	/**
	 * return JSON events from TYPOlight calendar module
	 */
	private function parseCalendars()
	{
		$this->import('FrontendUser', 'User');
		
		$this->User->groups = deserialize($this->User->groups);
		$arrCalendars = deserialize($this->Timeline->calendars);
		$arrEvents = array();
		
		$objCalendars = $this->Database->execute("SELECT * FROM tl_calendar WHERE id IN (" . implode(',', (is_array($arrCalendars) ? $arrCalendars : array(0))) . ")");
		
		while( $objCalendars->next() )
		{
			if ($objCalendars->protected)
			{
				$arrGroups = deserialize($objCalendars->groups, true);
				
				// Not allowed member
				if (!count(array_intersect($arrGroups, $this->User->groups)))
					continue;
			}
			
			$objEvents = $this->Database->prepare("SELECT * FROM tl_calendar_events WHERE pid=?" . (BE_USER_LOGGED_IN ? '' : " AND published=1"))->execute($objCalendars->id);
			
			while( $objEvents->next() )
			{
				// Event start is in future
				if (!BE_USER_LOGGED_IN && $objEvents->start > 0 && $objEvents->start > time())
					continue;
					
				// Event stop is in past
				if (!BE_USER_LOGGED_IN && $objEvents->stop > 0 && $objEvents->stop < time())
					continue;

				$imgSize = deserialize($this->size);
				
				if (!is_array($imgSize))
					$imgSize = array(0, 0);
					
				if ($objEvents->source == 'external')
				{
					$href = $objEvents->url;
				}
				else
				{
					$objPage = $this->Database->prepare("SELECT id,alias FROM tl_page WHERE id=?")->limit(1)->execute(($objEvents->source == 'internal' ? $objEvents->jumpTo : $objCalendars->jumpTo));
					$href = $this->generateFrontendUrl($objPage->fetchAssoc(), ((strlen($objEvents->alias) && !$GLOBALS['TL_CONFIG']['disableAlias']) ? '/events/'.$objEvents->alias : '&events='.$objEvents->id));
				}
				
				$intOffset = timezone_offset_get(timezone_open($GLOBALS['TL_CONFIG']['timeZone']), (new DateTime('now', timezone_open('GMT'))));
				$strOffset = ($intOffset < 0 ? '-' : '+') . str_pad((intval($intOffset)/60/60), 2, '0', STR_PAD_LEFT) . ':00';

				$strEvent = sprintf('
	{
	    title: "%s",
	    durationEvent: %s,
	    start: "%s"%s%s%s%s%s%s
	}',
					str_replace(array('"', "\n", "\r"), array('\"', ' ', ' '), $objEvents->title),
					(strlen($objEvents->endDate) ? 'true' : 'false'),
					($objEvents->addTime ? (date('Y-m-d', $objEvents->startDate) . 'T' . date('H:i:s', $objEvents->startTime) . $strOffset) : (date('Y-m-d', $objEvents->startDate) . 'T' . date('H:i:s', $objEvents->startDate) . $strOffset)),
					((!strlen($objEvents->endDate) && $objEvents->addTime) ? (",\n".'    end: "' . date('Y-m-d', $objEvents->startDate) . 'T' . date('H:i:s', $objEvents->endTime) . $strOffset . '"') : ''),
					((strlen($objEvents->endDate)) ? ",\n".'    end: "' . date('Y-m-d', $objEvents->endDate) . 'T' . ($objEvents->addTime ? date('H:i:s', $objEvents->endTime) : date('H:i:s', $objEvents->endDate)) . $strOffset . '"' : ''),
					($this->Timeline->nolink ? '' : ",\n".'    link: "'.$href.'"'),
					(strlen($objEvents->teaser) ? ",\n".'    caption: "'.str_replace(array('"', "\n", "\r"), array('\"', ' ', ' '), strip_tags($objEvents->teaser)).'"' : ''),
					(strlen($objEvents->details) ? ",\n".'    description: "'.str_replace(array('"', "\n", "\r"), array('\"', ' ', ' '), $objEvents->details).'"' : ''),
					(strlen($objEvents->addImage) ? ",\n".'    image: "'.$this->getImage($objEvents->singleSRC, $imgSize[0], $imgSize[1]).'"' : '')
				);

				$arrEvents[] = $strEvent;
			}
		}
		
		return $arrEvents;
	}
	
	
	/**
	 * return JSON events from RSS/Atom feed
	 */
	private function parseFeed()
	{
		$this->import('FeedParser', 'Feed');
		
		try
		{
			$this->Feed->parse($this->Timeline->url);
		}
		catch (Exception $e)
		{
			$this->log('Unable to parse feed "'.$this->Timeline->url.'". Error: '.$e->getMessage(), 'ModuleSimileTimeline parseFeed()', TL_ERROR);
			return array();
		}
		
		$arrEvents = array();
		$arrItems = $this->Feed->getItems();
		
		foreach( $arrItems as $arrEvent )
		{
			$strEvent = sprintf('
{
    title: "%s",
    start: "%s",
    description: "%s",
    link: "%s"
}',
				str_replace(array('"', "\n", "\r"), array('\"', ' ', ' '), $arrEvent['TITLE']),
				date('c', $arrEvent['PUBDATE']),
				str_replace(array('"', "\n", "\r"), array('\"', ' ', ' '), $arrEvent['DESCRIPTION']),
				$arrEvent['LINK']
			);

			$arrEvents[] = $strEvent;
		}
		
		return $arrEvents;
	}
	
	
	/**
	 * Return JSON for theme
	 */
	private function parseTheme($intId)
	{
		// Default theme
		if ($intId == 0)
			return '';
			
		$objTheme = $this->Database->prepare("SELECT * FROM tl_timeline_theme WHERE id=?")->limit(1)->execute($intId);
		
		if (!$objTheme->numRows)
			return '';
			
		// The default theme is defined in 
        // http://simile-widgets.googlecode.com/svn/timeline/tags/latest/src/webapp/api/scripts/themes.js
		$strTheme = "var theme".$intId." = Timeline.ClassicTheme.create();";
		
		// Apply settings which must be there (select boxes)
		$strTheme .= "\ntheme".$intId.'.firstDayOfWeek = '.$objTheme->firstDayOfWeek.';';
		$strTheme .= "\ntheme".$intId.'.mouseWheel = "'.$objTheme->mouseWheel.'";';
		$strTheme .= "\ntheme".$intId.'.ether.interval.line.show = "'.($objTheme->ether_interval_line_show ? true : false).'";';
		$strTheme .= "\ntheme".$intId.'.event.instant.showLineForNoText = "'.($objTheme->event_instant_showLineForNoText ? true : false).'";';
		
		// Apply simple theme settings if set
		if (strlen($objTheme->ether_highlightColor))			$strTheme .= "\ntheme".$intId.'.ether.highlightColor = "#'.$objTheme->ether_highlightColor.'";';
		if (strlen($objTheme->ether_highlightOpacity))			$strTheme .= "\ntheme".$intId.'.ether.highlightOpacity = '.$objTheme->ether_highlightOpacity.';';
		if (strlen($objTheme->ether_interval_line_color))		$strTheme .= "\ntheme".$intId.'.ether.interval.line.color = "#'.$objTheme->ether_interval_line_color.'";';
		if (strlen($objTheme->ether_interval_line_opacity))		$strTheme .= "\ntheme".$intId.'.ether.interval.line.opacity = '.$objTheme->ether_interval_line_opacity.';';
		if (strlen($objTheme->ether_interval_weekend_color))	$strTheme .= "\ntheme".$intId.'.ether.interval.weekend.color = "#'.$objTheme->ether_interval_weekend_color.'";';
		if (strlen($objTheme->ether_interval_weekend_opacity))	$strTheme .= "\ntheme".$intId.'.ether.interval.weekend.opacity = '.$objTheme->ether_interval_weekend_opacity.';';
		if (strlen($objTheme->ether_interval_marker_hAlign))	$strTheme .= "\ntheme".$intId.'.ether.interval.marker.hAlign = "'.$objTheme->ether_interval_marker_hAlign.'"';
		if (strlen($objTheme->ether_interval_marker_vAlign))	$strTheme .= "\ntheme".$intId.'.ether.interval.marker.vAlign = "'.$objTheme->ether_interval_marker_vAlign.'"';
		if (strlen($objTheme->event_track_offset))				$strTheme .= "\ntheme".$intId.'.event.track.offset = '.$objTheme->event_track_offset.';';
		if (strlen($objTheme->event_track_height))				$strTheme .= "\ntheme".$intId.'.event.track.height = '.$objTheme->event_track_height.';';
		if (strlen($objTheme->event_track_gap))					$strTheme .= "\ntheme".$intId.'.event.track.gap = '.$objTheme->event_track_gap.';';
		if (strlen($objTheme->event_instant_lineColor))			$strTheme .= "\ntheme".$intId.'.event.instant.lineColor = "#'.$objTheme->event_instant_lineColor.'";';
		if (strlen($objTheme->event_instant_impreciseColor))	$strTheme .= "\ntheme".$intId.'.event.instant.impreciseColor = "#'.$objTheme->event_instant_impreciseColor.'";';
		if (strlen($objTheme->event_instant_impreciseOpacity))	$strTheme .= "\ntheme".$intId.'.event.instant.impreciseOpacity = '.$objTheme->event_instant_impreciseOpacity.';';
		if (strlen($objTheme->event_duration_color))			$strTheme .= "\ntheme".$intId.'.event.duration.color = "#'.$objTheme->event_duration_color.'"';
		if (strlen($objTheme->event_duration_opacity))			$strTheme .= "\ntheme".$intId.'.event.duration.opacity = '.$objTheme->event_duration_opacity.';';
		if (strlen($objTheme->event_duration_impreciseColor))	$strTheme .= "\ntheme".$intId.'.event.duration.impreciseColor = "#'.$objTheme->event_duration_impreciseColor.'";';
		if (strlen($objTheme->event_duration_impreciseOpacity))	$strTheme .= "\ntheme".$intId.'.event.duration.impreciseOpacity = '.$objTheme->event_duration_impreciseOpacity.';';
		if (strlen($objTheme->event_label_insideColor))			$strTheme .= "\ntheme".$intId.'.event.label.insideColor = "#'.$objTheme->event_label_insideColor.'";';
		if (strlen($objTheme->event_label_outsideColor))		$strTheme .= "\ntheme".$intId.'.event.label.outsideColor = "#'.$objTheme->event_label_outsideColor.'";';
		if (strlen($objTheme->event_label_width))				$strTheme .= "\ntheme".$intId.'.event.label.width = '.$objTheme->event_label_width.';';
		
		// Apply ether background colors
		if (strlen($objTheme->ether_backgroundColors))
		{
			$arrColors = deserialize($objTheme->ether_backgroundColors, true);
			
			if (count($arrColors) == 4)
			{
				$strTheme .= "\ntheme".$intId.'.ether.backgroundColors = ["#'.implode('","#', $arrColors).'"];';
			}
		}
		
		// Apply event highlight colors
		if (strlen($objTheme->event_highlightColors))
		{
			$arrColors = deserialize($objTheme->event_highlightColors, true);
			
			if (count($arrColors) == 4)
			{
				$strTheme .= "\ntheme".$intId.'.event.highlightColors = ["#'.implode('","#', $arrColors).'"];';
			}
		}
		
		// Apply bubble size
		if (strlen($objTheme->event_bubble_size))
		{
			$arrSize = deserialize($objTheme->event_bubble_size, true);
			
			if (count($arrSize) == 2)
			{
				$strTheme .= "\ntheme".$intId.'.event.bubble.width = '.$arrSize[0].';';
				$strTheme .= "\ntheme".$intId.'.event.bubble.height = '.$arrSize[1].';';
			}
		}
        
        return $strTheme;
	}

}