(function($) {
   $(document).ready(function() {
    $(document).on('submit', '#itoForm', function (e) {
      e.preventDefault();
     let data = $(this).serialize();
      $.ajax({
        url: wpAjax.ajaxUrl,
        data: {action: 'filter'}, data,
        type: 'post',
        success: (result) => {
          $('[data-js-filter=target]').html(result);
        },
        error: (result) => {
          console.log(result)
        }
      });
    })
   })
})(jQuery);