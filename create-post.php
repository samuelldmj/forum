<?php require 'include/header.php'; ?>

<!-- Main content -->
<div style="margin-top: 57px;" class="col-lg-9 mb-3">



  <form method="POST" action="create-post.php">

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Title </label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>

    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Post Author</label>
      <input type="password" class="form-control" id="exampleInputPassword1">
    </div>

    <select class="form-select mb-5 mt-5" aria-label="Default select example">
      <label class="form-label">Choose Category</label>

      <option selected>Choose Category</option>
      <option value="1">Design</option>
      <option value="2">Marketing</option>
      <option value="3">Programming</option>
    </select>

    <button type="submit" class="btn btn-primary w-100">Submit</button>

  </form>


</div>

<?php require 'include/footer.php'; ?>