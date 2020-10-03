<?php

/**
 * @see       https://github.com/laminas/laminas-mvc-skeleton for the canonical source repository
 * @copyright https://github.com/laminas/laminas-mvc-skeleton/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-mvc-skeleton/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Application\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use Application\Form\ContactForm;
use Application\Service\MailSender;


class IndexController extends AbstractActionController
{
     /**
     * Mail sender.
     * @var Application\Service\MailSender
     */
    private $mailSender;
    
    /**
     * Constructor.
     */
    public function __construct($mailSender) 
    {
        $this->mailSender = $mailSender;
    }
    
    public function indexAction()
    {
        return new ViewModel();
    }
    /**
     * This is the "about" action. It is used to display the "About" page.
     */
    public function aboutAction() 
    {              
        $appName = 'FormDemo';
        
        
        return new ViewModel([
            'appName' => $appName,
            
        ]);
    }
     /**
     * This action displays the Contact Us page.
     */
    public function contactUsAction() 
    {   
       // Create Contact Us form
        $form = new ContactForm();
        
        // Check if user has submitted the form
        if($this->getRequest()->isPost()) {
            
            // Fill in the form with POST data
            $data = $this->params()->fromPost();            
            
            $form->setData($data);
            
            // Validate form
            if($form->isValid()) {
                
                // Get filtered and validated data
                $data = $form->getData();
                $email = $data['email'];
                $subject = $data['subject'];
                $body = $data['body'];
                
                // Send E-mail
               if(!$this->mailSender->sendMail('no-reply@example.com', $email, 
                        $subject, $body)) {
                    // In case of error, redirect to "Error Sending Email" page
                    return $this->redirect()->toRoute('application', 
                            ['action'=>'sendError']);
                }
                
                // Redirect to "Thank You" page
                return $this->redirect()->toRoute('application', 
                        ['action'=>'thankYou']);
            }               
        } 
        
        // Pass form variable to view
        return new ViewModel([
            'form' => $form
        ]);
         
    }
    /**
     * This action displays the Thank You page. The user is redirected to this
     * page on successful mail delivery.
     */
    public function thankYouAction() 
    {
        return new ViewModel();
    }
    
    /**
     * This action displays the Send Error page. The user is redirected to this
     * page on mail delivery error.
     */
    public function sendErrorAction() 
    {
        return new ViewModel();
    }
}
