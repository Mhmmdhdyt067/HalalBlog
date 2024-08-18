@props(['categories'])

<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">EDIT POST</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="updateForm" enctype="multipart/form-data">
                    @csrf
                    <x-molecules.form-input type="text" class="my-2" name="title-edit" label="Title"
                        placeholder="Title" />
                    <x-atoms.alert type="danger" name="title-edit" />

                    <x-molecules.form-input type="hidden" name="body-edit" label="Body" placeholder="Body"
                        class="my-2" />
                    <trix-editor input="body-edit" id="trix-edit"></trix-editor>
                    <x-atoms.alert type="danger" name="body-edit" />

                    <x-molecules.select label="Category" name="category-edit" class="my-1" :categories="$categories" />

                    <x-molecules.form-input type="file" name="image-edit" label="Image" placeholder="Image"
                        class="my-2" />
                    <img class="img-preview img-fluid mb-3 col-sm-5 d-block" src="" id='img-preview'
                        width="50%">
                    <x-atoms.alert type="danger" name="image-edit" />

            </div>
            <div class="modal-footer">
                <x-atoms.button-close type='button' name='Close' data-bs-dismiss="modal" id="close" />
                <x-atoms.button-submit type='submit' name='Update' id="update" />
            </div>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('js/components/edit.js') }}"></script>
