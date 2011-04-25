<?php

namespace Common\Model;

/** 
 * 	@Document(collection="users", repositoryClass="Common\Repository\UserRepository")
 *  @InheritanceType("SINGLE_COLLECTION")
 *  @DiscriminatorField(fieldName="type")
 *  @DiscriminatorMap({
 *  	"employee"="Employee",
 *  	"manager"="Manager"
 *  })
 */
class User extends DomainModel
{
	/** @Id */
	private $id;
		
	/** @String  */
	private $name;
	
	/** @Int */
	private $age;
	
	/** @EmbedOne(targetDocument="Address") */
	private $address;
	
	/** @NotSaved */
	private $username;
	/** @NotSaved */
	private $password;
	
	/**
	 * @return the $id
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return the $name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @return the $age
	 */
	public function getAge() {
		return $this->age;
	}

	/**
	 * @return the $address
	 */
	public function getAddress() {
		return $this->address;
	}
	
	/**
	 * @param MongoID $id
	 */
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * @param string $name
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * @param int $age
	 */
	public function setAge($age) {
		$this->age = $age;
	}

	/**
	 * @param Address|array $address
	 */
	public function setAddress($address) {
		if (is_array($address)) {
			$address = new Address($address);
		}
		$this->address = $address;
	}

}