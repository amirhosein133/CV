var $proElement = $('.pro-ajax');

// If it's a form
$proElement.submit(function (e) {
    e.preventDefault();
    $(this).proAjax();
});

// If it's a link...
$proElement.click(function (e) {
    if (!$(this).is('form')) {
        e.preventDefault();
        $(this).proAjax();
    }
});

var ProAjaxConfig = {};
(function ($) {

    $.fn.proAjax = function (options) {

        // If you want one default Alert element for all alerts, you can put the Element here.
        // All alert messages will be displayed in this element, unless overwritten by a 'data-pro-alert' attribute.
        // How is it useful? If you have one single alert element at the top of your page for all alerts.
        // When is this not useful? If you launch a form in a bootstrap modal, for instance, and need to display
        // the alert at the top of the modal, not the top of the page.
        // Uncomment this to set the settings
        ProAjaxConfig.defaultAlertElement = $('#pro_ajax_result');

        // Get the element
        var $this = $(this);

        // The proURL is the URL that can be provided if the user does not want the ProURL to be the same as
        // the default URL - like action in <form>, or href in <a>
        // In case of this, a data attribute with 'data-pro-url' can be provided with the URL.
        var proURL = $this.attr('data-pro-url');

        // The default URL - action in <form>, or href in <a>
        var defaultURL;

        // Is this element a form?
        if ($this.is('form')) {
            defaultURL = $this.attr('action');
            // Is this element an anchor tag?
        } else if ($this.is('a')) {
            defaultURL = $this.attr('href');
            // Is this element a button? If it is, it must have a proURL attribute
            // e.g. -> data-pro-url="/url-to-ajax"
        } else if ($this.is('button')) {
            defaultURL = false;
        }

        // If the pro URL is not set, then the default url is whatever URL the ajax request was supposed to request
        if (!proURL) {
            proURL = defaultURL;
        }


        var inlineValidationHiddenAttribute = $this.attr('data-pro-inline-validation');
        if (!(typeof inlineValidationHiddenAttribute !== typeof undefined && inlineValidationHiddenAttribute !== false)) {
            inlineValidationHiddenAttribute = -1;
        }

        // This is the easiest way to have default options.
        var proSettings = $.extend({
            // These are the defaults.
            proAjaxURL: proURL,
            beforeAjax: $this.attr('data-pro-before'),
            afterAjax: $this.attr('data-pro-after'),
            alertElement: $this.attr('data-pro-alert'),
            showLoadingIcon: true,
            loadingIcon: 'fa fa-spinner-third fa-spin',
            proAjaxType: 'post',
            proData: $this.serialize(),
            debug: false,

            hideInlineValidation: $this.attr('data-pro-hide-inline-validation'), // Hide the inline validation,
            ignoreInlineValidation: inlineValidationHiddenAttribute, // ID of elements to not show validation message for
            hideAlert: $this.attr('data-pro-hide-alert')

        }, options);


        if (!proSettings.proAjaxURL && proSettings.debug) {
            console.log('ERROR: URL for ajax not provided! Please ensure that a proper url exists for ProAJAX.');
        }
        proAjaxRequest($this, proSettings);

    };

}(jQuery));

function proAjaxRequest($this, proSettings) {

    var proSubmitButton = $this;
    // If the current element is a form, obvious $this is not a button, so let's find a button
    if ($this.is('form')) {
        proSubmitButton = $this.find('button[type=submit]');
        if (proSubmitButton.length == 0) {
            console.log(proSubmitButton.length)
            proSubmitButton = $("#form_submit_pro");
        }
    }

    $.ajax({
        type: $this.attr('method'),
        dataType: 'JSON',
        url: proSettings.proAjaxURL,
        data: proSettings.proData,
        beforeSend: function () {
            if (proSettings.debug) {
                console.log('Sending Ajax Request...');
            }

            if (!proSettings.hideInlineValidation) {
                $('.validation-error-message ').remove();
            }
            $('.form-control').closest('.form-group').removeClass('has-error');


            // Run the method before the ajax request, if any
            if (proSettings.beforeAjax) {
                window[proSettings.beforeAjax]($this);
            }
            if (proSettings.showLoadingIcon) {
                showLoadingIcon();
            }
        },
        success: function (data) {

            // Hide the loading icon and enable submit button
            if (proSettings.showLoadingIcon) {
                hideLoadingIcon();
            }

            if (data.redirect) {
                window.location.href = data.redirect;
            }

            // Display the success message
            successMessage(data);

            // Call the method after a SUCCESSFUL ajax request
            if (proSettings.afterAjax) {
                try {
                    window[proSettings.afterAjax](data, $this);
                } catch (ex) {
                    if (proSettings.debug) {
                        console.log('ERROR:' + proSettings.afterAjax + '() function does not exist. It\'s called after the ajax request for ProAJAX')
                    }
                }
            }


            if (proSettings.debug) {
                console.log('Success ajax request');
            }
        },
        // If there is an error such as validation
        error: function (data) {

            if (proSettings.debug) {
                console.log('Error ajax request');
            }

            if (data.redirect) {
                window.location.href = data.redirect;
            }

            if (proSettings.showLoadingIcon) {
                hideLoadingIcon();
            }

            if (data.status === 200 && data.responseText) {
                successMessage(data);
            } else if (data.responseText) {
                errorMessage(data);
            }
        }
    });


    /**
     * Show the loading icon near the button before doing the ajax request
     */
    function showLoadingIcon() {
        console.log('showLoadingIcon')
        proSubmitButton.attr('disabled', true);
        if ($this.find('i .pro-loading-icon')) {
            proSubmitButton.find('i').hide();
            proSubmitButton.prepend($("<i class='pro-loading-icon " + proSettings.loadingIcon + "'></i>"));
        }
    }

    /**
     * Remove the loading icon from button
     */
    function hideLoadingIcon() {
        console.log('hideLoadingIcon')
        proSubmitButton.attr('disabled', false);
        // Hide the loading icon
        proSubmitButton.find('.pro-loading-icon').remove();
        // Show any hidden icons
        proSubmitButton.find('i').show();
    }


    /**
     * Parse and show error message to user that the server sends
     * Also show error message if there are any exceptions thrown to user
     * @param data
     */
    function errorMessage(data) {

        var alertElement = $('#' + proSettings.alertElement);

        var alertHtml = '<div class="alert alert-dismissible bg-success d-flex flex-column flex-sm-row p-2 mb-10" role="alert"><span class="svg-icon svg-icon-2hx svg-icon-light me-4 mb-5 mb-sm-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">\n' +
            '<path opacity="0.3" d="M5.78001 21.115L3.28001 21.949C3.10897 22.0059 2.92548 22.0141 2.75004 21.9727C2.57461 21.9312 2.41416 21.8418 2.28669 21.7144C2.15923 21.5869 2.06975 21.4264 2.0283 21.251C1.98685 21.0755 1.99507 20.892 2.05201 20.7209L2.886 18.2209L7.22801 13.879L10.128 16.774L5.78001 21.115Z" fill="black"/>\n' +
            '<path d="M21.7 8.08899L15.911 2.30005C15.8161 2.2049 15.7033 2.12939 15.5792 2.07788C15.455 2.02637 15.3219 1.99988 15.1875 1.99988C15.0531 1.99988 14.92 2.02637 14.7958 2.07788C14.6717 2.12939 14.5589 2.2049 14.464 2.30005L13.74 3.02295C13.548 3.21498 13.4402 3.4754 13.4402 3.74695C13.4402 4.01849 13.548 4.27892 13.74 4.47095L14.464 5.19397L11.303 8.35498C10.1615 7.80702 8.87825 7.62639 7.62985 7.83789C6.38145 8.04939 5.2293 8.64265 4.332 9.53601C4.14026 9.72817 4.03256 9.98855 4.03256 10.26C4.03256 10.5315 4.14026 10.7918 4.332 10.984L13.016 19.667C13.208 19.859 13.4684 19.9668 13.74 19.9668C14.0115 19.9668 14.272 19.859 14.464 19.667C15.3575 18.77 15.9509 17.618 16.1624 16.3698C16.374 15.1215 16.1932 13.8383 15.645 12.697L18.806 9.53601L19.529 10.26C19.721 10.452 19.9814 10.5598 20.253 10.5598C20.5245 10.5598 20.785 10.452 20.977 10.26L21.7 9.53601C21.7952 9.44108 21.8706 9.32825 21.9221 9.2041C21.9737 9.07995 22.0002 8.94691 22.0002 8.8125C22.0002 8.67809 21.9737 8.54505 21.9221 8.4209C21.8706 8.29675 21.7952 8.18392 21.7 8.08899Z" fill="black"/>\n' +
            '</svg></span><div class="d-flex flex-column text-light pe-0 pe-sm-10 h-100 align-self-center"><span><div class="d-flex flex-column text-light pe-0 pe-sm-10 h-100 align-self-center">';

        if (alertElement.length === 0) {
            alertElement = ProAjaxConfig.defaultAlertElement;
        }

        if (data.status === 422) {

            var errors = $.parseJSON(data.responseText);

            // It's laravel 5.5 or above
            if (errors['errors']) {
                errors = errors['errors'];
            }

            alertHtml += '<ul>';

            $.each(errors, function (key, value) {

                var $input = $('.form-control[name=' + key + ']');
                var $inputParent = $input.parent();

                $input.closest('.form-group').addClass('has-error');

                alertHtml += '<li>' + value + '</li>';

                // Add the validation error message as a span
                if (!proSettings.hideInlineValidation) {
                    if ($inputParent.hasClass('input-group')) {
                        $inputParent.after('<span class="help-block validation-error-message">' + value + '</span>');
                    } else {
                        $input.after('<span class="help-block validation-error-message">' + value + '</span>');
                    }
                }

            });

            alertHtml += "</ul>";

        } else if (data.status === 500) {
            alertHtml += 'An unexpected error occurred.';
        } else if (data.status === 403) {
            alertHtml += 'You do not have permission to do that.';
        }
        alertHtml += '</span></div></div><button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert"><span class="svg-icon svg-icon-1 svg-icon-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">\n' +
            '<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"/>\n' +
            '<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"/>\n' +
            '</svg></span></button></div>';

        if (!proSettings.hideAlert) {
            alertElement.html(alertHtml);
        }
    }

    /**
     * Parse and show success message to user that the server sends
     * @param data
     */
    function successMessage(data) {

        var alertElement = $('#' + proSettings.alertElement);

        if (alertElement.length === 0) {
            alertElement = ProAjaxConfig.defaultAlertElement;
        }
        // Clear the alert element with previous alert messages...
        alertElement.html('');
        // If the server requests no alert to be shown, don't show any alert.
        if (data.redirect) {
            window.location.href = data.redirect;
        }
        if (data.message) {
            toastr.options = {
                "rtl": true,
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-center",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "6000",
                "timeOut": "6000",
                "extendedTimeOut": "2000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };

            toastr.success(data.message);

            var alertHtml = '<div class="alert alert-dismissible bg-success d-flex flex-column flex-sm-row p-2 mb-10" role="alert"><span class="svg-icon svg-icon-2hx svg-icon-light me-4 mb-5 mb-sm-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">\n' +
                '<path opacity="0.3" d="M5.78001 21.115L3.28001 21.949C3.10897 22.0059 2.92548 22.0141 2.75004 21.9727C2.57461 21.9312 2.41416 21.8418 2.28669 21.7144C2.15923 21.5869 2.06975 21.4264 2.0283 21.251C1.98685 21.0755 1.99507 20.892 2.05201 20.7209L2.886 18.2209L7.22801 13.879L10.128 16.774L5.78001 21.115Z" fill="black"/>\n' +
                '<path d="M21.7 8.08899L15.911 2.30005C15.8161 2.2049 15.7033 2.12939 15.5792 2.07788C15.455 2.02637 15.3219 1.99988 15.1875 1.99988C15.0531 1.99988 14.92 2.02637 14.7958 2.07788C14.6717 2.12939 14.5589 2.2049 14.464 2.30005L13.74 3.02295C13.548 3.21498 13.4402 3.4754 13.4402 3.74695C13.4402 4.01849 13.548 4.27892 13.74 4.47095L14.464 5.19397L11.303 8.35498C10.1615 7.80702 8.87825 7.62639 7.62985 7.83789C6.38145 8.04939 5.2293 8.64265 4.332 9.53601C4.14026 9.72817 4.03256 9.98855 4.03256 10.26C4.03256 10.5315 4.14026 10.7918 4.332 10.984L13.016 19.667C13.208 19.859 13.4684 19.9668 13.74 19.9668C14.0115 19.9668 14.272 19.859 14.464 19.667C15.3575 18.77 15.9509 17.618 16.1624 16.3698C16.374 15.1215 16.1932 13.8383 15.645 12.697L18.806 9.53601L19.529 10.26C19.721 10.452 19.9814 10.5598 20.253 10.5598C20.5245 10.5598 20.785 10.452 20.977 10.26L21.7 9.53601C21.7952 9.44108 21.8706 9.32825 21.9221 9.2041C21.9737 9.07995 22.0002 8.94691 22.0002 8.8125C22.0002 8.67809 21.9737 8.54505 21.9221 8.4209C21.8706 8.29675 21.7952 8.18392 21.7 8.08899Z" fill="black"/>\n' +
                '</svg></span><div class="d-flex flex-column text-light pe-0 pe-sm-10 h-100 align-self-center"><span><div class="d-flex flex-column text-light pe-0 pe-sm-10 h-100 align-self-center">';
            alertHtml += data.message + '</span></div></div><button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert"><span class="svg-icon svg-icon-1 svg-icon-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">\n' +
                '<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"/>\n' +
                '<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"/>\n' +
                '</svg></span></button></div>';
            if (!proSettings.hideAlert) {
                alertElement.html(alertHtml);
            }
        }
    }
}
