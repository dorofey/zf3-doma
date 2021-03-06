<?php
/**
 * Created by PhpStorm.
 * User: alexeydorofeev
 * Date: 18/10/2017
 * Time: 09:29
 */

namespace Repository\Mapper\SelectStrategy;

use Zend\Db\Sql\Select;

interface SelectStrategyInterface
{
    /**
     * @param Select $select
     * @param mixed $data
     * @param mixed $entity
     * @return Select
     */
    public function select(Select $select, $data = null, $entity = null): Select;
}
