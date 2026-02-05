<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="<?=config('base_url')?>/css/output.css">
</head>
<body>
    <main>
        <div class="form">
            <div class="container">
                <div class="header">
                    <img src="" alt="logo">
                    <div>
                        <h4>Sign up</h4>
                        <p>Sign to notes</p>
                    </div>
                </div>
                <form action="/signup/submit" method="POST">

                    <label for="Nome">Full Name</label>
                    <input type="text" name="nome" id="nome">

                    <label  for="Email">Email Address</label>
                    <input type="email" name="email" id="email">

                    <select id="role" name="role">
                        <option value="">Selecione a sua funcao</option>
                        <option value="cliente">cliente</option>
                        <option value="freelancer">freelancer</option>
                    </select>
                    
                    <label  for="password">Password</label>
                    <input type="password" name="password" id="password">

                    <button type="submit">Sign up</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>