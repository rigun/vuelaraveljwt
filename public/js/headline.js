$(document).ready(function() {
    $(".js-hl-big").slick({
        autoplay: !0,
        slidesToShow: 1,
        autoplaySpeed: 1e4,
        pauseOnFocus: !0,
        fade: !0,
        arrows: !1,
        cssEase: "ease",
        asNavFor: ".js-hl-thumb"
    }), $(".js-hl-thumb").slick({
        asNavFor: ".js-hl-big",
        slidesToShow: 4,
        focusOnSelect: !0
    }), $(".js-photo-wp").slick({
        autoplay: !0,
        autoplaySpeed: 9e3,
        slidesToShow: 1,
        dots: !0,
        pauseOnFocus: !0,
        prevArrow: "<a href='#' class='icon-photo-slider icon-photo-left'><svg class='icon icon-angle-left'><use xlink:href='#icon-angle-left'/></svg></a>",
        nextArrow: "<a href='#' class='icon-photo-slider icon-photo-right'><svg class='icon icon-angle-right'><use xlink:href='#icon-angle-right'/></svg></a>"
    }), $(".js-gramedia").slick({
        autoplay: !0,
        slidesToShow: 1,
        autoplaySpeed: 1e4,
        pauseOnFocus: !0,
        fade: !0,
        dots: !0,
        arrows: !1,
        cssEase: "ease"
    }), $(window).scroll(function() {
        var s = $(window).scrollTop(),
            t = $(".header").outerHeight();
        $(".nav").outerHeight();
        s > t + 20 ? ($(".header").addClass("header--sticky"), $(".nav").addClass("nav--sticky"), $(".js-nav-offset").css({
            "padding-top": "47px"
        }), $(".js-kcm-stick").addClass("kcm__stick--sticky")) : ($(".header").removeClass("header--sticky"), $(".nav").removeClass("nav--sticky"), $(".js-nav-offset").removeAttr("style"), $(".js-kcm-stick").removeClass("kcm__stick--sticky"))
    }), $(".js-giant-wp-sticky").stick_in_parent({
        parent: ".js-giant-wp-sticky-parent",
        inner_scrolling: !1,
        spacer: !1,
        offset_top: 60
    }).on("sticky_kit:bottom", function(s) {
        $(this).parent().parent().css("position", "static")
    }).on("sticky_kit:unbottom", function(s) {
        $(this).parent().parent().removeAttr("style")
    }), $(".js-breaking").marquee({
        pauseOnHover: !0,
        allowCss3Support: !1,
        duration: 8e3,
        gap: 100,
        duplicated: !0
    }), $(".js-kcm-horizontal").click(function(s) {
        s.stopPropagation(), s.preventDefault(), $(".kcm__horizontal").hide()
    }), $(".video__playlist__link").click(function() {
        $(".video__playlist__link").removeClass("video__playlist__link--active"), $(this).addClass("video__playlist__link--active"), $("#video-play").attr("src", $(this).attr("data-video"))
    }), $('[data-type="tooltips"]').each(function() {
        var s = $(this).data("text"),
            t = $(this).data("placement");
        $(this).append('<div class="tooltips tooltips--' + t + '"><span>' + s + "</span></div>"), $(this).on("mouseover", function(s) {
            s.preventDefault(), $(this).find(".tooltips").toggleClass("tooltips--show")
        }), $(this).on("mouseout", function(s) {
            s.preventDefault(), $(this).find(".tooltips").toggleClass("tooltips--show")
        })
    }), $(".logo__awards").length > 0 && $(".logo__awards").slick({
        autoplay: !0,
        slidesToShow: 1,
        autoplaySpeed: 5e3,
        pauseOnFocus: !0,
        fade: !0,
        arrows: !1,
        cssEase: "ease"
    }), $("#btn-load-more").click(function() {
        var s = this;
        $(this).hide(), $(this).parent().append('<div id="load-more-loading" style="text-align:center;"><img src="https://asset.kompas.com/data/2017/wp/images/loading.gif"></div>'), $.ajax({
            url: $(this).attr("data-url") + "/" + $(this).attr("data-page"),
            type: "post",
            dataType: "json",
            success: function(t) {
                $($(s).attr("data-append")).append(t.result), t.status && ($(s).attr("data-page", t.page), $(s).show()), $("#load-more-loading").remove()
            }
        })
    })
});
