create database aluno;
use aluno;
CREATE TABLE `ficha` (
  `id` int(11) unsigned auto_increment NOT NULL primary key,
  `nome` varchar(250) NOT NULL,
  `cpf` double NOT NULL,
  `datan` date NOT NULL,
  `email` varchar(250) NOT NULL,
  `sexo` varchar(200) NOT NULL,
  `telefone` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `endereço` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `confirmar_senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

select * from ficha;


INSERT INTO `ficha` (`id`, `nome`, `cpf`, `datan`, `email`, `sexo`, `telefone`, `estado`, `cidade`, `endereço`, `senha`, `confirmar_senha`) VALUES
(6, 'Luiz', 11111111111, '2010-01-10', 'A@gmail.com', 'masculino', '(31) 11111-1111', 'MG', 'Belo Horizonte', 'Rua 1', '1111', '1111'),
(7, 'Vitoria', 22222222222, '2020-02-20', 'B@gmail.com', 'feminino', '(41) 22222-2222', 'ES', 'Diamontina', 'Rua 2', '2222', '2222'),
(8, 'Guilherme', 33333333333, '2003-03-31', 'C@gmail.com', 'outro', '(31) 33333-3333', 'BA', 'Salvador', 'Rua 3', '3333', '3333'),
(13, 'Joâo', 44444444444, '2004-04-04', 'D@gmail.com', 'masculino', '(91) 9999-9999', 'RJ', 'Copacapabana', 'Rua 4', '4444', '4444'),
(23, 'Maria', 55555555555, '2015-05-15', 'E@gmail.com', 'feminino', '(55) 55555-5555', 'DF', 'Brasília ', 'Rua 5', '5555', '5555'),
(24, 'Cintia', 66666666666, '2016-06-16', 'F@gmail.com', 'outro', '(67) 66666-6666', 'PA', 'Jabuntinga', 'Rua 6', '6666', '6666');
