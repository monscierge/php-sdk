<?php namespace Monscierge\Client;

trait PlacePostcards
{
	/**
	 * Get list of postcards.
	 *
	 * @param int $place_id The ID of the place.
	 *
	 * @return array
	 */
	public function placePostcards($place_id)
	{
		return $this->get('Places/'.$place_id.'/Postcards');
	}

	/**
	 * Get a single postcard.
	 *
	 * @param int $place_id    The ID of the place.
	 * @param int $postcard_id The ID of the postcard.
	 *
	 * @return array
	 */
	public function placePostcard($place_id, $postcard_id)
	{
		return $this->get('Places/'.$place_id.'/Postcards/'.$postcard_id);
	}
}
