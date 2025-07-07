<?= $this->extend("templates_input/index"); ?>



<?= $this->section("content"); ?>
<form action="<?= base_url('article/save/'.$id) ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <center><h4>INPUT ARTICLE</h4></center>
    
    <?php if (session()->getFlashdata('message')) : ?>
        <div class="alert alert-info">
            <?= session()->getFlashdata('message') ?>
        </div>
    <?php endif; ?>
    
    <div class="mb-3">
        <label for="thumbnail" class="form-label">Thumbnail <span class="text-danger">*</span></label>

        <?php if (!empty($data['thumbnail'])) : ?>
            <div class="mb-2">
                <img src="<?= base_url('thumbnail/' . $data['thumbnail']) ?>" alt="Thumbnail lama" style="max-height: 150px;">
            </div>
        <?php endif; ?>

        <input type="file" class="form-control" name="thumbnail" id="thumbnail" accept=".jpg,.jpeg,.png,.webp" <?= empty($data['thumbnail']) ? 'required' : ''; ?>>
    </div>


    <div class="mb-3">
        <label for="writer" class="form-label">Penulis <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="writer" id="writer" value="<?= $data["writer"] ?? ""; ?>" required>
    </div>
    
    <div class="mb-3">
        <label for="title" class="form-label">Judul Artikel <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="title" id="title" value="<?= $data["title"] ?? ""; ?>" required>
    </div>
    
    <div class="mb-3">
        <label for="title" class="form-label">Kategori Artikel <span class="text-danger">*</span></label>
        <select name="category" id="category" class="form-control">
            <?php
            if(!empty($category)){
                foreach ($category as $category) {
                    echo "<option value='".$category["id"]."' ".($data["id_category"] == $category["id"] ? "selected" : "").">".$category["category"]."</option>";
                }
            }else{
                echo "<option>Data Category Kosong</option>";
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="content" class="form-label">Isi Artikel <span class="text-danger">*</span></label>
        <textarea name="content" id="content" class="form-control" rows="10"><?= $data["content"]; ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Simpan Artikel</button>
</form>
<?= $this->endSection(); ?>

<?= $this->section("js"); ?>
<!-- TinyMCE CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.7.0/tinymce.min.js" integrity="sha512-kGk8SWqEKL++Kd6+uNcBT7B8Lne94LjGEMqPS6rpDpeglJf3xpczBSSCmhSEmXfHTnQ7inRXXxKob4ZuJy3WSQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
	tinymce.init({
		selector: '#content',
		plugins: 'preview importcss searchreplace autolink autosave directionality code visualblocks visualchars fullscreen image link codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
		menubar: 'file edit view insert format tools table help',
		toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image link anchor codesample | ltr rtl',
		toolbar_sticky: true,
		autosave_ask_before_unload: true,
		autosave_prefix: '{path}{query}-{id}-',
		autosave_restore_when_empty: false,
		image_advtab: true,
        table_class_list: [
            { title: 'None', value: '' },
            { title: 'Bootstrap Table', value: 'table' },
            { title: 'Bordered', value: 'table table-bordered' },
            { title: 'Striped', value: 'table table-striped' },
            { title: 'Hover', value: 'table table-hover' },
            { title: 'Responsive', value: 'table-responsive' }
        ],
		importcss_append: true,
		template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
		template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
		height: 600,
        setup: function (editor) {
            editor.on('PreInit', function () {
                editor.serializer.addNodeFilter('table', function (nodes) {
                    for (let i = 0; i < nodes.length; i++) {
                        const node = nodes[i];
                        const classAttr = node.attr('class') || '';
                        if (!classAttr.includes('table')) {
                            node.attr('class', 'table table-bordered');
                        }
                    }
                });
            });
        },
		image_caption: true,
		quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
		noneditable_class: 'mceNonEditable',
		toolbar_mode: 'sliding',
		contextmenu: 'link image table',
		content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
	});
</script>

<?= $this->endSection(); ?>