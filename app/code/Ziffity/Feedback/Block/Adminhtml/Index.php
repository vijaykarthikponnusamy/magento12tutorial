<?php
namespace Ziffity\Feedback\Block\Adminhtml;

use Magento\Framework\Controller\ResultFactory;

class Index extends \Magento\Framework\View\Element\Template
{
    private $gridFactory;

    /**
     * Construct
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Ziffity\Feedback\Model\ExtensionFactory $gridFactory,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->gridFactory = $gridFactory;
    }

    public function getDetail()
    {
        $id = $this->getRequest()->getParam('id');
		$feedback = $this->gridFactory->create()->load($id);
		return $feedback;
    }

    public function getApprove()
    {
        return $this->getUrl('viewcustomfeedback/accept/index', ['_secure' => true]);
    }

    public function getDecline()
    {
        return $this->getUrl('viewcustomfeedback/decline/index', ['_secure' => true]);
    }

    public function getAcceptUrl()
    {
        return $this->getUrl('viewcustomfeedback/accept/index');
    }

    public function getDeclineUrl()
    {
        return $this->getUrl('viewcustomfeedback/decline/index');
    }

    public function getButtonHtml()
    {
        $button = $this->getLayout()->createBlock('Magento\Backend\Block\Widget\Button')->setData(['id' => 'idAccept', 'label' => __('Accept'),'class' => 'action-primary']);
        return $button->toHtml();
    }
    
    public function getDeclineButtonHtml()
    {
        $button = $this->getLayout()->createBlock('Magento\Backend\Block\Widget\Button')->setData(['id' => 'idDecline', 'label' => __('Decline'),'class' => 'action-danger']);
        return $button->toHtml();
    }
}   