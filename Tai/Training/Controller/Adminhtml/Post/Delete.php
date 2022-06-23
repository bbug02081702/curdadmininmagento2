<?php
 
namespace Tai\Training\Controller\Adminhtml\Post;
 
use Magento\Backend\App\Action;
use Tai\Training\Model\ResourceModel\Grid\CollectionFactory;
use Tai\Training\Model\GridFactory;
use Magento\Ui\Component\MassAction\Filter;
use Magento\Backend\Model\View\Result\RedirectFactory;
 
class Delete extends Action
{
    private $gridFactory;
    private $filter;
    private $collectionFactory;
    private $resultRedirect;
 
    public function __construct(
        Action\Context $context,
        GridFactory $gridFactory,
        Filter $filter,
        CollectionFactory $collectionFactory,
        RedirectFactory $redirectFactory
    )
    {
        parent::__construct($context);
        $this->gridFactory = $gridFactory;
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        $this->resultRedirect = $redirectFactory;
    }
 
    public function execute()
    {
        $collection = $this->filter->getCollection($this->collectionFactory->create());
        $total = 0;
        $err = 0;
        foreach ($collection->getItems() as $item) {
            $deleteGrid = $this->gridFactory->create()->load($item->getData('entity_id'));
            try {
                $deleteGrid->delete();
                $total++;
            } catch (LocalizedException $exception) {
                $err++;
            }
        }
 
        if ($total) {
            $this->messageManager->addSuccessMessage(
                __('Tong so ban ghi bi xoa', $total)
            );
        }
 
        if ($err) {
            $this->messageManager->addErrorMessage(
                __(
                    'Tong so ban ghi chua bi xoa',
                    $err
                )
            );
        }
        return $this->resultRedirect->create()->setPath('student/post/index');
    }
}