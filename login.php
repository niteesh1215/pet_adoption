  <div class="login">
                    <div class="col-lg-6 col-sm-6 col-lg-offset-3 col-sm-offset-3 col-xs-12">
                        <div class="close_wrapper">
                            <span class="close_btn" onclick="close_dynamic_window()">x</span>
                        <div class="panel">
                            <div class="panel-heading">
                                <h3>LOGIN</h3>
                            </div>
                            <div class="panel-body">
                                <p>Login for more.</p>
                                <form id="loginForm">
                                    <p class="login_fail" style="text-align: center; color: red;"></p>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Password(min. 6 characters)" pattern=".{6,}">
                                    </div>
                                    <div class="form-group center">
                                        <input type="submit" value="Login" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                            <div class="panel-footer">Don't have an account yet? <a href="javascript:signUp();">Register</a></div>
                        </div>
                        </div>
                    </div>
           </div>
            <script>
                $('#loginForm').submit(function (e) {
                    
                    e.preventDefault();
                    const formData = new FormData(this);
                    
                    
                     $.ajax({
                        url:'login_submit.php',
                        method: 'POST',
                        data: formData,
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                              //If the request is successfull we will get the scripts output in data variable 
                              //Showing the result in our html element 
                              switch(data)
                              {
                                  case '1' : window.location.replace('index.php'); break;
                                  case '0' : $('.login_fail').empty();$('.login_fail').append("Email or Password is Wrong");
                                             break;
                                  default:  $('.login_fail').empty();$('.login_fail').append(data);
                              }


                          },
                        error(data) {
                          console.log(data);
                        },
                    });
                });
            </script>
       