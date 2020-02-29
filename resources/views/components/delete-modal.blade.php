<div id="delete-modal" class="modal fade" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bd-0 tx-14" id="form-data">
            <div class="modal-header pd-y-20 pd-x-25">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold" id="modal-title">Delete Data</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="" id="form_food_delete">
            	@csrf
            	<div class="modal-body pd-25 text-center">
            	    <input type="hidden" name="id" id="id">
                    <p class="mg-y-20">This Process Cannot be Undone, Continue?</p>
                </div>
                <div class="modal-footer">
            	    <button type="button" id="delete" class="btn btn-danger tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium">Delete</button>
            	    <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-dismiss="modal">Close</button>
            	</div>
            </form>
        </div>
    </div>
</div>
