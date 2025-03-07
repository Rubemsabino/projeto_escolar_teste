<!-- Modal -->
<div id="modal"
    class="hidden fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 backdrop-blur-lg overflow-y-auto">
    <div class="bg-transparent p-8 border-2 border-gray-500 rounded-lg w-full h-full max-h-screen overflow-y-auto flex flex-col">
        <!-- Logo -->
        <div class="mb-6 flex justify-center">
            <img src="{{ asset('imagens/logo.png') }}" alt="Foto do Aluno" class="w-20 h-20 rounded-full">
        </div>

        <h2 class="text-2xl font-bold mb-6 text-green-500 text-center">Formulário de Teste</h2>

        <form class="flex-1 overflow-y-auto">
            <div class="mb-4 grid grid-cols-3 gap-4">
                <div>
                    <label for="foto" class="block text-green-500">Foto</label>
                    <input type="file" id="foto"
                        class="w-full p-2 mt-2 border border-red-400 rounded-lg bg-white text-red-500 focus:bg-green-100 focus:border-red-500">
                </div>
            </div>

            <div class="mb-4 grid grid-cols-3 gap-4">
                <div>
                    <label for="nome_completo" class="block text-green-500">Nome</label>
                    <input type="text" id="nome_completo"
                        class="w-full p-2 mt-2 border border-red-400 rounded-lg bg-white placeholder-red-500 focus:bg-green-100 focus:border-red-500"
                        placeholder="Seu nome">
                </div>

                <div>
                    <label for="email" class="block text-green-500">E-mail</label>
                    <input type="email" id="email"
                        class="w-full p-2 mt-2 border border-red-400 rounded-lg bg-white placeholder-red-500 focus:bg-green-100 focus:border-red-500"
                        placeholder="Seu e-mail">
                </div>
            </div>

            <div class="mb-4 grid grid-cols-3 gap-4">
                <div>
                    <label for="nome_completo" class="block text-green-500">Nome</label>
                    <input type="text" id="nome_completo"
                        class="w-full p-2 mt-2 border border-red-400 rounded-lg bg-white placeholder-red-500 focus:bg-green-100 focus:border-red-500"
                        placeholder="Seu nome">
                </div>

                <div>
                    <label for="email" class="block text-green-500">E-mail</label>
                    <input type="email" id="email"
                        class="w-full p-2 mt-2 border border-red-400 rounded-lg bg-white placeholder-red-500 focus:bg-green-100 focus:border-red-500"
                        placeholder="Seu e-mail">
                </div>
            </div>

            <div class="mb-4 grid grid-cols-3 gap-4">
                <div>
                    <label for="nome_completo" class="block text-green-500">Nome</label>
                    <input type="text" id="nome_completo"
                        class="w-full p-2 mt-2 border border-red-400 rounded-lg bg-white placeholder-red-500 focus:bg-green-100 focus:border-red-500"
                        placeholder="Seu nome">
                </div>

                <div>
                    <label for="email" class="block text-green-500">E-mail</label>
                    <input type="email" id="email"
                        class="w-full p-2 mt-2 border border-red-400 rounded-lg bg-white placeholder-red-500 focus:bg-green-100 focus:border-red-500"
                        placeholder="Seu e-mail">
                </div>
            </div>

            <div class="mb-4 grid grid-cols-3 gap-4">
                <div>
                    <label for="nome_completo" class="block text-green-500">Nome</label>
                    <input type="text" id="nome_completo"
                        class="w-full p-2 mt-2 border border-red-400 rounded-lg bg-white placeholder-red-500 focus:bg-green-100 focus:border-red-500"
                        placeholder="Seu nome">
                </div>

                <div>
                    <label for="email" class="block text-green-500">E-mail</label>
                    <input type="email" id="email"
                        class="w-full p-2 mt-2 border border-red-400 rounded-lg bg-white placeholder-red-500 focus:bg-green-100 focus:border-red-500"
                        placeholder="Seu e-mail">
                </div>
            </div>

            <div class="mb-4 grid grid-cols-3 gap-4">
                <div>
                    <label for="nome_completo" class="block text-green-500">Nome</label>
                    <input type="text" id="nome_completo"
                        class="w-full p-2 mt-2 border border-red-400 rounded-lg bg-white placeholder-red-500 focus:bg-green-100 focus:border-red-500"
                        placeholder="Seu nome">
                </div>

                <div>
                    <label for="email" class="block text-green-500">E-mail</label>
                    <input type="email" id="email"
                        class="w-full p-2 mt-2 border border-red-400 rounded-lg bg-white placeholder-red-500 focus:bg-green-100 focus:border-red-500"
                        placeholder="Seu e-mail">
                </div>
            </div>

            <div class="mb-4 grid grid-cols-3 gap-4">
                <div>
                    <label for="telefone" class="block text-green-500">Telefone</label>
                    <input type="tel" id="telefone"
                        class="w-full p-2 mt-2 border border-red-400 rounded-lg bg-white placeholder-red-500 focus:bg-green-100 focus:border-red-500"
                        placeholder="Seu telefone">
                </div>

                <div>
                    <label for="cidade" class="block text-green-500">Cidade</label>
                    <input type="text" id="cidade"
                        class="w-full p-2 mt-2 border border-red-400 rounded-lg bg-white placeholder-red-500 focus:bg-green-100 focus:border-red-500"
                        placeholder="Sua cidade">
                </div>

                <div>
                    <label for="estado" class="block text-green-500">Estado</label>
                    <select id="estado"
                        class="w-full p-2 mt-2 border border-red-400 rounded-lg bg-white text-red-500 focus:bg-green-100 focus:border-red-500">
                        <option value="">Selecione</option>
                        <option value="SP">São Paulo</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="RS">Rio Grande do Sul</option>
                    </select>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-lg mt-4 mr-2">Adicionar</button>
                <button id="closeModalBtn" class="bg-red-500 text-white px-6 py-3 rounded-lg mt-4">Fechar</button>
            </div>
        </form>
    </div>
</div>
