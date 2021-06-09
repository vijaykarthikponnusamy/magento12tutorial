<?php
namespace Ziffity\Preorder\Controller\Preorderform;

use Magento\Framework\App\Action\Context;
use Ziffity\Feedback\Model\PreorderFactory;

use Zend\Mail\Message;
use Zend\Mail\Transport\Sendmail;
use Zend\Mail\Transport\Smtp as SmtpTransport;
use Zend\Mail\Transport\SmtpOptions;

class Submit extends \Magento\Framework\App\Action\Action
{
	/**
     * @var Submit
     */
    protected $_submit;

	public function __construct(
		Context $context,
        PreorderFactory $submit
    ) {
        $this->_submit = $submit;
        parent::__construct($context);
    }
	public function execute()
    {
        $data = $this->getRequest()->getParams();
    	$submit = $this->_submit->create();
        $submit->setData($data);
        if($submit->save()){

            $rowFname  = $data['fname'];
            $rowLname  = $data['lname'];
            $rowEmail  = $data['email'];
            $rowQuantity = $data['quantity'];
            $rowOrder_field  = $data['order_field'];
            $rowCdate  = $data['cdate'];
            $rowStatus  = $data['status'];

            //$body = "Thankyou for your submit. Your details are , FName : ".$rowFname." | LName : ".$rowLname." | Email : ".$rowEmail." | Quantity : ".$rowQuantity;

            //Send Email to Customer
            //$email = new Message();
            //$email->setSubject("Pre Order")
              //    ->setBody($body)
               //   ->addFrom('noreply@magento.com')
               //   ->addTo($rowEmail);

             // Setup SMTP transport
            //  $transport = new SmtpTransport();
            //  $options   = new SmtpOptions(array(
            //      'name'              => 'smtp.mailtrap.io',
            //      'host'              => 'smtp.mailtrap.io',
            //      'port'              => 2525,
            //      'connection_class'  => 'crammd5',
            //      'connection_config' => array(
            //          'username' => '766fe40bd67461',
            //          'password' => '5635131355e4d6',
            //      ),
            //  ));
            //  $transport->setOptions($options);

            //  $transport->send($email);

            $this->messageManager->addSuccessMessage(__('Form successfully saved this product. Service provider contact soon...'));
        }
        else
        {
            $this->messageManager->addErrorMessage(__('We cant submit your request. Please try again later.'));
        }
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('http://local.magento12tutorial.com/');
        return $resultRedirect;
    }
}
