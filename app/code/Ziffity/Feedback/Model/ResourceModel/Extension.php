<?php
namespace Ziffity\Feedback\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Extension extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('customer_feedback', 'id');
    }
}