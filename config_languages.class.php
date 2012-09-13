<?php

/**
 * Config class for languages.class.php.
 */

require_once( "config.parent.php" );

class Config_Languages extends Config
{
	/* This function contains all the configuration settings that you can change.  --Kris */
	private function config_settings()
	{
		/* The default display language.  Corresponds to INI filename minus the extension ("en" for "en.ini", etc).  --Kris */
		$this->language = "en";
		
		/* The languages subdirectory.  --Kris */
		$this->paths["languages"] = array( "path" => "languages", "perms" => array( "R" ), "type" => "dir", "create" => FALSE );
	}
	
	/*
	 * ----------------------------
	 * DO NOT EDIT BELOW THIS LINE!
	 * ----------------------------
	 */
	public function __construct()
	{
		$this->config_settings();
		$this->setup_ext();
		$this->setup_paths();
		$this->qa();
	}
	
	private function setup_ext()
	{
		$languages = $this->sanitize_path( $this->paths["languages"] );
		
		$this->paths["language"] = array( "path" => $languages["path"] . $this->language . ".ini", 
						"perms" => array( "R" ), 
						"type" => "file", "create" => FALSE );
	}
}
