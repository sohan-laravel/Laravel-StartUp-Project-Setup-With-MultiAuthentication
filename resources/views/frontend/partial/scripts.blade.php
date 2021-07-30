<script type="text/javascript">
                var reCAPTCHAWidgetIDs = [];
                var inspirySiteKey = '6LeOcdcUAAAAAIJAhrwkdJ0j_jV-LiUNayq4pScm';
                var reCAPTCHAType = 'v3';

                /**
                 * Render Google reCAPTCHA and store their widget IDs in an array
                 */
                var loadInspiryReCAPTCHA = function() {
                    jQuery( '.inspiry-google-recaptcha' ).each( function( index, el ) {
                        var tempWidgetID;
                        if ('v3' === reCAPTCHAType) {
                            tempWidgetID = grecaptcha.ready(function () {
                                grecaptcha.execute(inspirySiteKey, {action: 'homepage'}).then(function (token) {
									el.innerHTML = '';
                                    el.insertAdjacentHTML('beforeend', '<input type="hidden" name="g-recaptcha-response" value="' + token + '">');
                                });
                            });
                        } else {
                            tempWidgetID = grecaptcha.render(el, {
                                'sitekey': inspirySiteKey
                            });
                        }
                        reCAPTCHAWidgetIDs.push( tempWidgetID );
                    } );
                };

                /**
                 * For Google reCAPTCHA reset
                 */
                var inspiryResetReCAPTCHA = function() {
					if ('v3' === reCAPTCHAType) {
						loadInspiryReCAPTCHA();
					} else {
						if( typeof reCAPTCHAWidgetIDs != 'undefined' ) {
							var arrayLength = reCAPTCHAWidgetIDs.length;
							for( var i = 0; i < arrayLength; i++ ) {
								grecaptcha.reset( reCAPTCHAWidgetIDs[i] );
							}
						}
					}
                };
			</script>
			<script>(function() {function maybePrefixUrlField() {
	if (this.value.trim() !== '' && this.value.indexOf('http') !== 0) {
		this.value = "http://" + this.value;
	}
}

var urlFields = document.querySelectorAll('.mc4wp-form input[type="url"]');
if (urlFields) {
	for (var j=0; j < urlFields.length; j++) {
		urlFields[j].addEventListener('blur', maybePrefixUrlField);
	}
}
})();</script><script type='text/javascript' src='frontend/js/jquery/jquery.form.min50fa.js?ver=4.2.1' id='jquery-form-js'></script>
<script type='text/javascript' src='frontend/plugins/easy-real-estate/js/jquery.validate.min23b5.js?ver=0.8.0' id='jquery-validate-js'></script>
<script type='text/javascript' id='ere-frontend-js-extra'>

var ere_social_login_data = {"ajax_url":"https:\/\/modern.realhomes.io\/wp-admin\/admin-ajax.php"};
</script>
<script type='text/javascript' src='frontend/plugins/easy-real-estate/js/ere-frontend23b5.js?ver=0.8.0' id='ere-frontend-js'></script>
<script type='text/javascript' id='flying-pages-js-before'>
window.FPConfig= {
	delay: 0,
	ignoreKeywords: ["\/wp-admin","#\/wp-login.php","\/cart","\/checkout","add-to-cart","logout","#","?",".png",".jpeg",".jpg",".gif",".svg",".webp"],
	maxRPS: 3,
    hoverDelay: 50
};
</script>
<script type='text/javascript' src='frontend/plugins/flying-pages/flying-pages.mina305.js?ver=2.4.2' id='flying-pages-js' defer></script>
<script type='text/javascript' src='frontend/themes/realhomes/assets/modern/scripts/vendors/progressbar/dist/progressbar.minf269.js?ver=1.0.1' id='progress-bar-js'></script>
<script type='text/javascript' src='frontend/js/comment-reply.mina78f.js?ver=5.7.1' id='comment-reply-js'></script>
<script type='text/javascript' id='inspiry-search-js-extra'>

var localizedSearchParams = {"rent_slug":"for-rent"};
var frontEndAjaxUrl = {"sfoiajaxurl":"https:\/\/modern.realhomes.io\/wp-admin\/admin-ajax.php"};
var locationData = {"none_text":"None","any_text":"Any","any_value":"any","location_placeholders":["Any"],"all_locations":[{"term_id":36,"name":"Miami","slug":"miami","parent":0},{"term_id":49,"name":"Little Havana","slug":"little-havana","parent":36},{"term_id":39,"name":"Perrine","slug":"perrine","parent":36},{"term_id":48,"name":"Doral","slug":"doral","parent":36}],"select_names":["location","child-location","grandchild-location","great-grandchild-location"],"select_count":"1","locations_in_params":[],"multi_select_locations":"yes"};
</script>
<script type='text/javascript' src='frontend/themes/realhomes/assets/modern/scripts/js/inspiry-search-form2916.js?ver=3.13.1' id='inspiry-search-js'></script>
<script type='text/javascript' src='../www.google.com/recaptcha/api58f9.js?render=6LeOcdcUAAAAAIJAhrwkdJ0j_jV-LiUNayq4pScm&amp;onload=loadInspiryReCAPTCHA&amp;ver=3.13.1' id='inspiry-google-recaptcha-js'></script>
<script type='text/javascript' id='custom-js-extra'>

var customData = {"video_width":"1778","video_height":"1000"};
var localizeSelect = {"select_noResult":"No Results Found!"};

</script>
<script type='text/javascript' src='frontend/themes/realhomes/assets/modern/scripts/js/custom2916.js?ver=3.13.1' id='custom-js'></script>
<script type='text/javascript' src='frontend/themes/realhomes/common/js/inspiry-login2916.js?ver=3.13.1' id='inspiry-login-js'></script>
<script type='text/javascript' src='frontend/themes/realhomes/common/js/compare-properties2916.js?ver=3.13.1' id='compare-js-js'></script>
<script type='text/javascript' src='frontend/themes/realhomes/common/optamize/vendors2916.js?ver=3.13.1' id='vendors-js-js'></script>
<script type='text/javascript' id='common-custom-js-extra'>

var localizeSelect = {"select_noResult":"No Results Found!","ajax_url":"https:\/\/modern.realhomes.io\/wp-admin\/admin-ajax.php","page_template":"templates\/home.php","searching_string":"Searching...","loadingMore":"Loading more results..."};

</script>
<script type='text/javascript' src='frontend/themes/realhomes/common/js/common-custom2916.js?ver=3.13.1' id='common-custom-js'></script>
<script type='text/javascript' id='inspiry-cfos-js-js-extra'>

var inspiryUtilsPath = {"stylesheet_directory":"https:\/\/modern.realhomes.io\/frontend\/themes\/realhomes\/common\/js\/utils.js"};

</script>
<script type='text/javascript' src='frontend/themes/realhomes/common/js/cfos2916.js?ver=3.13.1' id='inspiry-cfos-js-js'></script>
<script type='text/javascript' id='inspiry-cfos-js-js-after'>
rhRunIntlTelInput('#cfos-number');
</script>
<script type='text/javascript' src='../unpkg.com/leaflet%401.3.4/dist/leaflet.js?ver=1.3.4' id='leaflet-js'></script>
<script type='text/javascript' src='frontend/js/jquery/ui/core.min35d0.js?ver=1.12.1' id='jquery-ui-core-js'></script>
<script type='text/javascript' src='frontend/js/jquery/ui/mouse.min35d0.js?ver=1.12.1' id='jquery-ui-mouse-js'></script>
<script type='text/javascript' src='frontend/js/jquery/ui/slider.min35d0.js?ver=1.12.1' id='jquery-ui-slider-js'></script>
<script type='text/javascript' src='frontend/js/wp-embed.mina78f.js?ver=5.7.1' id='wp-embed-js'></script>
<script type='text/javascript' src='frontend/plugins/mailchimp-for-wp/assets/js/forms.min7bcd.js?ver=4.8.3' id='mc4wp-forms-api-js'></script>
<script type='text/javascript' src='frontend/plugins/realhomes-elementor-addon/elementor/js/frontend23b5.js?ver=0.8.0' id='ere-elementor-frontend-js'></script>
<script type='text/javascript' src='frontend/plugins/elementor/assets/js/webpack.runtime.minaeb9.js?ver=3.1.4' id='elementor-webpack-runtime-js'></script>
<script type='text/javascript' src='frontend/plugins/elementor/assets/js/frontend-modules.minaeb9.js?ver=3.1.4' id='elementor-frontend-modules-js'></script>
<script type='text/javascript' src='frontend/plugins/elementor/assets/lib/dialog/dialog.mina288.js?ver=4.8.1' id='elementor-dialog-js'></script>
<script type='text/javascript' src='frontend/plugins/elementor/assets/lib/waypoints/waypoints.min05da.js?ver=4.0.2' id='elementor-waypoints-js'></script>
<script type='text/javascript' src='frontend/plugins/elementor/assets/lib/share-link/share-link.minaeb9.js?ver=3.1.4' id='share-link-js'></script>
<script type='text/javascript' src='frontend/plugins/elementor/assets/lib/swiper/swiper.min48f5.js?ver=5.3.6' id='swiper-js'></script>
<script type='text/javascript' id='elementor-frontend-js-before'>
var elementorFrontendConfig = {"environmentMode":{"edit":false,"wpPreview":false,"isScriptDebug":false,"isImprovedAssetsLoading":false},"i18n":{"shareOnFacebook":"Share on Facebook","shareOnTwitter":"Share on Twitter","pinIt":"Pin it","download":"Download","downloadImage":"Download image","fullscreen":"Fullscreen","zoom":"Zoom","share":"Share","playVideo":"Play Video","previous":"Previous","next":"Next","close":"Close"},"is_rtl":false,"breakpoints":{"xs":0,"sm":480,"md":768,"lg":1025,"xl":1440,"xxl":1600},"version":"3.1.4","is_static":false,"experimentalFeatures":[],"urls":{"assets":"https:\/\/modern.realhomes.io\/frontend\/plugins\/elementor\/assets\/"},"settings":{"page":[],"editorPreferences":[]},"kit":{"global_image_lightbox":"yes","lightbox_enable_counter":"yes","lightbox_enable_fullscreen":"yes","lightbox_enable_zoom":"yes","lightbox_enable_share":"yes","lightbox_title_src":"title","lightbox_description_src":"description"},"post":{"id":7072,"title":"RealHomes%20Modern%20%E2%80%93%20Simply%20an%20awesome%20real%20estate%20website","excerpt":"","featuredImage":false}};
</script>
<script type='text/javascript' src='frontend/plugins/elementor/assets/js/frontend.minaeb9.js?ver=3.1.4' id='elementor-frontend-js'></script>
<script type='text/javascript' src='frontend/plugins/elementor/assets/js/preloaded-elements-handlers.minaeb9.js?ver=3.1.4' id='preloaded-elements-handlers-js'></script>