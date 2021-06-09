<?php
namespace Ziffity\Preorder\Controller\Preorderform;

use Magento\Framework\Controller\ResultFactory;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $resultPageFactory;

    public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Framework\View\Result\PageFactory $resultPageFactory)
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}