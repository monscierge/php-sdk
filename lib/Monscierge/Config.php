<?php namespace Monscierge;

trait Config
{
	/**
	 * Get a config option.
	 * 
	 * @param string $name    The name of the config option.
	 * @param mixed  $default The default value if the config is not set.
	 * 
	 * @return mixed
	 */
	public function config($name, $default = null)
	{
		if (property_exists($this, $name)) {
			return $this->$name;
		}
		
		return $default;
	}
	
	/**
	 * Set a config option.
	 * 
	 * @param string|array $name  The name of the config option.
	 * @param mixed        $value The value to set the config to.
	 *
	 * @return void
	 */
	public function setConfig($name, $value = null)
	{
		if (is_array($name)) {
			foreach ($name as $key => $value) {
				$this->setConfig($key, $value);
			}
		}
		else {
			if (property_exists($this, $name)) {
				$this->$name = $value;
			}
		}
	}
}