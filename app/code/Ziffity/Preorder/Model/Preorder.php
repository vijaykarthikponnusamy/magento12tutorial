<?php
namespace Ziffity\Preorder\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Preorder extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('Ziffity\Preorder\Model\ResourceModel\Preorder');
    }
}
