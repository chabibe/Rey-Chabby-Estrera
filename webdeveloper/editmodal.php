<!-- Modal Start -->
<div class="modal fade" id="editModal" role="dialog" aria-labelledby="exampleModalLabel"
                    data-current-step="1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitle">Edit Product</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form  enctype="multipart/form-data" id="editForm" action="php/edit.php" method="post">
                                    <fieldset data-step="1">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="hidden" name="edit_id" id="edit_id" class="form-control"
                                                    required />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label for="user_name">Product Name</label>
                                                <input type="text" name="edit_product_name" id="edit_product_name" class="form-control"
                                                    required />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label for="full_name">Unit</label>
                                                <input type="text" name="edit_unit" id="edit_unit" class="form-control"
                                                    required />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label for="full_name">Price</label>
                                                <input type="number" name="edit_price" id="edit_price" placeholder="0.00"pattern="^\d+(?:\.\d{1,2})?$" class="form-control"
                                                    required />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label for="full_name">Stock</label>
                                                <input type="number" name="edit_stock" id="edit_stock" class="form-control"
                                                    required />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label for="expiry">Expiration Date</label>
                                                <input type="date" name="edit_expiry" id="edit_expiry" class="form-control"
                                                    required />
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset data-step="2">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="file" id="edit_img" name="edit_img" />
                                            </div>
                                        </div>
                                    </fieldset>

                                    <div class="modal-footer">
                                        <a  class="btn btn-secondary" data-dismiss="modal">Close</a>
                                        <button type="update" id="update" class="btn btn-info"  >
                                            Update Changes
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal End -->

    <script>
$(document).ready(function (e){
$("#editForm").on('update',(function(e){ e.preventDefault();
$.ajax({
url: "php/edit.php",
type: "POST",
data: new FormData(this),
contentType: false, cache: false, processData:false,
success: function(data){
alert("Data updated successfully");
window.location.reload(true)
},
error: function(){}
});
}));
});
    </script>