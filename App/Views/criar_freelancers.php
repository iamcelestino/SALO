<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freelances-signup</title>
    <link rel="stylesheet" href="<?=config('base_url')?>/css/output.css">
</head>
<body>
    <main>
        <div class="form">
            <div class="container">
                <form action="/freelancer/signup" method="POST">

                    <label  for="titulo Profissional">Titulo Profissional</label>
                    <input type="text" name="titulo_profissional" id="">

                    <select name="nivel" id="" >
                        <option value="">Nivel</option>
                        <option value="iniciante">Iniciante</option>
                        <option value="intermediario">Intermediario</option>
                        <option value="Senior">Senior</option>
                    </select>

                    <label>Skill</label>
                    <input type="text" name="nome" placeholder="Digite os seus skills">

                     <select name="disponibilidade" id="" >
                        <option value="">Disponibilidade</option>
                        <option value="part-time">Part-time</option>
                        <option value="Full-time">Full-time</option>
                    </select>

                    <textarea name="bio" rows="4" cols="50">Biografia</textarea>
                    <button type="submit">Criar Conta</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>