-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.28-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para newsbd
CREATE DATABASE IF NOT EXISTS `newsbd` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;
USE `newsbd`;

-- Copiando estrutura para tabela newsbd.imgs
CREATE TABLE IF NOT EXISTS `imgs` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `img_nome` varchar(100) NOT NULL DEFAULT '0',
  `img_nomeRandom` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`img_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Copiando dados para a tabela newsbd.imgs: ~6 rows (aproximadamente)
INSERT INTO `imgs` (`img_id`, `img_nome`, `img_nomeRandom`) VALUES
	(2, 'woah.png', '82908dcc63ec46dea36efa0b4e81f538.png'),
	(3, 'mine.png', 'c09bbd8fa37f3d3cb530a2cfbaf99c65.png'),
	(4, 'pika.png', 'f093017e76e3c180155c259fc57f90d2.png'),
	(5, 'pika.png', 'f093017e76e3c180155c259fc57f90d2.png'),
	(8, 'Chart1 (3).png', 'd451cbad9cad3a33d5932ace636f794d.png');

-- Copiando estrutura para tabela newsbd.infos
CREATE TABLE IF NOT EXISTS `infos` (
  `info_id` int(11) NOT NULL AUTO_INCREMENT,
  `info_titulo` varchar(100) NOT NULL DEFAULT '0',
  `info_corpo` varchar(100) NOT NULL DEFAULT '0',
  `info_data` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`info_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Copiando dados para a tabela newsbd.infos: ~6 rows (aproximadamente)
INSERT INTO `infos` (`info_id`, `info_titulo`, `info_corpo`, `info_data`) VALUES
	(2, 'Testando dnv', 'asdasdasdad', '1970-01-01 01:00:00'),
	(3, 'Minha namorada s2', 'Ela simplesmente é a menina mais linda do mundo', '1970-01-01 01:00:00'),
	(4, 'Bah', 'amsdklasdlkmalskdmalsdkmasldkmaslkdmaslkd', '1970-01-01 01:00:00'),
	(5, 'asdasd', 'sdasdasd', '1970-01-01 01:00:00'),
	(6, 'Diminuição dos furtos no interiror de sao paulp', 'sdaasd', '1970-01-01 01:00:00'),
	(8, 'VENTILADORES MATAM????', 'GRAFICO MOSTRA QUE VENTILADORES E AR-CONDICIONADOS CAUSAM MUITOS INCENDIOs', '1970-01-01 01:00:00');

-- Copiando estrutura para tabela newsbd.noticias
CREATE TABLE IF NOT EXISTS `noticias` (
  `noticia_id` int(11) NOT NULL AUTO_INCREMENT,
  `noticia_img_id` int(11) NOT NULL DEFAULT 0,
  `noticia_info_id` int(11) NOT NULL DEFAULT 0,
  `noticia_usuario_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`noticia_id`),
  KEY `FK__imgs` (`noticia_img_id`),
  KEY `FK__infos` (`noticia_info_id`),
  KEY `FK__usuarios` (`noticia_usuario_id`),
  CONSTRAINT `FK__imgs` FOREIGN KEY (`noticia_img_id`) REFERENCES `imgs` (`img_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK__infos` FOREIGN KEY (`noticia_info_id`) REFERENCES `infos` (`info_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK__usuarios` FOREIGN KEY (`noticia_usuario_id`) REFERENCES `usuarios` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Copiando dados para a tabela newsbd.noticias: ~4 rows (aproximadamente)
INSERT INTO `noticias` (`noticia_id`, `noticia_img_id`, `noticia_info_id`, `noticia_usuario_id`) VALUES
	(2, 2, 2, 1),
	(3, 3, 3, 1),
	(5, 5, 5, 1),
	(8, 8, 8, 1);

-- Copiando estrutura para tabela newsbd.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuario_id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_nome` varchar(100) NOT NULL DEFAULT '0',
  `usuario_senha` int(11) NOT NULL DEFAULT 0,
  `usuario_email` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Copiando dados para a tabela newsbd.usuarios: ~2 rows (aproximadamente)
INSERT INTO `usuarios` (`usuario_id`, `usuario_nome`, `usuario_senha`, `usuario_email`) VALUES
	(1, 'tak', 0, '12'),
	(5, 'ogo', 15, 'ogi');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
