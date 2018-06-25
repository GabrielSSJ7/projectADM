-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25-Jun-2018 às 18:52
-- Versão do servidor: 10.1.32-MariaDB
-- PHP Version: 7.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adm`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `caixa`
--

CREATE TABLE `caixa` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `saldo` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `caixa`
--

INSERT INTO `caixa` (`user_id`, `saldo`, `created_at`, `updated_at`) VALUES
(2, 0, '2018-06-25 19:00:52', '2018-06-25 19:00:52');

-- --------------------------------------------------------

--
-- Estrutura da tabela `entrada`
--

CREATE TABLE `entrada` (
  `cod_esto` int(10) UNSIGNED NOT NULL,
  `qtde` int(11) NOT NULL,
  `qtde_old` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `entrada`
--

INSERT INTO `entrada` (`cod_esto`, `qtde`, `qtde_old`, `created_at`, `updated_at`) VALUES
(1, 1, 0, '2018-06-25 19:36:46', '2018-06-25 19:36:46');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fechamento_mensal`
--

CREATE TABLE `fechamento_mensal` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `saldo` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `cod_forn` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`cod_forn`, `user_id`, `nome`, `endereco`, `telefone`, `created_at`, `updated_at`) VALUES
(1, 1, 'Japão', NULL, NULL, '2018-06-25 03:54:44', '2018-06-25 03:54:44');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_06_09_182154_create_user_table', 1),
(2, '2018_06_09_190402_create_table_fornecedor', 1),
(3, '2018_06_09_221628_create_product_table', 1),
(4, '2018_06_09_222142_create_stock_table', 1),
(5, '2018_06_10_175213_create_entrada_table', 1),
(6, '2018_06_10_175213_create_saida_table', 1),
(7, '2018_06_25_152808_caixa', 2),
(8, '2018_06_25_153456_create_table_fechamento_mensal', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `product`
--

CREATE TABLE `product` (
  `cod` int(10) UNSIGNED NOT NULL,
  `cod_user` int(10) UNSIGNED NOT NULL,
  `cod_forn` int(10) UNSIGNED NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tp_uni` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preco` double NOT NULL,
  `preco_fornecedor` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `product`
--

INSERT INTO `product` (`cod`, `cod_user`, `cod_forn`, `nome`, `tp_uni`, `preco`, `preco_fornecedor`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Mangá Dragon Ball', NULL, 12, 8, '2018-06-25 03:54:55', '2018-06-25 03:54:55'),
(2, 1, 1, 'Mangá Boku no Hero', NULL, 10, 8, '2018-06-25 03:57:13', '2018-06-25 03:57:13');

-- --------------------------------------------------------

--
-- Estrutura da tabela `saida`
--

CREATE TABLE `saida` (
  `cod_esto` int(10) UNSIGNED NOT NULL,
  `qtde` int(11) NOT NULL,
  `qtde_old` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `stock`
--

CREATE TABLE `stock` (
  `cod_esto` int(10) UNSIGNED NOT NULL,
  `cod_prod` int(10) UNSIGNED NOT NULL,
  `qtde` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `stock`
--

INSERT INTO `stock` (`cod_esto`, `cod_prod`, `qtde`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2018-06-25 03:54:55', '2018-06-25 03:54:55'),
(2, 2, 0, '2018-06-25 03:57:13', '2018-06-25 03:57:13');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lvl_ac` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `remember_token`, `lvl_ac`, `created_at`, `updated_at`) VALUES
(1, 'Gabriel', 'gabriel.n64@hotmail.com', '$2y$10$kx1u7FGQnyDbo3.G9cpBDu9WMYDHEFaAgzbVe8noeDMGg.ThnTd1.', 'T4wchhohh8UwqBsUlN1bjya8FUGkCSOhnjVq9b0HmqkaRnbFDo8OXRvRQ8xU', '1', '2018-06-25 03:51:32', '2018-06-25 03:51:32'),
(2, 'Lucas', 'lucas.n64@hotmail.com', '$2y$10$UBsJfm/zW3DpTC94nVHdUeNwx4rYPBY19n5w4LU8NoEFFp/o6FcSW', 'S1eJDfAnnlRvdCQzMa7HkvDTWUcXL83w0ISFYBWBmd4NTO2gJU8wMpjUeYzc', '1', '2018-06-25 19:00:51', '2018-06-25 19:00:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `caixa`
--
ALTER TABLE `caixa`
  ADD KEY `caixa_user_id_foreign` (`user_id`);

--
-- Indexes for table `entrada`
--
ALTER TABLE `entrada`
  ADD KEY `entrada_cod_esto_foreign` (`cod_esto`);

--
-- Indexes for table `fechamento_mensal`
--
ALTER TABLE `fechamento_mensal`
  ADD KEY `fechamento_mensal_user_id_foreign` (`user_id`);

--
-- Indexes for table `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`cod_forn`),
  ADD KEY `fornecedor_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `product_cod_user_foreign` (`cod_user`),
  ADD KEY `product_cod_forn_foreign` (`cod_forn`);

--
-- Indexes for table `saida`
--
ALTER TABLE `saida`
  ADD KEY `saida_cod_esto_foreign` (`cod_esto`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`cod_esto`),
  ADD UNIQUE KEY `stock_cod_prod_unique` (`cod_prod`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `cod_forn` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `cod` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `cod_esto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `caixa`
--
ALTER TABLE `caixa`
  ADD CONSTRAINT `caixa_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `entrada`
--
ALTER TABLE `entrada`
  ADD CONSTRAINT `entrada_cod_esto_foreign` FOREIGN KEY (`cod_esto`) REFERENCES `stock` (`cod_esto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `fechamento_mensal`
--
ALTER TABLE `fechamento_mensal`
  ADD CONSTRAINT `fechamento_mensal_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD CONSTRAINT `fornecedor_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_cod_forn_foreign` FOREIGN KEY (`cod_forn`) REFERENCES `fornecedor` (`cod_forn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_cod_user_foreign` FOREIGN KEY (`cod_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `saida`
--
ALTER TABLE `saida`
  ADD CONSTRAINT `saida_cod_esto_foreign` FOREIGN KEY (`cod_esto`) REFERENCES `stock` (`cod_esto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_cod_prod_foreign` FOREIGN KEY (`cod_prod`) REFERENCES `product` (`cod`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
