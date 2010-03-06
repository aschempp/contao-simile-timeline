-- **********************************************************
-- *                                                        *
-- * IMPORTANT NOTE                                         *
-- *                                                        *
-- * Do not import this file manually but use the TYPOlight *
-- * install tool to create and maintain database tables!   *
-- *                                                        *
-- **********************************************************

-- 
-- Table `tl_timeline`
-- 

CREATE TABLE `tl_timeline` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `tstamp` int(10) unsigned NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `source` varchar(64) NOT NULL default '',
  `calendars` blob NULL,
  `url` varchar(255) NOT NULL default '',
  `orientation` varchar(10) NOT NULL default '',
  `height` varchar(255) NOT NULL default '',
  `border` varchar(255) NOT NULL default '',
  `nolink` char(1) NOT NULL default '',
  `wiki` char(1) NOT NULL default '',
  `wikiurl` varchar(255) NOT NULL default '',
  `wikisection` varchar(255) NOT NULL default '',  
  `fallback` text NULL,
  PRIMARY KEY  (`id`),
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

-- 
-- Table `tl_timeline_event`
-- 

CREATE TABLE `tl_timeline_event` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `pid` int(10) unsigned NOT NULL default '0',
  `tstamp` int(10) unsigned NOT NULL default '0',
  `title` varchar(255) NOT NULL default '',
  `start` varchar(26) NOT NULL default '',
  `latestStart` varchar(26) NOT NULL default '',
  `end` varchar(26) NOT NULL default '',
  `earliestEnd` varchar(26) NOT NULL default '',
  `durationEvent` char(1) NOT NULL default '',
  `icon` varchar(255) NOT NULL default '',
  `image` varchar(255) NOT NULL default '',
  `link` varchar(255) NOT NULL default '',
  `color` varchar(6) NOT NULL default '',
  `textColor` varchar(6) NOT NULL default '',
  `tapeImage` varchar(255) NOT NULL default '',
  `tapeRepeat` char(8) NOT NULL default '',
  `caption` varchar(255) NOT NULL default '',
  `cssClass` varchar(64) NOT NULL default '',
  `description` text NULL,
  `published` char(1) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `pid` (`pid`),
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

-- 
-- Table `tl_timeline_band`
-- 

CREATE TABLE `tl_timeline_band` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `pid` int(10) unsigned NOT NULL default '0',
  `sorting` int(10) unsigned NOT NULL default '0',
  `tstamp` int(10) unsigned NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `theme` int(10) unsigned NOT NULL default '0',  
  `width` varchar(255) NOT NULL default '',
  `intervalUnit` varchar(255) NOT NULL default '',
  `intervalPixels` varchar(255) NOT NULL default '',
  `syncWith` int(10) unsigned NOT NULL default '0',  
  `highlight` char(1) NOT NULL default '',
  `overview` char(1) NOT NULL default '',
  `date` varchar(26) NOT NULL default '',
  `timeZone` varchar(3) NOT NULL default '',
  `showEventText` char(1) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `pid` (`pid`),
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

-- 
-- Table `tl_timeline_theme`
-- 

CREATE TABLE `tl_timeline_theme` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `tstamp` int(10) unsigned NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `firstDayOfWeek` int(1) unsigned NOT NULL default '0',
  `ether_backgroundColors` blob NULL,
  `ether_highlightColor` varchar(6) NOT NULL default '',
  `ether_highlightOpacity` varchar(3) NOT NULL default '',
  `ether_interval_line_show` char(1) NOT NULL default '',
  `ether_interval_line_color` varchar(6) NOT NULL default '',
  `ether_interval_line_opacity` varchar(3) NOT NULL default '',
  `ether_interval_weekend_color` varchar(6) NOT NULL default '',
  `ether_interval_weekend_opacity` varchar(3) NOT NULL default '',
  `ether_interval_marker_hAlign` varchar(10) NOT NULL default '',
  `ether_interval_marker_vAlign` varchar(10) NOT NULL default '',
  `event_track_offset` varchar(6) NOT NULL default '',
  `event_track_height` varchar(6) NOT NULL default '',
  `event_track_gap` varchar(6) NOT NULL default '',
  `event_instant_lineColor` varchar(6) NOT NULL default '',
  `event_instant_impreciseColor` varchar(6) NOT NULL default '',
  `event_instant_impreciseOpacity` varchar(3) NOT NULL default '',
  `event_instant_showLineForNoText` char(1) NOT NULL default '',
  `event_duration_color` varchar(6) NOT NULL default '',
  `event_duration_opacity` varchar(3) NOT NULL default '',
  `event_duration_impreciseColor` varchar(6) NOT NULL default '',
  `event_duration_impreciseOpacity` varchar(3) NOT NULL default '',
  `event_label_insideColor` varchar(6) NOT NULL default '',
  `event_label_outsideColor` varchar(6) NOT NULL default '',
  `event_label_width` varchar(6) NOT NULL default '',
  `event_highlightColors` blob NULL,
  `event_bubble_size` blob NULL,
  `mouseWheel` varchar(7) NOT NULL default '',
  PRIMARY KEY  (`id`),
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

-- 
-- Table `tl_module`
-- 

CREATE TABLE `tl_module` (
  `timeline` int(10) unsigned NOT NULL default '0',
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
