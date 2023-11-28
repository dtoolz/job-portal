"use strict";

(function($, window, i) {

    $.fn.fireModal = function(options) {
        var options = $.extend({
            size: 'modal-md',
            center: false,
            animation: true,
            title: 'Modal Title',
            closeButton: true,
            header: true,
            bodyClass: '',
            footerClass: '',
            body: '',
            buttons: [],
            autoFocus: true,
            removeOnDismiss: false,
            created: function() {},
            appended: function() {},
            onFormSubmit: function() {},
            modal: {}
        }, options);

        this.each(function() {
            i++;
            var id = 'fire-modal-' + i,
                trigger_class = 'trigger--' + id,
                trigger_button = $('.' + trigger_class);

            $(this).addClass(trigger_class);

            let body = options.body;

            if(typeof body == 'object') {
                if(body.length) {
                    let part = body;
                    body = body.removeAttr('id').clone().removeClass('modal-part');
                    part.remove();
                }else{
                    body = '<div class="text-danger">Modal part element not found!</div>';
                }
            }

            var modal_template = '   <div class="modal'+ (options.animation == true ? ' fade' : '') +'" tabindex="-1" role="dialog" id="'+ id +'">  '  +
                '     <div class="modal-dialog '+options.size+(options.center ? ' modal-dialog-centered' : '')+'" role="document">  '  +
                '       <div class="modal-content">  '  +
                ((options.header == true) ?
                    '         <div class="modal-header">  '  +
                    '           <h5 class="modal-title">'+ options.title +'</h5>  '  +
                    ((options.closeButton == true) ?
                        '           <button type="button" class="close" data-dismiss="modal" aria-label="Close">  '  +
                        '             <span aria-hidden="true">&times;</span>  '  +
                        '           </button>  '
                        : '') +
                    '         </div>  '
                    : '') +
                '         <div class="modal-body">  '  +
                '         </div>  '  +
                (options.buttons.length > 0 ?
                    '         <div class="modal-footer">  '  +
                    '         </div>  '
                    : '')+
                '       </div>  '  +
                '     </div>  '  +
                '  </div>  ' ;

            var modal_template = $(modal_template);

            var this_button;
            options.buttons.forEach(function(item) {

                let id = "id" in item ? item.id : '';

                this_button = '<button type="'+ ("submit" in item && item.submit == true ? 'submit' : 'button') +'" class="'+ item.class +'" id="'+ id +'">'+ item.text +'</button>';

                this_button = $(this_button).off('click').on("click", function() {
                    item.handler.call(this, modal_template);
                });
                $(modal_template).find('.modal-footer').append(this_button);
            });

            $(modal_template).find('.modal-body').append(body);

            if(options.bodyClass) $(modal_template).find('.modal-body').addClass(options.bodyClass);

            if(options.footerClass) $(modal_template).find('.modal-footer').addClass(options.footerClass);

            options.created.call(this, modal_template, options);

            let modal_form = $(modal_template).find('.modal-body form'),
                form_submit_btn = modal_template.find('button[type=submit]');

            $("body").append(modal_template);

            options.appended.call(this, $('#' + id), modal_form, options);

            if(modal_form.length) {
                if(options.autoFocus) {
                    $(modal_template).on('shown.bs.modal', function() {
                        if(typeof options.autoFocus == 'boolean')
                            modal_form.find('input:eq(0)').focus();
                        else if(typeof options.autoFocus == 'string' && modal_form.find(options.autoFocus).length)
                            modal_form.find(options.autoFocus).focus();
                    });
                }

                let form_object = {
                    startProgress: function() {
                        modal_template.addClass('modal-progress');
                    },
                    stopProgress: function() {
                        modal_template.removeClass('modal-progress');
                    }
                };

                if(!modal_form.find('button').length) $(modal_form).append('<button class="d-none" id="'+ id +'-submit"></button>');

                form_submit_btn.on('click',function() {
                    modal_form.submit();
                });

                modal_form.on('submit',function(e) {
                    form_object.startProgress();
                    options.onFormSubmit.call(this, modal_template, e, form_object);
                });
            }

            $(document).on("click", '.' + trigger_class, function() {
                let modal = $('#' + id).modal(options.modal);

                if(options.removeOnDismiss) {
                    modal.on('hidden.bs.modal', function() {
                        modal.remove();
                    });
                }

                return false;
            });
        });
    }

    $.destroyModal = function(modal) {
        modal.modal('hide');
        modal.on('hidden.bs.modal', function() {
        });
    }

    $.cardProgress = function(card, options) {
        var options = $.extend({
            dismiss: false,
            dismissText: 'Cancel',
            spinner: true,
            onDismiss: function() {}
        }, options);

        var me = $(card);

        me.addClass('card-progress');
        if(options.spinner == false) {
            me.addClass('remove-spinner');
        }

        if(options.dismiss == true) {
            var btn_dismiss = '<a class="btn btn-danger card-progress-dismiss">'+options.dismissText+'</a>';
            btn_dismiss = $(btn_dismiss).off('click').on('click', function() {
                me.removeClass('card-progress');
                me.find('.card-progress-dismiss').remove();
                options.onDismiss.call(this, me);
            });
            me.append(btn_dismiss);
        }

        return {
            dismiss: function(dismissed) {
                $.cardProgressDismiss(me, dismissed);
            }
        };
    }

    $.cardProgressDismiss = function(card, dismissed) {
        var me = $(card);
        me.removeClass('card-progress');
        me.find('.card-progress-dismiss').remove();
        if(dismissed)
            dismissed.call(this, me);
    }

    $.chatCtrl = function(element, chat) {
        var chat = $.extend({
            position: 'chat-right',
            text: '',
            time: moment(new Date().toISOString()).format('hh:mm'),
            picture: '',
            type: 'text',
            timeout: 0,
            onShow: function() {}
        }, chat);

        var target = $(element),
            element = '<div class="chat-item '+chat.position+'" style="display:none">' +
                '<img src="'+chat.picture+'">' +
                '<div class="chat-details">' +
                '<div class="chat-text">'+chat.text+'</div>' +
                '<div class="chat-time">'+chat.time+'</div>' +
                '</div>' +
                '</div>',
            typing_element = '<div class="chat-item chat-left chat-typing" style="display:none">' +
                '<img src="'+chat.picture+'">' +
                '<div class="chat-details">' +
                '<div class="chat-text"></div>' +
                '</div>' +
                '</div>';

        var append_element = element;
        if(chat.type == 'typing') {
            append_element = typing_element;
        }

        if(chat.timeout > 0) {
            setTimeout(function() {
                target.find('.chat-content').append($(append_element).fadeIn());
            }, chat.timeout);
        }else{
            target.find('.chat-content').append($(append_element).fadeIn());
        }

        var target_height = 0;
        target.find('.chat-content .chat-item').each(function() {
            target_height += $(this).outerHeight();
        });
        setTimeout(function() {
            target.find('.chat-content').scrollTop(target_height, -1);
        }, 100);
        chat.onShow.call(this, append_element);
    }
})(jQuery, this, 0);

