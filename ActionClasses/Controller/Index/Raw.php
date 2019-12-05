<?php


namespace Training\ActionClasses\Controller\Index;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\RawFactory;

class Raw extends Action
{
    /**
     * @var RawFactory
     */
    private $rawFactory;

    public function __construct(Context $context, RawFactory $rawFactory)
    {
        $this->rawFactory = $rawFactory;
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
        return $this->rawFactory->create()->setContents("eferfr");
    }
}