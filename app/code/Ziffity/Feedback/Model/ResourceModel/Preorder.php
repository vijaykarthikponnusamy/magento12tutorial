<?php
namespace Ziffity\Feedback\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Preorder extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('preorder_form', 'id');
    }
}