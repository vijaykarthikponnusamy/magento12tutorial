<?php

namespace Ziffity\Preorder\Controller\Adminhtml\Preorder;

use Magento\Backend\App\Action\Context;
use Ziffity\Preorder\Model\ResourceModel\Preorder\CollectionFactory;
use Magento\Ui\Component\MassAction\Filter;
use Magento\Framework\Controller\ResultFactory;

use Magento\Backend\App\Action;

class Sendemail extends Action
{    

    protected $_filter;
    protected $_collectionFactory;

   /**
    * @param Context $context
    * @param Filter $filter
    * @param CollectionFactory $collectionFactory
    */
   public function __construct(Context $context,Filter $filter,CollectionFactory $collectionFactory) {
        $this->_collectionFactory = $collectionFactory;
        $this->_filter = $filter;
       return parent::__construct($context);
   }

   public function execute()
   {
       try
       {
            echo "hi";
            
            $collection = $this->_filter->getCollection($this->_collectionFactory->create());
            
            die();

            foreach ($collection->getAllIds() as $productId)
            {
                $productDataObject = $this->collectionFactory->getById($productId);
                $productDataObject->setData('status',"Active");
                $this->collectionFactory->save($productDataObject);
            }
            $this->messageManager->addSuccess(__('A total of %1 record(s) have been modified.', $collection->getSize()));
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            return $resultRedirect->setPath('viewpreorder/preorder/index');
            
       }
       catch(\Exception $e)
       {
            $this->messageManager->addErrorMessage($e->getMessage());
            /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            return $resultRedirect->setPath('viewpreorder/preorder/index');
       }

       
   }
}