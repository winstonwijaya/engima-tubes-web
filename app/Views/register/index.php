<form action="<? echo URL_BASE_PUBLIC . 'register/proceed'?>" method="post" enctype="multipart/form-data">

    <div class="container">
        <label><h1>Welcome to <b>Engi</b>ma!</h1></label>


        <label for="username"><h3>Username</h3></label>
        <input id="username" type="text" placeholder="john.doe" name="username" required onkeyup="checkUsername()">
        <div id="username-error" class="error"></div>

        <label for="email"><h3>Email Address</h3></label>
        <input id="email" type="text" placeholder="joh@doe.com" name="email" required onkeyup="checkEmail()">
        <div id="email-error" class="error"></div>

        <label for="phone"><h3>Phone Number</h3></label>
        <input id="phone" type="text" placeholder="0813xxxix" name="phone" required onkeyup="checkPhone()">
        <div id="phone-error" class="error"></div>

        <label for="password"><h3>Password</h3></label>
        <input id="password" type="password" placeholder="make as strong as possible" name="password" required onkeyup="checkPassword()">
        <div id="password-error" class="error"></div>

        <label for="confirmPassword"><h3>Confirm Password</h3></label>
        <input id="confirmPassword" type="password" placeholder="same as above" name="confirmPassword" required onkeyup="checkPassword()">
        <div id="confirm-error" class="error"></div>

        <label for="profilePic"><h3>Profile Picture</h3></label>
        <input type="file" name="profilePic">

        <button id="submit-register" type="submit">Register</button>
        <label><h4>Already have account? <a href="<? echo URL_BASE_PUBLIC . 'login'?>">Login here </a href></h4></label>
    </div>
</form>

