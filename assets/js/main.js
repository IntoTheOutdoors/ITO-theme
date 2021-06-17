
// JQUERY
(function($) {
    $(document).on('submit', '#itoForm', function (e) {
      e.preventDefault();
     let data = $(this).serialize();
     
      $.ajax({
        url: wpAjax.ajaxUrl,
        data: {action: 'filter'}, data,
        type: 'post',
        success: (result) => {
          // console.log(result);
          $('[data-js-filter=target]').html(result);
        },
        error: (result) => {
          console.log(result)
        }
      });
    })

    $('#itoReset').on('click', function(e) {
      e.preventDefault();

      let data = $(this).val();
      $.ajax({
        url: wpAjax.ajaxUrl,
        data: {action: 'reset', data},
        type: 'post',
        success: (result) => {
          $('[data-js-filter=target]').html(result);
        },
        error: (result) => {
          console.log('erorr occured somewhere', result);
        }
      });
      $('#itoForm')[0].reset();
    });

    $('.load-video').on('click', function() {
      $('.episode-player').html($(this).data('video-embed'));
      $('.episode-info-title h3').html($(this).data('episode-title'));
    });

    $('#itoForm').on('click', function() {  
      $('#itoForm').submit();
    });

    $('#episode-category :selected').on('click', function() {
      $('#itoForm').submit();
    });

    $('#myTab a').on('click', function (e) {
      e.preventDefault()
      $(this).tab('show')
    })
})(jQuery);
