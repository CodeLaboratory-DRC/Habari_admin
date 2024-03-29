/*
 |--------------------------------------------------------------------------
 | Shards Dashboards: Blog Add New Post Template
 |--------------------------------------------------------------------------
 */

'use strict';

(function ($) {
  $(document).ready(function () {

    var toolbarOptions = [
      [{ 'header': [1, 2, 3, 4, 5, false] }],
      ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
      ['blockquote', 'code-block'],
      [{ 'header': 1 }, { 'header': 2 }],               // custom button values
      [{ 'list': 'ordered'}, { 'list': 'bullet' }],
      [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
      [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent                                       // remove formatting button
    ];

    // Init the Quill RTE
    var quill = new Quill('#editor-container', {
      modules: {
        toolbar: toolbarOptions
      },
      placeholder: 'inserer votre texte...',
      theme: 'snow'
    });

    var form = document.querySelector('form');
    form.onsubmit = function() {
      // Populate hidden form on submit
      var about = document.querySelector('input[name=about]');
      about.value = JSON.stringify(quill.getContents());
    };

    console.log('Submitted');
    $(form).serialize();
    $(form).serializeArray();

    // No back end to actually submit to!
    alert('open the console to see the submit data');
    return false;

  });
})(jQuery);

