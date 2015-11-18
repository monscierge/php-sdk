<?php namespace Monscierge;

trait Request
{
	/**
	 * Send a GET request to the API.
	 * 
	 * @param string $uri     The URI to send the request.
	 * @param array  $options The options for the request.
	 * 
	 * @return array
	 */
	public function get($uri, array $options = [])
	{
		return $this->request($uri, 'get', $options);
	}

	/**
	 * Send a POST request to the API.
	 * 
	 * @param string $uri     The URI to send the request.
	 * @param array  $options The options for the request.
	 * 
	 * @return array
	 */
	public function post($uri, array $options = [])
	{
		return $this->request($uri, 'post', $options);
	}

	/**
	 * Send a PUT request to the API.
	 * 
	 * @param string $uri     The URI to send the request.
	 * @param array  $options The options for the request.
	 * 
	 * @return array
	 */
	public function put($uri, array $options = [])
	{
		return $this->request($uri, 'put', $options);
	}

	/**
	 * Send a PATCH request to the API.
	 * 
	 * @param string $uri     The URI to send the request.
	 * @param array  $options The options for the request.
	 * 
	 * @return array
	 */
	public function patch($uri, array $options = [])
	{
		return $this->request($uri, 'patch', $options);
	}

	/**
	 * Send a DELETE request to the API.
	 * 
	 * @param string $uri     The URI to send the request.
	 * @param array  $options The options for the request.
	 * 
	 * @return array
	 */
	public function delete($uri, array $options = [])
	{
		return $this->request($uri, 'delete', $options);
	}

	/**
	 * Send a HEAD request to the API.
	 * 
	 * @param string $uri     The URI to send the request.
	 * @param array  $options The options for the request.
	 * 
	 * @return array
	 */
	public function head($uri, array $options = [])
	{
		return $this->request($uri, 'head', $options);
	}

	/**
	 * Send a OPTIONS request to the API.
	 * 
	 * @param string $uri     The URI to send the request.
	 * @param array  $options The options for the request.
	 * 
	 * @return array
	 */
	public function options($uri, array $options = [])
	{
		return $this->request($uri, 'options', $options);
	}

	/**
	 * Send a request to the API.
	 * 
	 * @param string $uri     The URI to send the request.
	 * @param string $method  The method of the request.
	 * @param array  $options The options for the request.
	 * 
	 * @return array
	 */
	public function request($uri, $method, array $options = [])
	{
		$url = $this->config('api_url').'/'.$this->config('api_version').'/'.$uri;
		$access_token = $this->config('access_token');

		if (!empty($access_token)) {
			$options['headers'] = array_merge([
				'Authorization' => 'Bearer '.$access_token,
			], isset($options['headers']) ? $options['headers'] : []);
		}

		$options['query'] = array_merge([
			'production' => $this->config('production') ? 'true' : 'false',
			'culture'    => $this->config('language'),
		], isset($options['query']) ? $options['query'] : []);
		
		return $this->sendRequest($url, $method, $options);
	}

	/**
	 * Send a request.
	 * 
	 * @param string $url     The URL to send the request.
	 * @param string $method  The method of the request.
	 * @param array  $options The options for the request.
	 * 
	 * @return array
	 */
	protected function sendRequest($url, $method, array $options = [])
	{
		$options['verify'] = false;

		$options['headers'] = array_merge([
			'Accept'     => 'application/json',
			'User-Agent' => $this->config('user_agent'),
		], isset($options['headers']) ? $options['headers'] : []);

		$response = $this->request->request(strtoupper($method), $url, $options);

		return json_decode($response->getBody(), true);
	}
}