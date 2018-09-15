<section class="main-content">
	<div class="row tengah_woooy">
            <div class="span5">
                    <h4 class="title">
                        <span class="text">
                            <strong>Login</strong> Form</span>
                    </h4>
                    <?php
                                //jika login gagal 
                                if($_GET['loginerror']){
                                    echo "<p class='text-error'>Maaf Login Gagal!</p>";
                                                            }	?>
                        <form id='form1' action="user/login_action.php" method="post" class=''>
                            <input type="hidden" name="next" value="/">
                            <fieldset>
                                <div class="control-group">
                                    <label class="control-label">E-Mail</label>
                                    <div class="controls">
                                        <input type="text" name='email' placeholder="Masukan email" id="email" class="input-xlarge required email">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Password</label>
                                    <div class="controls">
                                        <input type="password" placeholder="masukan password" id="password" class="input-xlarge required" name='password'>
                                    </div>
                                </div>
        
                                <div class="control-group">
                                    <input tabindex="3" class="btn btn-inverse large" type="submit" value="Login">
                                    <hr>
                                </div>
                            </fieldset>
                        </form>
        
                </div>
    </div>
</section>