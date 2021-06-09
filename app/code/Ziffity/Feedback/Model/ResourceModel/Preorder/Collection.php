<?php
namespace Ziffity\Feedback\Model\ResourceModel\Preorder;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Define model & resource model
     */
    protected function _construct()
    {
        $this->_init(
            'Ziffity\Feedback\Model\Preorder',
            'Ziffity\Feedback\Model\ResourceModel\Preorder'
        );
    }
}