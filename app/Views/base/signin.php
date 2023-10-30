
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bootstrap v5.2 Design Login Forms</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
            crossorigin="anonymous"></script>
    </head>
<style>
  .form-container{ font-family: 'Overpass', sans-serif; }
.form-container .form-horizontal{
    background: linear-gradient(to right,#202926 49%,#15201C 50%);
    width: 350px;
    height: 350px;
    padding: 75px 55px;
    margin: 0 auto;
    border-radius: 50%;
}
.form-container .title{
    color: #838585;
    font-family: 'Teko', sans-serif;
    font-size: 35px;
    font-weight: 400;
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin: 0 0 10px 0;
}
.form-horizontal .form-group{
    background-color: rgba(255,255,255,0.15);
    font-size: 0;
    margin: 0 0 15px;
    border: 1px solid #838585;
    border-radius: 3px;
}
.form-horizontal .input-icon{
    color: #838585;
    font-size: 16px;
    text-align: center;
    line-height: 48px;
    height: 45px;
    width: 40px;
    vertical-align: top;
    display: inline-block;
}
.form-horizontal .form-control{
    color: #838585;
    background-color: transparent;
    font-size: 14px;
    letter-spacing: 1px;
    width: calc(100% - 55px);
    height: 45px;
    padding: 2px 10px 0 0;
    box-shadow: none;
    border: none;
    border-radius: 0;
    display: inline-block;
    transition: all 0.3s;
}
.form-horizontal .form-control:focus{
    box-shadow: none;
    border: none;
}
.form-horizontal .form-control::placeholder{
    color: #838585;
    font-size: 13px;
    text-transform: capitalize;
}
.form-horizontal .btn{
    color: rgba(255,255,255,0.8);
    background: #cc8899;
    font-size: 15px;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 1px;
    width: 120px;
    height: 120px;
    line-height: 120px;
    margin: 0 0 15px 0;
    border: none;
    border-radius: 50%;
    display: inline-block;
    transform: translateX(30px);
    transition: all 0.3s ease;
}
.form-horizontal .btn:hover,
.form-horizontal .btn:focus{
    color: #fff;
    letter-spacing: 4px;
    box-shadow: 0 0 5px rgba(0,0,0,0.5);
}
.form-horizontal .forgot-pass{
    font-size: 12px;
    text-align: left;
    width: calc(100% - 125px);
    display: inline-block;
    vertical-align: top;
}
.form-horizontal .forgot-pass a{
    color: #999;
    transition: all 0.3s ease;
}
.form-horizontal .forgot-pass a:hover{
    color: #555;
    text-decoration: underline;
}
@media only screen and (max-width:379px){
    .form-container .form-horizontal{
        width: 100%;
    }
}
</style>
    <body>
        <div class="vh-100 d-flex justify-content-center align-items-center ">
            <!-- <div class="col-md-5 p-5 shadow-sm border rounded-5 border-primary bg-white"> -->
            <div class="form-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6">
                <div class="form-container">
                <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url(); ?>loginauth" method="post">
                    <?= csrf_field() ?>
                        <h3 class="title">User Login</h3>
                        <div class="form-group">
                            <span class="input-icon"><i class="fa fa-user"></i></span>
                            <input class="form-control" name="username" type="name" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <span class="input-icon"><i class="fa fa-lock"></i></span>
                            <input class="form-control" name="password" type="password" placeholder="Password">
                        </div>
                        <span class="forgot-pass"><a href="#">Lost password?</a></span>
                        <button type="submit" class="btn signin">Login</button>
                    </form>
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>
                </div>
            </div>
        </div>
    </body>

</html>