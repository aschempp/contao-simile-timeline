
<div class="<?php echo $this->class; ?> block"<?php echo $this->cssID; ?><?php if ($this->style): ?> style="<?php echo $this->style; ?>"<?php endif; ?>>
<?php if ($this->headline): ?>

<<?php echo $this->hl; ?>><?php echo $this->headline; ?></<?php echo $this->hl; ?>>
<?php endif; ?>

<div id="<?php echo $this->strId; ?>" style="height: <?php echo $this->height; ?>;<?php if (strlen($this->border)): ?> border: <?php echo $this->border; endif; ?>"></div>
<noscript>
<?php echo $this->fallback; ?>
</noscript>

</div>

<script type="text/javascript">
	var tl<?php echo $this->intId; ?>;
	var resizeTimer<?php echo $this->intId; ?> = null;
	
	window.addEvent('domready', function()
	{
		var eventSource = new Timeline.DefaultEventSource();
		
<?php echo $this->themes; ?>
		
		
		var bandInfos = [<?php echo $this->bands; ?>];
<?php echo $this->bandSettings; ?>
		
		
		tl<?php echo $this->intId; ?> = Timeline.create(document.getElementById("<?php echo $this->strId; ?>"), bandInfos<?php echo (strlen($this->orientation) ? ', "'.$this->orientation.'"' : ''); ?>);
        eventSource.loadJSON({<?php if(strlen($this->wiki)): ?>
		  'wiki-url':"<?php echo $this->wikiurl; ?>",<?php if(strlen($this->wikisection)): ?>
		  'wiki-section':"<?php echo $this->wikisection; ?>",<?php endif; endif; ?>
		  'dateTimeFormat': 'iso8601',
		  'events': [<?php echo $this->events; ?>]
		}, '');
	});
	
	window.addEvent('resize',function(e)
	{
		if (resizeTimer<?php echo $this->intId; ?> == null)
		{
			resizeTimer<?php echo $this->intId; ?> = window.setTimeout(function()
			{
				resizeTimer<?php echo $this->intId; ?> = null;
				tl<?php echo $this->intId; ?>.layout();
			}, 500);
		}
	});

</script>