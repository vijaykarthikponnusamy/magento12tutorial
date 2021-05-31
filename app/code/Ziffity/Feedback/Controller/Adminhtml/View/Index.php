<?php
namespace Ziffity\Feedback\Controller\Adminhtml\View;

class Index extends \Magento\Backend\App\Action
{
         protected $resultPageFactory = false;      
         public function __construct(
                 \Magento\Backend\App\Action\Context $context,
                 \Magento\Framework\View\Result\PageFactory $resultPageFactory
         ) {
                 parent::__construct($context);
                 $this->resultPageFactory = $resultPageFactory;
         } 
         public function execute()
         {
                 $resultPage = $this->resultPageFactory->create();
                 $resultPage->setActiveMenu('Ziffity_Feedback::custom_feedback_view');
                 $resultPage->getConfig()->getTitle()->prepend(__('All Customer Feedback Details'));
                 return $resultPage;
         }
         protected function _isAllowed()
         {
                 return $this->_authorization->isAllowed('Ziffity_Feedback::customer_feedback');
         }
}
