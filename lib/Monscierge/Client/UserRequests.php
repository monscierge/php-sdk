<?php namespace Monscierge\Client;

trait UserRequests
{
	/**
	 * Get list of requests for user.
	 *
	 * @param int  $user_id           The optional user ID to use.
	 * @param int  $request_action_id Request action ID to use for cursor paging.
	 * @param bool $archived          Whether or not to include archived requests.
	 * @param bool $staff             Whether or not to include staff requests.
	 *
	 * @return array
	 */
	public function userRequests($user_id = null, $request_action_id = 0, $archived = false, $staff = true)
	{
		$params = [
			'lastKnownRequestActionId' => $request_action_id,
			'archived'                 => $archived ? 'true' : 'false',
			'staff'                    => $staff ? 'true' : 'false',
		];
		
		$url = 'Users/';
		
		if (!empty($user_id)) {
			$url .= $user_id;
		}
		else {
			$url .= 'Me';
		}

		return $this->get($url.'/Requests', ['query' => $params]);
	}

	/**
	 * Get a single request for user.
	 *
	 * @param int  $user_id    The optional user ID to use.
	 * @param int  $request_id The ID of the request.
	 * @param bool $staff      Whether or not to include staff requests.
	 *
	 * @return array
	 */
	public function userRequest($user_id = null, $request_id, $staff = true)
	{
		$params = [
			'staff' => $staff ? 'true' : 'false',
		];
		
		$url = 'Users/';
		
		if (!empty($user_id)) {
			$url .= $user_id;
		}
		else {
			$url .= 'Me';
		}

		return $this->get($url.'/Requests/'.$request_id, ['query' => $params]);
	}

	/**
	 * Get list of request actions for user.
	 *
	 * @param int  $user_id           The optional user ID to use.
	 * @param int  $request_id        The ID of the request.
	 * @param int  $request_action_id Request action ID to use for cursor paging.
	 * @param bool $staff             Whether or not to include staff requests.
	 *
	 * @return array
	 */
	public function userRequestActions($user_id = null, $request_id, $request_action_id = 0, $staff = true)
	{
		$params = [
			'lastKnownRequestActionId' => $request_action_id,
			'staff'                    => $staff ? 'true' : 'false',
		];
		
		$url = 'Users/';
		
		if (!empty($user_id)) {
			$url .= $user_id;
		}
		else {
			$url .= 'Me';
		}

		return $this->get($url.'/Requests/'.$request_id.'/actions', ['query' => $params]);
	}
}
