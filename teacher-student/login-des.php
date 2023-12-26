<html>
    <head>
        <title>login form</title>
        <link rel="stylesheet" href="style.css">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    </head>
    <body>
        <div class="login">

            <div class="navbar">
                    <div class="head-container">
                        <ul>
                            <!-- <li><a href="#">Login</a></li> -->
                            <!-- <li><a href="register-des.php">SignUp</a></li> -->
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">About Us</a></li>
                        </ul>
                    </div>
            </div>


            <div class="main-container">
                <div class="column">
                    <div class="img-area">
                        <img src="images/login-page.jpg" alt="img here">
                    </div>
                    <div class="link">
                        <button onclick="window.location.href='teacher-register-des.php'">Create An Account</button>
                    </div>
                </div>
                <div class="column two">
                    <div class="head">Log In</div>
                    <div class="form">
                    <form action="" method="post">    
                            <div class="email">
                                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><path d="M256 64C150 64 64 150 64 256s86 192 192 192c17.7 0 32 14.3 32 32s-14.3 32-32 32C114.6 512 0 397.4 0 256S114.6 0 256 0S512 114.6 512 256v32c0 53-43 96-96 96c-29.3 0-55.6-13.2-73.2-33.9C320 371.1 289.5 384 256 384c-70.7 0-128-57.3-128-128s57.3-128 128-128c27.9 0 53.7 8.9 74.7 24.1c5.7-5 13.1-8.1 21.3-8.1c17.7 0 32 14.3 32 32v80 32c0 17.7 14.3 32 32 32s32-14.3 32-32V256c0-106-86-192-192-192zm64 192a64 64 0 1 0 -128 0 64 64 0 1 0 128 0z"/>
                                </svg>
                                <input type="text" name="username" id="username" placeholder="email id"></div><br>
                            <div class="password">
                                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><path d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z"/></svg>

                                <input type="password" name="password" id="password" placeholder="password">

                                <svg onclick="showPass(this)" class="eye" xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512"><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>
                            </div>
                                <br>
                            <div class="error" id="errorLogin"></div>

                            <div class="btn">
                                <button type="button" onclick="login()">Log In</button>
                            </div>
                    </form>        
                    </div>
                    <div class="others">
                        <div class="text">Or login with</div>
                        <div class="img-wrap">
                            <img src="images/Facebook.png" alt="facebook">
                            <img src="images/twitter.png" alt="twitter">
                            <img src="images/Google.png" alt="google">
                        </div>
                    </div>
                </div>
            </div>



        </div>

        <script src="script.js"></script>
    </body>
</html>