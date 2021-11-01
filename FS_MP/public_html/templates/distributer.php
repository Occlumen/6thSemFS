<!-- Modal -->
<div class="modal fade" id="form_distributer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Distributer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="brand_form" onsubmit="return false">
                    <div class="form-group">
                        <label class="form-label">Distributer Name :</label>
                        <input type="text" class="form-control" name="brand_name" id="brand_name" placeholder="Enter Distributer Name ">
                        <small id="brand_error" class="form-text text-muted"></small>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>