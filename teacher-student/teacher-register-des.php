<html>
    <head>
        <title>Teacher login</title>
        <link rel="stylesheet" href="style.css">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    </head>
    <body>
        <div class="teacher-register">

            <div class="navbar">
                    <div class="head-container">
                        <ul>
                            <li><a href="login-des.php">Login</a></li>
                            <!-- <li><a href="#">SignUp</a></li> -->
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">About Us</a></li>
                        </ul>
                    </div>
            </div>

            <div class="main-container">
                    <div class="bg-img"></div>
                    <div class="column one">
                        <div class="head">REGISTER</div>
                        <div class="form">
                            <form action="" method="post" id="register">
                                    <input type="text" name="teacherName" id="teacherName" placeholder="name" required><br>

                                    <select name="department" id="department">
                                        <option value="malayalam">malayalam</option>
                                        <option value="english">english</option>
                                    </select>
                                    <br>

                                    <select name="batch" id="batch">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                    <br>
                                    <input type="number" name="phnNum" id="phnNum" placeholder="Phone number" oninput="validatePhn()"><br>
                                    <div class="error" id="errorPhn"></div>
                                    <input type="email" name="email" id="email" placeholder="Email" required><br>
                                    <div class="pass">
                                        <input type="password" name="pass" id="password" placeholder="password" required>
                                        <div class="icon" onclick="showPass(this)">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512"><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>
                                        </div>
                                        <br>
                              
                                    <div class="error" id="errorMsg"></div>

                                <div class="btn">
                                <button type="button" onclick="register()">Register</button>
                                </div> 
                            </form>
                        </div>
                    </div>
                    <div class="column">

                    </div>
            </div>


        </div>
        <script src="script.js"></script>
    </body>
</html>