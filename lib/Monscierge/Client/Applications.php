<?php namespace Monscierge\Client;

trait Applications
{
	/**
	 * Get list of applications.
	 *
	 * @return array
	 */
	public function applications()
	{
		return $this->get('Applications');
	}

	/**
	 * Get a single application.
	 *
	 * @param int $application_id The ID of the application.
	 *
	 * @return array
	 */
	public function application($application_id)
	{
		return $this->get('Applications/'.$application_id);
	}

	/**
	 * Create an application.
	 *
	 * @param string $name         The name of the application.
	 * @param string $description  A description of the application.
	 * @param string $type         The type of application, can be
	 *                             Web, Ios, Android, or Other.
	 * @param mixed $redirect_urls Application redirect URIs to allow
	 *                             for OAuth authorization flow separated by newlines.
	 * @param mixed $origins       Origins to allow in CORS headers for the
	 *                             application separated by newlines.
	 *
	 * @return int The new application ID created.
	 */
	public function createApplication($name, $description, $type, $redirect_urls = null, $origins = null)
	{
		$application = [
			'name'   => $name,
			'desc'   => $description,
			'type'   => $type,
			'tokens' => [],
		];

		if (!empty($redirect_urls)) {
			if (is_array($redirect_urls)) {
				$redirect_urls = implode("\n", $redirect_urls);
			}
			
			$application['redirect_urls'] = $redirect_urls;
		}

		if (!empty($origins)) {
			if (is_array($origins)) {
				$origins = implode("\n", $origins);
			}

			$application['origins'] = $origins;
		}
		
		return $this->put('Applications', ['json' => $application]);
	}

	/**
	 * Update an application.
	 *
	 * @param int    $application_id The ID of the application.
	 * @param string $name           The name of the application.
	 * @param string $description    A description of the application.
	 * @param string $type           The type of application, can be
	 *                               Web, Ios, Android, or Other.
	 * @param mixed $redirect_urls   Application redirect URIs to allow
	 *                               for OAuth authorization flow separated by newlines.
	 * @param mixed $origins         Origins to allow in CORS headers for the
	 *                               application separated by newlines.
	 *
	 * @return bool
	 */
	public function updateApplication($application_id, $name = null, $description = null, $type = null, $redirect_urls = null, $origins = null)
	{
		$application = [
			'id'     => $application_id,
			'tokens' => [],
		];

		if (!empty($name)) {
			$application['name'] = $name;
		}

		if (!empty($description)) {
			$application['desc'] = $description;
		}

		if (!empty($type)) {
			$application['type'] = $type;
		}

		if (!empty($redirect_urls)) {
			if (is_array($redirect_urls)) {
				$redirect_urls = implode("\n", $redirect_urls);
			}
			
			$application['redirect_urls'] = $redirect_urls;
		}

		if (!empty($origins)) {
			if (is_array($origins)) {
				$origins = implode("\n", $origins);
			}

			$application['origins'] = $origins;
		}
		
		return $this->put('Applications', ['json' => $application]);
	}

	/**
	 * Delete an application.
	 *
	 * @param int $application_id The ID of the application.
	 *
	 * @return bool
	 */
	public function deleteApplication($application_id)
	{
		return $this->delete('Applications/'.$application_id);
	}
}