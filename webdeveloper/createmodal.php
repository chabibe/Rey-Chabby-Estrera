    <!-- Modal Start -->
    <div class="modal fade" id="createModal" role="dialog" aria-labelledby="exampleModalLabel"
                    data-current-step="1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form  enctype="multipart/form-data" id="uploadForm" action="php/add.php" method="post">
                                    <fieldset data-step="1">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label for="user_name">Product Name</label>
                                                <input type="text" name="product_name" id="product_name" class="form-control"
                                                    required />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label for="full_name">Unit</label>
                                                <input type="text" name="unit" id="unit" class="form-control"
                                                    required />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label for="full_name">Price</label>
                                                <input type="number" name="price" id="price" placeholder="0.00"pattern="^\d+(?:\.\d{1,2})?$" class="form-control"
                                                    required />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label for="full_name">Stock</label>
                                                <input type="number" name="stock" id="stock" class="form-control"
                                                    required />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label for="birthday">Expiration Date</label>
                                                <input type="date" name="expiry" id="expiry" class="form-control"
                                                    required />
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset data-step="2">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="file" id="img" name="img" />
                                            </div>
                                        </div>
                                    </fieldset>

                                    <div class="modal-footer">
                                        <button type="submit" id="submit" class="btn btn-info"  >
                                            Submit
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
$("#uploadForm").on('submit',(function(e){ e.preventDefault();
$.ajax({
url: "php/add.php",
type: "POST",
data: new FormData(this),
contentType: false, cache: false, processData:false,
success: function(data){
alert("Data inserted successfully");
window.location.reload(true)
},
error: function(){}
});
}));
});
    </script>