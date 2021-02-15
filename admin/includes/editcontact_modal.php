<div class="modal fade" id="editcontact">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
             
              <h4 class="modal-title"><b>Edit Contact Info</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="editcontact.php">
                <input type="hidden" id="id" name="id">
                <div class="form-group">
                    <label for="edit_email" class="col-sm-3 control-label">Email</label>

                    <div class="col-sm-9">
                      <input type="email" class="form-control" id="edit_email" name="email">
                    </div>
                </div>
                
                
        <div class="form-group">
                    <label for="edit_contactno" class="col-sm-3 control-label">Contact Number</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_contactno" name="contactno">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_address" class="col-sm-3 control-label">Address</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_address" name="address">
                    </div>
                </div>
               
 <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="editcontact"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div> 
<!-- edit about us -->
