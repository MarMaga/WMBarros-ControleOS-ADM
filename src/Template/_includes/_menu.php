<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li id="menuGeral" class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Geral
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="gerenciar_setor.php" id="setores" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Setores</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li id="menuEquipamentos" class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Equipamentos
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="gerenciar_tipoequipamento.php" id="tiposEquipamentos" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tipos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="gerenciar_modeloequipamento.php" id="modelosEquipamentos" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Modelos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="equipamento.php" id="novoEquipamento" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Novo</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="consultar_equipamento.php" id="consultarEquipamento" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Consultar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="alocar_equipamento.php" id="alocarEquipamento" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Alocar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="desalocar_equipamento.php" id="desalocarEquipamento" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Desalocar</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li id="menuUsuario" class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Usuário
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="novo_usuario.php" id="novoUsuario" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Novo</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="consultar_usuario.php" id="consutarUsuario" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Consultar</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li id="menuFuncionario" class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            Funcionário
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../funcionario/novo_chamado.php" id="novoChamadoFuncionario" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Novo chamado</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../funcionario/meus_chamados.php" id="meusChamadosFuncionario" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Meus chamados</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../funcionario/meus_dados.php" id="meusDadosFuncionario" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Meus dados</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../funcionario/mudar_senha.php" id="mudarSenhaFuncionario" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Mudar senha</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li id="menuTecnico" class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Técnico
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../tecnico/consultar_chamados.php" id="consultarChamadosTecnico" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Consultar chamados</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../tecnico/meus_dados.php" id="meusDadosTecnico" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Meus dados</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../tecnico/mudar_senha.php" id="mudarSenhaTecnico" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Mudar senha</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>