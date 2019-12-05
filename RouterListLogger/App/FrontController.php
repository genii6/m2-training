<?php


namespace Training\RouterListLogger\App;


use Magento\Framework\App\Request\ValidatorInterface as RequestValidator;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\App\RouterListInterface;
use Magento\Framework\Message\ManagerInterface as MessageManager;
use Psr\Log\LoggerInterface;

class FrontController extends \Magento\Framework\App\FrontController
{

    /**
     * @var RouterListInterface
     */
    protected $_routerList;
    protected $response;
    /**
     * @var ValidatorInterface|null
     */
    private $requestValidator;
    /**
     * @var MessageManager|null
     */
    private $messages;
    /**
     * @var LoggerInterface|null
     */
    private $logger;

    public function __construct(
        RouterListInterface $routerList,
        ResponseInterface $response,
        RequestValidator $requestValidator,
        MessageManager $messageManager,
        LoggerInterface $logger)
    {
        $this->_routerList = $routerList;
        $this->response = $response;
        $this->requestValidator = $requestValidator;
        $this->messages = $messageManager;
        $this->logger = $logger;
        parent::__construct($routerList, $response, $this->requestValidator, $this->messages, $this->logger);
    }

    public function dispatch(RequestInterface $request)
    {
        foreach ($this->_routerList as $router) {
            $this->logger->info("--- Start lalala---");
            $this->logger->info(get_class($router));
            $this->logger->info("--- End ---");
        }
        return parent::dispatch($request);
    }
}