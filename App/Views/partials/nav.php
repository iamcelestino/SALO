<nav class="bg-white border-b border-gray-100 py-4 px-6 flex justify-between items-center sticky top-0 z-50">
    <div class="text-2xl font-bold text-emerald-600 tracking-tight">Salo</div>
    <div class="space-x-8 hidden md:flex font-medium text-gray-600">
        <a href="<?=config('base_url')?>" class="hover:text-emerald-600 transition">Início</a>
        <a href="<?=config('base_url')?>/clientes" class="text-emerald-600 font-bold">Empresas</a>
        <a href="<?=config('base_url')?>/freelancers" class="text-emerald-600 font-bold">Freelancers</a>
        <a href="<?=config('base_url')?>/trabalhos" class="text-emerald-600 font-bold">Trabalhos</a>
    </div>
    <div class="space-x-3">
        <a href="/login" title="">
            Login
        </a>
        <a href="/signup" title="">
            Cadastrar-se
        </a>
        <button class="px-5 py-2 bg-emerald-600 text-white rounded-lg font-medium hover:bg-emerald-700 transition">
        <a href="/trabalhos/create" title="">
            Postar Vaga
        </a>
        </button>
    </div>
</nav>