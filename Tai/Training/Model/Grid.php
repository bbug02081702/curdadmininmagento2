<?php
 
namespace Tai\Training\Model;
 
class Grid extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init('Tai\Training\Model\ResourceModel\Grid');
    }
}