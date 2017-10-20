<?php
/**
 * Created by PhpStorm.
 * User: alexeydorofeev
 * Date: 18/10/2017
 * Time: 13:31
 */

namespace Repository\Hydrator;


use Repository\Entity\Entity;
use Repository\Mapper\StandardMapper;
use Zend\Db\ResultSet\AbstractResultSet;
use Zend\Hydrator\Strategy\StrategyInterface;

class HasOne implements StrategyInterface
{
    /** @var StandardMapper */
    protected $mapper;
    protected $entityName;

    /**
     * Relation constructor.
     * @param StandardMapper $mapper
     * @param $entityName
     */
    public function __construct(StandardMapper $mapper, $entityName)
    {
        $this->mapper     = $mapper;
        $this->entityName = $entityName;
    }

    public function extract($value)
    {
        $result = null;

        if ($value instanceof AbstractResultSet) {
            $value = $value->current();
        }


        if ($value instanceof Entity) {
            $result = $value->id;
        }

        return $result;

    }

    public function hydrate($value)
    {
        if (!$value) {
            return $value;
        }

        /** @var StandardMapper $mapper */
        $mapper = $this->mapper->getRepository()->get($this->entityName);

        return $mapper->id($value);
    }
}