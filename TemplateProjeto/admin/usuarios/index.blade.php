    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Usuários</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <!-- Botão na Esquerda -->
            <a href="#"
               class="btn btn-primary">Cadastrar</a>
        </div>
    </div>

    {{-- Mensagem de Feedback --}}


    <div class="conteudo-admin">

        <div class="tabela-registros">
            <h4 class="py-3">Lista de Usuários</h4>
            <div class="table-responsive mt-3">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"
                                width="50">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">E-mail</th>
                            <th scope="col"
                                width="100">Ação</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <th scope="row">1</th>
                            <td>João</td>
                            <td>joao@gmail.com</td>
                            <td class="d-flex">
                                <a href="#"
                                   class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>

                                <button class="btn btn-danger btn-sm ms-2"
                                        type="submit"
                                        name="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>


                            </td>
                        </tr>


                    </tbody>
                </table>

            </div>

        </div>

    </div>
