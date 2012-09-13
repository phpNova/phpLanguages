<?php

/**
 * Satellite class for language translations.
 */

require_once( "config_languages.class.php" );

class Languages extends Config_Languages
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load_aliases();
	}
	
	/* Load the configuration file.  --Kris */
	private function load_aliases()
	{
		$this->aliases = parse_ini_file( $this->paths["language"]["path"] );
	}
	
	/* Alias of translate().  --Kris */
	public function t( $alias )
	{
		return $this->translate( $alias );
	}
	
	/* Translate an alias into its corresponding string for the given language.  --Kris */
	public function translate( $alias )
	{
		return ( isset( $this->aliases[$alias] ) ? $this->aliases[$alias] : "(ERROR : Undefined alias '$alias'!)" );
	}
}
