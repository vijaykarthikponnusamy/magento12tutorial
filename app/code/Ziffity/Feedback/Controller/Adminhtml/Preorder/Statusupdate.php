<?php
namespace Ziffity\Feedback\Controller\Adminhtml\Preorder;

use Magento\Framework\Controller\ResultFactory;

use Zend\Mail\Message;
use Zend\Mail\Transport\Sendmail;
use Zend\Mail\Transport\Smtp as SmtpTransport;
use Zend\Mail\Transport\SmtpOptions;

class Statusupdate extends \Magento\Backend\App\Action
{
    private $coreRegistry;
    private $gridFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Ziffity\Feedback\Model\PreorderFactory $gridFactory
    ) {
        parent::__construct($context);
        $this->coreRegistry = $coreRegistry;
        $this->gridFactory = $gridFactory;
    }

    public function execute()
    {
        $rowId = (int)$this->getRequest()->getParam('id');
        $rowStatus = (int)$this->getRequest()->getParam('status');
        
        $rowData = $this->gridFactory->create();
       
        if ($rowId) {
            $rowData = $rowData->load($rowId);
            $rowEmail = $rowData->getEmail();
            $rowFname = $rowData->getFname();
           
            if ($rowData->getId()) {
               
                if ($rowStatus == "1") {
                    $status = "Pending";
                } elseif ($rowStatus == "2") {
                    $status = "Customer Notified";
                } elseif ($rowStatus == "3") {
                    $status = "Cancelled";
                }

                //Update status
                $rowData->setStatus($status);
                $rowData->save();

                $this->messageManager->addSuccessMessage(__('Pre-order form successfully updated .'));
            }

            $resultRedirect = $this->resultRedirectFactory->create();
            $resultRedirect->setPath('viewcustomfeedback/preorder/index');
            return $resultRedirect;
            
        } else {
            $this->messageManager->addErrorMessage(__('Data not exit. Try again later.'));
        }
    }
}
