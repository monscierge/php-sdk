<?php namespace Monscierge;

class Client
{
	# Core traits
	use Auth;
	use Config;
	use Request;

	# Client traits
	use Client\Applications;
	use Client\ApplicationPlatforms;
	use Client\ApplicationTokens;
	use Client\ApplicationWebhooks;
	use Client\Brands;
	use Client\Images;
	use Client\Places;
	use Client\PlaceEvents;
	use Client\PlaceMaps;
	use Client\PlaceMenus;
	use Client\PlaceMessages;
	use Client\PlacePostcards;
	use Client\PlaceRecommendations;
	use Client\PlaceRequests;
	use Client\Requests;
	use Client\Users;
	use Client\UserRequests;

	/**
	 * The request client used to make API calls.
	 * 
	 * @var GuzzleHttp\Client
	 */
	protected $request;
	
	/**
	 * The url to the API endpoint.
	 * 
	 * @var string
	 */
	protected $api_url = 'https://api.monscierge.com';

	/**
	 * The version of the API to consume.
	 * 
	 * @var string
	 */
	protected $api_version = 'v1';

	/**
	 * The url to the authorization endpoint.
	 * 
	 * @var string
	 */
	protected $authorize_url = 'https://content.monscierge.com/auth/oauth';
	
	/**
	 * The client ID used for authentication.
	 * 
	 * @var string
	 */
	protected $client_id;

	/**
	 * The client secret used for authentication.
	 * 
	 * @var string
	 */
	protected $client_secret;

	/**
	 * The access token used for authentication.
	 * 
	 * @var string
	 */
	protected $access_token;

	/**
	 * The language content should be returned as.
	 * 
	 * @var string
	 */
	protected $language = 'en-US';

	/**
	 * The user agent header included in requests.
	 * 
	 * @var string
	 */
	protected $user_agent = 'Monscierge PHP SDK';

	/**
	 * Whether or not to use the production environment.
	 * 
	 * @var bool
	 */
	protected $production = true;

	/**
	 * Class constructor.
	 * 
	 * @param string $client_id     The client ID for an application.
	 * @param string $client_secret The client secret for an application.
	 * @param array  $config        List of config options to use.
	 */
	public function __construct($client_id, $client_secret, array $config = [])
	{
		$config = array_merge([
			'client_id'     => $client_id,
			'client_secret' => $client_secret,
		], $config);

		$this->setConfig($config);

		$this->request = new \GuzzleHttp\Client();
	}

	/**
	 * Get the access token for authentication.
	 * 
	 * @return string
	 */
	public function accessToken()
	{
		return $this->config('access_token');
	}

	/**
	 * Set the access token to be used for authentication.
	 * 
	 * @param string $access_token The access token that came from an OAuth token.
	 * 
	 * @return void
	 */
	public function setAccessToken($access_token)
	{
		$this->setConfig('access_token', $access_token);
	}

	/**
	 * Set the language content should be returned as.
	 * 
	 * @param string $language The language content should be returned as.
	 * 
	 * @return void
	 */
	public function setLanguage($language)
	{
		$this->setConfig('language', $language);
	}

	/**
	 * Set the user agent header included in requests.
	 * 
	 * @param string $user_agent The user agent header included in requests.
	 * 
	 * @return void
	 */
	public function setUserAgent($user_agent)
	{
		$this->setConfig('user_agent', $user_agent);
	}
}
