<?php namespace Monscierge\Client;

trait PlaceMenus
{
	/**
	 * Get list of menus.
	 *
	 * @param int $place_id The ID of the place.
	 *
	 * @return array
	 */
	public function placeMenus($place_id)
	{
		return $this->get('Places/'.$place_id.'/Menus');
	}

	/**
	 * Get a single menu.
	 *
	 * @param int $place_id The ID of the place.
	 * @param int $menu_id  The ID of the menu.
	 *
	 * @return array
	 */
	public function placeMenu($place_id, $menu_id)
	{
		return $this->get('Places/'.$place_id.'/Menus/'.$menu_id);
	}
}
