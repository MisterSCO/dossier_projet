-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 20 juin 2021 à 20:28
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `smite_random`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `pseudo`, `email`, `pass`) VALUES
(1, 'MisterSCO', 'l.lecomte77@gmail.com', '$2y$10$icgMoNRNOd6/wiGF4oOLluEKDydiOdGZ32xLGvmvVhp6jmqSanHWy');

-- --------------------------------------------------------

--
-- Structure de la table `class`
--

DROP TABLE IF EXISTS `class`;
CREATE TABLE IF NOT EXISTS `class` (
  `id_class` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(32) NOT NULL,
  `id_type` int(11) NOT NULL,
  PRIMARY KEY (`id_class`),
  KEY `id_type` (`id_type`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `class`
--

INSERT INTO `class` (`id_class`, `label`, `id_type`) VALUES
(1, 'Mage', 2),
(2, 'Guerrier', 1),
(3, 'Gardien', 2),
(4, 'Chasseur', 1),
(5, 'Assassin', 1);

-- --------------------------------------------------------

--
-- Structure de la table `gods`
--

DROP TABLE IF EXISTS `gods`;
CREATE TABLE IF NOT EXISTS `gods` (
  `id_god` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `title` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `mythologie` varchar(32) NOT NULL,
  `picture_god` varchar(256) NOT NULL,
  `id_class` int(11) NOT NULL,
  PRIMARY KEY (`id_god`),
  KEY `id_class` (`id_class`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `gods`
--

INSERT INTO `gods` (`id_god`, `name`, `title`, `description`, `mythologie`, `picture_god`, `id_class`) VALUES
(1, 'Bellone', 'Déesse de la guerre', 'Elle a disparu de la mémoire de Rome.Il faut dire que Bellone, la déesse de la guerre, s\'est peu préoccupée de bâtir des temples ou de rassembler des fidèles. Elle n\'a que faire des prières murmurées dans le silence des édifices sacrés, elle qui n\'accorde ses faveurs qu\'à ceux qui consacrent leur vie à la guerre. Elle ne s\'épanouit que sur le champ de bataille, parmi les troupes en armure, quand le sang coule à flots et que les cris de victoire fusent.Tandis que Rome étendait peu à peu sa domination sur l\'Europe, Bellone était de tous les combats, triomphant de ses ennemis et assurant sa gloire. Mais lorsque la soif de conquête romaine commença à s\'apaiser, Bellone ne se battit plus qu\'aux côtés de son fidèle bras armé : Lucius Cornelius Sylla.Sylla gravit les échelons en accomplissant d\'immenses prouesses au combat. Craint de ses ennemis et respecté de ses soldats, il s\'attira naturellement la protection de Bellone. Ensemble, ils repoussèrent les hordes barbares, réprimèrent la guerre civile et conquirent Athènes. Grâce au soutien de Bellone, Sylla était invincible.Mais le Sénat romain finit par le désavouer, mettant un terme à son ascension vers la gloire.Bellone lui intima de marcher sur Rome afin d\'entrer dans la légende.Galvanisé, Sylla mena ses légions à travers les rues de la ville, Bellone à leur tête, massacrant les gladiateurs se dressant sur leur chemin. Le sénat n\'eut d\'autre choix que de revenir sur sa décision et de lui accorder sa confiance. Sylla devint ainsi le premier dictateur à vie de Rome.Au cours de son règne, Bellone reçut tous les honneurs dus à une déesse de son rang. Mais Sylla finit par vieillir. Les batailles se raréfièrent. Bellone quitta Rome et sombra dans l\'oubli.Aujourd\'hui, elle souhaite se rappeler à son bon souvenir. Les dieux s\'affrontent dans un conflit sans précédent, et Bellone n\'est jamais aussi vivante qu\'en temps de guerre. Cette fois-ci, elle compte bien laisser une trace dans la mémoire de tout un chacun.', 'Romain', 'https://webcdn.hirezstudios.com/smite/god-skins/bellona_standard-bellona.jpg', 2),
(2, 'Râ', 'Le dieu soleil', 'Sans soleil, point de lumière, de chaleur, ni de vie. Et sans Râ, point de soleil.Râ joue le rôle de gardien. Il est le protecteur de Maât, autrement dit de l\'ordre et la vérité, et le maître du soleil. Chaque jour, il traverse les cieux à bord de sa barque dorée et chaque nuit, il parcourt le pays des morts, apportant lumière et chaleur aux âmes tombées sous l\'horizon. Sous le soleil ardent du sud, Râ est vu comme le dieu primordial, créateur de la terre et du ciel et père de tous les autres dieux.Mais, comme la lumière du jour faiblit au crépuscule, la gloire de Râ décline à mesure que ses descendants acquièrent suffisamment de pouvoir pour usurper son autorité. C\'est ainsi sa propre petite-fille, Isis, qui l\'empoisonna en le faisant mordre par un serpent. Elle promit alors au dieu-soleil de le sauver s\'il consentait à lui révéler son véritable nom. Conscient que dévoiler ce secret le mettrait à la merci d\'Isis, Râ commença par refuser, mais la douleur était si vive qu\'il finit par céder. La déesse tint parole : Râ survécut au venin, mais à quel prix ?La lumière peut guérir, mais aussi brûler. Avant cet incident, Râ s\'était déjà retrouvé dans une colère noire : il avait alors envoyé sa fille Hathor, transformée en lionne, dévorer les hommes qui lui avaient manqué de respect. Il avait toutefois mis un terme au massacre avant que Hathor n\'engloutisse toute l\'humanité. Mais aujourd\'hui, sa colère est entièrement tournée vers les autres dieux. Et lorsqu\'il sera enfin apaisé, il ne devrait rester rien d\'autre que de la cendre.', 'Égyptien', 'https://webcdn.hirezstudios.com/smite/god-skins/ra_standard-ra.jpg', 1),
(3, 'Cupidon', 'Dieu de l\'amour', 'Quiconque est touché par une flèche tirée par l\'arc de Cupidon, le petit dieu de l\'amour, succombe instantanément à la passion et au désir.Dans le panthéon romain, Cupidon est le fils de Vénus et de Mars, connus chez les Grecs sous le nom d\'Aphrodite et d\'Arès. Dieu de l\'amour et du désir, il est pourvu d\'ailes qui lui permettent de voler, et il tire des flèches qui suscitent la passion des hommes aussi bien que des animaux. Une fois touchée, sa cible s\'éprend du premier être qui croise son regard. Sans l\'intermédiaire de Cupidon, le monde serait dépourvu d\'amour, et c\'est justement ce qui arriva lorsque lui-même tomba amoureux.Psyché, une mortelle d\'une beauté époustouflante, rendait Vénus extrêmement jalouse. Cette dernière ordonna à Cupidon de décocher une flèche à sa rivale, afin de la rendre amoureuse... d\'une araignée. À contrecœur, Cupidon s\'approcha de Psyché alors qu\'elle dormait. Celle-ci se réveilla subitement et sentit sa présence, bien qu\'il fût invisible. Sous le coup de la surprise, Cupidon se coupa avec sa propre flèche et tomba instantanément amoureux de Psyché.Furieuse, Vénus refusa catégoriquement d\'autoriser les noces de Psyché et de Cupidon, aussi ce dernier délaissa son arc. Les humains cessèrent alors de s\'aimer et en conséquence de vénérer Vénus. Prise de panique, la déesse de la beauté fut contrainte de revenir sur sa décision, et Cupidon reprit son activité. Psyché fut conduite dans un lieu secret, et son amant ne se rendait à ses côtés qu\'en pleine nuit, afin de ne pas lui révéler son identité. Craignant que son mystérieux visiteur ne soit en réalité un horrible monstre, Psyché attendit que Cupidon s\'endorme pour allumer une lampe. Surprise par ce qu\'elle vit, elle se piqua accidentellement sur une flèche, à son tour, et tomba amoureuse de Cupidon.Courroucée, Vénus interdit à Psyché de voir son fils et l\'obligea à relever une série de défis insurmontables, dont la jeune femme ne vint à bout qu\'avec l\'aide des dieux. Cupidon finit par supplier Jupiter d\'intervenir. Le dieu suprême autorisa l\'union des deux amoureux. Cupidon fit alors boire à Psyché de l\'ambroisie afin de la rendre immortelle, et ils purent ainsi vivre heureux, unis pour l\'éternité.', 'Romain', 'https://webcdn.hirezstudios.com/smite/god-skins/cupid_standard-cupid.jpg', 4),
(4, 'Cabrakan', 'Destructeur de montagnes', 'Les séismes provoquent toujours une panique instinctive chez les mortels. Une peur terrible, qui ne peut venir que d\'un géant surpuissant. Un géant pourfendeur de pierres, capable d\'écarteler la terre. Un géant comme Cabrakan, le destructeur de montagnes.Doté d\'une force colossale qu\'il étale à loisir aux yeux de tous, Cabrakan n\'a aucun scrupule à saccager tout ce que la terre a mis tant de temps à offrir. Ce trait de caractère, il le tient de son père, l\'oiseau maléfique Vucub Caquix.Déterminés à éliminer toute la descendance de leur ennemi ailé, les Héros jumeaux n\'eurent aucune difficulté à suivre Cabrakan à la trace. Ils le trouvèrent dans une vallée cernée de pics immenses, où il s\'affairait à réduire des rochers en poussière.\"Comme vous êtes fort\" lui dirent-ils pour le flatter.\"En effet\" répondit-il.\"Êtes-vous capable de détruire cette montagne au loin ?\"\"Évidemment\" assura Cabrakan.\"Vous avez sans doute faim\" remarquèrent les jumeaux.\"Comme toujours !\"Armés de leurs sarbacanes, ils abattirent un oiseau pour le géant, et tandis qu\'ils le faisaient cuire, Hunahpu le couvrit de glaise empoisonnée.Sans se douter de la supercherie, Cabrakan dévora son repas mais alors qu\'il se levait, les effets du poison se firent sentir : sa vue se brouilla et il tituba. Ce jour-là, le poids du géant qui chutait fit s\'écrouler les montagnes, et la vallée devint son tombeau.Mais la vengeance est un plat qui se mange froid. Les géants ne sont pas des créatures si faciles à tuer. Le destructeur de montagnes ne saurait rester enseveli sous les rochers, et voilà que le sommeil de Cabrakan touche à sa fin. Désormais libre, il fait trembler le champ de bataille, à la recherche des Héros jumeaux qui se sont joués de lui. Pourquoi s\'en tiendrait-il aux montagnes, alors qu\'il est capable de détruire des dieux ?', 'Maya', 'https://webcdn.hirezstudios.com/smite/god-skins/cabrakan_standard-cabrakan.jpg', 3),
(5, 'Discordia', 'Déesse des querelles', 'L\'adage dit que Rome ne s\'est pas faite en un jour. Les arches courbes du Colisée, les interminables aqueducs, la muraille Servienne protectrice… Le mérite de la construction de Rome ne revient en exclusivité à rien ni personne. Elle a beau être devenue toute-puissante, Rome n\'aurait peut-être jamais vu le jour sans la malice de la déesse Discordia.Connue chez les Grecs sous le nom d\'Éris, déesse du conflit, cette dernière n\'était guère appréciée. Aussi ambitionnait-elle de libérer son plein potentiel, de détruire les fondations mêmes des mortels et des divinités qui l\'exécraient. En jouant sur la vanité de ses pairs, elle parvint à ses fins.Elle forma une pomme dorée sur laquelle était inscrit : \"À la plus belle\". Cette simple phrase allait semer la discorde entre Athéna, Héra et Aphrodite, pousser Pâris à enlever Hélène, la femme de Ménélas, et finalement déclencher la guerre de Troie.Tandis que se déchaînait le chaos, que s\'effondraient les cités et que tombaient au combat les héros grecs et troyens, personne ne semblait s\'interroger sur la provenance de la pomme. La machination était magistrale ! Au moment où la guerre de Troie arriva à son apogée, Éris s\'était attachée au mortel Énée. Elle le mena en lieu sûr, loin de Troie, par-delà les mers et les contrées sauvages, afin qu\'il bâtisse une nouvelle nation. C\'est ainsi qu\'Énée fonda Rome.Éris, débarrassée de sa mauvaise réputation auprès du peuple grec et des regards perpétuellement méprisants des autres dieux, renaquit en tant que Discordia, une éminente déesse romaine. Alors non, Rome ne s\'est pas faite en un jour ; elle a été l\'aboutissement des manigances d\'une déesse qui cherchait à se réinventer.Sans rien utiliser d\'autre qu\'une unique pomme dorée.', 'Romain', 'https://webcdn.hirezstudios.com/smite/god-skins/discordia_standard-discordia.jpg', 1),
(6, 'Loki', 'Le dieu fripon', 'Félon. Ce mot désigne quiconque enfreint les règles et s\'empare de ce qu\'il désire sans se soucier d\'autrui. Toutefois Loki, le dieu fripon par excellence, rétorquerait sans doute que la félonie n\'est qu\'une question de point de vue.Le point de vue des sots, qui ne savent pas saisir les occasions qui se présentent à eux.Quoi qu\'il en soit, maintenant que Loki a recouvré la liberté, les conséquences s\'annoncent désastreuses. Nous pourrions bientôt assister à la fin des temps (rien de moins !) engendrée par le Ragnarök, l\'ultime bataille. En effet, les prophéties ont prédit que l\'évasion de Loki serait le signe annonciateur de ce combat final. Dans un chaos absolu, les dieux périront, les cieux se déchireront, le monde sera réduit en cendres. Et nul n\'attend ce jour avec plus d\'impatience que Loki lui-même.Avant sa déchéance, Loki avait coutume de commettre farces et facéties en tous genres ; les autres dieux en avaient tous déjà pâti. Plus rarement, certains en avaient aussi profité. Mais un jour, Loki alla décidément trop loin et mena Baldr, le dieu de la lumière, à sa perte.Sous la forme de rêves prémonitoires, Baldr voyait régulièrement sa propre mort. Inquiète pour son fils, Frigg força chaque objet de ce monde à s\'engager à ne jamais le blesser - tous acceptèrent, sauf le gui. Voyant là une aubaine pour mettre sur pied une farce cruelle, Loki fabriqua une lance en bois de gui qu\'il donna à Höd, le frère de Baldr. En effet, la nouvelle distraction des dieux consistait à lancer divers objets sur Baldr car, immanquablement, ils ricochaient sur son corps sans lui faire le moindre mal, provoquant l\'hilarité générale. Ainsi, quand Höd propulsa sa lance, à la stupéfaction générale, celle-ci transperça Baldr. Au vu des circonstances, Hel accepta de relâcher Baldr du royaume des morts, à la condition toutefois que l\'ensemble des créatures du monde pleure le dieu de la lumière. Toutes s\'exécutèrent, à l\'exception d\'une vieille femme. C\'est ainsi que Baldr périt à tout jamais.Lorsque les dieux découvrirent que cette vieille femme n\'était autre que Loki affublé d\'un déguisement, ils décidèrent que son méfait, cette fois, méritait un châtiment. Les dieux, furieux, l\'attachèrent solidement et placèrent un serpent venimeux au-dessus de sa tête. Sigyn, l\'épouse de Loki, recueillait le venin dans un récipient afin d\'épargner Loki. Mais à chaque fois qu\'elle devait s\'éloigner pour vider le récipient plein, du venin se déversait sur son mari. Alors, Loki se tordait de douleur, et l\'on raconte que c\'est là l\'origine des tremblements de terre.Mais désormais, Loki est libre, prêt à semer le chaos. Si les völvas disent vrai, alors la fin de toute chose est proche. Et les völvas, hélas, ne se trompent jamais.', 'Nordique', 'https://webcdn.hirezstudios.com/smite/god-skins/loki_standard-loki.jpg', 5),
(7, 'Merlin', 'L\'enchanteur', 'La légende du roi Arthur est connue de tous, pourtant celui qui en fut l\'instigateur reste nimbé de mystère. Ses origines et celles de son pouvoir sont autant de secrets que lui seul détient. Sa nature même suscite bien des interrogations. Est-il un simple humain devenu virtuose dans les arts ésotériques ? Est-il un démon ? Un hybride ? Quoi qu\'il en soit, il est clair que le bras droit d\'Arthur, l\'illustre enchanteur Merlin, est doté d\'une immense sagesse qui n\'a d\'égale que sa force.Au temps des guerres des rois, où seul le plus puissant allait pouvoir régner, Merlin mit ses talents au service de grands souverains. Il leur était tout aussi précieux en tant qu\'éminence grise que mage-guerrier. Détenteur de secrets et de connaissances ancestrales, Merlin est passé maître dans la sorcellerie arcanique, mais il est également capable de contrôler une myriade d\'éléments. Par ailleurs, il est doué du don de divination, et prophétisa l\'ascension d\'un roi destiné à régner sur tous les autres, à unir les territoires en guerre sous sa bannière.Lorsqu\'Uther Pendragon périt au combat contre les hordes d\'envahisseurs barbares saxons, Merlin jura de servir son successeur, Arthur. Depuis ce jour, le mage n\'a jamais quitté le porteur d\'Excalibur. Il est son conseiller avisé, son camarade au combat, et son plus fidèle ami. Ensemble, ils permirent l\'avènement de l\'âge d\'or de Camelot, l\'unification de terres jusqu\'alors divisées. Les vils Saxons furent refoulés jusqu\'à la mer, et les sujets du royaume connurent la paix, la justice et la prospérité.Quiconque s\'oppose à Merlin ferait bien de s\'armer de prudence. Nombreux sont ceux qui l\'ont mis au défi, cherchant bien souvent à s\'accaparer ses connaissances, ses secrets et son pouvoir. Mais ils sont peu à avoir survécu pour le raconter.', 'Arthurien', 'https://webcdn.hirezstudios.com/smite/god-skins/merlin_standard-merlin.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `passif` text NOT NULL,
  `picture_item` varchar(256) NOT NULL,
  `id_type` int(11) NOT NULL,
  PRIMARY KEY (`id_item`),
  KEY `id_type` (`id_type`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `items`
--

INSERT INTO `items` (`id_item`, `name`, `passif`, `picture_item`, `id_type`) VALUES
(1, 'Arc d\'atlante', 'Chaque élimination ou assistance octroie l\'Agilité d\'Atalante pendant 10s. Ce bonus augmente la vitesse d\'attaque de 20%, et réduit de 30% la pénalité de vitesse de déplacement induite par les attaques de base et les déplacements latéraux ou arrières.', 'https://webcdn.hirezstudios.com/smite/item-icons/atalantas-bow.jpg', 1),
(2, 'Ichaival', 'Atteindre un ennemi avec une attaque de base vous donne une charge de +15 puissance. Votre cible obtient une charge qui réduit de 10% sa vitesse d\'attaque. Chaque effet dure 5s et se cumule 3 fois.', 'https://webcdn.hirezstudios.com/smite/item-icons/ichaival.jpg', 1),
(3, 'Livre de Thot', 'PASSIF - Vous gagnez 10 PM par charge de manière permanente. Vous recevez 5 charges par dieu tué et 1 charge par sbire tué (75 charges max.). De plus, 7% du mana des objets est converti en puissance magique. Une fois à 75 charges, cet objet évolue et procure 3% supplémentaires de conversion du mana en puissance.\r\n\r\nPASSIF EVOLUE - 10% du mana des objets est converti en puissance magique.', 'https://webcdn.hirezstudios.com/smite/item-icons/book-of-thoth.jpg', 2),
(4, 'Pièce de Pythagore', 'Les dieux alliés à moins de 70 unités obtiennent 12% de drain de vie magique et 30 de puissance magique, ou bien 10% de drain de vie physique et 20 de puissance physique.', 'https://webcdn.hirezstudios.com/smite/item-icons/pythagorems-piece.jpg', 2),
(5, 'Serre de Bancroft', 'Vous gagnez de la puissance et du drain de vie magiques en fonction de votre santé manquante. Le bonus est à son maximum quand vous avez moins de 25% de santé : il vous donne 100 de puissance et 20% de drain de vie.', 'https://webcdn.hirezstudios.com/smite/item-icons/bancrofts-talon.jpg', 2),
(6, 'Pierre du vide', 'La protection magique des dieux ennemis à moins de 55 unités est réduite de 10%.', 'https://webcdn.hirezstudios.com/smite/item-icons/void-stone.jpg', 2),
(7, 'Lance du mage', 'Infliger des dégâts de compétence à un dieu ennemi lui applique une marque. Tous les dégâts qu\'il subit augmentent alors de 7,5%. La marque dure 7s et ne peut être appliquée que toutes les 15s.', 'https://webcdn.hirezstudios.com/smite/item-icons/spear-of-the-magus.jpg', 2),
(8, 'Bottes du mage', '', 'https://webcdn.hirezstudios.com/smite/item-icons/shoes-of-the-magi.jpg', 2),
(9, 'Bâton du sorcier', 'Vous gagnez de façon permanente 1 de santé et 0,8 de puissance magique par charge, et obtenez 5 charges par dieu tué et 1 charge par sbire tué (75 charges max.).', 'https://webcdn.hirezstudios.com/smite/item-icons/warlocks-staff.jpg', 2),
(10, 'Saïs de quin', 'Vos attaques de base infligent des dégâts physiques équivalant à 4% de la santé maximale de la cible, ou davantage si elle a plus de 2200 PV, pour un maximum de 5% à 2750 PV.', 'https://webcdn.hirezstudios.com/smite/item-icons/qins-sais.jpg', 1),
(11, 'L\'écraseur', 'Vos compétences de dégâts infligent en 2s des dégâts physiques supplémentaires équivalant à 20 + 15% de votre puissance physique.', 'https://webcdn.hirezstudios.com/smite/item-icons/the-crusher.jpg', 1),
(12, 'Transcendance', 'PASSIF - Vous gagnez 15 PM par charge de manière permanente. Vous recevez 5 charges par dieu tué et 1 charge par sbire tué (50 charges max.). De plus, 3% de votre mana est converti en puissance physique. Une fois à 50 charges, cet objet évolue et procure 10% de réduction du temps de recharge.\r\n\r\nPASSIF EVOLUE - 3% de votre mana est converti en puissance physique.', 'https://webcdn.hirezstudios.com/smite/item-icons/transcendence.jpg', 1),
(13, 'Marteau gelé', 'Pendant 1,25s, les ennemis frappés par vos attaques de base voient leur vitesse de déplacement réduite de 30% (ou bien 20% si vos attaques de base sont à distance). De plus, leur vitesse d\'attaque est réduite de 20%.', 'https://webcdn.hirezstudios.com/smite/item-icons/frostbound-hammer.jpg', 1),
(14, 'Epée briseroche', 'Vos attaques de base au corps à corps volent 10 de protection physique à la cible pendant 3s (3 charges maximums).', 'https://webcdn.hirezstudios.com/smite/item-icons/stone-cutting-sword.jpg', 1),
(15, 'Lame dorée', 'Vos attaques de base atteignent aussi les ennemis à moins de 15 unités de la cible, en infligeant 50% de dégâts aux dieux, aux sbires et aux monstres de jungle.', 'https://webcdn.hirezstudios.com/smite/item-icons/golden-blade.jpg', 1),
(16, 'Tabi de ninja', '', 'https://webcdn.hirezstudios.com/smite/item-icons/ninja-tabi.jpg', 1),
(17, 'Gemme spirituelle', 'Les compétences réussies rapportent une charge. Une fois à 4 charges, la prochaine compétence qui touche un dieu ennemi consomme toutes les charges pour infliger des dégâts bonus équivalant à 30% de votre puissance magique, et ce sur tous les dieux touchés. En parallèle, cette compétence vous soigne, ainsi que les alliés à moins de 20 unités de vous, pour un montant équivalant à 40% de votre puissance magique.', 'https://webcdn.hirezstudios.com/smite/item-icons/soul-gem.jpg', 2),
(18, 'Éclat d\'obsidienne', 'La prochaine compétence utilisée obtient 10% de pénétration magique. Cet effet ne peut se produire que toutes les 10s.', 'https://webcdn.hirezstudios.com/smite/item-icons/obsidian-shard.jpg', 2);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id_type`, `name`) VALUES
(1, 'physic'),
(2, 'magic');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `type` (`id_type`);

--
-- Contraintes pour la table `gods`
--
ALTER TABLE `gods`
  ADD CONSTRAINT `gods_ibfk_1` FOREIGN KEY (`id_class`) REFERENCES `class` (`id_class`);

--
-- Contraintes pour la table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `type` (`id_type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
