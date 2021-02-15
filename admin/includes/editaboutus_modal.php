<div class="modal fade" id="editaboutus">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
             
              <h4 class="modal-title"><b>Edit About Us</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="edit_aboutus.php">
                <input type="hidden" id="id" name="id">

                <div class="form-group">
                    <label for="edit_vision" class="col-sm-3 control-label">Profile</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" id="edit_profile" name="profile"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_identity" class="col-sm-3 control-label">Identity</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" id="edit_identity" name="identity"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_vision" class="col-sm-3 control-label">Vision</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" id="edit_vision" name="vision"></textarea>
                    </div>
                </div>
                
                
        <div class="form-group">
                    <label for="edit_mission" class="col-sm-3 control-label">Mission</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" id="edit_mission" name="mission"></textarea>
                    </div>
                </div>
               
 <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="editaboutus"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div> 