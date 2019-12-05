<?php


namespace Training\AfterPlugin\Plugin\App\Action;



use Magento\Framework\App\Action\Action;
use Psr\Log\LoggerInterface;

class ActionPlugin
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function afterDispatch(Action $subject, $response) {
        $actionName = $subject->getRequest()->getFullActionName();
        $this->logger->info("Action is: [" . $actionName . "]");
        return $response;
    }
}