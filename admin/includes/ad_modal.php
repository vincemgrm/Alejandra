<!-- Update ad -->
<div class="modal fade" id="update_ad">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
             
              <h4 class="modal-title"><b><span class="name">Edit Advertisement</span></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="upload.php" enctype="multipart/form-data">
                <input type="hidden"  id="id" name="id">
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>
                       <div class="col-sm-9">
                      
                    </div>
                    <div class="col-sm-9">
                      <input type="file" id="name" name="photo" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>