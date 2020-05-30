
<?php

    function checkTextOverflow($text)
    {
        if (strlen($text) > 255){
            return substr($text, 0, 255).'...';
        } else {
            return $text;
        }
    }

    ?>



<br>
<br>
<br>
<br>
<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <?php if (!empty($data['posts'])): ?>
                <?php foreach ($data['posts'] as $post): ?>
                <!-- Blog Post -->
                <div class="card mb-4">
                    <?php if ($post['image']):?>
                        <img class="card-img-top" src="<?php echo '/images/'.$post['image']; ?>">
                    <?php else: ?>
                        <img class="card-img-top" src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/No_image_3x4.svg/1280px-No_image_3x4.svg.png" alt="Card image cap">
                    <?php endif; ?>
                    <div class="card-body">
                        <a href="/ad/<?php echo $post['id']; ?>" <h2 class="card-title"><?php echo $post['title']?></h2></a>
                        <p class="card-text"><?php echo checkTextOverflow($post['description'])?></p>
                    </div>
                    <div class="card-footer text-muted">
                        Publication date:  <?php echo substr($post['date_posted'], 0,  10)?>
                    </div>
                </div>
                <?php endforeach; ?>

                    <ul class="pagination justify-content-center">
                        <li class="page-item <?php if ($data['current_page'] == '1') { echo "disabled"; } ?> ">
                            <a class="page-link" href="/page/<?php echo strval((int)$data['current_page']-1); ?>">Предыдущая</a>
                        </li>
                        <?php for ($i = 1; $i < $data['last_page'] + 1; $i++): ?>
                            <li class="page-item <?php if ((int)$data['current_page'] == $i) { echo "active"; }?>">
                                <a class="page-link" href="/page/<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>

                        <?php endfor; ?>
                        <li class="page-item <?php if ((int)$data['current_page'] == (int)$data['last_page']) { echo "disabled"; }?> ">
                            <a class="page-link" href="/page/<?php echo strval((int)$data['current_page']+1); ?>">Следующая</a>
                        </li>
                    </ul>



            <?php else: ?>
                <h1 class="my-4">Sorry, no resent posts:(
                    <p><a href="index.php?createAd"><small>Add new post</small></a></p>
                </h1>

            <?php endif; ?>
        </div>



</div>
<!-- /.container -->


<!-- Bootstrap core JavaScript -->
<script src="public/assets/vendor/jquery/jquery.min.js"></script>
<script src="public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
