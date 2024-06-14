create database professor;
use professor;

CREATE TABLE `ficha` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` double NOT NULL,
  `datan` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `telefone` double NOT NULL,
  `estado` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `endereço` varchar(100) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `confirmar_senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

select * from ficha;

INSERT INTO `ficha` (`id`, `nome`, `cpf`, `datan`, `email`, `sexo`, `telefone`, `estado`, `cidade`, `endereço`, `senha`, `confirmar_senha`) VALUES
(3, 'Rodrigo', 88888888888, '2024-06-06', 'A@gmail.com', 'masculino', 0, 'RN', 'Contagem', 'Rua 8', '1111', '1111');

