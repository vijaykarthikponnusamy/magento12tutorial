<?php
namespace Ziffity\Preorder\Ui\Component\Listing\Column;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

class Actions extends Column {

    /** Url path */
    const URL_PATH_APPROVE = 'customerpreorder/preorder/statusupdate';

    protected $actionUrlBuilder;
    protected $urlBuilder;

    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource) {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                $name = $this->getData('name');                
                if (isset($item['id'])) {
                    $item[$name]['pending'] = [
                        'href' => $this->urlBuilder->getUrl(
                                self::URL_PATH_APPROVE, [
                                    'id' => $item['id'],'status' => "1"
                                ]
                        ),
                        'label' => __('Pending')
                    ];
                    $item[$name]['customer_notified'] = [
                        'href' => $this->urlBuilder->getUrl(
                                self::URL_PATH_APPROVE, [
                                    'id' => $item['id'],'status' => "2"
                                ]
                        ),
                        'label' => __('Customer Notified')
                    ];
                    $item[$name]['cancelled'] = [
                        'href' => $this->urlBuilder->getUrl(
                                self::URL_PATH_APPROVE, [
                                    'id' => $item['id'],'status' => "3"
                                ]
                        ),
                        'label' => __('Cancelled'),
                        'confirm' => [
                            'title' => __('Cancelled'),
                            'message' => __('Are you sure you wan\'t to cancelled a this record?')
                        ]
                    ];
                }
            }
        }

        return $dataSource;
    }

}