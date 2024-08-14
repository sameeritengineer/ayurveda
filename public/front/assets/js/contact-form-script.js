!(function (e) {
    "use strict";
    function t() {
        e("#contactForm")
            .removeClass()
            .addClass("shake animated")
            .one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend", function () {
                e(this).removeClass();
            });
    }
    function a(t, a) {
        if (t) var n = "h4 text-left tada animated text-success";
        else n = "h4 text-left text-danger";
        e("#msgSubmit").removeClass().addClass(n).text(a);
    }
    e("#contactForm")
        .validator()
        .on("submit", function (n) {
            var s, i, o, m, r, x;
            n.isDefaultPrevented()
                ? (t(), a(!1, "Did you fill in the form properly?"))
                : (n.preventDefault(),
                  (s = e("#name").val()),
                  (i = e("#email").val()),
                  (o = e("#msg_subject").val()),
                  (m = e("#phone_number").val()),
                  (r = e("#message").val()),
                  (x = e("#posturl").val()),
                  e(".preloader").show(),
                  e.ajax({
                      type: "POST",
                      url: x,
                      data: "name=" + s + "&email=" + i + "&phone_number=" + m + "&msg_subject=" + o + "&message=" + r,
                      success: function (n) {
                        if(n.status == 'success'){
                            showToast('success','Thank you for getting in touch! We have received your message and will get back');
                            e("#contactForm")[0].reset();
                            e(".preloader").hide()
                            e("#msgSubmit").hide()
                        }else{
                            showToast('error','Something went Wrong');
                        }
                          //"success" == n ? (e("#contactForm")[0].reset(), a(!0, "Message Submitted!")) : (t(), a(!1, n));
                      },
                  }));
        });
})(jQuery);
