<div class="modal fade" id="modal-show" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">DETAIL POST</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row gy-3">
                    <div class="col-lg-6">
                        <img src="" alt="" id="img-detail" class="" width="100%" height="auto">
                    </div>
                    <div class="col-lg-6 d-flex flex-column justify-content-center">
                        <div class="about-content ps-0 ps-lg-3">
                            <h3 id="title-show"></h3>
                            <p id="category-show" class="fst-italic"></p>
                            <p id="body-show"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <x-atoms.button-close type='button' id="close" name='Close' data-bs-dismiss="modal" />
                </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/components/show.js') }}"></script>
