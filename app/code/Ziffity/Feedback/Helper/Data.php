<?php
namespace Ziffity\Feedback\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{
    /**
     * @var \Magento\Framework\App\Http\Context
     */
    private $httpContext;
    private $extensionFactory;
    protected $_pageFactory;

    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Framework\App\Http\Context $httpContext,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Ziffity\Feedback\Model\ExtensionFactory $extensionFactory
    ) {
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);
        $this->httpContext = $httpContext;
        $this->extensionFactory = $extensionFactory;
    }

    public function isLoggedIn()
    {
        $isLoggedIn = $this->httpContext->getValue(\Magento\Customer\Model\Context::CONTEXT_AUTH);
        
        return $isLoggedIn;
    }

    public function getFeedback()
    {
        $post = $this->extensionFactory->create();
		$collection = $post->getCollection();
        $filterData = $collection->addFieldToFilter('status',"Approved");        
		return $filterData;        
    }
}