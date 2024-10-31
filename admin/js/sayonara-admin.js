(function($) {
  'use strict';

  $(function() {

    $('.sayonara-color-picker').wpColorPicker();

    $('#sayonara_visibility_posts').select2({
      width: '50%',
      placeholder: 'Select pages from the list, or start typing!',
      allowClear: true
    });

    function triggerType() {

      switch ($("._sayonara_trigger_type_field input:radio:checked").val()) {
        case 'exit':
          $('._sayonara_ruthless_mode_field').show();
          $('._sayonara_popup_delay_field, ._sayonara_popup_scroll_field').hide();
          break;
        case 'delay':
          $('._sayonara_popup_delay_field').show();
          $('._sayonara_ruthless_mode_field, ._sayonara_popup_scroll_field').hide();
          break;
        case 'scroll':
          $('._sayonara_popup_scroll_field').show();
          $('._sayonara_ruthless_mode_field, ._sayonara_popup_delay_field').hide();
          break;
      }
    }
    triggerType();

    $('._sayonara_trigger_type_field').change(function() {
      triggerType();
    });
  });

  $(function() {

    var a = '#' + $('#sayonara_form_active_tab').val();
    $('.sayonara_options_panel').not($(a)).hide();

    $('.sayonara-metabox-tabs li a').on('click', function(e) {
      e.preventDefault();

      var n = '#' + $(this).data("tab-id");
      var m = $(this).attr('href') + '&sayonara_tab=' + $(this).data("tab-id");
      history.replaceState(null, null, m);
      $(n).show();
      $(n).addClass('active');
      $('.sayonara_options_panel').not($(n)).hide();
      $('.sayonara_options_panel').not($(n)).removeClass('active');
      $('#sayonara_form_active_tab').val($(this).data("tab-id"));

    });
  });

  $(function() {
    $('.meta-box-sortables').on('sortstop', function(e, obj) {

      var wrap = obj.item[0];

      $('#sayonara_main_editor', wrap).each(function() {
        var ed = tinymce.get(this.id);
        var content = ed.getContent();

        // Disable the editor
        var cmd = 'mceRemoveControl';
        if (parseInt(tinymce.majorVersion) >= 4) {
          cmd = 'mceRemoveEditor';
        }
        tinymce.execCommand(cmd, false, this.id);

        // Immediately re-enable the editor
        var cmd = 'mceAddControl';
        if (parseInt(tinymce.majorVersion) >= 4) {
          cmd = 'mceAddEditor';
        }
        tinymce.execCommand(cmd, false, this.id);

        // Replace the content with what it was to correct paragraphs
        ed = tinymce.get(this.id);
        ed.setContent(content);


      });
    });
  });

})(jQuery);