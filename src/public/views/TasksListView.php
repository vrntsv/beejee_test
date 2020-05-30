
<!-- Page Content -->
<div class="container">

    <div class="dropdown show">

            <?php if (!empty($data['tasks'])): ?>
                <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Filter
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <form action="/filterByEmail/1" method="get">
                        <div class="form-group px-4 py-3">
                            <label for="exampleDropdownFormEmail1">Search by email</label>
                            <input  name="email" type="text" class="form-control" id="exampleDropdownFormEmail1" placeholder="Enter email">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </form>
                    <div class="dropdown-divider"></div>
                    <form action="/filterByName/1" method="get">
                        <div class="form-group px-4 py-3">
                            <label for="exampleDropdownFormEmail1">Search by name</label>
                            <input  name="name" type="text" class="form-control" id="exampleDropdownFormEmail1" placeholder="Enter name">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </form>
                    <div class="dropdown-divider"></div>
                    <form action="/filterByDone/1" method="get">
                        <div class="form-group px-4 py-3">
                            <input  name="is_done" type="hidden" value="1" class="form-control" id="exampleDropdownFormEmail1" placeholder="Enter name">
                            <button type="submit" class="btn btn-primary">Search done tasks</button>
                        </div>
                    </form>
                </div>
            </div><br>
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
                            <a class="page-link" href="/<?php echo $data['uri'];?>/<?php echo strval((int)$data['current_page']-1); ?>?<?php echo $data['uriParams'];?>">Prev</a>
                        </li>
                        <?php for ($i = 1; $i < $data['last_page'] + 1; $i++): ?>
                            <li class="page-item <?php if ((int)$data['current_page'] == $i) { echo "active"; }?>">
                                <a class="page-link" href="/<?php echo $data['uri'];?>/<?php echo $i; ?>?<?php echo $data['uriParams'];?>"><?php echo $i; ?></a>
                            </li>

                        <?php endfor; ?>
                        <li class="page-item <?php if ((int)$data['current_page'] == (int)$data['last_page']) { echo "disabled"; }?> ">
                            <a class="page-link" href="/<?php echo $data['uri'];?>/<?php echo strval((int)$data['current_page']+1); ?>?<?php echo $data['uriParams'];?>">Next</a>
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

</body>

</html>
