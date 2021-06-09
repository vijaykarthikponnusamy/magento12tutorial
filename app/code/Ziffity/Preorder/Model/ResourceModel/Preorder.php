<?php
namespace Ziffity\Preorder\Model\ResourceModel;

class Preorder extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('preorder_form','id');
    }
}