
<div class="container">
    <form action="submitTaskCreation" method="post" id="locationForm" enctype="multipart/form-data">
        <div class="row">
            <div class="col">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Add new task</h3>
                    </div>
                    <div class="panel-body">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <?php
                            if (empty($data['oldValues'])){
                                echo '
                                        <input name="name" type="text" class="form-control" placeholder="Enter your name" >
                                    ';
                            } elseif(isset($data['errors']['name']) or $data['oldValues']['name'] == null) {
                                echo '
                                        <input name="name" type="text" class="form-control is-invalid" placeholder="Enter your name" >
   
                                          <div class="invalid-feedback">
                                            Please provide a valid name (less then 100 characters).
                                          </div>
                                    ';
                            } else {
                                echo '
                                        <input name="name" type="text" value="'.$data['oldValues']['name'].'" class="form-control" placeholder="Enter your name" >
                                    ';
                            }?>
                        </div>

                            <div class="form-group">
                                <label for="title">Email</label>
                                <?php
                                if (empty($data['oldValues'])){
                                    echo '
                                        <input name="email" type="text" class="form-control" placeholder="example@mail.com" >
                                    ';
                                } elseif(isset($data['errors']['email']) or $data['oldValues']['email'] == null) {
                                    echo '
                                        <input name="email" type="text" class="form-control is-invalid" placeholder="example@mail.com" >
   
                                          <div class="invalid-feedback">
                                            Please provide a valid email.
                                          </div>
                                    ';
                                } else {
                                    echo '
                                        <input name="email" type="text" value="'.$data['oldValues']['email'].'" class="form-control" placeholder="example@mail.com" >
                                    ';
                                }?>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="description">Text</label>
                            <?php
                            if (empty($data['oldValues'])){
                                echo '
                                    <textarea name="text" class="form-control" placeholder="Enter task`s text" ></textarea>
                                ';
                            } elseif (isset($data['errors']['text']) or $data['oldValues']['text'] == null) {
                                echo '
                                    <textarea name="text" class="form-control is-invalid" placeholder="Enter task`s text" ></textarea>
  
                                          <div class="invalid-feedback">
                                            Please provide a valid text.
                                          </div>
                                    ';
                            } else {
                                echo '
                                <textarea name="text" class="form-control" placeholder="Enter task`s text" >'.$data['oldValues']['text'].'</textarea>';
                            }?>
                        </div>
                        <div class="form-group">
                                <button type="submit" class="btn btn-success btn-lg btn-block">Save</button>
                        </div>
                    </div>

                </div>

            </div>
            </div>
    </form>
</div>


</body>
