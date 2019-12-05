<?php


namespace Training\ActionClasses\Controller\Index;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\RedirectFactory;

class Redirect extends Action
{
    /**
     * @var RedirectFactory
     */
    private $redirectFactory;

    public function __construct(Context $context, RedirectFactory $redirectFactory)
    {
        $this->redirectFactory = $redirectFactory;
        parent::__construct($context);
    }

    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        return $this->redirectFactory->create()->setUrl("/training/index/json/");
    }
}