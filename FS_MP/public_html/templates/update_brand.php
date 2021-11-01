<!-- Modal -->
<div class="modal fade" id="update_distributer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add To Distribuster List</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="update_brand_form" onsubmit="return false">
                    <div class="form-group">
                        <label class="form-label">Distributer Name :</label>
                        <input type="hidden" name="bid" id="bid" value="" />
                        <input type="text" class="form-control" name="update_brand" id="update_brand">
                        <small id="cat_error" class="form-text text-muted"></small>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>