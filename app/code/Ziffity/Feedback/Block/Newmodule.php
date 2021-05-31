<?php
namespace Ziffity\Feedback\Block;

class Newmodule extends \Magento\Framework\View\Element\Template
{
    protected $scopeConfig;

    /**
     * Construct
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Customer\Model\Session $customer
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * Get form action URL for POST request
     *
     * @return string
     */
    public function getFormAction()
    {
        return $this->getUrl('customerfeedback/index/submit', ['_secure' => true]);
    }

    public function getStoreEmail()
    {
        return $this->_scopeConfig->getValue(
            'trans_email/ident_sales/email',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

}