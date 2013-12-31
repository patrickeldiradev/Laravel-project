/*global $,jQuery,top,WOW */
(function ($) {
    "use strict";
    $(document).ready(function () {

        //Prevent all forms from multiple submittions at same time by fast clicking on it
        $('form').on('submit', function() {
            $(this).find('button, input[type="submit"]').attr('disabled', true);
        });


                
        /*==================
        *  Rating
        * ================*/

        var widget = $('#select-rate'),
            el = widget.find('input'),
            selected = 0;

        function  addRate($this) {
            $this.parents('span').prevAll().find('i').attr('class', 'fas fa-star');
            $this.parents('span').find('i').attr('class', 'fas fa-star');
        }

        function clearRate() {
            widget.find('i').attr('class', 'far fa-star');
        }

        el.mouseover(function () {
            if (! selected)
                addRate($(this));
        });

        widget.mouseout(function () {
            if (! selected)
                clearRate($(this));
        });

        el.on('click', function () {
            addRate($(this));
            if (! selected) {
                addRate($(this));
                selected = $(this).val();
                $('#rating').val(selected);
            }
        });

        /*==================
            *  End Rating
            * ================*/


        
           var paragraphCount = $("#product-desc > p").size();

           $("#hider").addClass('hide');
           $("#shower").addClass('hide');
           
           if (paragraphCount > 1) {
               $("#shower").removeClass('hide');
           }
               
           $( "#hider" ).click(function() {
               $("#product-desc p").not(":first").addClass('hide');
               $("#hider").addClass('hide');
               $("#shower").removeClass('hide');
           });
               
           $( "#shower" ).click(function() {
               $("#product-desc p").removeClass('hide');
               $("#shower").addClass('hide');
               $("#hider").removeClass('hide');
           });
           
           $("#product-desc p").not(":first").addClass('hide');

    }); /*End Document Ready Func */
}(jQuery));
