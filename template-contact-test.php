<?php
/*
Template Name: Contact Page Test Template
*/
get_header(); ?>

<div class="entry">
	<h2>Contact</h2>
	<p class="contact_small">Email me at <a href="mailto:bonjour@cupofvoodoo.com">bonjour@cupofvoodoo.com</a> and I will get back with you as soon as possible. Thank you for your inquiry!</p>
	<p class="contact_large">Feel free to send me an email at <a href="mailto:bonjour@cupofvoodoo.com">bonjour@cupofvoodoo.com</a> and I will get back with you as soon as possible. I would love to hear from you!</p>
	<div id='contact-form-10'>
		<form action='http://cupofvoodoo.com/zimzallabim/contact/#contact-form-10'
		class='contact-form commentsblock' method='post'>
			<div>
				<label class='name' for=
				'10-name'>Name<span>(required)</span></label> <input class='name'
				id='10-name' name='10-name' type='text' value=''>
			</div>

			<div>
				<label class='grunion-field-label email' for=
				'10-email'>Email<span>(required)</span></label> <input class=
				'email' id='10-email' name='10-email' type='text' value=''>
			</div>

			<div>
				<label class='url' for='10-website'>Website</label> <input class=
				'url' id='10-website' name='10-website' type='text' value=''>
			</div>

			<div>
				<label class='textarea' for=
				'contact-form-comment-10-comment'>Comment<span>(required)</span></label>
				
				<textarea id='contact-form-comment-10-comment' name='10-comment'
				rows='20'>
	            </textarea>
			</div>

			<p class='contact-submit'><input class='pushbutton-wide' type='submit'
			value='Submit »'> <input id="_wpnonce" name="_wpnonce" type="hidden"
			value="52691a9f85"><input name="_wp_http_referer" type="hidden" value=
			"/zimzallabim/contact/"> <input name='contact-form-id' type='hidden'
			value='10'></p>
		</form>
	</div>
</div>

<?php get_footer(); ?>