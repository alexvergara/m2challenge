define(
    [
        'Magento_Checkout/js/view/payment/default'
    ],
    function (Component) {
        'use strict';

        return Component.extend({
            defaults: {
                template: 'Alexvergara_BankDeposit/payment/bankdeposit'
            },

            /**
             * Get value of instruction field.
             * @returns {String}
             */
            getInstructions: function () {
                return window.checkoutConfig.payment.instructions[this.item.method];
            },

            /**
             * Get value of steps field.
             * @returns {String}
             */
            getSteps: function () {
                return window.checkoutConfig.payment.steps[this.item.method];
            }
        });
    }
);
