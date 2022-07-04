(function ($) {
	"use strict";

	child_theme();

	function child_theme() {
		let $notice = $("#child-theme-text");

		function ajax_callback(r) {
			if (typeof r.done !== "undefined") {
				console.log(r);
				$notice.show();
				$notice.addClass("notice-success");
				$notice.html(r.message);
			}
		}

		$(".ona-install-child-theme").on("click", function (e) {
			e.preventDefault();
			let _this = $(this);
			let slug = _this.data("theme");

			_this.html(ona_params.processing).attr("disabled", true);

			// Get data from the repo
			$.ajax({
				dataType: "json",
				url:
					"https://api.wordpress.org/themes/info/1.1/?action=theme_information&request[slug]=" +
					slug,
				success: function (data, status, xhr) {
					$.post(
						ona_params.ajaxurl,
						{
							action: "ona_activate_child_theme",
							wpnonce: ona_params.wpnonce,
							slug: slug,
							download_link: data.download_link,
						},
						ajax_callback
					)
						.done(function () {
							_this
								.html(ona_params.finished)
								.attr("disabled", true)
								.css({ cursor: "not-allowed", "pointer-events": "none" });

							location.reload();
						})
						.fail(ajax_callback);
				},
			});
		});
	}
})(jQuery);
