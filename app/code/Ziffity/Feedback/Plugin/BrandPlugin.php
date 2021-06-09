<?php
namespace Ziffity\Feedback\Plugin;

class BrandPlugin
{
    public function afterGetName(\Magento\Catalog\Model\Product $subject, $result)
    {
        $brand = $subject->getData('brandscode');
        if($brand != null)
            return $brand.' - '.$result;
        else
            return $result;    
    }

}