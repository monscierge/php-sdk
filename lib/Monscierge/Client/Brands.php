<?php namespace Monscierge\Client;

trait Brands
{
	/**
	 * Get list of brands.
	 *
	 * @return array
	 */
	public function brands()
	{
		return $this->get('Brands');
	}

	/**
	 * Get a single brand.
	 *
	 * @param int $brand_id The ID of the brand.
	 *
	 * @return array
	 */
	public function brand($brand_id)
	{
		return $this->get('Brands/'.$brand_id);
	}
}
