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
          if(result) {
            $('[data-js-filter=target]').html(
              `
              <div class="d-flex justify-content-center results-loading">
                <div class="spinner-border" role="status">
                  <span class="sr-only">Loading...</span>
                </div>
              </div>
              <p>Loading...</p>
              `
            );
            setTimeout(function() {
              $('[data-js-filter=target]').html(result);
            }, 2000);
          }
        },
        error: (result) => {
          console.log(result);
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
      $('.episode-info-title h5').html($(this).data('episode-title'));
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

/** WHERE TO WATCH */
(function($){
  /** WHERE TO WATCH */
  $(document).on('submit', '#broadcastForm', function (e) {
    e.preventDefault();
    let data = $(this).serialize();
    
    $.ajax({
      url: wpAjax.ajaxUrl,
      data: data,
      type: 'post',
      success: (result) => {
        $('.broadcast-results').html(result);
      },
      error: (result) => {
        console.log(result)
      }
    });
  });

  $('.form-select').on('change', function() {
    $('#broadcastForm').submit();
  });
})(jQuery);

// testing modal
(function($) {
  $(document).ready(function () {
    $('.external-link').click(function (e) {
        e.preventDefault();
      
        // let link = $(e.currentTarget).attr('href');
        // console.log('this is the link', link);
        document.getElementById( "btnContinue" ).setAttribute( "onClick", (       "javascript:window.location.href=\"" + $(e.currentTarget).attr('href') + "\"") );


        $('#myModal').modal('show');
    });
});
})(jQuery);