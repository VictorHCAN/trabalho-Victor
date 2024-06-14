<?php
    session_start();
    include_once('config1.php');
   
    // Verifica se o usuário está logado
    if(!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
        header('Location: loginp.php');
        exit();
    }

    // SQL para buscar todas as fichas de alunos
    $sql = "SELECT * FROM ficha";

    // Executa a consulta SQL
    $result = $conn->query($sql);

    function criptografarCPF($cpf){
        // Use alguma técnica de criptografia, como AES ou algum hash
        // Neste exemplo, vamos usar a função md5 (apenas para demonstração, não é recomendado para criptografia real de CPF)
        $cpf_criptografado = md5($cpf);
        return $cpf_criptografado;
    }
    
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Alunos</title>
    <link rel="stylesheet" type="text/css" href="sistemap0.css">
</head>
<body>
    <header>
        <div class="container">
            <div id="branding">
                <h1> Cadastro dos Alunos</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="minhaf.php"> Sua Ficha</a>
                    <li><a href="sairp.php"> Sair</a>
                </ul>
            </nav>
        </div>
    </header>
    
    <div class="container">
    <div id="texto">
        <h2>Bem-vindo ao Sistema de Cadastro de Alunos</h2>
        <p>Nosso site foi desenvolvido para facilitar o processo de registro e gestão de informações dos estudantes. Com uma interface intuitiva e amigável, você pode rapidamente adicionar novos alunos, atualizar suas fichas cadastrais, complementar dados importantes e gerenciar todas as informações em um só lugar.</p>
    
        <h3>Funcionalidades Principais:</h3>
        <ul>
            <li><strong>Cadastro Simples e Rápido:</strong> Preencha os dados essenciais dos alunos em um formulário claro e direto, garantindo um registro eficiente.</li>
            <li><strong>Atualização de Informações:</strong> Mantenha os dados dos alunos sempre atualizados com a opção de alterar as fichas cadastrais a qualquer momento.</li>
            <li><strong>Gestão Completa:</strong> Acesse facilmente todas as informações necessárias para a administração escolar, como dados pessoais, contatos e históricos acadêmicos.</li>
            <li><strong>Segurança e Privacidade:</strong> Todos os dados são protegidos com segurança avançada para garantir a privacidade e a integridade das informações dos alunos.</li>
        </ul>
    
        <p>Nosso objetivo é tornar o processo de gerenciamento de alunos mais eficiente, permitindo que educadores e administradores escolares se concentrem no que realmente importa: oferecer uma educação de qualidade. Experimente agora e descubra como nosso sistema pode otimizar a administração de sua instituição!</p>
    </div>
    </div>
    <br>
    <div class="student-table-container">
        <h2>Ficha dos Alunos</h2>
    <table class="student-form">
                        <thead>    
                            <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">CPF</th>
                                    <th scope="col">Data de Nascimento</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col">Sexo</th>
                                    <th scope="col">Telefone</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Cidade</th>
                                    <th scope="col">Enderço</th>
                                    <th scope="col">Senha</th>
                                    <th scope="col">Confirme sua Senha</th>
                                    <th scope="col">...</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                   
                                    $senha_criptografada = "";
                                    while($user_data = mysqli_fetch_assoc($result)){
                                        // Criptografa o CPF com algum método de criptografia simétrica
                                        $cpf_criptografado = criptografarCPF($user_data['cpf']);

                                        // Use bcrypt para criptografar a senha
                                        $senha_criptografada = password_hash($user_data['senha'], PASSWORD_BCRYPT);
                                        echo "<tr>";
                                        echo "<td>".$user_data['id']."</td>";
                                        echo "<td>".$user_data['nome']."</td>";
                                        echo "<td>".$cpf_criptografado."</td>";
                                        echo "<td>".$user_data['datan']."</td>";
                                        echo "<td>".$user_data['email']."</td>";
                                        echo "<td>".$user_data['sexo']."</td>";
                                        echo "<td>".$user_data['telefone']."</td>";
                                        echo "<td>".$user_data['estado']."</td>";
                                        echo "<td>".$user_data['cidade']."</td>";
                                        echo "<td>".$user_data['endereço']."</td>";
                                        echo "<td>".$senha_criptografada."</td>";
                                        echo "<td>".$senha_criptografada."</td>";
                                        echo "<td>
                                        <a class = 'btn bt-primary' href = 'alterarp.php?id=$user_data[id]'>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                            <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325'/>
                                        </svg>
                                        </a>
                                        <a class='btn btn-danger' href='apagarp.php ?id=$user_data[id]'>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                                <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0'/>
                                            </svg>
                                        </a>

                                        </td>";
                                        echo "<tr>";
                                         // Criptografa o CPF com algum método de criptografia simétrica
                            $cpf_criptografado = criptografarCPF($user_data['cpf']);

                            // Use bcrypt para criptografar a senha
                            $senha_criptografada = password_hash($user_data['senha'], PASSWORD_BCRYPT);

                            }
                            ?>
                        </tbody>
                    </table>
                
            </div>
        </div>

    </div>
</body>
</html>