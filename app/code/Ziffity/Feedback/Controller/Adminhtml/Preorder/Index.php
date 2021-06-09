<?php
namespace Ziffity\Feedback\Controller\Adminhtml\Preorder;

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
        $resultPage->setActiveMenu('Ziffity_Feedback::preorder_view');
        $resultPage->getConfig()->getTitle()->prepend(__('All Preorder Details'));
        return $resultPage;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Ziffity_Feedback::preorder_form');
    }
}
