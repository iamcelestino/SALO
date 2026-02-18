<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Achar Vagas | Salo</title>
</head>
<body class="bg-gray-50 font-sans text-gray-900">

    <nav class="bg-white border-b border-gray-100 py-4 px-6 flex justify-between items-center sticky top-0 z-50">
        <div class="text-2xl font-bold text-emerald-600 tracking-tight">Salo</div>
        <div class="space-x-8 hidden md:flex font-medium text-gray-600">
            <a href="/" class="hover:text-emerald-600 transition">Início</a>
            <a href="#" class="text-emerald-600 font-bold">Achar Vagas</a>
            <a href="#" class="hover:text-emerald-600 transition">Empresas</a>
        </div>
        <div class="space-x-3">
            <button class="px-5 py-2 bg-emerald-600 text-white rounded-lg font-medium hover:bg-emerald-700 transition">Entrar</button>
        </div>
    </nav>

    <header class="bg-emerald-700 py-12 px-6">
        <div class="max-w-6xl mx-auto">
            <div class="bg-white p-2 rounded-2xl shadow-xl flex flex-col md:flex-row gap-2">
                <div class="flex-1 flex items-center px-4 border-b md:border-b-0 md:border-r border-gray-100">
                    <span class="text-gray-400 mr-2">🔍</span>
                    <input type="text" placeholder="Cargo, habilidades ou empresa" class="w-full py-4 outline-none text-gray-700">
                </div>
                <div class="flex-1 flex items-center px-4">
                    <span class="text-gray-400 mr-2">📍</span>
                    <input type="text" placeholder="Luanda, Remoto..." class="w-full py-4 outline-none text-gray-700">
                </div>
                <button class="bg-emerald-600 text-white px-10 py-4 rounded-xl font-bold hover:bg-emerald-500 transition duration-300">Filtrar</button>
            </div>
        </div>
    </header>

    <main class="max-w-6xl mx-auto py-12 px-6">
        <div class="flex flex-col lg:flex-row gap-8">
            
            <aside class="lg:w-1/4 space-y-8">
                <div>
                    <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <span>🏷️</span> Tipo de Contrato
                    </h3>
                    <div class="space-y-3">
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="checkbox" class="w-5 h-5 border-gray-300 rounded text-emerald-600 focus:ring-emerald-500" checked>
                            <span class="text-gray-600 group-hover:text-emerald-600 transition">Tempo Integral</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="checkbox" class="w-5 h-5 border-gray-300 rounded text-emerald-600 focus:ring-emerald-500">
                            <span class="text-gray-600 group-hover:text-emerald-600 transition">Freelance / Biscato</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="checkbox" class="w-5 h-5 border-gray-300 rounded text-emerald-600 focus:ring-emerald-500">
                            <span class="text-gray-600 group-hover:text-emerald-600 transition">Estágio</span>
                        </label>
                    </div>
                </div>

                <div>
                    <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <span>📈</span> Nível de Experiência
                    </h3>
                    <select class="w-full p-3 bg-white border border-gray-200 rounded-xl outline-none focus:border-emerald-500 transition text-gray-600">
                        <option>Todos os níveis</option>
                        <option>Júnior</option>
                        <option>Pleno</option>
                        <option>Sênior</option>
                    </select>
                </div>

                <div>
                    <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <span>💰</span> Faixa Salarial (Mensal)
                    </h3>
                    <div class="space-y-2">
                        <input type="range" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-emerald-600">
                        <div class="flex justify-between text-xs font-bold text-emerald-700">
                            <span>0 Kz</span>
                            <span>2.000.000 Kz+</span>
                        </div>
                    </div>
                </div>
            </aside>

            <section class="lg:w-3/4 space-y-4">
                <div class="flex justify-between items-center mb-6">
                    <p class="text-gray-500 text-sm italic">Mostrando <span class="font-bold text-gray-900">124</span> vagas encontradas</p>
                    <select class="text-sm font-bold bg-transparent outline-none cursor-pointer">
                        <option>Mais recentes</option>
                        <option>Maior Salário</option>
                    </select>
                </div>

                <div class="bg-white p-6 rounded-3xl border border-gray-100 hover:border-emerald-400 hover:shadow-xl transition group flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div class="flex gap-4">
                        <div class="w-14 h-14 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-600 font-bold text-xl">P</div>
                        <div>
                            <h3 class="font-bold text-lg text-gray-900 group-hover:text-emerald-600 transition">Programador PHP (Laravel)</h3>
                            <p class="text-sm text-gray-500">Pro-Tec Angola • Remoto</p>
                            <div class="flex gap-2 mt-2">
                                <span class="bg-gray-100 text-gray-600 text-[10px] font-bold px-2 py-1 rounded">Backend</span>
                                <span class="bg-emerald-50 text-emerald-700 text-[10px] font-bold px-2 py-1 rounded">Urgente</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-right w-full md:w-auto border-t md:border-none pt-4 md:pt-0">
                        <p class="font-bold text-emerald-700 text-lg">350.000 Kz</p>
                        <button class="mt-2 bg-emerald-600 text-white px-6 py-2 rounded-xl text-sm font-bold hover:bg-emerald-700 transition w-full md:w-auto">Candidatar-se</button>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-3xl border border-gray-100 hover:border-emerald-400 hover:shadow-xl transition group flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div class="flex gap-4">
                        <div class="w-14 h-14 bg-amber-50 rounded-2xl flex items-center justify-center text-amber-600 font-bold text-xl">D</div>
                        <div>
                            <h3 class="font-bold text-lg text-gray-900 group-hover:text-emerald-600 transition">Designer Gráfico / Freelance</h3>
                            <p class="text-sm text-gray-500">Creative Hub • Luanda</p>
                            <div class="flex gap-2 mt-2">
                                <span class="bg-gray-100 text-gray-600 text-[10px] font-bold px-2 py-1 rounded">UI/UX</span>
                                <span class="bg-gray-100 text-gray-600 text-[10px] font-bold px-2 py-1 rounded">Branding</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-right w-full md:w-auto border-t md:border-none pt-4 md:pt-0">
                        <p class="font-bold text-emerald-700 text-lg">15.000 Kz/Hora</p>
                        <button class="mt-2 bg-emerald-600 text-white px-6 py-2 rounded-xl text-sm font-bold hover:bg-emerald-700 transition w-full md:w-auto">Candidatar-se</button>
                    </div>
                </div>

                <div class="pt-8 flex justify-center gap-2">
                    <button class="w-10 h-10 flex items-center justify-center bg-white border border-gray-200 rounded-xl font-bold hover:border-emerald-500 transition">1</button>
                    <button class="w-10 h-10 flex items-center justify-center bg-emerald-600 text-white rounded-xl font-bold">2</button>
                    <button class="w-10 h-10 flex items-center justify-center bg-white border border-gray-200 rounded-xl font-bold hover:border-emerald-500 transition">3</button>
                </div>
            </section>
        </div>
    </main>
</body>
</html>