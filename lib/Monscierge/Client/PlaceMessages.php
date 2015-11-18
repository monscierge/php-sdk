<?php namespace Monscierge\Client;

trait PlaceMessages
{
	/**
	 * Get list of messages.
	 *
	 * @param int $place_id The ID of the place.
	 *
	 * @return array
	 */
	public function placeMessages($place_id)
	{
		return $this->get('Places/'.$place_id.'/Messages');
	}

	/**
	 * Get a single message.
	 *
	 * @param int $place_id   The ID of the place.
	 * @param int $message_id The ID of the message.
	 *
	 * @return array
	 */
	public function placeMessage($place_id, $message_id)
	{
		return $this->get('Places/'.$place_id.'/Messages/'.$message_id);
	}
}
