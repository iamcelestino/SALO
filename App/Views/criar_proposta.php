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
                <form action="/proposta/create/3" method="POST">

                    <label  for="valor_proposto">Valor Proposto</label>
                    <input type="text" name="valor_proposto" id="valor_proposto">

                    <select name="status" id="status" >
                        <option value="">Disponibilidade</option>
                        <option value="pendente">Pendente</option>
                        <option value="aceite">aceite</option>
                        <option value="rejeitada">Rejeitada</option>
                    </select>

                    <textarea name="mensagem" rows="4" cols="50">Mensagem</textarea>
                    <button type="submit">Enviar Proposta</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>