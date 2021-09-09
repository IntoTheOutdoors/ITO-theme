// JQUERY

// episode search form
(function ($) {
  $(document).on("submit", "#itoForm", function (e) {
    e.preventDefault();
    let data = $(this).serialize();

    $.ajax({
      url: wpAjax.ajaxUrl,
      data: { action: "filter" },
      data,
      type: "post",
      beforeSend: function () {
        $("[data-js-filter=target]").html(
          `
            <div class="d-flex justify-content-center results-loading">
              <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span><br>
              </div>
              <p>Loading...</p>
            </div>
          `
        );
      },
      complete: function () {
        $(".results-loading").hide();
      },
      success: (result) => {
        $("[data-js-filter=target]").html(result);
      },
      error: (result) => {
        console.log(result);
      },
    });
  });

  $("#itoReset").on("click", function (e) {
    e.preventDefault();

    let data = $(this).val();
    $.ajax({
      url: wpAjax.ajaxUrl,
      data: { action: "reset", data },
      type: "post",
      success: (result) => {
        $("[data-js-filter=target]").html(result);
      },
      error: (result) => {
        console.log("erorr occured somewhere", result);
      },
    });
    $("#itoForm")[0].reset();
  });
})(jQuery);

// single topics page
(function ($) {
  $(".load-video").on("click", function (e) {
    e.stopPropagation();
    $(".episode-player").html($(this).data("video-embed"));
    $(".episode-info-title h5").html($(this).data("episode-title"));
    $(".episode-info-title h5").html($(this).data("curriculum-title"));
  });

  $("#itoForm").on("click", function () {
    $("#itoForm").submit();
  });

  $("#episode-category :selected").on("click", function () {
    $("#itoForm").submit();
  });

  $("#myTab a").on("click", function (e) {
    e.preventDefault();
    $(this).tab("show");
  });

  $(".load-details").on("click", function (e) {
    e.preventDefault();

    let video_id = $(this).attr("data-video-id");

    $.ajax({
      url: wpAjax.ajaxUrl,
      data: { action: "overview", video_id },
      type: "post",
      beforeSend: function () {
        $("#home").html(
          `
            <div class="d-flex justify-content-center results-loading">
              <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span><br>
              </div>
              <p>Loading...</p>
            </div>
          `
        );
      },
      success: (result) => {
        $("#home").html(result);
      },
      error: (result) => {
        console.log(result);
      },
    });
  });

  $(".load-resources").on("click", function (e) {
    e.preventDefault();

    let video_id = $(this).attr("data-video-id");
    let topic_id = $(this).attr("data-topic-id");

    $.ajax({
      url: wpAjax.ajaxUrl,
      data: { action: "additional_resources", video_id, topic_id },
      type: "post",
      beforeSend: function () {
        $("#resources").html(
          `
            <div class="d-flex justify-content-center results-loading">
              <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span><br>
              </div>
              <p>Loading...</p>
            </div>
          `
        );
      },
      success: (result) => {
        $("#resources").html(result);
      },
      error: (result) => {
        console.log(result);
      },
    });
  });
})(jQuery);

/** WHERE TO WATCH */
(function ($) {
  $(document).on("submit", "#broadcastForm", function (e) {
    e.preventDefault();
    let data = $(this).serialize();

    $.ajax({
      url: wpAjax.ajaxUrl,
      data: data,
      type: "post",
      success: (result) => {
        $(".broadcast-results").html(result);
      },
      error: (result) => {
        console.log(result);
      },
    });
  });

  $(".form-select").on("change", function () {
    $("#broadcastForm").submit();
  });
})(jQuery);

// Modal Click
(function ($) {
  $(document).ready(function () {
    $(".external-link").on("click", function (e) {
      e.preventDefault();
      $("#myModal").modal("show");
      // let link = $(e.currentTarget).attr("href");
      // console.log("this is the link", link);
      document
        .getElementById("btnContinue")
        .setAttribute(
          "onClick",
          'javascript:window.location.href="' +
            $(e.currentTarget).attr("href") +
            '"'
        );
    });
  });
})(jQuery);

// Singnup modal
(function ($) {
  $(document).ready(function () {
    $("#singupModal").click(function (e) {
      e.preventDefault();

      // let link = $(e.currentTarget).attr('href');
      // console.log('this is the link', link);
      document
        .getElementById("btnContinue")
        .setAttribute(
          "onClick",
          'javascript:window.location.href="' +
            $(e.currentTarget).attr("href") +
            '"'
        );

      $("#singupModal").modal("show");
    });
  });
})(jQuery);
