<!-- Modal Start -->
<div class="modal fade" id="deleteModal" role="dialog" aria-labelledby="exampleModalLabel"
                    data-current-step="1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitle">Delete  Product</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="editForm" action="php/delete.php" method="post">
                                    <fieldset data-step="1">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="hidden" name="delete_id" id="delete_id" class="form-control"
                                                    required />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label for="product_name">Are you sure to Delete this Data?</label>
                                                <input type="text" name="delete_product_name" id="delete_product_name" class="form-control"
                                                    disabled />
                                            </div>
                                        </div>
                                    <div class="modal-footer">
                                        <a  class="btn btn-secondary" data-dismiss="modal" style="background-color: red;">Cancel</a>
                                        <button type="delete" id="delete" class="btn btn-info"  >
                                            Confirm
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
$("#deleteForm").on('delete',(function(e){ e.preventDefault();
$.ajax({
url: "php/delete.php",
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