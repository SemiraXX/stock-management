

<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add new product</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body container">
        <p>Product Name</p>
        <input type="text" class="form-control" id="name" placeholder="Type here" name="name"><br>
         <p>Price</p>
        <input type="number" class="form-control" id="price" placeholder="100" name="price"><br>
         <p>Stocks</p>
        <input type="number" class="form-control" id="stocks" placeholder="20" name="stocks">
        <br>
         <button type="submit" class="guidebtn addbtn">Continue</button>

         <br><br>
         <hr>
      </div>

     
    </div>
  </div>
</div>





<!-- The Modal -->
<div class="modal fade" id="deletemodal">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Remove</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body container" align="center">
        <p>Are you sure you want delete the product?</p>
        <input type="hidden" class="form-control" id="deletename" placeholder="Type here" name="deletename"><br>
        
         <button type="submit" class="guidebtn continuedelete">Continue</button>
         <br><br>
      
      </div>

     
    </div>
  </div>
</div>




<!-- The Modal -->
<div class="modal fade" id="updatemodal">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body container">
         <form action="update.php" method="post">
        <p>Product Name</p>
        <input type="text" class="form-control" id="updatename" placeholder="Type here" name="updatename"><br>
         <p>Price</p>
        <input type="number" class="form-control" id="updateprice" placeholder="100" name="updateprice"><br>
         <p>Stocks</p>
        <input type="number" class="form-control" id="updatestocks" placeholder="20" name="updatestocks">
        <br>
        <input type="hidden" class="form-control" id="updateid" placeholder="Type here" name="updateid"><br>
        
         <button type="submit" class="guidebtn">Continue</button>
         <br><br>
      </form>
      </div>

     
    </div>
  </div>
</div>




<!-- The Modal -->
<div class="modal fade" id="sellmodal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">You are about to sell the following product</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body container">

        <div class="row">
          <div class="col-sm-8">
           <p>Product Name</p>
          </div>
          <div class="col-sm-2">
             <p>Price</p>
          </div>
          <div class="col-sm-2">
             <p>Quantity</p>
          </div>
        </div>

         <?php
                 include 'sell.php';

                  $idarray = explode(',',$arrays);

                    foreach ($idarray as $id) {

                       $query20 = "SELECT * FROM tbl_products where id = '$id' order by id desc";
                    
                  
                    if ($result = (mysqli_query($connection, $query20)))
                    {
                    while ($data = mysqli_fetch_array($result))
                    {
                    $id = $data['id'];
                    $name = $data['name'];
                    $stocks = $data['stocks'];
                    $price = $data['price'];
                    $sold = $data['sold'];
          ?>
        <br>
        <div class="row">
          <div class="col-sm-8">
           <input type="text" class="form-control" id="deletename" 
           value="<?php echo $name ?>" name="deletename" disabled>
          </div>
          <div class="col-sm-2">
            <input type="number" class="form-control" id="deletename" 
            value="<?php echo $price ?>" name="deletename" disabled>
          </div>
          <div class="col-sm-2">
            <input type="number" class="form-control" id="deletename" value="<?php echo $stocks ?>" name="deletename">
          </div>
        </div>

        <?php 
      }
         }
                }
                ?>
        
        <br><br>
         <button type="submit" class="guidebtn continuedelete">Continue</button>
         <br><br>
      
      </div>

     
    </div>
  </div>
</div>