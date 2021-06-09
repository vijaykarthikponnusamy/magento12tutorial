define(['jquery'], function($){
    "use strict";
        return function myscript()
        {
            alert("Yes, got it.");
        }
 });

// return Component.extend({
//     defaults: {
//         template: 'Ziffity_Preorder/preorderform'
//     },
//     initObservable: function () {

//         this._super()
//             .observe({
//                 CheckVal: ko.observable(true)                        
//             });

//         this.CheckVal.subscribe(function (newValue) {
//             if(newValue){
//                 alert('checked');
//                 console.log('checked');
//             }else{
//                 console.log('Unchecked');
//             }
//         });

//         return this;
//     }
// });