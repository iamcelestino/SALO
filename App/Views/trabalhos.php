<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabalhos</title>
    <link rel="stylesheet" href="<?=config('base_url')?>/css/output.css">
</head>
<body>
    <main>
                <section class="">
        <div class="container py-16">
            <div class="mt-5">
                <h1 class="font-bold text-2xl mb-5"></h1>
                <table class="min-w-full divide-y divide-gray-200">
                    <?php if($trabalhos): ?>
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titulo</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descrição</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Orcamento</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nivel requerido</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acções</th>
                            </tr>
                        </thead>
                            <?php foreach($trabalhos as $trabalho): ?>
                            <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap"><?=$trabalho->titulo; ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap"><?=$trabalho->descricao; ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap"><?=$trabalho->orcamento;?></td>
                                        <td class="px-6 py-4 whitespace-nowrap"><?=$trabalho->nivel_requerido?></td>
                                        <td class="px-6 py-4 whitespace-nowrap"><?=$trabalho->status?></td>
                                        <td class=" text-center text-2xl">
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="/cliente/update/<?=$trabalho->id;?>" title="">editar</a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="/cliente/delete/<?=$trabalho->id;?>"title="">apagar</a>
                                        </td>
                                          <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="/proposta/create/<?=$trabalho->id;?>" title="">Enviar Proposta</a>
                                        </td>
                                    </tr>
                            </tbody>
                            <?php endforeach ?>
                    <?php else: ?>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap"> <?=$trabalho->titulo; ?></td>
                                <td class="px-6 py-4 whitespace-nowrap"><?=$trabalho->descricao; ?></td>
                                <td class="px-6 py-4 whitespace-nowrap"><?=$trabalho->orcamento;?></td>
                                <td class="px-6 py-4 whitespace-nowrap"><?=$trabalho->nivel_requerido?></td>
                                <td class="px-6 py-4 whitespace-nowrap"><?=$trabalho->status?></td>
                                <td class=" text-center text-2xl">
                                </td>
                            </tr>
                        </tbody>
                    <?php endif ?>
                </table>
            </div>
        </div>
    </section>
    </main>
</body>
</html>