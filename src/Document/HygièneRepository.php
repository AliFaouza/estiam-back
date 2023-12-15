<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Repository\DocumentRepository;

class HygièneRepository extends DocumentRepository {
    public function getHygièneByEval_sanitaire($filtre, $value)
    {
        return $this->createQueryBuilder()
              ->find()
              ->field('fields.'.$filtre)->equals($value)
              ->getQuery()
              ->execute();
    }
}
