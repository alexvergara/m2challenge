<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

/**
 * OfflinePayments Observer
 */
namespace Alexvergara\BankDeposit\Observer;

use Magento\Framework\Event\ObserverInterface;
use Alexvergara\BankDeposit\Model\BankDeposit;

class BeforeOrderPaymentSaveObserver implements ObserverInterface
{
    /**
     * Sets current instructions for bank transfer account
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        /** @var \Magento\Sales\Model\Order\Payment $payment */
        $payment = $observer->getEvent()->getPayment();
        $instructionMethods = [
            BankDeposit::PAYMENT_METHOD_BANKDEPOSIT_CODE
        ];
        if (in_array($payment->getMethod(), $instructionMethods)) {
            $payment->setAdditionalInformation(
                'instructions',
                $payment->getMethodInstance()->getInstructions()
            );
            $payment->setAdditionalInformation(
                'steps',
                $payment->getMethodInstance()->getSteps()
            );
        }
    }
}
