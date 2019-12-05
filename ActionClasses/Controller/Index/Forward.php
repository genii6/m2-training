<?php


namespace Training\ActionClasses\Controller\Index;



use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\ForwardFactory;
use Psr\Log\LoggerInterface;

class Forward extends Action
{
    /**
     * @var ForwardFactory
     */
    private $forwardFactory;
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(Context $context, ForwardFactory $forwardFactory, LoggerInterface $logger)
    {
        $this->forwardFactory = $forwardFactory;
        $this->logger = $logger;
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
        $forwardFac = $this->forwardFactory->create();
        $this->logger->info("forwarding...");
        // Set module -> this is the frontName in routes.xml
        // Set controller -> this is the directory path of this file, in this case index.
        // Set forward -> this forwards the browser to the action.
        return $forwardFac->setModule("training")->setController("index")->forward("raw");
    }
}