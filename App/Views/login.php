<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?=config('base_url')?>/css/output.css">
</head>
<body>
    <main>
        <div class="form">
            <div class="container">
                <div class="header">
                    <img src="<?=config('base_url')?>/images/logo-1.svg" alt="logo">
                    <div>
                        <h4>Welcome to Note</h4>
                        <p>Please log in to continue</p>
                    </div>
                </div>
                <form method="POST">
                    
                    <label  for="email">Email Address</label>
                    <input type="email" name="email" id="email">

                    <label  for="password">Password</label>
                    <input type="password" name="password" id="password">
                    <button type="submit">Login</button>
                </form>
                <div class="footer">
                    <p>No account yet? <a href="">sign up</a></p>
                </div>
            </div>
        </div>
    </main>
</body>
</html>