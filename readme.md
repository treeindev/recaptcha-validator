# [PHP] Google reCAPTCHA  Validator

&nbsp;&nbsp;&nbsp;&nbsp;

![](http://treeindev.net/img/assets/github-md/google-recatcha-validator.jpg)
&nbsp;&nbsp;&nbsp;&nbsp;

**reCAPTCHA Validator in two lines.**

    validator = new recaptchaValidator( "YOUR_SECRET_KEY" );
	validator->validate();

&nbsp;&nbsp;&nbsp;&nbsp;
### Features

- Server side validation of Google's reCAPTCHAs.
- Easy to use. Just two lines of code. No external dependencies.
- Support for reCAPTCHA of V2.
google.com/recaptcha

&nbsp;&nbsp;&nbsp;&nbsp;
### How to use
1. Register your site on Google's recaptcha.
1. Get your **Site Key** and **Secret Key**.
1. Require `google-recaptcha-validator.php` class on your project.
1. Create an instance of the validator passing in your key.
`new GoogleRecaptchaValidator( "YOUR_SECRET_KEY" )`
1. Use the `validate()` method to trigger the validation.
1. Expect `true` or `false`  as returning value.

&nbsp;&nbsp;&nbsp;&nbsp;
### What is a reCAPTCHA?

[Offical Website](https://google.com/recaptcha)

> reCAPTCHA is a free service that protects your website from spam and abuse. It uses an advanced risk analysis to keep automated software from engaging in abusive activities on your site.

<img src="https://developers.google.com/recaptcha/images/newCaptchaAnchor.gif" width="350">