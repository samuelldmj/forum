<?php require 'include/header.php'; ?>
<?php require 'config/dbconn.php'; ?>

<?php

  if(isset($_POST['submit'])){

    if(empty($_POST['title']) or empty($_POST['post_author']) or empty($_POST['category']) or empty($_POST['body'])){
      echo "<script> alert('One of the fields are empty'); </script>";
    }else {
      $title = $_POST['title'];
      $author = $_POST['post_author'];
      $category = $_POST['category'];
      $body = $_POST['body'];

      $insert = $conn->prepare("INSERT INTO post (title, author, category, body) VALUES (:title, :author, :category, :body) ");

      $insert->execute([
        ':title' => $title,
        ':author' => $author,
        ':category' => $category,
        ':body' => $body
      ]);

      header("location: index.php");

    }
    
  }




?>

<!-- Main content -->
<div style="margin-top: 57px;" class="col-lg-9 mb-3">



  <form method="POST" action="create-post.php">

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Title </label>
      <input type="text" name="title" placeholder="Write Title" class="form-control" id="exampleInputEmail1"
        aria-describedby="emailHelp">
    </div>

    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Post Author</label>
      <input type="text" name="post_author" placeholder="Name of author" class="form-control"
        id="exampleInputPassword1">
    </div>

    <select name="category" class="form-select mb-3 mt-5" aria-label="Default select example">
      <label class="form-label">Choose Category</label>

      <option selected>Choose Category</option>
      <option value="Design">Design</option>
      <option value="Marketing">Marketing</option>
      <option value="Programming">Programming</option>
    </select>

      <div class="form-group mt-3 mb-3">
        <label for="exampleFormControlTextarea1">Body</label>
        <textarea name="body" class="form-control" placeholder="Content" rows="3"></textarea>
      </div>

      <button name="submit" type="submit" class="btn btn-primary w-100">Submit</button>

  </form>


</div>

<?php require 'include/footer.php'; ?>