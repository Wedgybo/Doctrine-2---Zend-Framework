<?php

namespace Common\Model;

/** @EmbeddedDocument */
class Address extends DomainModel {
	
	/** @String */
	private $address;
	/** @String */
	private $city;
	/** @String */
	private $county;
	/** @String */
	private $postcode;
	
	/**
	 * @return the $address
	 */
	public function getAddress() {
		return $this->address;
	}

	/**
	 * @return the $city
	 */
	public function getCity() {
		return $this->city;
	}

	/**
	 * @return the $county
	 */
	public function getCounty() {
		return $this->county;
	}

	/**
	 * @return the $postcode
	 */
	public function getPostcode() {
		return $this->postcode;
	}

	/**
	 * @param field_type $address
	 */
	public function setAddress($address) {
		$this->address = $address;
	}

	/**
	 * @param field_type $city
	 */
	public function setCity($city) {
		$this->city = $city;
	}

	/**
	 * @param field_type $county
	 */
	public function setCounty($county) {
		$this->county = $county;
	}

	/**
	 * @param field_type $postcode
	 */
	public function setPostcode($postcode) {
		$this->postcode = $postcode;
	}

}