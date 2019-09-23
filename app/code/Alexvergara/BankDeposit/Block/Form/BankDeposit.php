<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Alexvergara\BankDeposit\Block\Form;

/**
 * Block for Bank Deposit payment method form
 */
class Bankdeposit extends \Magento\OfflinePayments\Block\Form\AbstractInstruction
{
    /**
     * Bank deposit template
     *
     * @var string
     */
    protected $_template = 'Alexvergara_BankDeposit::form/bankdeposit.phtml';

    /**
     * Steps text
     *
     * @var string
     */
    protected $_steps;

    /**
     * Get steps text from config
     *
     * @return null|string
     */
    public function getSteps()
    {
        if ($this->_steps === null) {
            /** @var \Magento\Payment\Model\Method\AbstractMethod $method */
            $method = $this->getMethod();
            $this->_steps = $method->getConfigData('steps');
        }
        return $this->_steps;
    }

    /**
     * Get checkout config
     *
     * @return object
     */
    public function getCheckoutConfig()
    {
        return $this->configProvider->getConfig();
    }
}
