(()=>{"use strict";var n=jQuery,a="qtranslate-xt-admin-section",t=function(t){if(!t)return!1;var e=n('.nav-tab-wrapper a[href="'+t+'"]');if(!e.length)return!1;e.parent().children().removeClass("nav-tab-active"),e.addClass("nav-tab-active");var r=n("#qtranxs-configuration-form"),o=t.replace("#","#tab-"),i=n(".tabs-content");i.children().addClass("hidden"),i.find("div"+o).removeClass("hidden");var s=r.attr("action").replace(/(#.*|$)/,t);r.attr("action",s);try{sessionStorage.setItem(a,t)}catch(n){console.log('Failed to store "'+a+'" with sessionStorage',n)}return!0},e=function(n){var e=window.location.hash;if(!t(e)){var r=sessionStorage.getItem(a);t(r)||t(n)}},r=function(a){var t=n("#preview_flag");t.css("display","inline"),t.attr("src",t.attr("data-flag-path")+a)};n((function(){n(window).bind("hashchange",(function(){e()})),e("#general");var a=n("#language_flag");a.on("change",(function(){r(this.value)})),r(a.val()),n("#qtranxs_debug_query").on("click",(function(){for(var a=document.cookie.split(";"),t=3==="a~b".split(/(~)/).length,e={cookies:[],navigator:navigator.userAgent,"Javascript built-in RegExp: @@split":t?"supported":"not supported!"},r=0;r<a.length;r++){var o=a[r].trim();0===o.indexOf("qtrans")&&e.cookies.push(o)}t||n("#qtranxs_debug_info_browser").css("color","red"),n("#qtranxs_debug_info_browser").val(JSON.stringify(e,null,2)),n("#qtranxs_debug_info_versions").val("..."),n("#qtranxs_debug_info_configuration").val("..."),n("#qtranxs_debug_info").show(),n.ajax({url:ajaxurl,dataType:"json",data:{action:"admin_debug_info"},success:function(a){console.log("debug-info",a),n("#qtranxs_debug_info_versions").val(JSON.stringify(a.versions,null,2)),n("#qtranxs_debug_info_configuration").val(JSON.stringify(a.configuration,null,2))},error:function(a){console.error("debug-info",a),n("#qtranxs_debug_info_versions").val("An error occurred: status="+a.status+" ("+a.statusText+")")}})})),n(".qtranxs_double_check").on("click",(function(){var a=n(n(this).attr("data-double-check"));a.prop("disabled",!n(this).prop("checked")),a.prop("checked",!1)}))}))})();