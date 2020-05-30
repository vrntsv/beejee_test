

<!-- Page Content -->
<div class="container">

        <!-- Blog Entries Column -->
            <?php if (!empty($data['tasks'])): ?>
                <?php foreach ($data['tasks'] as $task): ?>
                <!-- Blog Post -->
                <form method="post" action="/submitEdit">
                    <div class="card mb-3">
                        <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                        <input type="hidden" name="currentPage" value="<?php echo $data['current_page']; ?>">
                        <div class="card-body">
                            <?php if ($task['is_done']) {
                                    $isDone = 'checked';
                                    echo '
                                        <h2 style="color: green">
                                            Done
                                        </h2>
                                    ';
                                } else {
                                    $isDone = '';
                                }
                            ?>
                            <textarea
                                    name="text"
                                    class="form-control <?php if($task['is_changed']) { echo 'is-valid'; } ?>"
                                    style="width: 100%" <?php if(!isset($_SESSION['admin'])) { echo 'readonly'; } ?>
                            ><?php echo $task['text']?></textarea>
                            <div class="valid-feedback">
                                Edited by admin
                            </div>
                            <?php if (isset($_SESSION['admin'])) {
                                echo '
                                <div class="ml-4 mt-2">
                                    <input class="form-check-input" name="is_done" type="checkbox" id="is_done" value="1" '.$isDone.'>
                                    <label class="form-check-label" for="is_done">Done</label>
                                </div>    
                            ';
                            };
                            ?>
                        </div>
                        <div class="card-footer text-muted">
                            Posted by: <?php echo $task['name']?> (<?php echo $task['email']?>)
                        </div>

                        <?php if(isset($_SESSION['admin'])) {
                            echo '
                                <button type="submit" class="btn btn-success btn-lg btn-block">Edit</button>
                            ';
                        } ?>
                    </form>
                </div>

                <?php endforeach; ?>
</div>

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
                    <p><a href="/createTask" "><small>Add new post</small></a></p>
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
