<?php
namespace Ziffity\Feedback\Controller\Adminhtml\Preorder;

use Magento\Backend\App\Action\Context;
use Ziffity\Feedback\Model\ResourceModel\Preorder\CollectionFactory;
use Magento\Ui\Component\MassAction\Filter;
use Magento\Framework\Controller\ResultFactory;

use Magento\Backend\App\Action;

use Zend\Mail\Message;
use Zend\Mail\Transport\Sendmail;
use Zend\Mail\Transport\Smtp as SmtpTransport;
use Zend\Mail\Transport\SmtpOptions;

class Submit extends Action
{
    protected $_filter;
    protected $_collectionFactory;

   /**
    * @param Context $context
    * @param Filter $filter
    * @param CollectionFactory $collectionFactory
    */

    public function __construct(Context $context, Filter $filter, CollectionFactory $collectionFactory)
    {
        $this->_collectionFactory = $collectionFactory;
        $this->_filter = $filter;
        return parent::__construct($context);
    }

    public function execute()
    {
        try {

            $row = $this->_collectionFactory->create();

            $collection = $this->_filter->getCollection($row);

            foreach ($collection as $customer) {

                $cusemail = $customer->getEmail();

                $body = "Thankyou for your valuable submit pre-order form. ";
               
                //Send Email to Customer
                $email = new Message();
                $email->setSubject("Having pre-order confirmed as the message submit.")
                     ->setBody($body)
                     ->addFrom('noreply@magento.com')
                     ->addTo($cusemail);

                // Setup SMTP transport
                $transport = new SmtpTransport();
                $options   = new SmtpOptions([
                    'name'              => 'smtp.mailtrap.io',
                    'host'              => 'smtp.mailtrap.io',
                    'port'              => 2525,
                    'connection_class'  => 'crammd5',
                    'connection_config' => [
                        'username' => '766fe40bd67461',
                        'password' => '5635131355e4d6',
                    ],
                ]);
                $transport->setOptions($options);
                $transport->send($email);
            }
            
            $this->messageManager->addSuccess(__('A total of %1 record(s) have been sent.', $collection->getSize()));
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            return $resultRedirect->setPath('viewcustomfeedback/preorder/index');
            
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
            /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            return $resultRedirect->setPath('viewcustomfeedback/preorder/index');
        }
    }
}
