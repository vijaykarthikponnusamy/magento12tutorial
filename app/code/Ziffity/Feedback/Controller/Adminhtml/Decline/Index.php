<?php
namespace Ziffity\Feedback\Controller\Adminhtml\Decline;

use Magento\Framework\Controller\ResultFactory;

use Zend\Mail\Message;
use Zend\Mail\Transport\Sendmail;
use Zend\Mail\Transport\Smtp as SmtpTransport;
use Zend\Mail\Transport\SmtpOptions;

class Index extends \Magento\Backend\App\Action
{
    private $coreRegistry;
    private $gridFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Ziffity\Feedback\Model\ExtensionFactory $gridFactory
    ) {
        parent::__construct($context);
        $this->coreRegistry = $coreRegistry;
        $this->gridFactory = $gridFactory;
    }

    public function execute()
    {
        $rowId = (int)$this->getRequest()->getParam('id');
        $rowData = $this->gridFactory->create();
       
        if ($rowId) {
           $rowData = $rowData->load($rowId);
           $rowEmail = $rowData->getEmail();
           
           if ($rowData->getId())
           {
               $rowData->setStatus("Declined");
               $rowData->save();

               $body = "Thankyou for your valuable feedback. Your comment have declined for some reason.";

               //Send Email to Customer
               $email = new Message();
               $email->setSubject("Decline Feedback Mail")
                     ->setBody($body)
                     ->addFrom('noreply@magento.com')
                     ->addTo($rowEmail);

                // Setup SMTP transport
                $transport = new SmtpTransport();
                $options   = new SmtpOptions(array(
                    'name'              => 'smtp.mailtrap.io',
                    'host'              => 'smtp.mailtrap.io',
                    'port'              => 2525,
                    'connection_class'  => 'crammd5',
                    'connection_config' => array(
                        'username' => '766fe40bd67461',
                        'password' => '5635131355e4d6',
                    ),
                ));
                $transport->setOptions($options);

                $transport->send($email);

               $this->messageManager->addSuccessMessage(__('Decline mail successfully sent to customer.'));
           }

           $resultRedirect = $this->resultRedirectFactory->create();
           $resultRedirect->setPath('viewcustomfeedback/view/index');
           return $resultRedirect;           
       }
       else
       {
        $this->messageManager->addErrorMessage(__('Data not exit. Try again later.'));
       }
    }
}
