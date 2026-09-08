<!DOCTYPE html>
<html lang="en-US" dir="ltr" data-navigation-type="horizontal" data-navbar-horizontal-shape="default">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Phoenix</title>

    <!-- ===============================================-->
    <!--    Favicons--> 
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/admin/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/admin/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/admin/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="/assets/admin/img/favicons/favicon.ico">
    <link rel="manifest" href="/assets/admin/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="/assets/admin/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="/assets/admin/vendors/simplebar/simplebar.min.js"></script> 
    <script src="/assets/admin/js/config.js"></script>
    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
     <link href="/assets/admin/vendors/choices/choices.min.css" rel="stylesheet">  
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="/assets/admin/vendors/simplebar/simplebar.min.css" rel="stylesheet">
    <link href="/assets/admin/vendors/flatpickr/flatpickr.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="/assets/admin/css/theme-rtl.min.css" type="text/css" rel="stylesheet" id="style-rtl">
    <link href="/assets/admin/css/theme.min.css" type="text/css" rel="stylesheet" id="style-default">
    <link href="/assets/admin/css/user-rtl.min.css" type="text/css" rel="stylesheet" id="user-style-rtl">
    <link href="/assets/admin/css/user.min.css" type="text/css" rel="stylesheet" id="user-style-default">
    <link href="/assets/admin/vendors/dhtmlx-gantt/dhtmlxgantt.css" rel="stylesheet">
    <link href="/assets/admin/vendors/dropzone/dropzone.css" rel="stylesheet">
    <link href="/assets/admin/css/custom.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/quill-table-better@1/dist/quill-table-better.css" rel="stylesheet">
    <script>
      var phoenixIsRTL = window.config.config.phoenixIsRTL;
      if (phoenixIsRTL) {
        var linkDefault = document.getElementById('style-default');
        var userLinkDefault = document.getElementById('user-style-default');
        linkDefault.setAttribute('disabled', true);
        userLinkDefault.setAttribute('disabled', true);
        document.querySelector('html').setAttribute('dir', 'rtl');
      } else {
        var linkRTL = document.getElementById('style-rtl');
        var userLinkRTL = document.getElementById('user-style-rtl');
        linkRTL.setAttribute('disabled', true);
        userLinkRTL.setAttribute('disabled', true);
      }
    </script>
    <link href="/assets/admin/vendors/glightbox/glightbox.min.css" rel="stylesheet">
    <link href="/assets/admin/vendors/leaflet/leaflet.css" rel="stylesheet">
    <link href="/assets/admin/vendors/leaflet.markercluster/MarkerCluster.css" rel="stylesheet">
    <link href="/assets/admin/vendors/leaflet.markercluster/MarkerCluster.Default.css" rel="stylesheet">
    <link href="/assets/admin/vendors/nouislider/nouislider.min.css" rel="stylesheet" />
    <script src="/assets/admin/js/jquery.js"></script>  



    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.bubble.css" />

    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill-table-better@1/dist/quill-table-better.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/quill-table-better@1/dist/quill-table-better.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/quill2-image-uploader/dist/quill.imageUploader.min.js"></script>
    


    <link href="https://cdn.jsdelivr.net/npm/@enzedonline/quill-blot-formatter2/dist/css/quill-blot-formatter2.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/@enzedonline/quill-blot-formatter2@3.0/dist/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/quill-table-better@1/dist/quill-table-better.js"></script>
    @include('admin.partials.head')
  </head>

  <body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
  
   
      @include('admin.partials.nav')
     
     
      <div class="content">
        

       @yield('content')
      
       @include('admin.partials.footer')
        
      </div>
     

     


    </main><!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

    <div class="modal fade" id="quillLinkModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Insert Link</h5>
            <button class="btn btn-close p-1" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label" for="quillLinkUrl">URL</label>
              <input type="text" class="form-control" id="quillLinkUrl" placeholder="https://">
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="quillLinkButtonStyle">
              <label class="form-check-label" for="quillLinkButtonStyle">Style as button</label>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-outline-danger me-auto" type="button" id="quillLinkRemove">Remove Link</button>
            <button class="btn btn-outline-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
            <button class="btn btn-primary" type="button" id="quillLinkSave">Save</button>
          </div>
        </div>
      </div>
    </div>



    <!-- ===============================================-->
    <!--    JavaScripts-->       
    <!-- ===============================================-->
    <script src="/assets/admin/vendors/popper/popper.min.js"></script>
    <script src="/assets/admin/vendors/bootstrap/bootstrap.min.js"></script>    
    <script src="/assets/admin/vendors/anchorjs/anchor.min.js"></script>
    <script src="/assets/admin/vendors/is/is.min.js"></script>
    <script src="/assets/admin/vendors/fontawesome/all.min.js"></script>
    <script src="/assets/admin/vendors/lodash/lodash.min.js"></script>
    <script src="/assets/admin/vendors/list.js/list.min.js"></script>
    <script src="/assets/admin/vendors/feather-icons/feather.min.js"></script>
    <script src="/assets/admin/vendors/dayjs/dayjs.min.js"></script>
    <script src="/assets/admin/vendors/flatpickr/flatpickr.min.js"></script>
    <script src="/assets/admin/vendors/leaflet/leaflet.js"></script>
    <script src="/assets/admin/vendors/leaflet.markercluster/leaflet.markercluster.js"></script>
    <script src="/assets/admin/vendors/leaflet.tilelayer.colorfilter/leaflet-tilelayer-colorfilter.min.js"></script>
    
    <script src="/assets/admin/vendors/echarts/echarts.min.js"></script>
    <script src="/assets/admin/js/dashboards/ecommerce-dashboard.js"></script>
    <script src="/assets/admin/js/dashboards/projectmanagement-dashboard.js"></script>
    <script src="/assets/admin/vendors/nouislider/nouislider.min.js"></script>
    <script src="/assets/admin/vendors/dhtmlx-gantt/dhtmlxgantt.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/wnumb@1.2.0/wNumb.min.js"></script>
    <script src="/assets/admin/vendors/tinymce/tinymce.min.js"></script>
    <script src="/assets/admin/vendors/choices/choices.min.js"></script>
    <script src="/assets/admin/vendors/dropzone/dropzone-min.js"></script> 
    <script src="/assets/admin/js/phoenix.js"></script>    
      <script src="/assets/admin/vendors/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/assets/admin/vendors/isotope-packery/packery-mode.pkgd.min.js"></script>
    <script src="/assets/admin/vendors/imagesloaded/imagesloaded.pkgd.min.js"></script> 
    <script src="/assets/admin/vendors/glightbox/glightbox.min.js"></script> 
    @yield('js')
    <script type="text/javascript">


      document.addEventListener("DOMContentLoaded", function () {

const Parchment = Quill.import('parchment');

const Size = Quill.import('attributors/style/size');

Size.whitelist = [
    '12px',
    '14px',
    '16px',
    '18px',
    '20px',
    '22px',
    '24px',
    '32px',
    '36px',
    '40px'
];

Quill.register(Size, true);

Quill.register({
    'modules/table-better': QuillTableBetter
}, true);

const quillLinkModalEl = document.getElementById('quillLinkModal');
const quillLinkModal = new bootstrap.Modal(quillLinkModalEl);
const quillLinkUrlInput = document.getElementById('quillLinkUrl');
const quillLinkButtonStyleInput = document.getElementById('quillLinkButtonStyle');
let quillLinkContext = null;

function applyQuillLink(url, useButtonStyle) {
    if (!quillLinkContext) return;
    const { quill, range } = quillLinkContext;

    if (url) {
        quill.formatText(range.index, range.length, 'link', url, Quill.sources.USER);
        quill.formatText(range.index, range.length, 'buttonLink', useButtonStyle, Quill.sources.USER);
        quill.setSelection(range.index + range.length);
    }
}

function removeQuillLink() {
    if (!quillLinkContext) return;
    const { quill, range } = quillLinkContext;
    quill.formatText(range.index, range.length, 'link', false, Quill.sources.USER);
    quill.setSelection(range.index + range.length);
}

document.getElementById('quillLinkSave').addEventListener('click', function () {
    applyQuillLink(quillLinkUrlInput.value.trim(), quillLinkButtonStyleInput.checked);
    quillLinkModal.hide();
});

document.getElementById('quillLinkRemove').addEventListener('click', function () {
    removeQuillLink();
    quillLinkModal.hide();
});

quillLinkUrlInput.addEventListener('keydown', function (e) {
    if (e.key === 'Enter') {
        e.preventDefault();
        document.getElementById('quillLinkSave').click();
    }
});

quillLinkModalEl.addEventListener('hidden.bs.modal', function () {
    quillLinkContext = null;
});


        const toolbarOptions = [
  ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
  ['blockquote', 'code-block'],
  ['link', 'image', 'video'],

  [{ 'header': 1 }, { 'header': 2 }, { 'header': 3 }, { 'header': 4 }, { 'header': 5 }],               // custom button values
  [{ 'list': 'ordered'}, { 'list': 'bullet' }, { 'list': 'check' }],
     // superscript/subscript
  [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
  [{ 'direction': 'rtl' }],                         // text direction
[{ 'size': Size.whitelist }],
  ['buttonForm'],
  ['table-better'],

  [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme

  [{ 'align': [] }],

                                        // remove formatting button
];

const LinkButtonStyleAttributor = new Parchment.Attributor('buttonLink', 'button', {
    scope: Parchment.Scope.INLINE
});

LinkButtonStyleAttributor.add = function (node, value) {
    node.classList.toggle('button', !!value);
    return true;
};

LinkButtonStyleAttributor.remove = function (node) {
    node.classList.remove('button');
};

LinkButtonStyleAttributor.value = function (node) {
    return node.classList.contains('button');
};

Quill.register(LinkButtonStyleAttributor, true);

const BlockEmbed = Quill.import('blots/block/embed');

class ButtonFormBlot extends BlockEmbed {

    static create(value) {
        const node = super.create();

        const form = document.createElement('form');
        form.action = value.url || '';
        form.method = 'get';

        const button = document.createElement('button');
        button.type = 'submit';
        button.className = 'kidoo-button';
        button.textContent = value.text || 'Click';

        form.appendChild(button);
        node.appendChild(form);

        return node;
    }

    static value(node) {
        return {
            url: node.querySelector('form')?.action || '',
            text: node.querySelector('button')?.textContent || ''
        };
    }
}

ButtonFormBlot.blotName = 'buttonForm';
ButtonFormBlot.tagName = 'div';

Quill.register(ButtonFormBlot);
const quills = {};

$('.quill_editor').each(function () {
    const input_id = $(this).attr('for');
    const id = $(this).attr('id');
    var html = $(this).html();
    quills[input_id] = new Quill($(this)[0], {
    theme: 'snow',
    modules: {
      toolbar: {
        container: toolbarOptions,
        handlers: {

    link: function () {

        const range = this.quill.getSelection(true);
        if (!range) return;

        // No text selected: if the cursor sits inside an existing link, expand to it
        if (range.length === 0) {
            const [leaf] = this.quill.getLeaf(range.index);
            const anchor = leaf && leaf.domNode
                ? (leaf.domNode.nodeType === 3 ? leaf.domNode.parentElement.closest('a') : leaf.domNode.closest('a'))
                : null;

            if (!anchor) {
                alert('Please select the text you want to link.');
                return;
            }

            const blot = Parchment.find(anchor);
            if (blot) {
                range.index = this.quill.getIndex(blot);
                range.length = blot.length();
            }
        }

        const currentFormat = this.quill.getFormat(range);

        quillLinkContext = { quill: this.quill, range: range };
        quillLinkUrlInput.value = currentFormat.link || 'https://';
        quillLinkButtonStyleInput.checked = !!currentFormat.buttonLink;

        quillLinkModal.show();
        setTimeout(function () { quillLinkUrlInput.focus(); quillLinkUrlInput.select(); }, 300);
    },

    buttonForm: function () {

        const range = this.quill.getSelection(true);
        if (!range) return;

        const [leaf] = this.quill.getLeaf(range.index);

        // Editing existing button
        if (leaf instanceof ButtonFormBlot) {

            const current = ButtonFormBlot.value(leaf.domNode);

            const url = prompt('URL', current.url);
            if (!url) return;

            const text = prompt('Button Text', current.text);
            if (!text) return;

            leaf.domNode.querySelector('form').action = url;
            leaf.domNode.querySelector('button').textContent = text;

            return; 
        }

        // Creating new button
        const url = prompt('URL');
        if (!url) return;

        const text = prompt('Button Text', 'Click');
        if (!text) return;

        this.quill.insertEmbed(
            range.index,
            'buttonForm',
            {
                url: url,
                text: text
            },
            Quill.sources.USER
        );

        this.quill.setSelection(range.index + 1);
    }

}
      },
      table: true,

        'table-better': {
            language: 'en_US',
            toolbarTable: true
        },

        keyboard: {
            bindings: QuillTableBetter.keyboardBindings
        },
      
    }
  });

  (function () {
    const quill = quills[input_id];
    const tooltip = quill.theme && quill.theme.tooltip;
    if (!tooltip || !tooltip.root) return;

    tooltip.root.addEventListener('click', function (event) {
        const actionEl = event.target.closest('a.ql-action');
        if (!actionEl || !tooltip.linkRange) return;

        event.preventDefault();
        event.stopPropagation();
        event.stopImmediatePropagation();

        const range = tooltip.linkRange;
        const currentFormat = quill.getFormat(range);

        quillLinkContext = { quill: quill, range: range };
        quillLinkUrlInput.value = currentFormat.link || (tooltip.preview && tooltip.preview.textContent) || 'https://';
        quillLinkButtonStyleInput.checked = !!currentFormat.buttonLink;

        delete tooltip.linkRange;
        tooltip.hide();

        quillLinkModal.show();
        setTimeout(function () { quillLinkUrlInput.focus(); quillLinkUrlInput.select(); }, 300);
    }, true);
  })();

  quills[input_id].on('text-change', function () {
    console.log(quills[input_id].root.innerHTML);
    $('#'+input_id).val(quills[input_id].root.innerHTML);
   
  });

var html=$("#"+input_id).val();

quills[input_id].updateContents(
    quills[input_id].clipboard.convert({ html })
);




});

  













      });
    </script>
  </body>
 
</html>