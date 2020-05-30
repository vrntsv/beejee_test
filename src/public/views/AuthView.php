
<div class="container">

    <div class="card"
         style="
         width: 18rem;
         margin: 0 auto; /* Added */
         float: none; /* Added */
          margin-bottom: 10px; /* Added */"
    >
    <div class="card-body">
        <h4 class="card-title text-center mb-4 mt-1">Admin</h4>
        <hr>
        <?php if(!empty($data['errors'])){


            echo '<p class="text-danger text-center">Invalid data, please, try again</p>';
        }
        ?>
        <form method="post" action="/submitLogin">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input  class="form-control" name="login" placeholder="Login" type="text">
                </div> <!-- input-group.// -->
            </div> <!-- form-group// -->
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input class="form-control" name="password" placeholder="******" type="password" required>
                </div> <!-- input-group.// -->
            </div> <!-- form-group// -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block"> Login  </button>
            </div> <!-- form-group// -->
        </form>

</div>
</div>