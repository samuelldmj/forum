<?php require 'include/header.php'; ?>
<?php require 'config/dbconn.php'; ?>

<?php

  if(isset($_POST['submit'])){

    if(empty($_POST['author_name']) or empty($_POST['reply'])){
      echo "<script> alert('One of the fields are empty'); </script>";
    }else {
      $author = $_POST['author_name'];
      $reply = $_POST['reply'];
      $post_id = $_POST['post_id'];


      $insert = $conn->prepare("INSERT INTO replies (author_name, reply, post_id) VALUES (:author_name, :reply, :post_id) ");

      $insert->execute([
        ':author_name' => $author,
        ':reply' => $reply,
        ':post_id' => $post_id
      ]);

      header("location: index.php");

    }
    
  }

  //displaying the replies dynamically

  $allReplies = $conn->query("SELECT * FROM replies where post_id = 1 ");
  $allReplies->execute();
  $replies = $allReplies->fetchAll(PDO::FETCH_OBJ);




?>

<!-- Main content -->
<div style="margin-top: 43px;" class="col-lg-9 mb-3">

  <!-- End of post 1 -->
  <div
    class="mt-5 card row-hover pos-relative py-3 px-3 mb-3 border-warning border-top-0 border-right-0 border-bottom-0 rounded-0">
    <div class="row align-items-center">
      <div class="col-md-12 mb-3 mb-sm-0">
        <h5>
          <a href="#" class="text-primary">Drupal 8 quick starter guide</a>
        </h5>
        <p>
          Appropriately cultivate principle-centered infrastructures via world-class niches. Professionally morph
          cooperative methods of empowerment for out-of-the-box resources. Monotonectally create cross-unit web services
          via efficient vortals. Quickly architect bleeding-edge niche markets rather than goal-oriented vortals.
          Completely grow reliable customer service rather than interdependent action items.

          Quickly engineer installed base content via client-based action items. Seamlessly transition backend models
          whereas business imperatives. Collaboratively optimize resource-leveling catalysts for change after
          cross-media paradigms. Assertively network extensible e-commerce whereas timely intellectual capital.
          Appropriately revolutionize premier infomediaries.
        </p>
        <p class="text-sm"><span class="op-6">Posted</span> <a class="text-black" href="#">20 minutes</a> <span
            class="op-6">ago by</span> <a class="text-black" href="#">KenyeW</a></p>
        <div class="text-sm op-5"> <a class="text-black mr-2" href="#">Programming</a></div>
      </div>

    </div>
  </div>

  <div style="margin-left: 40px;"
    class="card row-hover pos-relative py-3 px-3 mb-3 border-primary border-top-0 border-right-0 border-bottom-0 rounded-0">
    <div class="row align-items-center">
      <div class="col-md-12 mb-3 mb-sm-0">
        <h5>
          <a href="#" class="text-primary">Write Comment</a>
        </h5>
        <form method="POST" action="single.php?id=1">
          <div class="form-group">
            <label for="exampleFormControlInput1">Author Name</label>
            <input type="text" name="author_name" class="form-control" id="exampleFormControlInput1">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Reply</label>
            <textarea name="reply" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>

          <div class="form-group">
            <input type="hidden" name="post_id" value="<?php echo 1;?>" class="form-control">
            </div>
          <button name="submit" type="submit" class="mt-4 btn btn-primary w-25">reply</button>
        </form>
      </div>

    </div>
  </div>

  <!-- Replies -->
  <?php foreach($replies as $rep): ?>
  <div style="margin-left: 40px;"
    class="card row-hover pos-relative py-3 px-3 mb-3 border-primary border-top-0 border-right-0 border-bottom-0 rounded-0">
    <div class="row align-items-center">
      <div class="col-md-12 mb-3 mb-sm-0">
        <h5>
          <a href="#" class="text-primary"><?php echo $rep->author_name; ?></a>
        </h5>
        <p>
          <?php echo $rep->reply; ?>
        </p>
        <p class="text-sm"><span class="op-6">Commented</span> <a class="text-black"
            href="#"><?php echo $rep->created_at; ?></a> </p>
      </div>
    </div>
  </div>
  <?php endforeach; ?>

</div>

<?php require 'include/footer.php'; ?>