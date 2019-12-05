<?php


namespace Training\ActionLoggerObserver\Observer;


use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;

class ActionLogger implements ObserverInterface
{

    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        $requestData = $observer->getData('request');
        $this->logger->info('observer called :');
        $this->logger->info('--------START---------');
        $this->logger->info($requestData->getFullActionName());
        $this->logger->info('-------FINISHED-------');
    }
}