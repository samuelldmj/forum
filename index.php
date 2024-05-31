<?php require 'include/header.php'; ?>
<?php require 'config/dbconn.php'; ?>

<?php 

 //displaying the posts dynamically

 $allposts = $conn->query("SELECT * FROM post ");
 $allposts->execute();
 $posts = $allposts->fetchAll(PDO::FETCH_OBJ);

?>


<!-- Main content -->
<div style="margin-top: 43px;" class="col-lg-9 mb-3">
  <!-- <div class="row text-left mb-5">           
      </div> -->
  <!-- End of post 1 -->
  <?php foreach($posts as $post): ?>
  <div
    class="mt-5 card row-hover pos-relative py-3 px-3 mb-3 border-warning border-top-0 border-right-0 border-bottom-0 rounded-0">
    <div class="row align-items-center">
      <div class="col-md-8 mb-3 mb-sm-0">
        <h5>
          <a href="single.php?id=1" class="text-primary"><?php  echo $post->title; ?></a>
        </h5>
        <p class="text-sm"><span class="op-6">Posted</span> <?php echo  $post->body; ?> <a class="text-black"
            href="#"><?php echo  $post->created_at; ?></a>
          <span class="op-6">ago by</span> <a class="text-black" href="#"><?php echo  $post->author; ?></a></p>
        <div class="text-sm op-5"> <a class="text-black mr-2" href="#"><?php  echo  $post->category; ?></a></div>
      </div>
      <div class="col-md-4 op-7">
        <div class="row text-center op-7">
          <div class="col px-1"> <i class="ion-ios-chatboxes-outline icon-1x"></i> <span class="d-block text-sm">122
              Replys</span> </div>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
  <!-- /End of post 1 -->

</div>

<?php require 'include/footer.php'; ?>