<?php namespace Monscierge\Client;

trait PlaceMaps
{
	/**
	 * Get list of maps.
	 *
	 * @param int $place_id The ID of the place.
	 *
	 * @return array
	 */
	public function placeMaps($place_id)
	{
		return $this->get('Places/'.$place_id.'/Maps');
	}

	/**
	 * Get a single map.
	 *
	 * @param int $place_id The ID of the place.
	 * @param int $map_id   The ID of the map.
	 *
	 * @return array
	 */
	public function placeMap($place_id, $map_id)
	{
		return $this->get('Places/'.$place_id.'/Maps/'.$map_id);
	}
}
