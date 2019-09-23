<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Alexvergara\BankDeposit\Model;

use Magento\Checkout\Model\ConfigProviderInterface;
use Magento\Framework\Escaper;
use Magento\Payment\Helper\Data as PaymentHelper;

/**
 * Retrive config data
 */
class BankDepositConfigProvider implements ConfigProviderInterface
{
    /**
     * @var string[]
     */
    protected $methodCodes = [
        BankDeposit::PAYMENT_METHOD_BANKDEPOSIT_CODE
    ];

    /**
     * @var \Magento\Payment\Model\Method\AbstractMethod[]
     */
    protected $methods = [];

    /**
     * @var Escaper
     */
    protected $escaper;

    /**
     * @param PaymentHelper $paymentHelper
     * @param Escaper $escaper
     */
    public function __construct(
        PaymentHelper $paymentHelper,
        Escaper $escaper
    ) {
        $this->escaper = $escaper;
        foreach ($this->methodCodes as $code) {
            $this->methods[$code] = $paymentHelper->getMethodInstance($code);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getConfig()
    {
        $config = [];
        foreach ($this->methodCodes as $code) {
            if ($this->methods[$code]->isAvailable()) {
                $config['payment']['steps'][$code] = $this->getSteps($code);
                $config['payment']['instructions'][$code] = $this->getInstructions($code);
            }
        }
        return $config;
    }

    /**
     * Get instructions text from config
     *
     * @param string $code
     * @return string
     */
    protected function getInstructions($code)
    {
        return nl2br($this->escaper->escapeHtml($this->methods[$code]->getInstructions()));
    }

    /**
     * Get steps text from config
     *
     * @param string $code
     * @return string
     */
    protected function getSteps($code)
    {
        return nl2br($this->escaper->escapeHtml($this->methods[$code]->getSteps()));
        //return nl2br($this->escaper->escapeHtml($this->methods[$code]->getInstructions()));
    }
}
