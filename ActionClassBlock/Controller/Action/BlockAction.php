<?php


namespace Training\ActionClassBlock\Controller\Action;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\RawFactory;
use Magento\Framework\View\LayoutFactory;

class BlockAction extends Action
{
    /**
     * @var RawFactory
     */
    private $rawFactory;
    /**
     * @var LayoutFactory
     */
    private $layoutFactory;

    public function __construct(Context $context, RawFactory $rawFactory, LayoutFactory $layoutFactory)
    {
        parent::__construct($context);
        $this->rawFactory = $rawFactory;
        $this->layoutFactory = $layoutFactory;
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
        $layout = $this->layoutFactory->create();
        $myBlock = $layout->createBlock(
            \Training\ActionClassBlock\Block\Block::class,
            'ActionBlock'
        );
        $myBlock->setTemplate("Training_ActionClassBlock::blockAction.phtml");

        $rawObj = $this->rawFactory->create();
        $rawObj->setContents($myBlock->toHtml());
        return $rawObj;
    }
}