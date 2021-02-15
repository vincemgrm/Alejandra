
 <?php
            if(isset($_POST['fsubmit'])){
              $total = $_POST['total'];
              $dp=$total*.2;
              $userid=$_POST['userid'];
              
            }  

             if(isset($_POST['penalty'])){
              $tn = $_POST['tn'];
              
              
            }    
            ?>

<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add New Product</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="cart_add.php">
                <input type="hidden" class="userid" name="id">
                <input type="hidden" class="userid" name="transaction-no">
                <div class="form-group">
                    <label for="product" class="col-sm-3 control-label">Product</label>

                    <div class="col-sm-9">
                      <select class="form-control select2" style="width: 100%;" name="product" id="product" required>
                        <option value="" selected>- Select -</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="quantity" class="col-sm-3 control-label">Quantity</label>

                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="quantity" name="quantity" value="1" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>




<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="productname"></span></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="cart_edit.php">
                <input type="hidden" class="cartid" name="cartid">
                <input type="hidden" class="userid" name="userid">
                <div class="form-group">
                    <label for="edit_quantity" class="col-sm-3 control-label">Quantity</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_quantity" name="quantity">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Deleting...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="cart_delete.php">
                <input type="hidden" class="cartid" name="cartid">
                <input type="hidden" class="userid" name="userid">
                <div class="text-center">
                    <p>DELETE PRODUCT</p>
                    <h2 class="bold productname"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>



<!--send transaction-->
<div class="modal fade" id="send_transaction">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
               <h4 align="center" class="modal-title">SAVE TRANSACTION
            <span class="pull-right"><i data-dismiss="modal" class="fa fa-close"></i> </button></span></h4>
           <!--    <h4 class="modal-title"><b>Send Transaction</b></h4> -->
            </div>
           
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="send_transaction.php">
            <input type="hidden" name='userid' value=<?php echo $_GET['user'] ;?> >
                 <input type="hidden" name='cash' value=<?php echo $total*.2 ;?> >
                <div class="text-center">
                   
                    <h4 class="bold fullname">Downpayment Required is Php <?php echo number_format(($total*0.20),2);?></h4>
                </div>
            </div>
            <div class="form-group">
                    <label for="edit_company" class="col-sm-4 control-label"><span class="pull-right">Pay Bigger Amount</label>

                    <div class="col-sm-4">
                      <input type="text"  class="form-control" name="bigger_amount">
                    </div>
                      <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary btn-flat" name="pba"><span class="pull-right">Save</button>
                    </div>
                  </div>

            <div class="modal-footer">
             <br>
             <br>
              <button type="submit" class="btn btn-success btn-flat" name="send_transaction">Pay Exact Amount</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- check payment -->
<div class="modal fade" id="check_payment">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title" align="center">Confirm Payment</h4>
                    <h2 class="bold fullname"></h2>
            <span aria-hidden="true"></span></button>
           
            </div>

            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="check_payment.php">
             <input type="hidden" class="form-control" id="payment_id" name="payment_id">
              <input type="hidden" class="form-control" id="transaction_no" name="transaction_no">
               <input type="hidden" class="form-control" id="userid" name="user_id">
                <input type="text" class="form-control"  name="bill">

                <div class="form-group">

                    <label class="col-sm-7 control-label">Amount Due: <span class="pull-right">Php</label><label for="amount_due" name="bill" id="amount_due" class="col-sm-0 control-label"></label>
                </div>
                 
                <div class="hidden-center">
                  
                 <div class="form-group">
                    <label for="edit_company" class="col-sm-4 control-label"><span class="pull-right">Pay in Advance:</label>

                    <div class="col-sm-4">
                      <input type="text" placeholder="Enter Amount"  class="form-control" name="bigger_amount">
                    </div>
                     <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary btn-flat" name="pay_ba"><span class="pull-right">Save</button>
                    </div>
                  </div>

                   
                </div>
            </div>
           
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="confirm">Pay Exact Amount</button>
             
              </form>
            </div>
        </div>
    </div>
</div>

<!-- <div class="modal fade" id="bigger_payment">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

            <span aria-hidden="true"></span></button>
           
            </div>

            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="bigger_payment.php">
              <div class="form-group">
                    <label for="payment_id" class="col-sm-3 control-label">Payment ID:</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control"  name="payment_id">
                    </div>
                </div>
               <div class="form-group">
                    <label for="transaction_no" class="col-sm-3 control-label">Transaction No.:</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="transaction_no">
                    </div>
                </div>
               
               <input type="text" class="form-control" placeholder="Enter Amount"  name="amount">
                 
                <div class="text-center">
                    <h1>Pay Bigger Amount</h1>
                    <h2 class="bold fullname"></h2>
                </div>
            </div>
           
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="confirm">Confirm</button>
              </form>
            </div>
        </div>
    </div>
</div>
 -->

<!-- add penalty -->

<div class="modal fade" id="add_penalty">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="add_penalty.php">
                <div class="hidden-center">
                   <div class="form-group">
                    <label for="edit_company" class="col-sm-4 control-label"><span class="pull-right">Transaction No.  <?php echo $_GET['transaction'] ; ?> </label>

                  <br>
                    <input type="hidden" value="<?php echo $_GET['transaction'] ; ?>"  name="tn" >
                 
                     <div class="col-sm-4">
                   
                    </div>
                  </div>
                
                <div class="text-center">
                  <h4><?php echo "Php ".number_format($trans['total_amount']*.02,2); ?>(2% of Total Price) </h4>
                    <h3>Add Penalty</h3>
                   
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="add_penalty"><i class="fa fa-plus"></i> Add</button>
              </form>
            </div>
        </div>
    </div>
</div> 