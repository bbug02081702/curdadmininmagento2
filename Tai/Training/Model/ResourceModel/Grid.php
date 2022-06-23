<?php

namespace Tai\Training\Model\ResourceModel;

class Grid extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
   
    protected function _construct()
    {
        $this->_init('students', 'entity_id');
    }
}
