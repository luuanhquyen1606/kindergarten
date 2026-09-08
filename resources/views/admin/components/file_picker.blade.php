@php
    $id = $id ?? 'file_picker_' . uniqid();
    $name = $name ?? 'files';
    $label = $label ?? 'Chọn file';
    $multiple = $multiple ?? true;
    $initial = $initial ?? [];
@endphp

<style>
    #{{ $id }}_modal .files.selected img {
        border: 2px solid transparent;
        border-radius: 8px;
        border-color: #007bff;
    }
    #{{ $id }}_modal .files img {
        cursor: pointer;
    }
</style>

<div class="file-picker" id="{{ $id }}" data-name="{{ $name }}">
    <div class="myfiles-action-bar mb-3">
        <a class="btn btn-phoenix-secondary" href="#!" data-bs-toggle="modal" data-bs-target="#{{ $id }}_modal">
            <span class="fas fa-cloud-upload-alt me-2"></span>{{ $label }}
        </a>
    </div>

    <div class="row g-2 mb-2" data-preview></div>
    <div data-inputs></div>

    <template data-preview-template>
        <div class="col-6 col-sm-4 col-md-3 position-relative" data-file-id="">
            <div class="ratio ratio-1x1 rounded overflow-hidden border">
                <img class="w-100 h-100 object-fit-cover" src="" alt="">
            </div>
            <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 m-1 p-1 lh-1" data-remove title="Xóa">
                <span class="fas fa-times"></span>
            </button>
        </div>
    </template>

    <template data-grid-template>
        <a class="files col-6 col-sm-4 col-md-3 col-xl-2" style="cursor: pointer;" data-id="">
            <div class="hoverbox img-zoom-hover rounded-2">
                <img class="img-fluid" style="aspect-ratio: 1 / 1; object-fit: cover;" src="" alt="">
                <div class="hoverbox-content flex-center flex-column">
                    <span class="name text-white fs-9"></span>
                </div>
            </div>
        </a>
    </template>

    <div class="modal fade" id="{{ $id }}_modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ảnh/Video</h5>
                    <button class="btn btn-close p-1" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-12 col-sm-4 mb-3">
                        <label class="btn btn-primary w-100 mb-0" for="{{ $id }}_upload_input">
                            <span class="fas fa-plus me-2"></span>Tải lên mới
                        </label>
                        <input class="d-none" id="{{ $id }}_upload_input" type="file" accept="image/*,video/*" {{ $multiple ? 'multiple' : '' }}>
                    </div>
                    <div class="row g-3" data-grid></div>
                    <div class="d-flex justify-content-center mt-3">
                        <ul class="pagination mb-0" data-pagination></ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Xong</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
(function () {
    var $root = $('#{{ $id }}');
    var name = $root.data('name');
    var $preview = $root.find('[data-preview]');
    var $inputs = $root.find('[data-inputs]');
    var previewTemplate = $root.find('[data-preview-template]')[0];
    var gridTemplate = $root.find('[data-grid-template]')[0];
    // Moved to <body> so it isn't a DOM descendant of another modal (e.g. create_class_post_modal),
    // keeping it in the same stacking context and safely above it regardless of the page layout.
    var $modal = $root.find('#{{ $id }}_modal').appendTo(document.body);
    var $grid = $modal.find('[data-grid]');
    var $pagination = $modal.find('[data-pagination]');

    var multiple = {{ $multiple ? 'true' : 'false' }};
    var selected = {!! json_encode(array_map(function ($f) {
        return ['id' => $f['id'], 'path' => $f['path']];
    }, $initial)) !!};

    function clone(tpl) {
        return $(document.importNode(tpl.content, true).firstElementChild);
    }

    function isSelected(id) {
        return selected.some(function (f) { return f.id == id; });
    }

    function renderPreview() {
        $preview.empty();
        $inputs.empty();
        selected.forEach(function (file) {
            clone(previewTemplate)
                .attr('data-file-id', file.id)
                .find('img').attr('src', file.path).end()
                .appendTo($preview);
        });
        if (multiple) {
            selected.forEach(function (file) {
                $('<input type="hidden">').attr('name', name + '[]').val(file.id).appendTo($inputs);
            });
        } else {
            $('<input type="hidden">').attr('name', name).val(selected.length ? selected[0].id : '').appendTo($inputs);
        }
    }

    function renderGrid(files) { 
        $grid.empty();
        files.forEach(function (file) {
            clone(gridTemplate)
                .attr('data-id', file.id)
                .toggleClass('selected', isSelected(file.id))
                .find('img').attr('src', file.path).end()
                .find('.name').text(file.original_name).end()
                .appendTo($grid);
        });
    }

    function renderPagination(pager) {
        $pagination.empty();
        for (var page = 1; page <= pager.last_page; page++) {
            $('<li class="page-item' + (page === pager.current_page ? ' active' : '') + '"><a href="#" class="page-link" data-page="' + page + '">' + page + '</a></li>')
                .appendTo($pagination);
        }
    }

    function loadFiles(page) {
        $.getJSON('{{ route('medias.index') }}', { page: page || 1 }, function (res) {
            renderGrid(res.files.data);
            renderPagination(res.files);
        });
    }

    function uploadFile(file) {
        var formData = new FormData();
        formData.append('file', file);
        return $.ajax({
            url: '{{ route('file_upload') }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false
        });
    }

    $grid.on('click', '.files', function () {
        var id = $(this).data('id');
        if (multiple) {
            var index = selected.findIndex(function (f) { return f.id == id; });
            if (index > -1) {
                selected.splice(index, 1);
                $(this).removeClass('selected');
            } else {
                selected.push({ id: id, path: $(this).find('img').attr('src') });
                $(this).addClass('selected');
            }
        } else {
            selected = [{ id: id, path: $(this).find('img').attr('src') }];
            $grid.find('.files').removeClass('selected');
            $(this).addClass('selected');
        }
        renderPreview();
    });

    $pagination.on('click', '.page-link', function (e) {
        e.preventDefault();
        loadFiles($(this).data('page'));
    });

    $preview.on('click', '[data-remove]', function () {
        var id = $(this).closest('[data-file-id]').data('file-id');
        selected = selected.filter(function (f) { return f.id != id; });
        renderPreview();
        $grid.find('.files[data-id="' + id + '"]').removeClass('selected');
    });

    $root.find('#{{ $id }}_upload_input').on('change', function () {
        var $input = $(this);
        if (!multiple) {
            selected = [];
        }
        var uploads = $.map(this.files, function (file) {
            return uploadFile(file).done(function (result) {
                selected.push({ id: result.id, path: result.path });
            });
        });
        $.when.apply($, uploads).always(function () {
            if (!multiple && selected.length > 1) {
                selected = [selected[selected.length - 1]];
            }
            renderPreview();
            loadFiles(1);
            $input.val('');
        });
    });

    // Bootstrap doesn't support one modal shown on top of another: opening this one from
    // inside another already-shown modal leaves that other modal hidden/broken behind it.
    // Remember whichever modal was open when this one was triggered, and explicitly bring
    // it back once this one closes.
    var $modalToRestore = null;

    $modal.on('show.bs.modal', function () {
        loadFiles(1);
        $modalToRestore = $('.modal.show').not(this);
    });

    $modal.on('hidden.bs.modal', function () {
        
        $('#edit_class_post_modal').modal('show');
        /*
        if (!$modalToRestore || !$modalToRestore.length) return;
        bootstrap.Modal.getOrCreateInstance($modalToRestore[0]).show();
        // The call above is a no-op if that modal still thinks it's shown internally
        // (its state was never told it was hidden) - restore its visible state directly too.
        $modalToRestore.addClass('show').css('display', 'block').attr('aria-modal', 'true').removeAttr('aria-hidden');
        $('body').addClass('modal-open');
        $modalToRestore = null;
*/
        



        
    });

    $root.on('picker:reset', function () {
        selected = [];
        renderPreview();
    });

    // Lets a caller pre-populate the picker (e.g. with a post's existing media when editing it).
    // Pass an array of {id, path} objects: $('#picker').trigger('picker:set', [files]);
    $root.on('picker:set', function (e, files) {
        selected = (files || []).map(function (f) { return { id: f.id, path: f.path }; });
        renderPreview();
    });

    renderPreview();
})();
</script>
