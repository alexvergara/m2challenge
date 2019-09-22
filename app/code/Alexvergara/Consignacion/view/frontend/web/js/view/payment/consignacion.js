define(
    [
        'uiComponent',
        'Magento_Checkout/js/model/payment/renderer-list'
    ],
    function (Component,
              rendererList) {
        'use strict';
        rendererList.push(
            {
                type: 'consignacion',
                component: 'Alexvergara_Consignacion/js/view/payment/method-renderer/consignacion-method'
            }
        );
        return Component.extend({});
    }
);
