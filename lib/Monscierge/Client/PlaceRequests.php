<?php namespace Monscierge\Client;

trait PlaceRequests
{
	/**
	 * Create a new staff request for a place.
	 *
	 * @param int    $place_id    The ID of the place.
	 * @param int    $template_id The ID of the template.
	 * @param array  $options     List of options to set.
	 * @param string $first_name  The first name of the guest.
	 * @param string $last_name   The last name of the guest.
	 * @param string $message     A message to add to the request.
	 * @param int    $phone       The phone number for the guest.
	 * @param int    $room        The room the guest is staying in.
	 * @param int    $checkout    The date the guest is checking out in milliseconds.
	 * @param int    $eta         Set the ETA the request should be completed in seconds from now.
	 * @param string $sms
	 *
	 * @return int The new request ID created.
	 */
	public function createPlaceStaffRequest($place_id, $template_id, $options = [], $first_name, $last_name, $message = null, $phone = null, $room = null, $checkout = null, $eta = null, $sms = null)
	{
		$params = [
			'templateId' => $template_id,
			'firstName'  => $first_name,
			'lastName'   => $last_name,
		];

		$options = (array) $options;
		
		if (!empty($message)) {
			$params['additionalDesc'] = $message;
		}

		if (!empty($phone)) {
			$params['phone'] = $phone;
		}

		if (!empty($room)) {
			$params['room'] = $room;
		}

		if (!empty($checkout)) {
			$params['checkout'] = $checkout;
		}
		
		if (!empty($eta)) {
			$params['etaSecondsFromNow'] = $eta;
		}
		
		if (!empty($sms)) {
			$params['sms'] = $sms;
		}

		return $this->put('Places/'.$place_id.'/Requests/Staff', [
			'query' => $params,
			'json'  => $options,
		]);
	}

	/**
	 * Get list of request templates.
	 * 
	 * @param int  $place_id The ID of the place.
	 * @param bool $all      Whether or not to include disabled templates.
	 * @param bool $staff    Whether or not to include staff templates.
	 * 
	 * @return array
	 */
	public function placeRequestTemplates($place_id, $all = true, $staff = false)
	{
		$params = [
			'all'   => $all ? 'true' : 'false',
			'staff' => $staff ? 'true' : 'false',
		];

		return $this->get('Places/'.$place_id.'/Requests/Templates', ['query' => $params]);
	}

	/**
	 * Get a single request template.
	 * 
	 * @param int $place_id    The ID of the place.
	 * @param int $template_id The ID of the template.
	 * 
	 * @return array
	 */
	public function placeRequestTemplate($place_id, $template_id)
	{
		return $this->get('Places/'.$place_id.'/Requests/Templates/'.$template_id);
	}

	/**
	 * Get list of request template options.
	 * 
	 * @param int  $place_id    The ID of the place.
	 * @param int  $template_id The ID of the template.
	 * 
	 * @return array
	 */
	public function placeRequestTemplateOptions($place_id, $template_id)
	{
		return $this->get('Places/'.$place_id.'/Requests/Templates/'.$template_id.'/Options');
	}

	/**
	 * Get list of request groups.
	 * 
	 * @param int $place_id The ID of the place.
	 * 
	 * @return array
	 */
	public function placeRequestGroups($place_id)
	{
		return $this->get('Places/'.$place_id.'/Requests/Groups');
	}

	/**
	 * Get a single request group.
	 * 
	 * @param int $place_id The ID of the place.
	 * @param int $group_id The ID of the group.
	 * 
	 * @return array
	 */
	public function placeRequestGroup($place_id, $group_id)
	{
		return $this->get('Places/'.$place_id.'/Requests/Groups/'.$group_id);
	}

	/**
	 * Get list of request categories.
	 * 
	 * @param int $place_id The ID of the place.
	 * 
	 * @return array
	 */
	public function placeRequestCategories($place_id)
	{
		return $this->get('Places/'.$place_id.'/Requests/Categories');
	}

	/**
	 * Get a single request category.
	 * 
	 * @param int $place_id    The ID of the place.
	 * @param int $category_id The ID of the category.
	 * 
	 * @return array
	 */
	public function placeRequestCategory($place_id, $category_id)
	{
		return $this->get('Places/'.$place_id.'/Requests/Categories/'.$category_id);
	}

	/**
	 * Get list of request users.
	 * 
	 * @param int $place_id The ID of the place.
	 * 
	 * @return array
	 */
	public function placeRequestUsers($place_id, $all = false)
	{
		$params = [
			'allAvailable' => $all ? 'true' : 'false',
		];

		return $this->get('Places/'.$place_id.'/Requests/Users', ['query' => $params]);
	}
}
