<?php
 
namespace Tai\Training\Controller\Adminhtml\Post;
 
use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action;
 
/**
 * Class AddNew
 * @package Tai\Training\Controller\Adminhtml\Post
 */
class AddNew extends Action
{
    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->getConfig()->getTitle()->prepend(__('Add New Student'));
        return $resultPage;
    }
}