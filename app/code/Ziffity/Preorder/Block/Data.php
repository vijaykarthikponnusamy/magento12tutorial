<?php
namespace Ziffity\Preorder\Block;

use Magento\Framework\Controller\ResultFactory;

class Data extends \Magento\Framework\View\Element\Template
{
    protected $extensionFactory;

    /**
     * Construct
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Ziffity\Preorder\Model\PreorderFactory $extensionFactory,
        array $data = array()
    )
    {
        parent::__construct($context);
        $this->extensionFactory = $extensionFactory;
    }

}