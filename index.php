<?php
  include_once('connections/connection.php');
  $con = connection();

  $sql = "SELECT * FROM `books_list` ORDER BY `id` DESC";
  $books = $con -> query($sql) or die ($con -> error);
  $row = $books -> fetch_assoc();

  if (isset($_POST['add-book'])) {  
    // echo "ADDED BOOK!";

    $title = $_POST['title'];
    $isbn = $_POST['isbn'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $year_published = $_POST['year_published'];
    $category = $_POST['category'];

    $sql = "INSERT INTO `books_list`(`title`, `isbn`, `author`, `publisher`, `year_published`, `category`) VALUES ('$title', '$isbn', '$author', '$publisher', '$year_published', '$category')";

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
    <section id="table-list">
      <div class="container">
        <div class="row">
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addBookModal">Add</button>
        </div>

        <div class="row">
          <div class="col-lg">
            <table>
              <thead>
                <tr>
                  <th scope="col">ID</th>
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
                <?php do { ?>
                <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['title']; ?></td>
                  <td><?php echo $row['isbn']; ?></td>
                  <td><?php echo $row['author']; ?></td>
                  <td><?php echo $row['publisher']; ?></td>
                  <td><?php echo $row['year_published']; ?></td>
                  <td><?php echo $row['category']; ?></td>
                  <td>
                    <!-- <a href="#editBookModal" class="btn btn-secondary" data-toggle="modal" data-target="#editBookModal">EDIT</a> -->
                    
                    <!-- <button class="btn btn-secondary" data-toggle="modal" data-target="#editBookModal">
                      EDIT
                    </button> -->
                    <button type="button" class="btn btn-secondary btn-edit">EDIT</button>
                    <!-- <button class="btn btn-secondary">DEL</button> -->
                  </td>
                </tr>
                <?php } while ($row = $books -> fetch_assoc()); ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>

    <!-- MODAL FOR ADDING BOOK -->
    <div class="modal fade" id="addBookModal" tabindex="-1" role="dialog" aria-labelledby="addBookModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addBookModalLabel">Add Book</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <form action="" method="post">
              <div class="form-group">
                <label for="title" class="col-form-label">Book Title:</label>
                <input type="text" class="form-control" name="title" id="title" required>
              </div>
              
              <div class="form-group">
                <label for="isbn" class="col-form-label">ISBN:</label>
                <input type="text" class="form-control" name="isbn" id="isbn" required>
              </div>

              <div class="form-group">
                <label for="author" class="col-form-label">Author:</label>
                <input type="text" class="form-control" name="author" id="author" required>
              </div>

              <div class="form-group">
                <label for="publisher" class="col-form-label">Publisher:</label>
                <input type="text" class="form-control" name="publisher" id="publisher" required>
              </div>

              <div class="form-group">
                <label for="year_published" class="col-form-label">Year Published:</label>
                <input type="number" class="form-control" name="year_published" id="year_published" required>
              </div>

              <div class="form-group">
                <label for="category" class="col-form-label">Category:</label>
                <input type="text" class="form-control" name="category" id="category" required>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" name="add-book">Add</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>



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

        <form action="" method="post">
        
          <div class="modal-body">
            <input type="hidden" name="update_id" id="update_id">
            
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

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary" name="edit-book">Save Changes</button>
            </div>
          
          </div>
        </form>
      </div>
    </div>
  </div>





  </main>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

  <script>
    $(document).ready(function() {

      $('.btn-edit').on('click', function() {
        
        $('#editBookModal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();

        console.log(data);
        // console.log(data[0]);

        $("#update_id").val(data[0]);
        $("#title").val(data[1]);
        $("#isbn").val(data[2]);
        $("#author").val(data[3]);
        $("#publisher").val(data[4]);
        $("#year_published").val(data[5]);
        $("#category").val(data[6]);
      });

    });
  
  </script>
</body>
</html>