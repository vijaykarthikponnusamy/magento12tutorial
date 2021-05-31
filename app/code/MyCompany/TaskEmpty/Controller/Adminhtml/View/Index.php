<?php
namespace MyCompany\TaskEmpty\Controller\Adminhtml\View;

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
                 $resultPage->setActiveMenu('MyCompany_TaskEmpty::menu');
                 $resultPage->getConfig()->getTitle()->prepend(__('View Menu'));
                 return $resultPage;
         }
         protected function _isAllowed()
         {
                 return $this->_authorization->isAllowed('MyCompany_TaskEmpty::view');
         }
}
