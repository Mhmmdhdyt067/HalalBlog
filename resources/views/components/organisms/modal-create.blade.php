@props(['categories']);

<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">TAMBAH POST</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="uploadForm" enctype="multipart/form-data">
                    <x-molecules.form-input type="text" name="title" label="Title" placeholder="Title" class="my-2" />
                    <x-atoms.alert type="danger" name="title" />

                    <x-molecules.form-input type="hidden" name="body" label="Body" placeholder="Body" class="my-2" />
                    <trix-editor input="body" id="trix"></trix-editor>
                    <x-atoms.alert type="danger" name="body" />

                    <x-molecules.select label="Category" name="category" class="my-1" :categories="$categories" />

                    <x-molecules.form-input type="file" name="image" label="Image" placeholder="Image" class="my-2" />
                    <img class="img-preview img-fluid mb-3 col-sm-5" style="display: block" id="img-show" src="">
                    <x-atoms.alert type="danger" name="image" />

            </div>
            <div class="modal-footer">
                <x-atoms.button-close type='button' name='Close' data-bs-dismiss="modal" id="close" />
                <x-atoms.button-submit type='submit' name='Create' id="create" />
            </div>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('js/components/create.js') }}"></script>