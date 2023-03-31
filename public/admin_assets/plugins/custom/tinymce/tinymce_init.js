tinymce.init({
    selector: "textarea#mymce",
    font_formats: "IRANSans_b=IRANSans_b;" +
        "Diba=Diba;" +
        "A Nic=ANIC;" +
        "IRANSans_n=IRANSans_n;",
    language: 'fa_IR',
    directionality: 'rtl',
    height: 800,
    content_css: [],
    setup: function (editor) {
        editor.on('init change', function () {
            editor.save();
        });

    },
    plugins: [
        "directionality advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
        "save table contextmenu directionality template paste textcolor toc"
    ],
    toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media | forecolor backcolor toc",
    color_map: [
        '1ABC9C', 'Green',
        'f8c44e', 'Yellow',
        'eb7070', 'Red',
        '6f42c1', 'Purple',
        '5eb4e7', 'Blue',

        '000000', 'Black',
        'ffffff', 'White'
    ],
    mobile: {
        theme: 'silver',
        plugins: [
            "directionality advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "save table contextmenu directionality  template paste textcolor"
        ],
    },
    relative_urls: false,
    remove_script_host: false,
    document_base_url: 'http://localhost:8000',
    custom_colors: true,
    image_title: true,
    automatic_uploads: true,
    images_upload_url: '/upload_image',
    file_picker_types: 'image',
    file_picker_callback: function (cb, value, meta) {
        const input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');
        input.onchange = function () {
            const file = this.files[0];
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function () {
                const id = 'blobid' + (new Date()).getTime();
                const blobCache = tinymce.activeEditor.editorUpload.blobCache;
                const base64 = reader.result.split(',')[1];
                const blobInfo = blobCache.create(id, file, base64);
                blobCache.add(blobInfo);
                cb(blobInfo.blobUri(), {title: file.name});
            };
        };
        input.click();
    },

});
