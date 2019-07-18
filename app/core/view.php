<?php

class View
{
		
	function generate($content_view, $template_view, $data = null)
	{				
		include_once VIEWS_DIRECTORY.$template_view;
	}
}

