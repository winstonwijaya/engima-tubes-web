<div>
    <form action="<? echo URL_BASE_PUBLIC . 'login/proceed'?>" method="post">

        <div class="container">
            <label><h1>Welcome to <b>Engi</b>ma!</h1></label>
            <label for="email"><h3>Email</h3></label>
            <input type="text" placeholder="joh@doe.com" name="email" required>

            <label for="password"><h3>Password</h3></label>
            <input type="password" placeholder="place here" name="password" required>

            <button type="submit">Login</button>
            <label><h4>Don't have an account? <a href="<? echo URL_BASE_PUBLIC . 'register'?>">Register here </a href></h4></label>
        </div>
    </form>
</div>
