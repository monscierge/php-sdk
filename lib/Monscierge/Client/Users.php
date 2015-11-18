<?php namespace Monscierge\Client;

trait Users
{
	/**
	 * Get a single user.
	 *
	 * @param int $user_id The ID of the user.
	 *
	 * @return array
	 */
	public function user($user_id = null)
	{
		if (!empty($user_id)) {
			return $this->get('Users/'.$user_id);
		}
		else {
			return $this->get('Users/Me');
		}
	}

	/**
	 * Get list of applications for a user.
	 *
	 * @param int $user_id The ID of the user.
	 *
	 * @return array
	 */
	public function userApplications($user_id = null)
	{
		if (!empty($user_id)) {
			return $this->get('Users/Me/'.$user_id);
		}
		else {
			return $this->get('Users/Me/Applications');
		}
	}
}
