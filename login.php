<?php 
    include('auth-header.php');
?>
 <section id="loginSection">
        <form method="POST" id="loginForm" action="auth-login.php">
            <div id="showError" style="font-size: 20px;padding: 10px; margin-bottom: 10px;">
                <?php
                    include('errors.php');
                ?>
            </div>
            <label for="userEmail">Email:</label>
            <input type="email" id="userEmail" class="formInput"  name="email">
            <label for="userPassword">Password:</label>
            <input type="password" name="pass" class="formInput" id="userPassword">
            <a href="register.php">Nuk keni llogari? Regjistrohu</a>
            <input type="submit" class="submitBtn" value="Login">
        </form>
    </section>

<?php 
    include('footer.php');
?>