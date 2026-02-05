<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Trabalho</title>
    <link rel="stylesheet" href="<?=config('base_url')?>/css/output.css">
</head>
<body>
    <main>
        <div class="form">
            <div class="container">
                <form action="/trabalhos/create" method="POST">

                    <label  for="titulo">Titulo Profissional</label>
                    <input type="text" name="titulo" id="titulo">

                    <textarea name="descricao" rows="4" cols="50">Descricao</textarea>

                    <select name="nivel_requerido" id="" >
                        <option value="">Nivel Requecido</option>
                        <option value="iniciante">Iniciante</option>
                        <option value="intermediario">Intermediario</option>
                        <option value="Senior">Senior</option>
                    </select>

                    <label id="oracamento">Orcamento</label>
                    <input type="number" name="orcamento" placeholder="Orcamento">

                    <select name="status" id="status" >
                        <option value="">Estado do servico</option>
                        <option value="aberto">Aberto</option>
                        <option value="em_andamento">Em_andamento</option>
                        <option value="fechado">Fechado</option>
                    </select>

                    <select name="tipo" id="tipo" >
                        <option value="">Tipo de Servico</option>
                        <option value="fixo">Fixo</option>
                        <option value="hora">Hora</option>
                    </select>

                    <button type="submit">Criar Trabalho</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>