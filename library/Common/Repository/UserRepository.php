<?php

namespace Common\Repository;

use Doctrine\ODM\MongoDB\DocumentRepository;

class UserRepository extends DocumentRepository
{
	public function findAllUsersOlderThan($age)
	{
		return $this->createQueryBuilder()
			->field('age')->lt($age)
			->getQuery()
			->execute();
	}
}