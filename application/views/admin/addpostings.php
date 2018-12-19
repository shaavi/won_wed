
<script>
tinyMCE.init({
    selector: '#content',
    height: 400,
    theme: 'modern',    
    plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help image code'
    ],
    toolbar1: 'undo redo | insert | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | fontsizeselect',
    toolbar2: 'print preview media | forecolor backcolor emoticons | codesample class2list help',

    fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
    formats: {
        bold : {inline : 'b' },
    },
    extended_valid_elements:'u,b',
    invalid_elements:'strong',
    image_advtab: true,
    file_picker_types: 'file image media',
    setup: function(editor) {
        editor.on('ExecCommand', function (e) {
            if("InsertUnorderedList" == e.command) {
                tinyMCE.activeEditor.dom.addClass(tinyMCE.activeEditor.dom.select('ul'), 'browser-default');
            }
        });
    },
    images_upload_handler: function (blobInfo, success, failure) {
        var xhr, formData;
        xhr = new XMLHttpRequest();
        xhr.withCredentials = false;
        xhr.open('POST', '/uploads/');
        var token = $('[name="csrf-token"]').prop('content');
        xhr.setRequestHeader("X-CSRF-Token", token);
        xhr.onload = function() {
            var json;
            if (xhr.status != 200) {
                failure('HTTP Error: ' + xhr.status);
                return;
            }
            json = JSON.parse(xhr.responseText);

            if (!json || typeof json.location != 'string') {
                failure('Invalid JSON: ' + xhr.responseText);
                return;
            }
            success(json.location);
        };
        formData = new FormData();
        formData.append('file', blobInfo.blob(), blobInfo.filename());
        xhr.send(formData);
    },
    file_picker_callback: function(cb, value, meta) {
        var input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/* audio/* video/*');
        input.onchange = function() {
            var file = this.files[0];

            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function () {
                var id = 'blobid' + (new Date()).getTime();
                var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                var base64 = reader.result.split(',')[1];
                var blobInfo = blobCache.create(id, file, base64);
                blobCache.add(blobInfo);

                // call the callback and populate the Title field with the file name
                cb(blobInfo.blobUri(), { title: file.name });
            };
        };

        input.click();
    }
});

</script>

<body>

  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center orange-text">Starter Template</h1>
      <div class="row center">
        <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
      </div>
      <div class="row center">
        <a href="http://materializecss.com/getting-started.html" id="download-button" class="btn-large waves-effect waves-light orange">Get Started</a>
      </div>
      <br><br>

    </div>
  </div>


  <div class="container">
    <div class="section">

  <div class="row">
    <form method="post" action="<?php echo site_url('admin/AdminAddPostingsController/addPosting'); ?>" enctype="multipart/form-data" class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Placeholder" name="title" id="title" type="text" class="validate">
          <label for="title">Title</label>
        </div>
        <div class="input-field col s6">
          <input id="category" name="category" type="text" class="validate">
          <label for="category">Category</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input value="I am not editable" id="content" name="content" type="text" class="validate">
          <label for="content">Content</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Placeholder" id="contact_number" name="contact_number" type="text" class="validate">
          <label for="contact_number">Contact Number</label>
        </div>
        <div class="input-field col s6">
          <input id="contact_email" name="contact_email" type="email" class="validate">
          <label for="contact_email">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Placeholder" name="price_from" id="price_from" type="text" class="validate">
          <label for="price_from">Price from</label>
        </div>
        <div class="input-field col s6">
          <input id="price_to" name="price_to" type="text" class="validate">
          <label for="price_to">Price to</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input  id="address" name="address" type="text" class="validate">
          <label for="address">Address</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="website" name="website" type="text" class="validate">
          <label for="website">Website</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="location" name="location" type="text" class="validate">
          <label for="location">Location</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="cover_image" name="cover_image" type="text" class="validate">
          <label for="cover_image">cover image</label>
        </div>
      </div>
      <input type="submit" id="submit" value="Save Changes"></br></br></br>
    </form>
  </div>
    </div>
    <br><br>
  </div>




