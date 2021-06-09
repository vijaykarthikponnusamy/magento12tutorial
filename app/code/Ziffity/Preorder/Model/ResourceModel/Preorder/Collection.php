<?php
namespace Ziffity\Preorder\Model\ResourceModel\Preorder;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    public function __construct()
    {
        $this->_init(
            'Ziffity\Preorder\Model\Preorder',
            'Ziffity\Preorder\Model\ResourceModel\Preorder'
        );
    }
}
