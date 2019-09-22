define(
    [
        'uiComponent',
        'Magento_Checkout/js/model/payment/renderer-list'
    ],
    function (
        Component,
        rendererList
    ) {
        'use strict';
        rendererList.push(
            {
                type: 'bankdeposit',
                component: 'Alexvergara_BankDeposit/js/view/payment/method-renderer/bankdeposit-method'
            }
        );
        /** Add view logic here if needed */
        return Component.extend({});
    }
);
