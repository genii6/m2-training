<?php


namespace Training\ViewModel\Block\DataProviders;


use Magento\Framework\View\Element\Block\ArgumentInterface;

class ViewModelData implements ArgumentInterface
{
    public function getData(): string
    {
        return "View Model Data!!";
    }
}