<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
body {
  font-family: 'Montserrat', sans-serif;
  transition: 3s;
}

.login-container {
  margin-top: 10%;
  border: 1px solid #CCD1D1;
  border-radius: 5px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  max-width: 50%;
}

.ads {
  background-color: #A569BD;
  border-top-left-radius: 5px;
  border-bottom-left-radius: 5px;
  color: #fff;
  padding: 15px;
  text-align: center;
}

.ads h1 {
  margin-top: 20%;
}

#fl {
  font-weight: 600;
}

#sl {
  font-weight: 100 !important;
}

.profile-img {
  text-align: center;
}

.profile-img img {
  border-radius: 50%;
  /* animation: mymove 2s infinite; */
}

@keyframes mymove {
  from {border: 1px solid #F2F3F4;}
  to {border: 8px solid #F2F3F4;}
}

.login-form {
  padding: 15px;
}

.login-form h3 {
  text-align: center;
  padding-top: 15px;
  padding-bottom: 15px;
}

.form-control {
  font-size: 14px;
}

.forget-password a {
  font-weight: 500;
  text-decoration: none;
  font-size: 14px;
}

</style>
<body>
    <div class="container login-container">
      <div class="row">
        <div class="col-md-6 ads">
          <h1><span id="fl">Admin</span><span id="sl">Henry</span></h1>
        </div>
        <div class="col-md-6 login-form">
          <div class="profile-img">
            <img src="https://scontent.fhan2-6.fna.fbcdn.net/v/t1.0-9/152933271_864091164164683_5249613510814430483_o.jpg?_nc_cat=103&ccb=1-3&_nc_sid=09cbfe&_nc_ohc=uWZs6PqcERsAX-PBggi&_nc_ht=scontent.fhan2-6.fna&oh=4e1bcdd842e1b7e702c9d0cc059d19ee&oe=607D992B" alt="profile_img" height="140px" width="140px;">
          </div>
          <h3>Login</h3>
          <form action="" method="POST">

          <div class="form-group">
                <input type="email" name="email" placeholder="enter user name" />
            </div>
            <div class="form-group">
                <input type="text" name="password" placeholder="enter user password"> 
            </div>        
            <div class="form-group">
                <input type="submit" class="btnSubmit" value="Login" />
            </div>
            <div class="form-group forget-password">
                <a href="#">Forget Password</a>
            </div>
          </form>
        </div>
      </div>
    </div>



