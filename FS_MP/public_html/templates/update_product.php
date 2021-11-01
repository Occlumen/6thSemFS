<!-- Modal -->
<div class="modal fade" id="update_stock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Stock Addition</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="update_product_form" onsubmit="return false">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                        <input type="hidden" name="pid" id="pid" value="" />
                            <label>Date :</label>
                            <input type="text" class="form-control" name="added_date" id="added_date" value="<?php echo date("Y-m-d"); ?>" readonly />
                        </div>
                        <div class="form-group col-md-4">
                            <label>Product Name :</label>
                            <input type="text" class="form-control" name="update_pro" id="update_pro" placeholder="Enter Product Name" required />
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Menu Item</label>
                        <select id="select_cat" name="select_cat" class="form-control" required/>


                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Distributer</label>
                        <select id="select_brand" name="select_brand" class="form-control" required/>



                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Product Price :</label>
                        <input type="text" class="form-control" name="product_price" id="product_price" placeholder="Enter Product Price" required />
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Quantity :</label>
                        <input type="text" class="form-control" name="product_qty" id="product_qty" placeholder="Enter Product Quantity" required />
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Update Stock</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>