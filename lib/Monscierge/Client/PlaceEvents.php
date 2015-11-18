<?php namespace Monscierge\Client;

trait PlaceEvents
{
	/**
	 * Get list of events.
	 *
	 * @param int $place_id The ID of the place.
	 *
	 * @return array
	 */
	public function placeEvents($place_id)
	{
		return $this->get('Places/'.$place_id.'/Events');
	}

	/**
	 * Get a single event.
	 *
	 * @param int $place_id The ID of the place.
	 * @param int $event_id The ID of the event.
	 *
	 * @return array
	 */
	public function placeEvent($place_id, $event_id)
	{
		return $this->get('Places/'.$place_id.'/Events/'.$event_id);
	}
}
