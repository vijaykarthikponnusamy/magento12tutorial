<?php
namespace Ziffity\Preorder\Controller\Preorder;

use Magento\Framework\App\Action\Context;
use Ziffity\Preorder\Model\PreorderFactory;

class Submit extends \Magento\Framework\App\Action\Action
{
    protected $_submit;

    public function __construct(Context $context, PreorderFactory $submit)
    {
        $this->_submit = $submit;
        parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->getRequest()->getParams();
        $submit = $this->_submit->create();
        $submit->setData($data);
        
        if ($submit->save()) {
            $rowFname  = $data['fname'];
            $rowLname  = $data['lname'];
            $rowEmail  = $data['email'];
            $rowQuantity = $data['quantity'];
            $rowOrder_field  = $data['order_field'];
            $rowCdate  = $data['cdate'];
            $rowStatus  = $data['status'];
            
            $this->messageManager->addSuccessMessage(__('Pre-order Form successfully submitted.'));
        } else {
            $this->messageManager->addErrorMessage(__('We cant submit your request. Please try again later.'));
        }
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setRefererOrBaseUrl();
        return $resultRedirect;
    }
}
