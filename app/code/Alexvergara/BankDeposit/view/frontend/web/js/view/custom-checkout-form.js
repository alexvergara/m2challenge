/*global define*/

define(
    [
        'Magento_Ui/js/form/form',
        'Magento_Checkout/js/model/quote',
        'knockout'
    ],

    function(Component, quote, ko) {
        'use strict';

        return Component.extend({
            initialize: function () {
                this._super();

                const BANKDEPOSITMETHOD = 'bankdeposit';

                var self = this;
                self.isBankDeposit = ko.observable(false);

                quote.paymentMethod.subscribe(function(method) {
                    if (method.method == BANKDEPOSITMETHOD) {
                        self.isBankDeposit = true;
                    } else {
                        self.isBankDeposit = false;
                    }

                }, null, 'change');

                return this;
            },

            /**
             * Form submit handler
             *
             * This method can have any name.
             */
            onSubmit: function() {
                // trigger form validation
                this.source.set('params.invalid', false);
                this.source.trigger('customCheckoutForm.data.validate');

                // verify that form data is valid
                if (!this.source.get('params.invalid')) {
                    // data is retrieved from data provider by value of the customScope property
                    var formData = this.source.get('customCheckoutForm');
                    // do something with form data
                    console.dir(formData);
                }
            }
        });
    }
);
