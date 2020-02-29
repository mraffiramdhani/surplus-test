<div id="create-modal" class="modal fade" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bd-0 tx-14" id="form-data">
            <div class="modal-header pd-y-20 pd-x-25">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold" id="modal-title">Add New Data</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="" data-parsley-validate id="form_food_create">
                @csrf
                <div class="modal-body pd-25">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" name="name" required="">
                    </div>
                    <div class="form-group">
                      <label for="restaurant">Restaurant</label>
                      <input type="text" class="form-control" name="restaurant" required>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" name="price">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="discount">Discount</label>
                            <input type="number" class="form-control" name="discount">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="create" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium">Confirm</button>
                    <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
