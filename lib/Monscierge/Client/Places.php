<?php namespace Monscierge\Client;

trait Places
{
	/**
	 * Get a list of places.
	 *
	 * @param string $query     Search using name, city, state, or postal code.
	 * @param float  $latitude  The geographic coordinate point latitude.
	 * @param float  $longitude The geographic coordinate point longitude.
	 * @param int    $brand_id  Filter places by brand.
	 * @param int    $limit     Limit the places returned.
	 * @param int    $page      Paginate the places.
	 * @param bool   $staff
	 *
	 * @return array
	 */
	public function places($query = '', $latitude = null, $longitude = null, $brand_id = 0, $limit = 20, $page = 1, $staff = false)
	{
		$params = [
			'staff' => $staff ? 'true' : 'false',
		];

		if (!empty($query)) {
			$params['query'] = $query;
		}

		if (!empty($latitude)) {
			$params['latitude'] = $latitude;
		}

		if (!empty($longitude)) {
			$params['longitude'] = $longitude;
		}

		if (!empty($brand_id)) {
			$params['brandId'] = $brand_id;
		}

		if (!empty($limit)) {
			$params['limit'] = $limit;
		}

		if (!empty($page)) {
			$params['page'] = $page;
		}

		return $this->get('Places/', ['query' => $params]);
	}
	
	/**
	 * Get a single place.
	 *
	 * @param int $place_id The ID of the place.
	 *
	 * @return array
	 */
	public function place($place_id)
	{
		return $this->get('Places/'.$place_id);
	}
}
