<?php
namespace Tai\Training\Model\ResourceModel\Grid;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
  
    protected function _construct()
    {
        $this->_init(
            'Tai\Training\Model\Grid',
            'Tai\Training\Model\ResourceModel\Grid'
        );
    }
}
