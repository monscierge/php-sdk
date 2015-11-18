<?php namespace Monscierge\Client;

trait ApplicationTokens
{
	/**
	 * Get list of tokens.
	 *
	 * @param int $application_id The ID of the application.
	 *
	 * @return array
	 */
	public function applicationTokens($application_id)
	{
		return $this->get('Applications/'.$application_id.'/tokens');
	}

	/**
	 * Get a single token.
	 *
	 * @param int $application_id The ID of the application.
	 * @param int $token_id       The ID of the token.
	 *
	 * @return array
	 */
	public function applicationToken($application_id, $token_id)
	{
		return $this->get('Applications/'.$application_id.'/tokens/'.$token_id);
	}

	/**
	 * Create a token.
	 * 
	 * @param int    $application_id The ID of the application.
	 * @param string $token          The value for the token.
	 * 
	 * @return int The new token ID created.
	 */
	public function createApplicationToken($application_id, $token)
	{
		$token = [
			'token' => $token,
		];

		return $this->put('Applications/'.$application_id.'/tokens', ['json' => $token]);
	}

	/**
	 * Update a token.
	 * 
	 * @param int    $application_id The ID of the application.
	 * @param int    $token_id       The ID of the token.
	 * @param string $token          The value for the token.
	 * 
	 * @return bool
	 */
	public function updateApplicationToken($application_id, $token_id, $token)
	{
		$token = [
			'id'    => $token_id,
			'token' => $token,
		];

		return $this->put('Applications/'.$application_id.'/tokens', ['json' => $token]);
	}

	/**
	 * Delete a token.
	 *
	 * @param int $application_id The ID of the application.
	 * @param int $token_id       The ID of the token.
	 *
	 * @return bool
	 */
	public function deleteApplicationToken($application_id, $token_id)
	{
		return $this->delete('Applications/'.$application_id.'/tokens/'.$token_id);
	}
}
