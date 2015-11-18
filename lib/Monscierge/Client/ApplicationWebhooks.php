<?php namespace Monscierge\Client;

trait ApplicationWebhooks
{
	/**
	 * Get list of webhooks.
	 *
	 * @param int $application_id The ID of the application.
	 *
	 * @return array
	 */
	public function applicationWebhooks($application_id)
	{
		return $this->get('Applications/'.$application_id.'/webhooks');
	}

	/**
	 * Get a single webhook.
	 *
	 * @param int $application_id The ID of the application.
	 * @param int $webhook_id     The ID of the webhook.
	 *
	 * @return array
	 */
	public function applicationWebhook($application_id, $webhook_id)
	{
		return $this->get('Applications/'.$application_id.'/webhooks/'.$webhook_id);
	}

	/**
	 * Create a webhook.
	 * 
	 * @param int    $application_id The ID of the application.
	 * @param string $url            The callback URL of the webhook.
	 * @param string $type           The type of data to be sent to the webhook,
	 *                               can be Beacon or Sms.
	 * 
	 * @return int The new webhook ID created.
	 */
	public function createApplicationWebhook($application_id, $url, $type)
	{
		$webhook = [
			'url'  => $url,
			'type' => $type,
		];

		return $this->put('Applications/'.$application_id.'/webhooks', ['json' => $webhook]);
	}

	/**
	 * Update a webhook.
	 * 
	 * @param int    $application_id The ID of the application.
	 * @param int    $webhook_id     The ID of the webhook.
	 * @param string $url            The callback URL of the webhook.
	 * @param string $type           The type of data to be sent to the webhook,
	 *                               can be Beacon or Sms.
	 * 
	 * @return bool
	 */
	public function updateApplicationWebhook($application_id, $webhook_id, $url, $type)
	{
		$webhook = [
			'id'   => $webhook_id,
			'url'  => $url,
			'type' => $type,
		];

		return $this->put('Applications/'.$application_id.'/webhooks', ['json' => $webhook]);
	}

	/**
	 * Delete a webhook.
	 *
	 * @param int $application_id The ID of the application.
	 * @param int $webhook_id     The ID of the webhook.
	 *
	 * @return bool
	 */
	public function deleteApplicationWebhook($application_id, $webhook_id)
	{
		return $this->delete('Applications/'.$application_id.'/webhooks/'.$webhook_id);
	}
}
