function recaptchaCallback() {
    if (grecaptcha.getResponse()) {
        document.getElementById("forminput").submit();
    } else {
        document.getElementById("art").innerText =
            "Please complete the CAPTCHA.";
    }
}

function recaptcha_callback() {
    document.getElementById("art").innerText = "";
}
