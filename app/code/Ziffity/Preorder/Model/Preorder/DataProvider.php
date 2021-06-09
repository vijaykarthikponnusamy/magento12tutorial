<?php
namespace Ziffity\Preorder\Model\Preorder;

use Ziffity\Preorder\Model\ResourceModel\Preorder\CollectionFactory;
use Ziffity\Preorder\Model\Preorder;
use Magento\Ui\DataProvider\AbstractDataProvider;

class DataProvider extends AbstractDataProvider
{
     protected $collection;
    // protected $_loadedData;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $preFactory,
        array $meta = [],
        array $data = []
    ){
        $this->collection = $preFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    // public function getData()
    // {
    //     // if(isset($this->_loadedData)) {
    //     //     return $this->_loadedData;
    //     // }

    //     // $items = $this->collection->getItems();

    //     // foreach($items as $contact)
    //     // {
    //     //     $this->_loadedData[$contact->getId()] = $contact->getData();
    //     // }

    //     // return $this->_loadedData;

    //     return [];

    // }


    public function prepareMeta(array $meta) {
        return $meta;
    }
    public function getData() {
        return [];
    }
}