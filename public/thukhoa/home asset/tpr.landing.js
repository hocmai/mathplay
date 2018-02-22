var tpr = tpr || {};
tpr.util = function() {
    "use strict";

    function a(a) {
        var b = new RegExp(a + "=([^&]*)", "i").exec(window.location.search);
        return b && unescape(b[1]) || ""
    }

    function b(a) {
        for (var b, c = {}, d = a.split("&"), e = 0; e < d.length; e++) b = d[e].split("="), c[b[0]] = b[1];
        return c
    }

    function c(a, b) {
        var c = "",
            d = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
        a = a || 6, b = b || "rand_";
        for (var e = 0; a > e; e++) c += d.charAt(Math.floor(Math.random() * d.length));
        return b + c + parseInt(Date.now()).toString(32)
    }

    function d(a) {
        a || (a = $(document));
        var b = a.find(".js-countDownTimer");
        b.length && b.each(function() {
            e($(this))
        })
    }

    function e(a, b) {
        var c = parseInt(a.data("seconds") || 0);
        if (c) {
            var d = a.find(".js-day"),
                e = a.find(".js-hour"),
                f = a.find(".js-minute"),
                g = a.find(".js-seconds"),
                h = new CountdownTimer({
                    seconds: c,
                    onTick: function() {
                        d.length && (h.fDays ? d.text(h.fDays).show() : d.hide()), e.text(h.fHours), f.text(h.fHMins), g.text(h.fSecs)
                    },
                    onComplete: function() {
                        b && b()
                    }
                });
            h.start()
        }
    }
    return {
        getUrlParam: a,
        getURIParams: b,
        genRandID: c,
        startCountdownTimers: d,
        startCountdownTimer: e
    }
}();
var tpr = tpr || {};
tpr.cfg = function() {
        "use strict";

        function a(a) {
            return d.hasOwnProperty(a)
        }

        function b(b, c) {
            return a(b) ? d[b] : "undefined" != typeof c ? c : void 0
        }

        function c(a, b) {
            d[a] = b
        }
        var d = {},
            e = {};
        return e = function(a, d) {
            return 1 === arguments.length ? b(a) : void(2 === arguments.length && c(a, d))
        }, e.get = b, e.set = c, e
    }(), tpr.store = tpr.cfg, tpr.config = tpr.cfg, tpr.track = function() {
        "use strict";

        function a(a) {
            a = _.extend({
                category: !1,
                action: "clicked",
                label: !1,
                value: !1
            }, a || {}), a.category && a.label && "undefined" != typeof ga && ga("send", "event", a.category, a.action, a.label, a.value)
        }

        function b(a, b) {
            a && "undefined" != typeof nudgespot && ((_.isUndefined(b) || !_.isObject(b)) && (b = {}), nudgespot.track(a, b))
        }

        function c(a, b) {
            a && "undefined" != typeof ll && ((_.isUndefined(b) || !_.isObject(b)) && (b = {}), ll("tagEvent", a, b))
        }

        function d(a) {
            return a.replace(/\s+/g, "_").toLowerCase()
        }

        function e(e) {
            if (e && "object" != typeof e) try {
                e = $.parseJSON(e)
            } catch (f) {
                e = !1
            }
            if (e) {
                if (_.has(e, "ga") && a(e.ga), _.has(e, "ns")) {
                    var g = e.ns.e || !1,
                        h = _.omit(e.ns, "e");
                    b(g, h)
                }
                if (_.has(e, "ll")) {
                    var i = e.ll.e || !1,
                        j = _.omit(e.ll, "e");
                    c(i, j)
                }
                if (_.has(e, "ev")) {
                    var k = e.ev.e || !1,
                        l = _.omit(e.ev, "e");
                    c(k, l), b(d(k), l)
                }
            }
        }
        var f = ".-trk",
            g = ".-ctrk";
        return $(document).on("click", f, function(a) {
            var b = $(a.target).closest(f),
                c = b.data("trk") || !1;
            e(c)
        }), $(document).on("click", g, function(a) {
            var b = $(a.target).closest(g),
                c = b.data("trk");
            c && _.isFunction(Cookies) && Cookies.set("_ctrk", JSON.stringify(c), {
                expires: 30
            })
        }), $(function() {
            if (_.isFunction(Cookies)) {
                var a = Cookies.get("_ctrk") || !1;
                if (Cookies.expire("_ctrk"), a && "object" != typeof a) try {
                    a = $.parseJSON(a)
                } catch (b) {
                    a = !1
                }
                a && e(a)
            }
        }), {
            sendEvent: e,
            sendGAEvent: a,
            sendNSEvent: b,
            sendLLEvent: c
        }
    }(),
    function() {
        var a = ".-ref",
            b = {
                logotop: {
                    category: "Logo",
                    label: "top"
                },
                logobtm: {
                    category: "Logo",
                    label: "bottom"
                },
                engtop: {
                    category: "Courses",
                    label: "Engineering-top"
                },
                medtop: {
                    category: "Courses",
                    label: "Medical-top"
                },
                fndtop: {
                    category: "Courses",
                    label: "Foundation-top"
                },
                pricingtop: {
                    category: "Links",
                    label: "Pricing-top"
                },
                apptop: {
                    category: "Links",
                    label: "App-top"
                },
                blogtop: {
                    category: "Links",
                    label: "Blog-top"
                },
                bytestop: {
                    category: "Links",
                    label: "Bytes-top"
                },
                discusstop: {
                    category: "Links",
                    label: "Discuss-top"
                },
                engbtm: {
                    category: "Courses",
                    label: "Engineering-bottom"
                },
                medbtm: {
                    category: "Courses",
                    label: "Medical-bottom"
                },
                fndbtm: {
                    category: "Courses",
                    label: "Foundation-bottom"
                },
                tsbtm: {
                    category: "Courses",
                    label: "Test-series-bottom"
                },
                pricingbtm: {
                    category: "Courses",
                    label: "Pricing-bottom"
                },
                parentsbtm: {
                    category: "Links",
                    label: "Parents-bottom"
                },
                teachersbtm: {
                    category: "Links",
                    label: "Teachers-bottom"
                },
                teambtm: {
                    category: "Courses",
                    label: "Team-bottom"
                },
                blogbtm: {
                    category: "Courses",
                    label: "Blog-bottom"
                },
                bytesbtm: {
                    category: "Courses",
                    label: "Bytes-bottom"
                },
                discussbtm: {
                    category: "Courses",
                    label: "Discuss-bottom"
                },
                contactbtm: {
                    category: "Courses",
                    label: "Contact-bottom"
                },
                faqbtm: {
                    category: "Courses",
                    label: "FAQ-bottom"
                },
                jobsbtm: {
                    category: "Courses",
                    label: "Jobs-bottom"
                },
                smebtm: {
                    category: "Courses",
                    label: "SME-bottom"
                },
                tosbtm: {
                    category: "Courses",
                    label: "Terms-bottom"
                },
                ppbtm: {
                    category: "Courses",
                    label: "Privacy-policy-bottom"
                },
                jobabt: {
                    category: "Courses",
                    label: "Jobs-AboutUs"
                },
                exp_eng_home: {
                    category: "Explore",
                    action: "Explore Course",
                    label: "Enggineering-Home"
                },
                exp_med_home: {
                    category: "Explore",
                    action: "Explore Course",
                    label: "Medical-Home"
                },
                exp_fnd_home: {
                    category: "Explore",
                    action: "Explore Course",
                    label: "Foundation-Home"
                },
                exp_eng_course: {
                    category: "Explore",
                    action: "Explore Course",
                    label: "Enggineering-Course Page"
                },
                exp_med_course: {
                    category: "Explore",
                    action: "Explore Course",
                    label: "Medical-Course Page"
                },
                exp_fnd_course: {
                    category: "Explore",
                    action: "Explore Course",
                    label: "Foundation-Course Page"
                },
                exp_eng_parents: {
                    category: "Explore",
                    action: "Explore Course",
                    label: "Enggineering-Parents"
                },
                exp_med_parents: {
                    category: "Explore",
                    action: "Explore Course",
                    label: "Medical-Parents"
                },
                exp_fnd_parents: {
                    category: "Explore",
                    action: "Explore Course",
                    label: "Foundation-Parents"
                },
                exp_eng_modal: {
                    category: "Explore",
                    action: "Explore Course",
                    label: "Enggineering-Modal"
                },
                exp_med_modal: {
                    category: "Explore",
                    action: "Explore Course",
                    label: "Medical-Modal"
                },
                exp_fnd_modal: {
                    category: "Explore",
                    action: "Explore Course",
                    label: "Foundation-Modal"
                },
                learn_more_eng: {
                    category: "Courses",
                    label: "Engineering-LM"
                },
                learn_more_med: {
                    category: "Courses",
                    label: "Medical-LM"
                },
                learn_more_fnd: {
                    category: "Courses",
                    label: "Foundation-LM"
                },
                signup_em_page: {
                    category: "Signedup",
                    action: "Signup mode",
                    label: "Email-page"
                },
                login_em_page: {
                    category: "Loggedin",
                    action: "Login Mode",
                    label: "Email-page"
                },
                signup_em_m_page: {
                    category: "Signedup",
                    action: "Signup mode",
                    label: "Email-page"
                },
                login_em_m_page: {
                    category: "Loggedin",
                    action: "Login Mode",
                    label: "Email-page"
                },
                signup_em_m_top: {
                    category: "Signedup",
                    action: "Signup mode",
                    label: "Email-top"
                },
                login_em_m_top: {
                    category: "Loggedin",
                    action: "Login Mode",
                    label: "Email-top"
                },
                signup_em_m_btm: {
                    category: "Signedup",
                    action: "Signup mode",
                    label: "Email-bottom"
                },
                login_em_m_btm: {
                    category: "Loggedin",
                    action: "Login Mode",
                    label: "Email-bottom"
                },
                signup_em_m_feature: {
                    category: "Signedup",
                    action: "Signup mode",
                    label: "Email-feature"
                },
                login_em_m_feature: {
                    category: "Loggedin",
                    action: "Login Mode",
                    label: "Email-feature"
                },
                signup_em_m_pricing: {
                    category: "Signedup",
                    action: "Signup mode",
                    label: "Email-pricing"
                },
                login_em_m_pricing: {
                    category: "Loggedin",
                    action: "Login Mode",
                    label: "Email-pricing"
                },
                signup_em_referral: {
                    ga: {
                        category: "Signedup",
                        action: "Signup Mode",
                        label: "Email-referral"
                    }
                },
                signup_fb_page: {
                    category: "Signedup",
                    action: "Signup mode",
                    label: "FB-page"
                },
                login_fb_page: {
                    category: "Loggedin",
                    action: "Login Mode",
                    label: "FB-page"
                },
                signup_fb_m_page: {
                    category: "Signedup",
                    action: "Signup mode",
                    label: "FB-page"
                },
                login_fb_m_page: {
                    category: "Loggedin",
                    action: "Login Mode",
                    label: "FB-page"
                },
                signup_fb_m_top: {
                    category: "Signedup",
                    action: "Signup mode",
                    label: "FB-top"
                },
                login_fb_m_top: {
                    category: "Loggedin",
                    action: "Login Mode",
                    label: "FB-top"
                },
                signup_fb_m_btm: {
                    category: "Signedup",
                    action: "Signup mode",
                    label: "FB-bottom"
                },
                login_fb_m_btm: {
                    category: "Loggedin",
                    action: "Login Mode",
                    label: "FB-bottom"
                },
                signup_fb_m_feature: {
                    category: "Signedup",
                    action: "Signup mode",
                    label: "FB-feature"
                },
                login_fb_m_feature: {
                    category: "Loggedin",
                    action: "Login Mode",
                    label: "FB-feature"
                },
                signup_fb_m_pricing: {
                    category: "Signedup",
                    action: "Signup mode",
                    label: "FB-pricing"
                },
                login_fb_m_pricing: {
                    category: "Loggedin",
                    action: "Login Mode",
                    label: "FB-pricing"
                },
                signup_fb_referral: {
                    ga: {
                        category: "Signedup",
                        action: "Signup Mode",
                        label: "FB-referral"
                    }
                },
                signup_g_page: {
                    category: "Signedup",
                    action: "Signup mode",
                    label: "Gmail-page"
                },
                login_g_page: {
                    category: "Loggedin",
                    action: "Login Mode",
                    label: "Gmail-page"
                },
                signup_g_m_page: {
                    category: "Signedup",
                    action: "Signup mode",
                    label: "Gmail-modal"
                },
                login_g_m_page: {
                    category: "Loggedin",
                    action: "Login Mode",
                    label: "Gmail-modal"
                },
                signup_g_m_top: {
                    category: "Signedup",
                    action: "Signup mode",
                    label: "Gmail-top"
                },
                login_g_m_top: {
                    category: "Loggedin",
                    action: "Login Mode",
                    label: "Gmail-top"
                },
                signup_g_m_btm: {
                    category: "Signedup",
                    action: "Signup mode",
                    label: "Gmail-bottom"
                },
                login_g_m_btm: {
                    category: "Loggedin",
                    action: "Login Mode",
                    label: "Gmail-bottom"
                },
                signup_g_m_feature: {
                    category: "Signedup",
                    action: "Signup mode",
                    label: "Gmail-feature"
                },
                login_g_m_feature: {
                    category: "Loggedin",
                    action: "Login Mode",
                    label: "Gmail-feature"
                },
                signup_g_m_pricing: {
                    category: "Signedup",
                    action: "Signup mode",
                    label: "Gmail-pricing"
                },
                login_g_m_pricing: {
                    category: "Loggedin",
                    action: "Login Mode",
                    label: "Gmail-pricing"
                },
                signup_g_referral: {
                    ga: {
                        category: "Signedup",
                        action: "Signup Mode",
                        label: "Gmail-referral"
                    }
                },
                signup_g_m_modal: {
                    category: "Signedup",
                    action: "Signup mode",
                    label: "Gmail-modal"
                },
                login_g_m_modal: {
                    category: "Loggedin",
                    action: "Login Mode",
                    label: "Gmail-modal"
                },
                signup_fb_m_modal: {
                    category: "Signedup",
                    action: "Signup mode",
                    label: "FB-modal"
                },
                login_fb_m_modal: {
                    category: "Loggedin",
                    action: "Login Mode",
                    label: "FB-modal"
                },
                signup_em_m_modal: {
                    category: "Signedup",
                    action: "Signup mode",
                    label: "Email-modal"
                },
                login_em_m_modal: {
                    category: "Loggedin",
                    action: "Login Mode",
                    label: "Email-modal"
                },
                forgotpass_page: {
                    category: "Password",
                    action: "Submit Email",
                    label: "Forgot-Password-page"
                },
                forgotpass_m_page: {
                    category: "Password",
                    action: "Submit Email",
                    label: "Forgot-Password-modal"
                },
                forgotpass_m_modal: {
                    category: "Password",
                    action: "Submit Email",
                    label: "Forgot-Password-modal"
                },
                forgotpass_m_top: {
                    category: "Password",
                    action: "Submit Email",
                    label: "Forgot-Password-top"
                },
                forgotpass_m_btm: {
                    category: "Password",
                    action: "Submit Email",
                    label: "Forgot-Password-bottom"
                },
                forgotpass_m_feature: {
                    category: "Password",
                    action: "Submit Email",
                    label: "Forgot-Password-feature"
                },
                forgotpass_m_pricing: {
                    category: "Password",
                    action: "Submit Email",
                    label: "Forgot-Password-pricing"
                },
                bytes_post_cta_end: {
                    category: "Bytes Article",
                    label: "Article CTA"
                },
                bytes_signed_up_form: {
                    category: "Signedup",
                    action: "Click Signup",
                    label: "Email Signup_Bytes Form"
                },
                bytes_signed_up_fb: {
                    category: "Signedup",
                    action: "Click Signup",
                    label: "FB Signup_Bytes Form"
                },
                bytes_signed_up_topheader: {
                    category: "Signedup",
                    action: "Click Signup",
                    label: "Header Sign up_Bytes"
                }
            };
        $(document).on("click", a, function(b) {
            var c = $(b.target).closest(a);
            Cookies.set("ref_src", c.data("ref"), {
                expires: 30
            })
        }), $(function() {
            var a;
            if ("function" == typeof Cookies) {
                if (a = Cookies.get("ref_src"), Cookies.expire("ref_src"), "undefined" == typeof a) return;
                if (b.hasOwnProperty(a)) {
                    var c = b[a];
                    tpr.track.sendGAEvent(c)
                }
            }
        })
    }();
var tpr = tpr || {};
tpr.tpl = function() {
    "use strict";

    function a(a, b) {
        a && _.isString(a) && (e[a] = swig.compile(b || ""))
    }

    function b(a) {
        return e.hasOwnProperty(a) ? e[a] : !1
    }

    function c(a, c) {
        var d = b(a);
        return c = c || {}, d ? d(c) : ""
    }

    function d() {
        var b = $(".tpl-raw");
        b.length && b.each(function(b) {
            var c = $(this).data("tpl"),
                d = $(this).html();
            a(c, d)
        })
    }
    var e = {};
    return $(document).ready(d), {
        add: a,
        get: b,
        build: c
    }
}();
var tpr = tpr || {};
tpr.xhrPool = function() {
    "use strict";

    function a(a) {
        $._xhrPool.newRequest(a)
    }

    function b(a) {
        $._xhrPool.removeRequest(a)
    }

    function c() {
        $._xhrPool.abortAll()
    }
    return $._xhrPool = [], $._xhrPool.newRequest = function(a) {
        $._xhrPool.abortAll(), $._xhrPool.push(a)
    }, $._xhrPool.removeRequest = function(a) {
        var b = $._xhrPool.indexOf(a);
        b > -1 && $._xhrPool.splice(b, 1)
    }, $._xhrPool.abortAll = function() {
        $(this).each(function(a, b) {
            b.abort()
        }), $._xhrPool.length = 0
    }, {
        newRequest: a,
        removeRequest: b,
        abortAll: c
    }
}();
var tpr = tpr || {};
tpr.onClick = function() {
    "use strict";

    function a(a) {
        return !a || /\s/.test(a) ? !1 : !0
    }

    function b(a) {
        return d.hasOwnProperty(a)
    }

    function c(a, c) {
        var e = $(a.target).closest(c),
            f = e.data("s") || !1;
        if (f && b(f)) {
            var g = d[f];
            if (g.callback) {
                var h = e.data("sdata") || !1;
                if (h && "object" != typeof h) try {
                    h = $.parseJSON(h)
                } catch (i) {
                    h = !1
                }
                g.callback(a, e, h)
            }
            var j = g.config || {};
            j.disable_preventDefault || a.preventDefault(), j.disable_stopPropagation || a.stopPropagation()
        }
    }
    var d = {},
        e = ".-ct";
    return $(document).on("click", e, function(a) {
            c(a, e)
        }),
        function(c, e, f) {
            if (a(c) && !b(c)) {
                var g = {};
                e && (g.callback = e), f && (g.config = f), d[c] = g
            }
        }
}(), tpr.pageLoader = function() {
    "use strict";

    function a() {
        NProgress.start()
    }

    function b() {
        NProgress.done()
    }

    function c(a, d) {
        if (d || (d = 1), !(d >= p)) {
            if (!n) return void setTimeout(function() {
                c(a, ++d)
            }, o);
            n = !1, b(), k.html(a), setTimeout(function() {
                k.removeClass("loading");
                var a = k.find(".js-page-breadcrumb").html() || "";
                $("#page_breadcrumbs_wrapper").html(a), tpr.web.fixPageTabsOnScroll();
                var b = location.pathname;
                "undefined" != typeof ga && ga("send", "pageview", b), "undefined" != typeof nudgespot && nudgespot.track("pageview", {
                    page: b
                })
            }, 100)
        }
    }

    function d(a) {
        var b = '<div class="pageError"><div class="container"><h1 class="pageError_title">Oops!</h1>';
        b += '<div class="pageError_msg">Some error occurred while loading the page</div>', b += '<div class="pageError_text"><a href="' + a + '">Try again</a></div></div></div>', c(b)
    }

    function e(a) {
        $.ajax({
            type: "GET",
            url: a,
            cache: !1,
            beforeSend: function(a) {
                tpr.xhrPool.newRequest(a)
            },
            success: function(a, b, d) {
                tpr.xhrPool.removeRequest(d), c(a), setTimeout(function() {
                    $("html, body").animate({
                        scrollTop: 0
                    }, 100)
                }, 500)
            },
            error: function(b, c, e) {
                "abort" === c || d(a)
            }
        })
    }

    function f(b) {
        n = !1, e(b), location.href != b && history.pushState({}, "", b), k.addClass("loading"), a(), setTimeout(function() {
            n = !0
        }, 500)
    }

    function g() {
        $(window).on("popstate", function(a) {
            q && location.href && "#" != location.href && f(location.href)
        }), setTimeout(function() {
            q = !0
        }, 2e3)
    }

    function h() {
        k = $("#page_content_wrapper"), l = $("#page_loading_indicator"), _.has(window, "NProgress") && NProgress.configure({
            showSpinner: !1
        }), g(), $(document).on("click", m, function(a) {
            if (!r) {
                var b = $(a.target).closest(m),
                    c = b.attr("href");
                c && (a.preventDefault(), a.stopPropagation(), f(c), tpr.web.closeSidebar())
            }
        })
    }

    function i() {
        r = !0
    }

    function j() {
        r = !1
    }
    var k, l, m = ".-ajaxify",
        n = !1,
        o = 200,
        p = 25,
        q = !1,
        r = !1;
    return $(h), {
        disable: i,
        enable: j
    }
}();
var tpr = tpr || {};
tpr.modal = function() {
    "use strict";

    function a() {
        var a = tpr.util.genRandID(6, "md_");
        return l.push(a), a
    }

    function b(a) {
        var b = _.indexOf(l, a);
        b > -1 && l.splice(b, 1)
    }

    function c() {
        l.length = 0
    }

    function d(b) {
        var c = b.ctx || {};
        if (c.modal_id = a(), c._needs_course_data) {
            var d = tpr.cfg.get("COURSES", !1);
            if (d)
                if ("object" == typeof d) c.COURSES = d;
                else {
                    d = d.replace(/(\r\n|\n|\r)/gm, " ");
                    try {
                        d = $.parseJSON(d), d = d.COURSES, tpr.cfg.set("COURSES", d), c.COURSES = d
                    } catch (e) {}
                }
        }
        j.append(tpr.tpl.build(b.tpl, c));
        var f = j.find("#" + c.modal_id);
        setTimeout(function() {
            k.addClass("is-visible"), f.addClass("is-visible"), $("body,html").css("overflow", "hidden"), f.data("modal_id", c.modal_id), b.callback && b.callback(f, c.modal_id, c), "undefined" != typeof ga && ga("send", "pageview", "pageview:modal-" + b.tpl)
        }, 0)
    }

    function e() {
        return l.length
    }

    function f(a) {
        if (a && !(a.length <= 0)) {
            var c = a.attr("id") || a.data("modal_id");
            c && b(c), a.removeClass("is-visible"), e() <= 1 && (k.removeClass("is-visible"), $("body,html").css("overflow", "visible")), setTimeout(function() {
                a.remove()
            }, 500)
        }
    }

    function g() {
        var a = j.find(".md");
        c(), a.length && (a.removeClass("is-visible"), setTimeout(function() {
            a.remove()
        }, 500)), k.removeClass("is-visible"), $("body,html").css("overflow", "visible")
    }

    function h() {
        $(document).on("click", m, function(a) {
            a.preventDefault(), a.stopPropagation();
            var b = $(this).closest(".md");
            f(b)
        }), k.click(g)
    }

    function i() {
        j = $("#modals_wrapper"), k = $("#modals_overlay"), h()
    }
    var j, k, l = [],
        m = ".js-md-close";
    return $(i), {
        open: d,
        close: f,
        close_all: g
    }
}(), tpr.account = function() {
    "use strict";

    function a(a) {
        tpr.modal.close_all(), a = _.extend(a || {}, {
            _needs_course_data: !0
        }), tpr.modal.open({
            tpl: "modal_signup",
            ctx: a,
            callback: function(a, b, c) {
                var d = a.find(".js-step-courses"),
                    e = a.find(".js-step-details"),
                    f = a.find(".js-btn-back"),
                    g = e.find(".js-course-heading"),
                    h = e.find("form"),
                    i = h.find("input[name='course']"),
                    j = h.find("input[name='name']"),
                    k = e.find(".js-btn-fb"),
                    l = e.find(".js-btn-gp");
                setTimeout(function() {
                    j.focus()
                }, 100), d.on("click", ".js-course-item", function(a) {
                    a.preventDefault();
                    var b = $(a.target).closest(".js-course-item"),
                        c = b.data("name"),
                        m = b.data("slug"),
                        n = b.data("class");
                    g.html(c).removeClass("engineering medical foundation").addClass(n), i.val(m), setTimeout(function() {
                        j.focus()
                    }, 100);
                    var o = tpr.util.getUrlParam("next") || !1,
                        p = "/signup/facebook/?course=" + m,
                        q = "/signup/google/?course=" + m;
                    o && (p += "&next=" + encodeURI(o), q += "&next=" + encodeURI(o)), k.attr("href", p), l.attr("href", q), h.find("label.error").remove(), h.find("input.error").removeClass("error"), d.removeClass("move-right fade-in").addClass("fade-out move-left"), setTimeout(function() {
                        d.removeClass("visible")
                    }, 300), e.addClass("move-right visible"), setTimeout(function() {
                        e.addClass("fade-in").removeClass("move-right")
                    }, 0), f.show()
                }), f.click(function(a) {
                    a.preventDefault(), e.removeClass("fade-in").addClass("move-right fade-out"), d.removeClass("fade-out").addClass("move-left visible"), setTimeout(function() {
                        e.removeClass("visible")
                    }, 300), setTimeout(function() {
                        d.addClass("fade-in").removeClass("move-left")
                    }, 0), f.hide()
                }), h.validate({
                    rules: {
                        name: {
                            required: !0
                        },
                        email: {
                            required: !0,
                            email: !0
                        },
                        password: {
                            required: !0
                        },
                        phone: {
                            required: !0,
                            minlength: 10,
                            maxlength: 10,
                            digits: !0
                        }
                    },
                    messages: {
                        name: "Please enter your name",
                        email: {
                            required: "Please enter your email address",
                            email: "Please enter a valid email address"
                        },
                        password: "Please enter a password",
                        phone: "Please enter a 10 digit phone number"
                    }
                })
            }
        })
    }

    function b(a) {
        tpr.modal.close_all(), a = a || {}, tpr.modal.open({
            tpl: "modal_login",
            ctx: a,
            callback: function(a, b, c) {
                var d = a.find("form"),
                    e = d.find("input[name='username']");
                setTimeout(function() {
                    e.focus()
                }, 100), d.validate({
                    rules: {
                        username: {
                            required: !0,
                            email: !0
                        },
                        password: {
                            required: !0
                        }
                    },
                    messages: {
                        username: {
                            required: "Please enter your email address",
                            email: "Please enter a valid email address"
                        },
                        password: "Please enter a password"
                    }
                })
            }
        })
    }
    return tpr.onClick("signup", function(b, c, d) {
        return head.mobile && (url = c.attr("href"), url) ? void(window.location = url) : (d = _.extend(d || {}, {
            _needs_course_data: !0
        }), void a(d))
    }), tpr.onClick("login", function(a, c, d) {
        return head.mobile && (url = c.attr("href"), url) ? void(window.location = url) : void b(d)
    }), tpr.onClick("explore", function(a, b, c) {
        return head.mobile && (url = b.attr("href"), url) ? void(window.location = url) : (c = _.extend(c || {}, {
            _needs_course_data: !0
        }), tpr.modal.close_all(), void tpr.modal.open({
            tpl: "modal_explore",
            ctx: c,
            callback: function(a, b, c) {}
        }))
    }), tpr.onClick("forgot_password", function(a, b, c) {
        return head.mobile && (url = b.attr("href"), url) ? void(window.location = url) : (tpr.modal.close_all(), void tpr.modal.open({
            tpl: "modal_forgot_password",
            ctx: c,
            callback: function(a, b, c) {}
        }))
    }), tpr.onClick("switch_course", function(a, b) {
        tpr.modal.close_all(), tpr.modal.open({
            tpl: "modal_switch_course",
            ctx: {
                active_course: tpr.cfg("course_slug")
            },
            callback: function(a, b, c) {
                a.on("click", ".js-course-item", function(b) {
                    if (b.preventDefault(), !$(this).hasClass("is-active")) {
                        var c = $(this).attr("data-course-slug"),
                            d = a.find("form"),
                            e = d.find("input[name='exam']");
                        e.val(c), d.submit()
                    }
                })
            }
        })
    }), {
        prompt_signup: a,
        prompt_login: b
    }
}(), tpr.googleLogin = function() {
    "use strict";

    function a() {
        window.location = g
    }
    var b = "https://accounts.google.com/o/oauth2/auth?",
        c = "https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email",
        d = "594950335285-g25d1bpsatt1oaq7meqkootsfh4f8gv3.apps.googleusercontent.com",
        e = window.location.origin + "/finish-signup/",
        f = "token",
        g = b + "scope=" + c + "&client_id=" + d + "&redirect_uri=" + e + "&response_type=" + f;
    return tpr.onClick("google_login", function(a, b, c) {
        window.location = g + "&course=" + c.course
    }), {
        attempt_login: a
    }
}(), $(function() {
    function a() {
        if (!($(window).width() < 768)) {
            var a = 150,
                b = $("#top_header"),
                c = $(".js-page-header");
            c.height();
            $(window).scroll(function() {
                var c = $(window).scrollTop();
                c >= a ? b.hasClass("fixed") || (b.addClass("fixed"), setTimeout(function() {
                    b.addClass("show")
                }, 0)) : b.hasClass("fixed") && (b.removeClass("show"), setTimeout(function() {
                    b.removeClass("fixed")
                }, 200))
            })
        }
    }

    function b() {
        var a = $("#top_header"),
            b = a.find(".js-mob-nav-trigger"),
            c = b.find(".js-button-text"),
            d = b.find(".js-icon-menu"),
            e = b.find(".js-icon-cancel");
        b.click(function(b) {
            a.hasClass("show-nav") ? (a.removeClass("show-nav"), c.text("Menu"), e.addClass("hide"), d.removeClass("hide")) : (a.addClass("show-nav"), c.text("Close"), d.addClass("hide"), e.removeClass("hide"))
        })
    }

    function c() {
        $(document).on("click", ".js-scroll-to-courses", function(a) {
            var b = ($(a.target).closest(".js-scroll-to-courses"), $(".js-courses-section"));
            b.length && (a.preventDefault(), a.stopPropagation(), $("html, body").animate({
                scrollTop: b.offset().top - 20
            }, 500))
        })
    }

    function d() {
        $(document).on("click", ".js-header-scroll-icon", function(a) {
            var b = $(".js-page-header");
            if (b.length) {
                var c = b.next();
                c.length && $("html, body").animate({
                    scrollTop: c.offset().top - 20
                }, 500)
            }
        })
    }

    function e() {
        function a(a) {
            var b = a.split("."),
                c = b.pop(),
                d = b.join("."),
                e = d + "@2x." + c;
            return e
        }
        var b = $(window).width() < 768 ? !0 : !1;
        if (window.devicePixelRatio >= 1.2)
            for (var c = document.getElementsByTagName("img"), d = 0; d < c.length; d++) {
                var e = c[d].getAttribute("data-2x");
                if (e) {
                    var f = c[d].getAttribute("data-2x-skip-phone");
                    if (f && b) continue;
                    c[d].src = a(c[d].src)
                }
            }
    }

    function f() {
        var a = navigator.userAgent || navigator.vendor || window.opera,
            b = $("#footer_fixed_android_app_banner"),
            c = Cookies.get("hide_app_banner") || !1,
            d = a.match(/Android/i);
        return !c && head.mobile && d ? (b.show(), void b.find(".js-close-banner").click(function() {
            var a = 3600,
                c = 3 * a;
            Cookies.set("hide_app_banner", "true", {
                expires: c
            }), b.remove()
        })) : void b.remove()
    }

	function cr() {
        $(document).on("click", ".js-scroll-to-register", function(a) {
            var b = ($(a.target).closest(".js-scroll-to-register"), $(".js-register-section"));
            b.length && (a.preventDefault(), a.stopPropagation(), $("html, body").animate({
                scrollTop: b.offset().top - 20
            }, 500))
        })
    }

    cr();

    a(), b(), c(), d(), e(), f(), $(".js_pricing_target_year").on("click", function() {
        var a = $(this).data("course2"),
            b = $(this).data("year"),
            c = $(".js_ldg-sectionPricing_table[data-course2=" + a + "]");
        c.addClass("hide");
        var d = $(".js_ldg-sectionPricing_phone[data-course2=" + a + "]");
        d.removeClass("phn-block"), $(".js_ldg-sectionPricing_table[data-course2=" + a + "][data-year=" + b + "]").removeClass("hide"), $(".js_ldg-sectionPricing_phone[data-course2=" + a + "][data-year=" + b + "]").addClass("phn-block")
    }), $(document).find(".js-googleLogin").on("click", function() {
        tpr.googleLogin.attempt_login()
    })
});
//# sourceMappingURL=tpr.landing.map