<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <title>
    Rey Chabby Estrera
  </title>
  <!-- CSS Files -->
    <link id="pagestyle" href="css/styles.css" rel="stylesheet" />
  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>

</head>

<body class="g-sidenav-show  bg-gray-200">
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3" id="side">
                <h6 class="text-white text-capitalize ps-3" style="margin-top:10px;">Products Table</h6>
                <!-- Button trigger modal-->
                <button id="pushBtn" class="btn btn-secondary" data-toggle="modal"
                        data-target="#createModal">Add Product</button>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Unit</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Price</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stock</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Cost</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Expiry</th>
                      
                      <th class="text-secondary opacity-7"></th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>

<?php
include 'php/config.php';
$query="select * from tbl_product limit 10"; // 
$result=mysqli_query($conn,$query);
?>
<?php if ($result->num_rows > 0): ?>
<?php while($array=mysqli_fetch_row($result)): ?>

                    <tr>
                      <td id="result_tr" style="display: none;">
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="text-secondary text-xs font-weight-bold"><?php echo $array[0];?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="<?php echo $array[6];?>" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                          <span class="text-secondary text-xs font-weight-bold">
                            <?php echo $array[1];?>
                          </span>
                          </div>
                        </div>
                      </td>
                      <td>
                      <span class="text-secondary text-xs font-weight-bold">
                       <?php echo $array[2];?>
                      </span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold">
                        <?php 
                          $number = sprintf('%.2f',$array[3]);
                          echo $number;
                          ?>
                        </span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $array[5];?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">
                          <?php
                            $totalcost = sprintf('%.2f',$array[3] * $array[5]);
                            echo $totalcost;
                          ?>
                        </span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $array[4];?></span>
                      </td>
                      <td class="align-middle">
                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs editingTRbutton " 
                        data-toggle="modal" data-target="#editModal" data-original-title="Edit user"
                        onclick="updateForm(
                          '<?php echo $array[0];?>',
                          '<?php echo $array[1];?>',
                          '<?php echo $array[2];?>',
                          '<?php echo $array[3];?>',
                          '<?php echo $array[4];?>',
                          '<?php echo $array[5];?>')">
                          Edit
                        </a>
                      </td>
                      <td class="align-middle">
                      <a href="javascript:;" class="text-secondary font-weight-bold text-xs editingTRbutton " 
                        data-toggle="modal" data-target="#deleteModal" data-original-title="Edit user"
                        onclick="deleteData(
                          '<?php echo $array[0];?>',
                          '<?php echo $array[1];?>')">
                          Delete
                        </a>
                      </td>
                    </tr>

<?php endwhile; ?>
<?php else: ?>
<tr>
<td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" colspan="3" rowspan="1" headers="">No Data Found</td>
</tr>
<?php endif; ?>
<?php mysqli_free_result($result); ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

<?php 
    include 'createmodal.php';
?>

<?php 
    include 'editmodal.php';
?>

<?php 
    include 'deletemodal.php';
?>
<script>

    function updateForm(r,x,y,z,w,s)
{
    document.getElementById('edit_id').value = r;
    document.getElementById('edit_product_name').value = x;
    document.getElementById('edit_unit').value = y;
    document.getElementById('edit_stock').value = s;
    document.getElementById('edit_expiry').value = w;
    document.getElementById('edit_price').value = z;

}

function deleteData(a,b)
{
    document.getElementById('delete_id').value = a;
    document.getElementById('delete_product_name').value = b;
    
}

        $('#exampleModal1 ').modalWizard().on('submit', function (e) {
            alert('submited');
            $(this).trigger('reset');

            $(this).modal('hide');
        });

</script>   

    
</body>
</html>