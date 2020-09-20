<?php
  include_once('connections/connection.php');
  $con = connection();

  // ADD BOOK
  if (isset($_POST['add-book'])) {  
    // echo "ADDED BOOK!";
    $title = $_POST['title'];
    $isbn = $_POST['isbn'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $year_published = $_POST['year_published'];
    $category = $_POST['category'];

    $sql = "INSERT INTO `books_list` (
      `title`, 
      `isbn`, 
      `author`, 
      `publisher`, 
      `year_published`, 
      `category`) 
      VALUES (
        '$title', 
        '$isbn', 
        '$author', 
        '$publisher', 
        '$year_published', 
        '$category')";

    $con -> query($sql) or die ($con -> error);

    echo header("Location: index.php");
  }

  // EDIT BOOK
  if (isset($_POST['edit-book'])) {
    // echo "UPDATED BOOK!";
    $edit_book_id = $_POST['edit_book_id'];
    $title = $_POST['edit_title'];
    $isbn = $_POST['edit_isbn'];
    $author = $_POST['edit_author'];
    $publisher = $_POST['edit_publisher'];
    $year_published = $_POST['edit_year_published'];
    $category = $_POST['edit_category'];

    $sql = "UPDATE `books_list` SET 
      `title` = '$title', 
      `isbn` = '$isbn', 
      `author` = '$author', 
      `publisher` = '$publisher',
      `year_published` = '$year_published',
      `category` = '$category' 
      WHERE `id` = '$edit_book_id'";
    
    $con -> query($sql) or die ($con -> error);

    echo header("Location: index.php");
  }

  // DELETE BOOK
  if(isset($_POST['delete-book'])){
    // echo "DEL BOOK";
    $delete_book_id = $_POST['delete_book_id'];
    $sql = "DELETE FROM `books_list` WHERE `id`='$delete_book_id'";

    $con -> query($sql) or die ($con -> error);

    echo header("Location: index.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  <link rel="stylesheet" href="css/style.css">
  <title>Book Catalog</title>
</head>
<body>
  <main>
    <section>
      <div class="container">
        <div class="row">
          <div class="col-sm-3 ml-auto my-3">
            <a href="#add" data-toggle="modal" class="d-flex justify-content-end">
              <button type='button' class='btn btn-success btn-add'>
                Add
              </button>
            </a>
          </div>
          
        </div>

        <div class="row">
          <div class="col-sm-12">
          <table>
              <thead>
                <tr>
                  <!-- <th scope="col">ID</th> -->
                  <th scope="col">TITLE</th>
                  <th scope="col">ISBN</th>
                  <th scope="col">AUTHOR</th>
                  <th scope="col">PUBLISHER</th>
                  <th scope="col">YEAR PUBLISHED</th>
                  <th scope="col">CATEGORY</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
              <?php
                $sql = "SELECT * FROM `books_list` ORDER BY `id` DESC";
                $books = $con -> query($sql) or die ($con -> error);
                $row = $books -> fetch_assoc();
                  
                do { ?>
                <tr>
                  <!-- <td><?php // echo $row['id']; ?></td> -->
                  <td><?php echo $row['title']; ?></td>
                  <td><?php echo $row['isbn']; ?></td>
                  <td><?php echo $row['author']; ?></td>
                  <td><?php echo $row['publisher']; ?></td>
                  <td><?php echo $row['year_published']; ?></td>
                  <td><?php echo $row['category']; ?></td>
                  <td>
                    <div class="d-flex m-2">
                      <a href="#edit<?php echo $row['id']; ?>" data-toggle="modal">
                        <button type='button' class='btn btn-secondary btn-sm mr-1'>
                          EDIT
                        </button>
                      </a>
                      <a href="#delete<?php echo $row['id']; ?>" data-toggle="modal">
                        <button type='button' class='btn btn-secondary btn-sm ml-1'>
                          DEL
                        </button>
                      </a>
                    </div>
                  </td>

                  <!-- DELETE BOOK MODAL -->
                  <div id="delete<?php echo $row['id']; ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog" role="document">
                      <form action="" method="post">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Delete</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">
                            <input type="hidden" name="delete_book_id" value="<?php echo $row['id']; ?>">
                            <div class="alert alert-danger">
                              Are you Sure you want to delete &quot;<?php echo $row['title']; ?>&quot;
                            </div>
                            <div class="modal-footer">
                              <button type="submit" name="delete-book" class="btn btn-danger">
                                DELETE
                              </button>
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                Cancel
                              </button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>

                  <!-- EDIT BOOK MODAL -->
                  <div id="edit<?php echo $row['id']; ?>" class="modal fade" role="dialog">
                    <form method="post" action="">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            
                            <h4 class="modal-title">Edit</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <div class="modal-body">
                            <input type="hidden" name="edit_book_id" value="<?php echo $row['id']; ?>">

                            <div class="form-group">
                              <label for="edit_title" class="col-form-label">Book Title:</label>
                              <input type="text" class="form-control" name="edit_title" id="edit_title" value="<?php echo $row['title']; ?>">
                            </div>
                            
                            <div class="form-group">
                              <label for="edit_isbn" class="col-form-label">ISBN:</label>
                              <input type="text" class="form-control" name="edit_isbn" id="edit_isbn" value="<?php echo $row['isbn']; ?>">
                            </div>

                            <div class="form-group">
                              <label for="edit_author" class="col-form-label">Author:</label>
                              <input type="text" class="form-control" name="edit_author" id="edit_author" value="<?php echo $row['author']; ?>">
                            </div>

                            <div class="form-group">
                              <label for="edit_publisher" class="col-form-label">Publisher:</label>
                              <input type="text" class="form-control" name="edit_publisher" id="edit_publisher" value="<?php echo $row['publisher']; ?>">
                            </div>

                            <div class="form-group">
                              <label for="edit_year_published" class="col-form-label">Year Published:</label>
                              <input type="text" class="form-control" name="edit_year_published" id="edit_year_published" value="<?php echo $row['year_published']; ?>">
                            </div>

                            <div class="form-group">
                              <label for="edit_category" class="col-form-label">Category:</label>
                              <input type="text" class="form-control" name="edit_category" id="edit_category" value="<?php echo $row['category']; ?>">
                            </div>
                          </div>

                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" name="edit-book">Save Changes</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  <div>
                </tr>
                <?php } while ($row = $books -> fetch_assoc()); ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>

    <!-- ADD BOOK MODAL -->
    <div id="add" class="modal fade" role="dialog">
      <form method="post" action="">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title">Add</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
              <div class="form-group">
                <label for="title" class="col-form-label">Book Title:</label>
                <input type="text" class="form-control" name="title" id="title">
              </div>
              
              <div class="form-group">
                <label for="isbn" class="col-form-label">ISBN:</label>
                <input type="text" class="form-control" name="isbn" id="isbn">
              </div>

              <div class="form-group">
                <label for="author" class="col-form-label">Author:</label>
                <input type="text" class="form-control" name="author" id="author">
              </div>

              <div class="form-group">
                <label for="publisher" class="col-form-label">Publisher:</label>
                <input type="text" class="form-control" name="publisher" id="publisher">
              </div>

              <div class="form-group">
                <label for="year_published" class="col-form-label">Year Published:</label>
                <input type="text" class="form-control" name="year_published" id="year_published">
              </div>

              <div class="form-group">
                <label for="category" class="col-form-label">Category:</label>
                <input type="text" class="form-control" name="category" id="category">
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary" name="add-book">Add</button>
            </div>
          </div>
        </div>
      </form>
    <div>
  </main>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>