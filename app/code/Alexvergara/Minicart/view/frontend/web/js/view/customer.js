/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

define([
    'uiComponent',
    'Magento_Customer/js/customer-data',
    'ko'
], function (Component, customerData, ko) {
    'use strict';

    return Component.extend({

        // jscs:disable requireCamelCaseOrUpperCaseIdentifiers
        /**
         * @override
         */
        initialize: function () {
            console.log(customerData.get('customer')());
            console.log(customerData.get('address')());
            console.log(customerData.get('email')());

            console.log(!!window.isCustomerLoggedIn);
            console.log(window.customerData);

            return this._super();
        },

        /**
         * Returns customer data
         * @param {String} name
         * @returns {Object}
         */
        getCustomerData: function (name) {
            return customerData.get(name || 'customer')();
        }
    });
});
