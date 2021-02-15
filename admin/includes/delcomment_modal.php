<div class="modal fade" id="delete-comment">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 
              <h4 class="modal-title"><b>Deleting...</h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="comment_delete.php">
                <input type="hidden" id="id" class="id" name="id">
             
                <div class="text-center">
                    <p>DELETE COMMENT</p>
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