<div id="sign_in2">
    <div class="container">
        <div class="section_header">
            <h3>{$loginHeader}</span></h3>
        </div>
        <div class="row login">
            <div class="span5 left_box">
                <h4>{$loginToYourAccount}</h4>

                <div class="perk_box">
                    {$loginLeftColumn}
                    <div class="perk">
                        <span class="icos ico1"></span>
                        <p><strong>Lorem alteration</strong> in some form  injected humour these randomised words .</p>
                    </div>
                    <div class="perk">
                        <span class="icos ico2"></span>
                        <p><strong>There are many variations</strong> of passages of Lorem alteration in some form  injected humour these randomised words.</p>
                    </div>
                    <div class="perk">
                        <span class="icos ico3"></span>
                        <p><strong>Alteration in some form</strong> injected humour these randomised words.</p>
                    </div>
                </div>
            </div>

            <div class="span6 signin_box">
                <div class="box">
                    <div class="box_cont">
                        <!--
                        <div class="social">
                            <a href="#" class="circle facebook">
                                <img src="img/face.png" alt="" />
                            </a>
                            <a href="#" class="circle twitter">
                                <img src="img/twt.png" alt="" />
                            </a>
                            <a href="#" class="circle gplus">
                                <img src="img/gplus.png" alt="" />
                            </a>
                        </div>
                        -->

                        <div class="division">
                            <div class="line l"></div>
                            <span>or</span>
                            <div class="line r"></div>
                        </div>

                        <div class="form">
                            <form method="POST" name="signin" action="?page=login">
                            <input type="hidden" name="action" value="login" />
                            <input name="login" type="text" placeholder="Login" />
                            <input name="password" type="password" placeholder="Password" />
                            <!--
                            <div class="forgot">
                                <span>Don’t have an account?</span>
                                <a href="sign-up.html">Sign up</a>
                            </div>
                            -->
                            <input type="submit" value="sign in" />
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>