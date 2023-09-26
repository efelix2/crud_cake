CREATE DATABASE  IF NOT EXISTS `crud_cake` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;
USE `crud_cake`;
-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: crud_cake
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorias` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Aventura'),(2,'Comédia'),(3,'Terror'),(4,'Ação'),(5,'Drama'),(6,'Romance'),(7,'Dança'),(8,'Documentário'),(9,'Espionagem'),(10,'Faroeste'),(11,'Fantasia'),(12,'Ficção Científica'),(13,'Mistério'),(14,'Thriller');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `filmes`
--

DROP TABLE IF EXISTS `filmes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `filmes` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `categoria_id` int(10) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `capa` varchar(255) NOT NULL,
  `sinopse` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categoria_id` (`categoria_id`),
  CONSTRAINT `filmes_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `filmes`
--

LOCK TABLES `filmes` WRITE;
/*!40000 ALTER TABLE `filmes` DISABLE KEYS */;
INSERT INTO `filmes` VALUES (1,5,'O Clube dos Cinco','/media/filmes/O_clube_dos_cinco.jpg','Cinco adolescentes do ensino médio cometem pequenos delitos na escola. Os estudantes são punidos e precisam passar o sábado na biblioteca do colégio escrevendo uma redação contando o que pensam de si mesmos.O grupo reúne jovens com perfis completamente diferentes: o popular, a patricinha, a esquisita, o nerd e o rebelde. No decorrer do dia, eles passam a se conhecer melhor e a aceitar suas diferenças, compartilhando seus maiores segredos.'),(2,2,'Espartalhões','/media/filmes/Espartalhões.jpg','Em divertida paródia, o Rei Leonidas e seus fortes guerreiros querem defender Esparta de invasores persas. Na empreitada, encontram sósias de celebridades e persas dançarinos.'),(3,3,'Pandorum','/media/filmes/Pandorum.jpg','Os astronautas Payton e Bower acordam em uma câmara de sono profundo, dentro de uma espaçonave aparentemente abandonada, sem memória de quem são ou de qual missão eles estão participando. Enquanto Payton fica por de trás de um monitor de rádio, Bower se aventura a explorar a espaçonave. Os dois astronautas logo se dão conta de que eles não estão sozinhos e de que o destino da humanidade dependerá das ações que eles tomarem.'),(4,2,'De Volta Para o Futuro','/media/filmes/De_volta_pro_futuro.jpg','O adolescente Marty McFly é transportado para 1955 quando uma experiência do excêntrico cientista Doc Brown dá errado. Ele viaja pelo tempo em um carro modificado e acaba conhecendo seus pais ainda jovens. O problema é que Marty pode deixar de existir porque ele interferiu na rotina dos pais, que correm o risco de não se apaixonar mais. Para complicar ainda mais a situação, Marty precisa voltar para casa a tempo de salvar o cientista.'),(5,1,'Stargate','/media/filmes/Stargate.jpg','Um egiptólogo é convidado a trabalhar em uma base secreta e, em contato com anel de trinta metros coberto de hieróglifos, descobre a chave para se chegar a um novo mundo. Junto com uma tropa de elite, atravessam o portão e vivem experiências inimagináveis.'),(6,3,'Enigma de Outro Mundo','/media/filmes/Enigma_de_Outro_Mundo.png','Na remota Antártida, um grupo de cientistas americanos é perturbado em sua base quando, de um helicóptero, alguém atira em um cão do acampamento. À medida que socorrem o cão baleado, o bicho começa a atacar os cientistas e os outros cachorros e logo eles descobrem que o animal pode assumir a forma de suas vítimas. Isto significa que membros da equipe podem ser mortos e a cópia assumir o lugar deles. Com isso, um piloto e um médico precisam capturar a fera antes que seja tarde demais.'),(7,3,'Uzumaki','/media/filmes/Uzumaki.jpg','Com uma bela menina de liceu como protagonista, a população de uma pequena localidade no Japão torna-se fascinada, aterrorizada e consumida pelas inúmeras ocorrências naturais ou artificiais de espirais malévolas. Este conceito abstracto manifesta-se de formas grotescas, como o longo cabelo de uma adolescente começar a enrolar até tomar controle da sua mente.'),(8,3,'O Enigma do Horizonte','/media/filmes/Enigma_do_horizonte.jpg','Em 2047, uma missão de resgate é mandada para encontrar a Event Horizon, uma nave que desapareceu misteriosamente sete anos atrás, quando explorava os limites do sistema solar. Ao encontrá-la, os astronautas que integram a missão de resgate vão gradativamente tomando consciência do terrível mistério que os cerca e que algo sinistro habita os corredores da nave.'),(9,4,'Um Dia de Fúria','/media/filmes/Um_dia_de_furia.jpg','Prendergast, um policial em seu último dia de trabalho pois vai se aposentar, arrisca sua vida para tentar deter William Foster, um homem emocionalmente perturbado que perdeu seu empregoe vai ao encontro de Beth, sua ex-mulher, e da filha, sem requer reconhecer que o seu casamento já acabou há muito tempo. Em seu caminho, William vai eliminando quem cruza seu destino.'),(10,4,'Drive','/media/filmes/Drive.jpg','Um habilidoso motorista, que é dublê em cenas de perseguição em filmes de Hollywood, também usa seu talento no volante para ser piloto de fuga em assaltos. Seu estilo de vida solitário e misterioso começa a mudar no momento em que se apaixona por uma mulher cujo marido está prestes a sair da prisão. Enquanto isso, o chefe da sua oficina mecânica está tentando organizar uma corrida com dinheiro sujo.'),(30,10,'Os Oito Odiados','/media/filmes/os 8 odiados.jpg','Durante uma nevasca, o caçador de recompensa John Ruth (Kurt Russell) está transportando uma prisioneira, a famosa Daisy Domergue (Jennifer Jason Leigh), que ele espera trocar por grande quantia de dinheiro. No caminho, os viajantes aceitam transportar o caçador de recompensas Marquis Warren (Samuel L. Jackson), e o xerife Chris Mannix (Walton Goggins), prestes a ser empossado em sua cidade. Como as condições climáticas pioram, eles buscam abrigo no Armazém da Minnie, onde quatro outros desconhecidos estão abrigados. Aos poucos, os oito viajantes no local começam a descobrir os segredos sangrentos uns dos outros, levando a um inevitável confronto entre eles.');
/*!40000 ALTER TABLE `filmes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'crud_cake'
--

--
-- Dumping routines for database 'crud_cake'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-07  1:54:48
