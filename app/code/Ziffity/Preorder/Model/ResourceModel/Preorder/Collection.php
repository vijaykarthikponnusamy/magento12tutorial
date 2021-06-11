<?php
namespace Ziffity\Preorder\Model\ResourceModel\Preorder;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Define model & resource model
     */
    protected function _construct()
    {
        $this->_init(
            'Ziffity\Preorder\Model\Preorder',
            'Ziffity\Preorder\Model\ResourceModel\Preorder'
        );
    }
}