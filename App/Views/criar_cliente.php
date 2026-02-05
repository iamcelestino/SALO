<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente-signup</title>
    <link rel="stylesheet" href="<?=config('base_url')?>/css/output.css">
</head>
<body>
    <main>
        <div class="form">
            <div class="container">
                <form action="/cliente/signup" method="POST">

                    <label  for="empresa_nome">Nome da empresa</label>
                    <input type="text" name="empresa_nome" id="empresa_nome">

                    <label>Nif</label>
                    <input type="text" name="nif" placeholder="Deixe o seu NIF">

                     <select name="sector" id="" >
                        <option value="">Selecione o sector</option>
                        <option value="agricola">agricola</option>
                        <option value="Industrial">Industrial</option>
                    </select>
                    <button type="submit">Criar Conta</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>