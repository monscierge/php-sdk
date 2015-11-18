<?php namespace Monscierge\Client;

trait ApplicationPlatforms
{
	/**
	 * Get list of platforms.
	 *
	 * @param int $application_id The ID of the application.
	 *
	 * @return array
	 */
	public function applicationPlatforms($application_id)
	{
		return $this->get('Applications/'.$application_id.'/platforms');
	}

	/**
	 * Get a single platform.
	 *
	 * @param int $application_id The ID of the application.
	 * @param int $platform_id    The ID of the platform.
	 *
	 * @return array
	 */
	public function applicationPlatform($application_id, $platform_id)
	{
		return $this->get('Applications/'.$application_id.'/platforms/'.$platform_id);
	}

	/**
	 * Create a platform.
	 * 
	 * @param int    $application_id       The ID of the application.
	 * @param string $type                 The type of platform, can be
	 *                                     Web, Android, Ios, Native or Other.
	 * @param mixed $redirect_urls         List of redirect URIs to allow
	 *                                     for OAuth authorization flow.
	 * @param mixed $origins               List of origins to allow in CORS headers.
	 * @param string $ios_bundle_ids       The platform's iOS bundle IDs.
	 * @param string $ios_store_ipod_id    The platform's iPod Store ID.
	 * @param string $ios_store_ipad_id    The platform's iPad Store ID.
	 * @param string $android_activity     The platform's Android acivity.
	 * @param string $android_namespace    The platform's Android namespace.
	 * @param string $android_fingerprints The platform's Android fingerprints.
	 * 
	 * @return int
	 */
	public function createApplicationPlatform($application_id, $type, $redirect_urls = null, $origins = null, $ios_bundle_ids = null, $ios_store_ipod_id = null, $ios_store_ipad_id = null, $android_activity = null, $android_namespace = null, $android_fingerprints = null)
	{
		$platform = [
			'type' => $type,
		];

		if (!empty($redirect_urls)) {
			if (is_array($redirect_urls)) {
				$redirect_urls = implode("\n", $redirect_urls);
			}

			$platform['web_redirect_urls'] = $redirect_urls;
		}

		if (!empty($origins)) {
			if (is_array($origins)) {
				$origins = implode("\n", $origins);
			}

			$platform['web_client_origins'] = $origins;
		}

		if (!empty($ios_bundle_ids)) {
			$platform['ios_bundle_ids'] = $ios_bundle_ids;
		}

		if (!empty($ios_store_ipod_id)) {
			$platform['ios_ipod_store_id'] = $ios_store_ipod_id;
		}

		if (!empty($ios_store_ipad_id)) {
			$platform['ios_ipad_store_id'] = $ios_store_ipad_id;
		}

		if (!empty($android_activity)) {
			$platform['android_activity'] = $android_activity;
		}

		if (!empty($android_namespace)) {
			$platform['android_namespace'] = $android_namespace;
		}

		if (!empty($android_fingerprints)) {
			$platform['android_fingerprints'] = $android_fingerprints;
		}

		return $this->put('Applications/'.$application_id.'/platforms', ['json' => $platform]);
	}

	/**
	 * Update a platform.
	 * 
	 * @param int    $application_id       The ID of the application.
	 * @param int    $platform_id          The ID of the platform.
	 * @param string $type                 The type of platform, can be
	 *                                     Web, Android, Ios, Native or Other.
	 * @param mixed $redirect_urls         List of redirect URIs to allow
	 *                                     for OAuth authorization flow.
	 * @param mixed $origins               List of origins to allow in CORS headers.
	 * @param string $ios_bundle_ids       The platform's iOS bundle IDs.
	 * @param string $ios_store_ipod_id    The platform's iPod Store ID.
	 * @param string $ios_store_ipad_id    The platform's iPad Store ID.
	 * @param string $android_activity     The platform's Android acivity.
	 * @param string $android_namespace    The platform's Android namespace.
	 * @param string $android_fingerprints The platform's Android fingerprints.
	 * @param 
	 * 
	 * @return bool
	 */
	public function updateApplicationPlatform($application_id, $platform_id, $type, $redirect_urls = null, $origins = null, $ios_bundle_ids = null, $ios_store_ipod_id = null, $ios_store_ipad_id = null, $android_activity = null, $android_namespace = null, $android_fingerprints = null)
	{
		$platform = [
			'id' => $platform_id,
		];

		if (!empty($type)) {
			$platform['type'] = $type;
		}

		if (!empty($redirect_urls)) {
			if (is_array($redirect_urls)) {
				$redirect_urls = implode("\n", $redirect_urls);
			}

			$platform['web_redirect_urls'] = $redirect_urls;
		}

		if (!empty($origins)) {
			if (is_array($origins)) {
				$origins = implode("\n", $origins);
			}

			$platform['web_client_origins'] = $origins;
		}

		if (!empty($ios_bundle_ids)) {
			$platform['ios_bundle_ids'] = $ios_bundle_ids;
		}

		if (!empty($ios_store_ipod_id)) {
			$platform['ios_ipod_store_id'] = $ios_store_ipod_id;
		}

		if (!empty($ios_store_ipad_id)) {
			$platform['ios_ipad_store_id'] = $ios_store_ipad_id;
		}

		if (!empty($android_activity)) {
			$platform['android_activity'] = $android_activity;
		}

		if (!empty($android_namespace)) {
			$platform['android_namespace'] = $android_namespace;
		}

		if (!empty($android_fingerprints)) {
			$platform['android_fingerprints'] = $android_fingerprints;
		}

		return $this->put('Applications/'.$application_id.'/platforms', ['json' => $platform]);
	}

	/**
	 * Delete a platform.
	 *
	 * @param int $application_id The ID of the application.
	 * @param int $platform_id    The ID of the platform.
	 *
	 * @return bool
	 */
	public function deleteApplicationPlatform($application_id, $platform_id)
	{
		return $this->delete('Applications/'.$application_id.'/platforms/'.$platform_id);
	}
}
