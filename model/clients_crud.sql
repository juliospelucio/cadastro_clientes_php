DROP DATABASE IF EXISTS users_crud;
CREATE DATABASE IF NOT EXISTS users_crud;
USE users_crud;

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `admin` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `cpf` (`cpf`)
) AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `cpf`, `admin`) VALUES
(1, 'Admin', 'admin@mail.com', '202cb962ac59075b964b07152d234b70', '52854158581', '1'),
(2, 'Rubia', 'rubia@gmail.com', '202cb962ac59075b964b07152d234b70', '52147258369', '0'),
(3, 'Élio', 'elio@gmail.com', '202cb962ac59075b964b07152d234b70', '15935784265', '0'),
(4, 'Júlio', 'juliopeluciofox@gmail.com', '83d1ca1a419fc7307742fe510f781a2e', '84545648548', '1'),
(5, 'Edna', 'edna@gmail.com', 'ec5dc02a6474cc095620e984af243d19', '58489856848', '0'),
(6, 'Eliana', 'eliana@gmail.com', '202cb962ac59075b964b07152d234b70', '86541584845', '0'),
(7, 'Ana Luisa', 'analuisa@hotmail.com', '202cb962ac59075b964b07152d234b70', '84841848923', '0'),
(8, 'Patricia', 'patricia@outlook.com.br', '202cb962ac59075b964b07152d234b70', '65154851578', '0'),
(9, 'Administrador Convidado', 'adm.convidado@gmail.com', 'ec5dc02a6474cc095620e984af243d19', '54878521456', '1'),
(10, 'Diretor Convidado', 'dir.convidado@gmail.com', 'ec5dc02a6474cc095620e984af243d19', '48454894842', '0');