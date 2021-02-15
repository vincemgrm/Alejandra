<div class="modal fade" id="editaboutus">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
             
              <h4 class="modal-title"><b>Edit About Us</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="editaboutus.php">
                <input type="text" id="id" name="id">
                <div class="form-group">
                    <label for="edit_vision" class="col-sm-3 control-label">Vision</label>

                    <div class="col-sm-9">
                      <textarea id="editor1" rows="10" cols="80" name="vision"></textarea>
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
              <button type="submit" class="btn btn-success btn-flat" name="editcontact"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div> 