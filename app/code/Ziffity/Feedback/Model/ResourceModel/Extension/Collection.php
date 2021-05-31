<?php
namespace Ziffity\Feedback\Model\ResourceModel\Extension;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Define model & resource model
     */
    protected function _construct()
    {
        $this->_init(
            'Ziffity\Feedback\Model\Extension',
            'Ziffity\Feedback\Model\ResourceModel\Extension'
        );
    }
}