 jQuery(document).ready(function ($) {
  //an old school delay function used at the end of this script
  var delay = (function () {
        var timer = 0;
        return function (callback, ms) {
            clearTimeout(timer);
            timer = setTimeout(callback, ms);
        };
    })();
    
    //get the form id
    var the_id = $('.gform_wrapper').attr('id');
    var gform_id = the_id.substr(14);

    var $loading = $('#gform_wrapper_' + gform_id).css('opacity', '1');
    
  //some loading animation effect on ajax calls
    $(document)
            .ajaxStart(function () {
                $loading.css('opacity', '0.5');
            })
            .ajaxStop(function () {
                $loading.css('opacity', '1');
            });
  
    //custom ajax call to our wordpress function
    function do_calculate() {
        var option1_discount = $('#input_' + gform_id + '_13').val();
        var option2_discount = $('#input_' + gform_id + '_26').val();
        var option3_discount = $('#input_' + gform_id + '_52').val();
      
        $.post(
                ajax_object.ajax_url,
                {
                    'action': 'run_calculations',
                    'option1_discount': option1_discount,
                    'option2_discount': option2_discount,
                    'option3_discount': option3_discount,
                },
        function (response) {
            //now let's do something with the response of the ajax call
            //option1 - Purchase price
            $('#input_' + gform_id + '_19').val(response.option1.purchase_price);

            //option2 - Purchase price
            $('#input_' + gform_id + '_30').val(response.option2.purchase_price);
          
            //option3 - Purchase price
            $('#input_' + gform_id + '_43').val(response.option3.purchase_price);
        });
    }

    //run the function the first time the page loads
    do_calculate();

    //listen for input change and run the function again
    $('.gform_body li:not(.gf_readonly,.user_data) input').keyup(function () {
        delay(function () {
            do_calculate();
        }, 1500);
    });

});
