<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Alexvergara\BankDeposit\Model;

/**
 * Pay In Store payment method model
 */
class BankDeposit extends \Magento\Payment\Model\Method\AbstractMethod
{
    const PAYMENT_METHOD_BANKDEPOSIT_CODE = 'bankdeposit';

    /**
     * Payment method code
     *
     * @var string
     */
    protected $_code = self::PAYMENT_METHOD_BANKDEPOSIT_CODE;

    /**
     * Availability option
     *
     * @var bool
     */
    protected $_isOffline = true;

    /**
     * Bank Deposit payment block paths
     *
     * @var string
     */
    protected $_formBlockType = \Alexvergara\BankDeposit\Block\Form\BankDeposit::class;

    /**
     * Get instructions text from config
     *
     * @return string
     */
    public function getInstructions()
    {
        return trim($this->getConfigData('instructions'));
    }

    /**
     * Get steps text from config
     *
     * @return string
     */
    public function getSetps()
    {
        return trim($this->getConfigData('steps'));
    }
}
