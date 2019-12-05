<?php


namespace Training\ActionClasses\Controller\Index;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\JsonFactory;

class Json extends Action
{
    /**
     * @var JsonFactory
     */
    private $jsonFactory;

    public function __construct(Context $context, JsonFactory $jsonFactory)
    {
        $this->jsonFactory = $jsonFactory;
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
        $data = ["A" => 2, "B" =>["B= test!","C"], "C"];
        return $this->jsonFactory->create()->setData($data);
    }
}