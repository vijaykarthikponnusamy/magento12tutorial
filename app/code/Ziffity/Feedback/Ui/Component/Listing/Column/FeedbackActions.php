<?php
namespace Ziffity\Feedback\Ui\Component\Listing\Column;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

class FeedbackActions extends Column {

    /** Url path */
    const URL_PATH_APPROVE = 'viewcustomfeedback/accept/index';
    const URL_PATH_DECLINE = 'viewcustomfeedback/decline/index';

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
                    $item[$name]['accept'] = [
                        'href' => $this->urlBuilder->getUrl(
                                self::URL_PATH_APPROVE, [
                                    'id' => $item['id']
                                ]
                        ),
                        'label' => __('Approve')
                    ];
                    $item[$name]['decline'] = [
                        'href' => $this->urlBuilder->getUrl(
                                self::URL_PATH_DECLINE, [
                                    'id' => $item['id']
                                ]
                        ),
                        'label' => __('Decline'),
                        'confirm' => [
                            'title' => __('Decline'),
                            'message' => __('Are you sure you wan\'t to decline a this record?')
                        ]
                    ];
                }
            }
        }

        return $dataSource;
    }

}