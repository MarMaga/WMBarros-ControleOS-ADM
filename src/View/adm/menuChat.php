<?php
include_once dirname(__DIR__, 2) . '/Resource/dataview/EquipamentoDV.php';
?>

<!DOCTYPE html>
<html>

<head>
    <?php require_once PATH . '../../Template/_includes/_head.php'; ?>

    <style>
        /* Efeito de hover para os itens do menu */
        .nav-item:hover .nav-link:hover {
            background-color: #007bff;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Menu Lateral -->
            <nav id="sidebar" class="col-md-3 col-lg-2 min-vh-100 d-md-block bg-dark sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column nav-pills">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                Item 1
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                Item 2
                            </a>
                            <ul class="nav flex-column ml-3" id="subItems2"> <!-- Subitens -->
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="#">
                                        Subitem 2.1
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="#">
                                        Subitem 2.2
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                Item 3
                            </a>
                        </li>
                        <!-- Adicione mais itens e subitens conforme necessário -->
                    </ul>
                </div>
            </nav>
            
            <!-- Conteúdo Principal -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"> <!-- Adicione a classe full-height -->
                <!-- Barra Superior -->
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <span class="navbar-brand">Seu Site</span>
                    </div>
                </nav>

                <!-- Conteúdo da Página -->
                <div class="container mt-4">
                    <h1>Página Principal</h1>
                    <p>Conteúdo da sua página aqui.</p>
                </div>
            </main>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Adicione um evento de clique ao "Item 2" para alternar a visibilidade dos subitens
            const item2 = document.querySelector("#sidebar li:nth-child(2) a.nav-link");
            const subItems2 = document.querySelector("#subItems2");

            item2.addEventListener("click", function(event) {
                event.preventDefault();
                subItems2.classList.toggle("d-none");
            });
        });
    </script>

    <?php include_once PATH . 'Template/_includes/_footer.php'; ?>
</body>
</html>
