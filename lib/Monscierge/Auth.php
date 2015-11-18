<?php namespace Monscierge;

trait Auth
{
	/**
	 * Get authorization URL to redirect users to login.
	 *
	 * The redirect URI must be registered to application in the
	 * Monscierge developer portal and SSL encrypted over HTTPS.
	 *
	 * @param $redirect_uri  The location the user should be redirected back to.
	 * @param $response_type The type of response token to return.
	 * @param $scope         The permission scope being requested.
	 *
	 * @return string
	 */
	public function authorizeUrl($redirect_uri, $response_type = 'code', $scope = null)
	{
		$params = [
			'client_id'     => $this->config('client_id'),
			'redirect_uri'  => $redirect_uri,
			'response_type' => $response_type,
		];

		if (!empty($scope)) {
			$params['scope'] = $scope;
		}

		$url = $this->config('authorize_url').'/authorize?';
		$url .= http_build_query($params);

		return $url;
	}

	/**
	 * Exchange basic credentials for an OAuth token.
	 *
	 * @param $username The username of the user to login.
	 * @param $password The password of the user to login.
	 * @param $scope    The permission scope being requested.
	 *
	 * @return array
	 */
	public function basicCredentialsExchange($username, $password, $scope = null)
	{
		$params = [
			'grant_type'    => 'password',
			'client_id'     => $this->config('client_id'),
			'client_secret' => $this->config('client_secret'),
			'username'      => $username,
			'password'      => $password,
		];

		if (!empty($scope)) {
			$params['scope'] = $scope;
		}

		return $this->authRequest('Token', 'post', ['form_params' => $params]);
	}

	/**
	 * Exchange client credentials for an OAuth token.
	 *
	 * @return array
	 */
	public function clientCredentialsExchange()
	{
		$params = [
			'grant_type'    => 'client_credentials',
			'client_id'     => $this->config('client_id'),
			'client_secret' => $this->config('client_secret'),
		];

		return $this->authRequest('Token', 'post', ['form_params' => $params]);
	}

	/**
	 * Exchange an authorization code for an OAuth token.
	 *
	 * The redirect URI must be registered to application in the
	 * Monscierge developer portal and SSL encrypted over HTTPS.
	 *
	 * @param $code         The code included with the authorization redirect.
	 * @param $redirect_uri The location the user was redirected back to.
	 *
	 * @return array
	 */
	public function authCodeExchange($code, $redirect_uri)
	{
		$params = [
			'grant_type'    => 'authorization_code',
			'client_id'     => $this->config('client_id'),
			'client_secret' => $this->config('client_secret'),
			'code'          => $code,
			'redirect_uri'  => $redirect_uri,
		];

		return $this->authRequest('Token', 'post', ['form_params' => $params]);
	}

	/**
	 * Exchange refresh token for an OAuth token.
	 *
	 * @param $refresh_token The refresh token from an OAuth token.
	 *
	 * @return array
	 */
	public function refreshTokenExchange($refresh_token)
	{
		$params = [
			'grant_type'    => 'refresh_token',
			'client_id'     => $this->config('client_id'),
			'client_secret' => $this->config('client_secret'),
			'refresh_token' => $refresh_token,
		];

		return $this->authRequest('Token', 'post', ['form_params' => $params]);
	}

	/**
	 * Send a request to the authorization url.
	 * 
	 * @param string $uri     The URI to send the request.
	 * @param string $method  The method of the request.
	 * @param array  $options The options for the request.
	 * 
	 * @return array
	 */
	protected function authRequest($uri, $method, array $options = [])
	{
		$url = $this->config('authorize_url').'/'.$uri;
		
		return $this->sendRequest($url, $method, $options);
	}
}
