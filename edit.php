<!-- MODAL FOR EDIT BOOK -->

<?php
  if (isset($_POST['edit-book'])) {  
    echo "EDITED BOOK!";

    // $title = $_POST['title'];
    // $isbn = $_POST['isbn'];
    // $author = $_POST['author'];
    // $publisher = $_POST['publisher'];
    // $year_published = $_POST['year_published'];
    // $category = $_POST['category'];

    // $sql = "INSERT INTO `books_list`(`title`, `isbn`, `author`, `publisher`, `year_published`, `category`) VALUES ('$title', '$isbn', '$author', '$publisher', '$year_published', '$category')";

    // $con -> query($sql) or die ($con -> error);

    // echo header("Location: index.php");
  }
?>

<div class="modal fade" id="editBookModal<?php echo $fetch['id']?>" tabindex="-1" role="dialog" aria-labelledby="editBookModalLabel" aria-hidden="true">
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
            <input type="text" class="form-control" name="title" value="<?php echo $fetch['title']?>" id="title">
          </div>
          
          <div class="form-group">
            <label for="message-text" class="col-form-label">ISBN:</label>
            <input type="text" class="form-control" name="isbn" value="<?php echo $fetch['isbn']?>" id="isbn">
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Author:</label>
            <input type="text" class="form-control" name="author" value="<?php echo $fetch['author']?>" id="author">
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Publisher:</label>
            <input type="text" class="form-control" name="publisher" value="<?php echo $fetch['publisher']?>" id="publisher">
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Year Published:</label>
            <input type="number" class="form-control" name="year_published" value="<?php echo $fetch['year_published']?>" id="year_published">
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Category:</label>
            <input type="text" class="form-control" name="category" value="<?php echo $fetch['category']?>" id="category">
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary" name="edit-book">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>















