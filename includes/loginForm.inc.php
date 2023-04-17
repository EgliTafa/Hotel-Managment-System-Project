<?php 
if(isset($errors) && !empty($errors)){
    echo "
    <div class='error'>$errors[0]</div>";
}
?>
<div class="starter-template">
    <div class="page-header">
        <h1 id="amenities" class="text-center">  Sign In </h1>
    </div>
<form action="login.php" method="POST">
    <div class="controls col-md-12">
        <label class="form-label" for="email">Email</label>
        <input type="email" id="email" name="email" class="form-control form-control-lg" required/>
    </div>

    <div class="controls col-md-12">
        <label class="form-label" for="pass">Password</label>
        <input type="password"  id="pass" name="pass" class="form-control form-control-lg" required/>
    </div>
    
    <div class="controls col-md-12">
        <br>
        <input type="submit" name="submit" value="Sign In" class="btn btn-info">
    </div>

    <div class="form-group">
        <div class="col-md-12 control">
            <br>
            <a style="font-size:85%" href="reset_password.php">Reset Password</a>
        </div>
    </div> 

    <div class="form-group">
        <div class="col-md-12 control">
            <br>
            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                Don't have an account? 
                <a href="register.php">Sign Up Here</a>
            </div>
        </div>
    </div> 
</form>

<?php include('includes/footer.html'); ?>