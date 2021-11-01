<!-- Modal -->
<div class="modal fade" id="form_menu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add To Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="category_form" onsubmit="return false">
                    <div class="form-group">
                        <label class="form-label">Menu Item Name :</label>
                        <input type="text" class="form-control" name="category_name" id="category_name">
                        <small id="cat_error" class="form-text text-muted"></small>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="form-label">Parent Item :</label>
                        <select class="form-control" name="parent_cat" id="parent_cat">
                        </select>
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