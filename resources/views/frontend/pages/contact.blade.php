@extends('frontend.layout.master-without-slider')

@section('title', 'Contact Page')


@section('frontend-content')
    
<section class="rh_banner rh_banner__image" style="background-image: url('frontend/uploads/2017/10/banner.jpg');">
		<div class="rh_banner__cover"></div>
		<div class="rh_banner__wrap">
			<h1 class="rh_banner__title">Contact</h1>
			
		</div>
	</section>

        <section class="rh_section rh_wrap rh_wrap--padding rh_wrap--topPadding">

        <div class="rh_page">

			
            <div class="rh_page__contact">
				                        <div class="rh_blog rh_blog__single">
							                                <article id="post-155" class="rh_blog__post">
                                    <div class="rh_content entry-content"></div>
                                </article>
							                        </div>
						
                <div class="rh_contact">

                    <div class="rh_contact__wrap">

                        <div class="rh_contact__form">
							                                    <section id="contact-form">
                                        <form class="contact-form" method="post" action="https://modern.realhomes.io/wp-admin/admin-ajax.php">
                                            <p class="rh_contact__input rh_contact__input_text">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" id="name" class="required" placeholder="Your Name" title="* Please provide your name">
                                            </p>

                                            <p class="rh_contact__input rh_contact__input_text">
                                                <label for="email">Email</label>
                                                <input type="text" name="email" id="email" class="email required" placeholder="Your Email" title="* Please provide a valid email address">
                                            </p>

                                            <p class="rh_contact__input rh_contact__input_text">
                                                <label for="number">Phone Number</label>
                                                <input type="text" name="number" id="number" placeholder="Your Phone">
                                            </p>

                                            <p class="rh_contact__input rh_contact__input_textarea">
                                                <label for="message">Message</label>
                                                <textarea cols="40" rows="6" name="message" id="message" class="required" placeholder="Your Message" title="* Please provide your message"></textarea>
                                            </p>

											<p class="rh_inspiry_gdpr clearfix"><span class="gdpr-checkbox-label">GDPR Agreement <span class="required-label">*</span></span><input type="checkbox" name="gdpr" id="inspiry-gdpr" class="required" value="I consent to having this website store my submitted information so they can respond to my inquiry." title="* Please accept GDPR agreement"><label for="inspiry-gdpr">I consent to having this website store my submitted information so they can respond to my inquiry.</label></p>                                                    <div class="rh_contact__input rh_contact__input_recaptcha inspiry-recaptcha-wrapper clearfix g-recaptcha-type-v3">
                                                        <div class="inspiry-google-recaptcha"></div>
                                                    </div>
													
                                            <p class="rh_contact__input rh_contact__submit">
                                                <input type="submit" id="submit-button" value="Send Message" class="rh_btn rh_btn--primary" name="submit">
                                                <span id="ajax-loader"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32px" height="32px" viewBox="0 0 128 128" xml:space="preserve"><rect x="0" y="0" width="100%" height="100%" fill="#FFFFFF" /><g><path d="M75.4 126.63a11.43 11.43 0 0 1-2.1-22.65 40.9 40.9 0 0 0 30.5-30.6 11.4 11.4 0 1 1 22.27 4.87h.02a63.77 63.77 0 0 1-47.8 48.05v-.02a11.38 11.38 0 0 1-2.93.37z" fill="#1ea69a" fill-opacity="1"/><animateTransform attributeName="transform" type="rotate" from="0 64 64" to="360 64 64" dur="1000ms" repeatCount="indefinite"></animateTransform></g></svg>
</span>
                                                <input type="hidden" name="action" value="send_message"/>
                                                <input type="hidden" name="the_id" value="155"/>
                                                <input type="hidden" name="nonce" value="9a43af2c93"/>
                                            </p>

                                            <div id="error-container"></div>
                                            <div id="message-container"></div>
                                        </form>
                                    </section>
									                        </div>
                        <!-- /.rh_contact__form -->

						                            <div class="rh_contact__details">

								                                    <div class="rh_contact__item">
                                        <div class="icon"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="18px" height="18px" viewBox="0 0 459 459" style="enable-background:new 0 0 459 459;" xml:space="preserve">
<g>
	<g>
		<path d="M91.8,198.9c35.7,71.4,96.9,130.05,168.3,168.3L316.2,311.1c7.649-7.649,17.85-10.199,25.5-5.1
			c28.05,10.2,58.649,15.3,91.8,15.3c15.3,0,25.5,10.2,25.5,25.5v86.7c0,15.3-10.2,25.5-25.5,25.5C193.8,459,0,265.2,0,25.5
			C0,10.2,10.2,0,25.5,0h89.25c15.3,0,25.5,10.2,25.5,25.5c0,30.6,5.1,61.2,15.3,91.8c2.55,7.65,0,17.85-5.1,25.5L91.8,198.9z"/>
	</g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>
</div>
                                        <p class="content">
                                            <span class="label">Phone</span><a
                                                    href="tel:+123-456-789">+123-456-789                                            </a>
                                        </p>
                                    </div>
								
								                                    <div class="rh_contact__item">
                                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="25" viewBox="0 0 32.754 32.754">
	<path d="M21.072 26.604c-.316 0-.625-.02-.934-.047v2.104H4.189V3.508h15.949v2.194c.31-.027.617-.047.935-.047.203 0 .404.02.604.029V2.211C21.678.994 20.683 0 19.465 0H4.863C3.646 0 2.65.994 2.65 2.211v28.331c0 1.216.996 2.212 2.213 2.212h14.602c1.218 0 2.213-.996 2.213-2.212v-3.969c-.2.012-.403.031-.606.031zM9.829 1.595H14.5c.148 0 .268.12.268.271 0 .148-.119.267-.268.267H9.829c-.148 0-.268-.118-.268-.267 0-.151.119-.271.268-.271zm2.336 30.053c-.611 0-1.105-.496-1.105-1.105 0-.611.494-1.104 1.105-1.104s1.107.492 1.107 1.104c0 .609-.497 1.105-1.107 1.105zm15.39-19.374c.052.064.115.106.183.129l-.303.188-.525-.678.084-.118c.156.199.561.479.561.479zm-6.483-5.175c-4.988 0-9.033 4.045-9.033 9.031 0 4.989 4.045 9.031 9.033 9.031 4.988 0 9.031-4.042 9.031-9.031.001-4.986-4.041-9.031-9.031-9.031zm-5.297 2.795c.316.475-.438.551-.438.551-.078.022-.156.056-.234.096.212-.231.439-.445.672-.647zm.815 7.902c-.283.354-.244.714-.244.714.363 1.272-.363 1.272-.363 1.272-.525.077-.322.712-.322.712 0 .357-.203.639-.203.639.203.277.043.598.043.598-.041.062-.059.131-.061.199-1.549-1.477-2.518-3.559-2.518-5.865 0-.477.043-.94.121-1.396.047-.079.076-.13.076-.13l.324.199c.283-.119.441.316.441.316.242-.041.324.398.324.398.605-.239.725.871.725.871.324 0 .688.396.688.396.604 0 .725.397.725.397.525-.078.244.68.244.68zm.22-8.287c-.052.439-.82.385-1.006.364.322-.271.666-.521 1.029-.739l-.023.375zm11.147 4.034s-.158.437-.643.676c0 0-.686-1.669-1.533-2.026 0 0 .887 1.55 1.613 2.266 0 0 .201.121.523-.038 0 0 .039 1.312-.728 2.185 0 0-.199.479-.119.992 0 0 .119.875-.524 1.312 0 0-.283.197-.283.674 0 0 0 .396-.443.396 0 0-.484 1.025-1.855.828 0 0 0-.746-.399-1.621 0 0-.365-.479.196-1.033 0 0 .527-.238-.278-1.151 0 0-.522-.438-.242-.914 0 0 .08-.397-.12-.517 0 0-.562.117-.685-.277 0 0-1.05.396-1.533.198 0 0-.604.396-1.09-.519 0 0-.806-.478-.521-.914 0 0 .08-.436.08-.873 0 0 .08-.716.887-1.072 0 0 .242-.717.604-.717 0 0 .768-.041 1.172-.196 0 0 .523-.16.844-.08 0 0 .203.317.082.516 0 0 .562-.196.928.237 0 0 .361-.037.279-.316 0 0 .931.559 1.414.239 0 0 .119-.795-.322-.756 0 0-.686.04-1.01-.437 0 0-.361-.16-.283.08 0 0 .043.237.324.316 0 0-.08.238-.361.119 0 0-.241-.08-.321-.598 0 0-.646-.117-.81-.396 0 0-.399.119.523.559 0 0 .365.275-.121.476 0 0-.322-.158.041-.237 0 0-.08-.16-.443-.279 0 0-.239-.236-.28-.396 0 0-.481.318-.687.119 0 0-.082.396-.322.396 0 0-.043.596-.848.358h-.244s-.201-.556.082-.716c0 0 .523.119.644 0 .123-.117.202-.317-.119-.396 0 0-.481-.123-.283-.36 0 0 .242-.276.484.082 0 0 .403-.28.926-.317 0 0 .931-.4.687-.679 0 0-.603.358-.886.162 0 0-.795-.263-.147-.895 2.803.27 5.186 1.969 6.418 4.355-.121.051-.287.097-.439.059.12.125.638.705.171 1.126z"/>
</svg></div>
                                        <p class="content">
                                            <span class="label">Mobile</span><a
                                                    href="tel:+133-456-787">+133-456-787                                            </a>
                                        </p>
                                    </div>
								
								                                    <div class="rh_contact__item">
                                        <div class="icon"><svg height="20px" viewBox="0 0 1792 1792" width="20px" xmlns="http://www.w3.org/2000/svg"><path d="M288 384q66 0 113 47t47 113v1088q0 66-47 113t-113 47h-128q-66 0-113-47t-47-113v-1088q0-66 47-113t113-47h128zm1376 163q58 34 93 93t35 128v768q0 106-75 181t-181 75h-864q-66 0-113-47t-47-113v-1536q0-40 28-68t68-28h672q40 0 88 20t76 48l152 152q28 28 48 76t20 88v163zm-736 989v-128q0-14-9-23t-23-9h-128q-14 0-23 9t-9 23v128q0 14 9 23t23 9h128q14 0 23-9t9-23zm0-256v-128q0-14-9-23t-23-9h-128q-14 0-23 9t-9 23v128q0 14 9 23t23 9h128q14 0 23-9t9-23zm0-256v-128q0-14-9-23t-23-9h-128q-14 0-23 9t-9 23v128q0 14 9 23t23 9h128q14 0 23-9t9-23zm256 512v-128q0-14-9-23t-23-9h-128q-14 0-23 9t-9 23v128q0 14 9 23t23 9h128q14 0 23-9t9-23zm0-256v-128q0-14-9-23t-23-9h-128q-14 0-23 9t-9 23v128q0 14 9 23t23 9h128q14 0 23-9t9-23zm0-256v-128q0-14-9-23t-23-9h-128q-14 0-23 9t-9 23v128q0 14 9 23t23 9h128q14 0 23-9t9-23zm256 512v-128q0-14-9-23t-23-9h-128q-14 0-23 9t-9 23v128q0 14 9 23t23 9h128q14 0 23-9t9-23zm0-256v-128q0-14-9-23t-23-9h-128q-14 0-23 9t-9 23v128q0 14 9 23t23 9h128q14 0 23-9t9-23zm0-256v-128q0-14-9-23t-23-9h-128q-14 0-23 9t-9 23v128q0 14 9 23t23 9h128q14 0 23-9t9-23zm96-384v-256h-160q-40 0-68-28t-28-68v-160h-640v512h896z"/></svg></div>
                                        <p class="content">
                                            <span class="label">Fax</span><a
                                                    href="fax:+122-456-788">+122-456-788                                            </a>
                                        </p>
                                    </div>
								
								                                    <div class="rh_contact__item">
                                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 510 510">
<path d="M459 51H51C22.95 51 0 73.95 0 102v306c0 28.05 22.95 51 51 51h408c28.05 0 51-22.95 51-51V102c0-28.05-22.95-51-51-51zm0 102L255 280.5 51 153v-51l204 127.5L459 102v51z"/>
</svg>
</div>
                                        <p class="content">
											<span class="label">Email</span><a href="mailto:&#115;a&#108;&#101;&#115;&#064;y&#111;&#117;&#114;we&#098;sit&#101;&#046;&#099;&#111;m">s&#097;&#108;e&#115;&#064;yo&#117;&#114;&#119;&#101;&#098;&#115;ite.co&#109;</a>
                                        </p>
                                    </div>
								
								                                    <div class="rh_contact__item">
                                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 384 512"><path d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path></svg></div>
                                        <p class="content">
                                            <span class="label">Address</span>3015 Grand Ave, Coconut Grove, Merrick Way, FL 12345                                        </p>
                                    </div>
								
                            </div><!-- /.rh_contact__details -->
							                            <!-- Map Container -->
                            {{-- <div class="rh_contact__map">
                                <!-- Works for Both Google Maps and Open Street Maps -->
                                <div id="map_canvas"></div>
                            </div><!-- /.rh_contact__map --> --}}
							
                    </div><!-- /.rh_contact__wrap -->

                </div><!-- /.rh_contact -->

            </div><!-- /.rh_page__contact -->

        </div><!-- /.rh_page -->
		
    </section><!-- /.rh_section rh_wrap rh_wrap--padding -->

@endsection
