<?php
 
namespace Tai\Training\Controller\Adminhtml\Post;
 
use Tai\Training\Model\GridFactory;
use Magento\Backend\App\Action;
 
/**
 * Class Save
 * @package Tai\Training\Controller\Adminhtml\Post
 */
class Save extends Action
{
    /**
     * @var GridFactory
     */
    private $GridFactory;
 
    /**
     * Save constructor.
     * @param Action\Context $context
     * @param GridFactory $GridFactory
     */
    public function __construct(
        Action\Context $context,
        GridFactory $GridFactory
    ) {
        parent::__construct($context);
        $this->GridFactory = $GridFactory;
    }
 
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $id = !empty($data['entity_id']) ? $data['entity_id'] : null;
 
        $newData = [
            'name' => $data['name'],
            'gender' => $data['gender'],
            'dob' => $data['dob'],
            'address' => $data['address'],
            'slug' => $data['slug'],
            'email' => $data['email'],
        ];
 
        $post = $this->GridFactory->create();
 
        if ($id) {
            $post->load($id);
        }
        try {
            $post->addData($newData);
            $post->save();
            $this->messageManager->addSuccessMessage(__('You saved the student.'));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__($e->getMessage()));
        }
 
        return $this->resultRedirectFactory->create()->setPath('student/post/index');
    }
}