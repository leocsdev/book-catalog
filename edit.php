<!-- MODAL FOR EDIT BOOK -->
<div class="modal fade" id="editBookModal" tabindex="-1" role="dialog" aria-labelledby="editBookModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editBookModalLabel">Edit Book Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form action="" method="post">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Book Title:</label>
            <input type="text" class="form-control" name="title" value="<?php echo $row['title']?>" id="title">
          </div>
          
          <div class="form-group">
            <label for="message-text" class="col-form-label">ISBN:</label>
            <input type="text" class="form-control" name="isbn" id="isbn">
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Author:</label>
            <input type="text" class="form-control" name="author" id="author">
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Publisher:</label>
            <input type="text" class="form-control" name="publisher" id="publisher">
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Year Published:</label>
            <input type="number" class="form-control" name="year_published" id="year_published">
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Category:</label>
            <input type="text" class="form-control" name="category" id="category">
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary" name="edit-book">Save Changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>