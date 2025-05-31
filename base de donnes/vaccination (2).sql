-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 01 juin 2025 à 00:31
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `vaccination`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `ID_admin` int(20) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`ID_admin`, `Nom`, `Email`, `Password`) VALUES
(1, 'Admin', 'Admin@gmail.com', 'Admin123');

-- --------------------------------------------------------

--
-- Structure de la table `demande_consultation`
--

CREATE TABLE `demande_consultation` (
  `ID` int(50) NOT NULL,
  `Name` varchar(80) NOT NULL,
  `phone` int(13) NOT NULL,
  `Wilaya` varchar(20) NOT NULL,
  `Zone` varchar(50) NOT NULL,
  `Raison_du_rendez_vous` varchar(50) NOT NULL,
  `Deja_consulte` varchar(9) NOT NULL,
  `date` datetime NOT NULL,
  `Email` varchar(100) NOT NULL,
  `vet_id` int(50) NOT NULL,
  `ID_fermier` int(50) NOT NULL,
  `breed` varchar(20) NOT NULL,
  `quantity` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `demande_consultation`
--

INSERT INTO `demande_consultation` (`ID`, `Name`, `phone`, `Wilaya`, `Zone`, `Raison_du_rendez_vous`, `Deja_consulte`, `date`, `Email`, `vet_id`, `ID_fermier`, `breed`, `quantity`) VALUES
(69, 'ben habbouche med chouaib', 791986058, 'alger', 'ruiba', 'استشارة تغدية', 'نعم', '2025-06-05 00:00:00', 'chouaib123321@gmail.com', 40, 91, 'هولشتاين', 4);

-- --------------------------------------------------------

--
-- Structure de la table `demande_vaccination`
--

CREATE TABLE `demande_vaccination` (
  `ID` int(50) NOT NULL,
  `farmer_name` varchar(100) NOT NULL,
  `location` varchar(50) NOT NULL,
  `breed` varchar(20) NOT NULL,
  `age` int(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `date` date NOT NULL,
  `vet_id` int(50) NOT NULL,
  `notes` varchar(100) NOT NULL,
  `phone` int(20) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `ID_fermier` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `demande_vaccination`
--

INSERT INTO `demande_vaccination` (`ID`, `farmer_name`, `location`, `breed`, `age`, `quantity`, `date`, `vet_id`, `notes`, `phone`, `Email`, `ID_fermier`) VALUES
(41, 'ben habbouche mohamed chouaib', 'Annaba', 'مونبيليارد', 5, 3, '2025-06-08', 40, 'eoijfoisj', 791986058, 'chouaib123321@gmail.com', 91);

-- --------------------------------------------------------

--
-- Structure de la table `fermier`
--

CREATE TABLE `fermier` (
  `ID` int(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Num` int(12) NOT NULL,
  `Nomferme` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `fermier`
--

INSERT INTO `fermier` (`ID`, `Name`, `Email`, `Password`, `Num`, `Nomferme`, `address`) VALUES
(91, 'ben habbouche med chouaib', 'chouaib123321@gmail.com', '0b2e40fc84131f989351c326032ce1c1', 670285350, 'helty farm', 'nvl'),
(92, 'abd nour batichim', 'batchim@gmail.com', '559dad1f53b21240b3ea86c85ca6c359', 670285350, 'hjjkrdnj', '81 rahmani achour');

-- --------------------------------------------------------

--
-- Structure de la table `rep_con`
--

CREATE TABLE `rep_con` (
  `ID_con` int(50) NOT NULL,
  `accept` varchar(5) NOT NULL,
  `confarmation_de_date` varchar(5) NOT NULL,
  `nouvaeu_date` datetime NOT NULL,
  `Num` varchar(13) NOT NULL,
  `Prix` varchar(100) NOT NULL,
  `notes` varchar(100) NOT NULL,
  `ID_fermier` int(50) NOT NULL,
  `vet_id` int(50) NOT NULL,
  `Raison_du_rendez_vous` varchar(50) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Nom_vet` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `rep_con`
--

INSERT INTO `rep_con` (`ID_con`, `accept`, `confarmation_de_date`, `nouvaeu_date`, `Num`, `Prix`, `notes`, `ID_fermier`, `vet_id`, `Raison_du_rendez_vous`, `Name`, `Nom_vet`) VALUES
(38, 'oui', 'oui', '2025-06-06 00:00:00', '0589589621', '400da', 'fkmloisdk', 91, 40, 'استشارة تغدية', 'ben habbouche med chouaib', 'ramzi');

-- --------------------------------------------------------

--
-- Structure de la table `rep_vac`
--

CREATE TABLE `rep_vac` (
  `ID_rep` int(25) NOT NULL,
  `confarmation_de_date` varchar(5) NOT NULL,
  `nouvaeu_date` datetime NOT NULL,
  `vac` varchar(50) NOT NULL,
  `Prix` varchar(100) NOT NULL,
  `notes` varchar(100) NOT NULL,
  `Num` varchar(10) NOT NULL,
  `ID_fermier` int(50) NOT NULL,
  `vet_id` int(50) NOT NULL,
  `accept` varchar(40) NOT NULL,
  `farmer_name` varchar(100) NOT NULL,
  `Nom_vet` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `rep_vac`
--

INSERT INTO `rep_vac` (`ID_rep`, `confarmation_de_date`, `nouvaeu_date`, `vac`, `Prix`, `notes`, `Num`, `ID_fermier`, `vet_id`, `accept`, `farmer_name`, `Nom_vet`) VALUES
(44, 'oui', '2025-06-06 00:00:00', 'جدري الأغنام', '900da', 'wepoksjoiasm', '0552145132', 91, 40, 'oui', 'ben habbouche mohamed cho', 'ramzi');

-- --------------------------------------------------------

--
-- Structure de la table `veterinaire`
--

CREATE TABLE `veterinaire` (
  `ID` int(50) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Num` int(10) NOT NULL,
  `Numdelicencevet` varchar(100) NOT NULL,
  `info` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `veterinaire`
--

INSERT INTO `veterinaire` (`ID`, `Name`, `Email`, `Password`, `Num`, `Numdelicencevet`, `info`) VALUES
(40, 'ramzi', 'ramzi@gmail.com', '0bb0862e539d5008d7917952cec375d5', 670258412, 'lkmiknj', 'jinbhgvftrzu');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_admin`);

--
-- Index pour la table `demande_consultation`
--
ALTER TABLE `demande_consultation`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `VET_ID_con` (`vet_id`),
  ADD KEY `ID_FERMIER_con` (`ID_fermier`);

--
-- Index pour la table `demande_vaccination`
--
ALTER TABLE `demande_vaccination`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_FERMIER_VACC` (`ID_fermier`),
  ADD KEY `VET_ID_vac` (`vet_id`);

--
-- Index pour la table `fermier`
--
ALTER TABLE `fermier`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Index pour la table `rep_con`
--
ALTER TABLE `rep_con`
  ADD PRIMARY KEY (`ID_con`),
  ADD KEY `rep_CCon_IDf` (`ID_fermier`),
  ADD KEY `rep_Ccon_IDv` (`vet_id`);

--
-- Index pour la table `rep_vac`
--
ALTER TABLE `rep_vac`
  ADD PRIMARY KEY (`ID_rep`),
  ADD KEY `ID_fermier` (`ID_fermier`,`vet_id`,`farmer_name`),
  ADD KEY `rep_Vvac_idv` (`vet_id`);

--
-- Index pour la table `veterinaire`
--
ALTER TABLE `veterinaire`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID_admin` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `demande_consultation`
--
ALTER TABLE `demande_consultation`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT pour la table `demande_vaccination`
--
ALTER TABLE `demande_vaccination`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `fermier`
--
ALTER TABLE `fermier`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT pour la table `rep_con`
--
ALTER TABLE `rep_con`
  MODIFY `ID_con` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `rep_vac`
--
ALTER TABLE `rep_vac`
  MODIFY `ID_rep` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `veterinaire`
--
ALTER TABLE `veterinaire`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
