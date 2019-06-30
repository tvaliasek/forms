/**
 * This file is part of the Nextras community extensions of Nette Framework
 *
 * @license    MIT
 * @link       https://github.com/nextras/forms
 * @author     Jan Skrasek
 * @author     Tomas Valiasek
 */

jQuery.fn.extend({
	reinitDatetimePickers: function () {
		$('input.date, input.datetime-local').each(function (i, el) {
			el = $(el);
			el.get(0).type = 'text';
			var $val = el.attr('value');
			var $options = {
				debug: false,
				startDate: el.attr('min'),
				endDate: el.attr('max'),
				format: el.is('.date') ? 'D.M.YYYY' : 'D.M.YYYY - H:mm',
				locale: 'cs',
				sideBySide: true,
                buttons: {
				    showToday: false,
				    showClose: true,
                    showClear: false
                },
                allowInputToggle: true,
				ignoreReadonly: true,
				defaultDate: ($val !== false && $val !== undefined) ? moment($val, moment.ISO_8601) : false
			};
			el.datetimepicker($options);
			if ($val !== false && $val !== undefined) {
				el.val(moment($val, moment.ISO_8601).format(el.is('.date') ? 'D.M.YYYY' : 'D.M.YYYY - H:mm'));
			}

			$(this).on('focusin', function() {
			    $(this).datetimepicker('show');
            });

            $(this).on('focusout', function() {
                $(this).datetimepicker('hide');
            });

		});
	}
});

jQuery(function ($) {
    $.fn.reinitDatetimePickers();
    $.nette.ext('datepickers', {
        complete: function(payload, status, jqXHR, settings){
            if(payload.hasOwnProperty('snippets')){
                for (var index in payload.snippets) {
                    var snippet = payload.snippets[index]
                    if (
                        snippet.indexOf('type="date') > -1 ||
                        snippet.indexOf('type="datetime-local') > -1 ||
                        snippet.indexOf('type="datetime') > -1
                    ) {
                        $.fn.reinitDatetimePickers();
                        break;
                    }
                }
            }
        }
    })
});
