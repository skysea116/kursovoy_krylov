-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 25 2023 г., 23:49
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `krylov_kurs`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `category_id` int NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Горные'),
(2, 'Шоссейные'),
(3, 'Трюковые'),
(4, 'Детские');

-- --------------------------------------------------------

--
-- Структура таблицы `chars`
--

CREATE TABLE `chars` (
  `char_id` int NOT NULL,
  `good_id` int NOT NULL,
  `frame` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `fork` varchar(100) NOT NULL,
  `weight` varchar(30) NOT NULL,
  `manettes` varchar(100) NOT NULL,
  `front_derail` varchar(100) NOT NULL,
  `back_derail` varchar(100) NOT NULL,
  `conn_rods` varchar(100) NOT NULL,
  `carriage` varchar(100) NOT NULL,
  `cassette` varchar(100) NOT NULL,
  `speeds` int NOT NULL,
  `chain` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pedals` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `diametr` float NOT NULL,
  `rims` varchar(100) NOT NULL,
  `spokes` varchar(50) NOT NULL,
  `bushing` varchar(100) NOT NULL,
  `tires` varchar(100) NOT NULL,
  `front_brake` varchar(100) NOT NULL,
  `back_brake` varchar(100) NOT NULL,
  `rudder` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `takeaway` varchar(100) NOT NULL,
  `steering` varchar(100) NOT NULL,
  `seat` varchar(100) NOT NULL,
  `seatpost` varchar(100) NOT NULL,
  `country_dev` varchar(50) NOT NULL,
  `manufacture` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `chars`
--

INSERT INTO `chars` (`char_id`, `good_id`, `frame`, `fork`, `weight`, `manettes`, `front_derail`, `back_derail`, `conn_rods`, `carriage`, `cassette`, `speeds`, `chain`, `pedals`, `diametr`, `rims`, `spokes`, `bushing`, `tires`, `front_brake`, `back_brake`, `rudder`, `takeaway`, `steering`, `seat`, `seatpost`, `country_dev`, `manufacture`) VALUES
(1, 1, 'Алюминий 6061-T6, BSA68; ICR', 'STG SPICE HLO 100 мм', '15.70 кг', 'SHIMANO ALTUS EF505', 'SHIMANO TOURNEY TY', 'SHIMANO ACERA M360', 'SHIMANO TOURNEY TY301', '-', 'SHIMANO HG200-8', 24, '-', '-', 29, '-', '-', 'JOYTEC S-CLUB; CrMo ось', 'Z-AXIS TORRES 2.0', 'SHIMANO MT200', 'SHIMANO MT200', '-', '-', '-', '-', '-', 'Россия', 'Россия'),
(2, 2, 'Алюминий AL-6061', 'Easing ES-225', '15.90 кг', 'Microshift TS-38', 'DNP LY-G818', 'Shimano Tourney RD-TY21', 'GS-S307, сталь', 'Neco B-910, картридж', 'DNP TM-1007, трещотка', 21, 'Taya TB-50', 'MX-P624, пластик', 26, 'Rainbow DH-18', '-', 'Anteng, конусные', 'Citron CT-1201 2,1\"', 'Sparkle VB-N968SK', 'Sparkle VB-N968SK', 'Сталь, 25,4 мм, 620 мм', 'Сталь, резьбовой, 25,4 мм, 100 мм', 'Неинтегрированная', 'YBT YBT-1017', '27,2 мм, 350 мм', 'Россия', 'КНР (Тайвань)'),
(3, 3, 'алюминий X6', 'амортизационная 100 мм', '13.25 кг', 'SHIMANO Deore RD-M5100 \\ Sram NX', 'SHIMANO Deore RD-M5100 \\ Sram NX', 'сталь/алюминий, 36T', '-', 'картридж компонентный', 'кассета, 11-42T', 11, '-', '-', 29, 'алюминиевые, двойные', '-', 'алюминий пром. подшипники, быстр. зажим', '29 x 2.1 \\ 1.95', 'Shimano \\ Tektro Auriga, дисковые гидравлические, ротор 180мм', 'Shimano \\ Tektro Auriga, дисковые гидравлические, ротор 180мм', 'Алюминиевый 700 мм.(17\" рама) и 720 мм.(19\" рама)', 'Алюминиевый 80 мм.(17\" рама) и 100 мм.(19\" рама)', 'Безрезьбовая полуинтегрированная', 'Stels MTB', 'Алюминиевый', 'Россия', 'Россия'),
(4, 4, 'Алюминиевый сплав 6061, Не складная', 'FWD 286, стальная с алюминиевой короной', '15.60 кг', 'Microshift TS38', 'Shimano Tourney FD-TY500', 'Shimano Tourney RD-TY300', 'FWD HDL-S311, 42x34x24T, стальная', 'Thun картриджная', 'FWD KDF-711, 14-28T', 21, 'KMC HV408', '-', 29, 'FWD Double Wall', '-', 'FWD алюминиевые', 'CST C-1747 29x2.10\" (27TPI)', 'Clarks CMD-21, 160/160 мм', 'Clarks CMD-21, 160/160 мм', '-', 'FWD алюминиевый безрезьбовой', 'Kenli, 1 1/8\'\', полуинтегрированная безрезьбовая', 'FWD MTB', 'FWD алюминиевый 27.2x350 мм', 'Россия', 'Россия'),
(5, 5, 'Сталь HI-TENSILE', 'Жёсткая', '10.10 кг', '-', '-', '-', '-', 'Сталь', '-', 1, '76 link', 'Пластик', 18, 'Алюминиевые', '-', 'Сталь, Гайка', '18\"×2.125', '-', 'DACHANG', 'Novatrack, Сталь', 'Novatrack, Резьбовой 1\", Сталь', 'Резьбовая 1\"', 'Novatrack', '25,4мм; длина=200 мм, Сталь', '-', '-'),
(6, 6, 'MATTS J20 + Alloy V-brakes', 'MERIDA Suspension 40mm', '9.80 кг', 'Shimano RS35 Tourney Revo', '-', 'SHIMANO TY300', 'MERIDA EXPERT JR, 28 teeth, 127 mm', 'TH BB-7420ST', 'SHIMANO MF-TZ500, 6 SPEED, 14-28T', 6, 'KMC Z50', 'Wellgo LU-984', 20, 'MERIDA JR 20+, aluminium', 'Steel 14G', 'SF-A203F, aluminium, 28 spokes holes', 'Innova Transformers IA-2569 20x2.0\"', 'Promax Alloy', 'Promax Alloy', 'MERIDA EXPERT JR II, Aluminium ,20mm rise, 580mm Widht', 'MERIDA EXPERT CC II, Aluminium, 31.8mm diameter, -6\' stem angle; 45mm', 'VP-Z104AE', 'MERIDA COMP JR', 'MERIDA SPEED, 27.2 *300 mm', 'Тайвань', 'КНР (Тайвань)'),
(7, 7, 'Сталь HI-TENSILE', '-', '11.50 кг', '-', '-', '-', '-', 'Сталь', '-', 1, '76 link', 'Пластик', 18, 'Алюминиевые', '-', 'Сталь, Гайка', '18\"×2.125', '-', 'DACHANG', 'NOVATRACK, Сталь', 'NOVATRACK, Резьбовой 1\", Сталь', 'Резьбовая 1\"', 'NOVATRACK', '25,4мм; длина=200 мм, Сталь', '-', '-'),
(8, 8, 'ALUXX-Grade Aluminum, 12x142mm thru-axle, disc, flip chip dropout', 'Advanced-Grade Composite, full-composite OverDrive steerer, 12mm thru-axle, disc', '10.50 кг', 'Shimano Sora, 2x9', 'Shimano Sora', 'Shimano Sora, long cage', 'FSA Vero Pro, 32/48 XS:170mm, S:170mm, M:172.5mm, M/L:172.5mm, L:175mm, XL:175mm', 'cartridge', 'Shimano HG400, 11x34', 18, 'KMC X9 with Missing Link', '-', 28, 'Giant S-X2 Disc wheelset', 'Giant S-X2 Disc wheelset', 'Giant S-X2 Disc wheelset', 'Giant CrossCut AT 2, 700x38c, tubeless', 'Tektro MD-C550 mechanical, Giant MPH rotors [F]160mm, [R]160mm', 'Tektro MD-C550 mechanical, Giant MPH rotors [F]160mm, [R]160mm', 'Giant Contact XR Ergo-Control, 31.8mm XS:42cm, S:42cm, M:44cm, M/L:44cm, L:46cm, XL:46cm', 'Giant Contact, 8-degree XS:50mm, S:60mm, M:70mm, M/L:80mm, L:80mm, XL:90mm', '-', 'Giant Approach', 'Giant D-Fuse, alloy, 14mm offset', 'Тайвань', 'КНР (Тайвань)'),
(9, 9, 'Алюминий 6061-T6, двойной баттинг', 'STINGER ROAD DC, КАРБОНОВАЯ, ТОЛЬКО ПОД ДИСКОВЫЙ ТОРМОЗ', '-', 'SHIMANO CLARIS R2000; 2x8ск', 'SHIMANO CLARIS R2000', 'SHIMANO CLARIS R2000', 'SHIMANO RS200; 50/34T', 'THUN COUNTRY; КАРТРИДЖ', 'SHIMANO ACERA HG41; 8ск 11-30T', 16, 'KMC Z72', '-', 28, 'Алюминиевый двойной', '-', 'SHIMANO ACERA RM35', 'WTB EXPOSURE 700с Х 32', 'JAK T2; ДИСКОВЫЕ МЕХАНИЧЕСКИЕ, ротор STG, 160MM', 'JAK T2; ДИСКОВЫЕ МЕХАНИЧЕСКИЕ, ротор STG, 160MM', 'STG, диаметр 31.8мм, шоссейный, двойной баттинг, длина 420мм, провис 120мм, Алюминий', 'STG, длина 80мм, подъем 15 град., Безрезьбовой, Алюминий', 'STG, полуинтегрированная', 'WTB ROCKET 142 COMP', '350 MM, Алюминий', '-', '-'),
(10, 10, '100% Hi-Tensile 1020 Strength; Технологии - MID каретка, косынка, заготовка под установку гироротора, интегрированный подседельный зажим', 'ATOM STEALTH, Hi-Tensile 1020 Strenght, безрезьбовой шток 1 1/8”, конусная форма перьев, оффсет 26мм', '12.60 кг', '-', '-', '-', 'ATOM NITROS 100% Cr-mo, Трехэлементные, 170мм, 8 шлицов, Cr-mo ось', 'MID BB 19мм, закрытые пром. подшипники', 'Драйвер на 9 зубцов, закрытый подшипник.', 1, 'KMC S1', 'Педали ATOM AXION, однокомпонентные , широкая платформа 110x96мм, 10 шипов', 20, 'ATOM PRK, алюминий 6061, 36 спиц, ширина 33мм', 'Стальные 2 мм.', 'ATOM ZERON, низкие фланцы, 36 спиц, ось Cr-mo, 3/8\" (10мм)', 'INNOVA STREET 20\", Ширина: 2.4\"', '-', 'ATOM NITROS U-Brake, кованый алюминий, широкие рычаги', 'ATOM A2, двухкомпонентный, сталь Hi-Ten, Высота: 8.75\", Ширина: 29\", Загиб назад: 12°, Загиб вверх: 1°', 'ATOM BOMBSHELL, Top-Load Type, кованный алюминий, длина 50 мм.', 'ATOM A-HEAD, Безрезьбовая', 'ATOM DJ Combo, однокомпонентное, интегрированный штырь.', 'ATOM Combo, алюминиевый, диаметр 25.4 мм.', '-', '-');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `good_id` int NOT NULL,
  `good_name` varchar(150) NOT NULL,
  `good_price` int NOT NULL,
  `good_desc` text NOT NULL,
  `category_id` int NOT NULL,
  `good_img` varchar(100) NOT NULL,
  `good_quant` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`good_id`, `good_name`, `good_price`, `good_desc`, `category_id`, `good_img`, `good_quant`) VALUES
(1, 'Велосипед STINGER GRAPHITE EVO 29\" (2021)', 38341, 'Stinger Graphite Evo – относится к категории горных велосипедов, оснащенных колесами диаметром 29 дюймов. Отлично подойдёт для ценителей быстрой езды по городским асфальтовым дорогам и пересечённой местности. Облегченная рама выполнена из уникального алюминиевого сплава. Велобайк оборудован надежной гидравлической тормозной системой, обеспечивающей быстрое и плавное торможение. Оборудование известного бренда Shimano делают переключение скоростных режимов точным и быстрым.', 1, 'good1.jpeg', 7),
(2, 'Велосипед Stark Outpost 26.1 V (2022)', 17990, 'Велосипед Stark Outpost 26.1 V представляет собой яркий и стильный хардтейл. Это идеальное решение, сочетающее доступную цену и отличное качество. Модель одинаково хорошо демонстрирует свои эксплуатационные показатели как при езде по пересеченной местности, так и в условиях городских улиц.\r\nИз основных преимуществ байка Outpost 26.1 V выделяют:\r\n•    особопрочная рама из облегченного алюминия;\r\n•    21 скорость, благодаря которой вы легко подбираете оптимальный для себя вариант езды;\r\n•    надежная система тормозов вида V-brake, гарантирующая эффективное торможение;\r\n•    улучшенная вилка амортизации с ходом в 60 мм;\r\n•    26 типоразмеров колес, отличающихся повышенной жесткостью.\r\nПроизводитель использует в конструкции оригинальную вилку Easing ES-225, что обеспечивает байк отличными амортизационными показателями и позволяет сохранять максимально точную управляемость  даже при заездах по труднодоступным участкам. В комплекте идет удобная подножка и крылья.', 1, 'good2.jpeg', 4),
(3, 'Велосипед STELS Navigator-900 D 29\" F010', 20950, 'Великолепный по рабочим характеристикам хардтейл STELS Navigator-900 D 29\" F010 оснащен высокопрочной стальной рамой Hi-Ten, обеспечивающей модели безукоризненную надежность. Увеличенные колеса в 29 дюймов с двойными ободами из прочного алюминия гарантирует идеальное сцепление шин с любым видом дорожного покрытия и безопасное передвижение гонщика даже в сверхсложных условиях бездорожья. Мощные гидравлические тормоза дискового типа повышают удобство передвижения и обеспечивают моментальную остановку байка даже на мокрой дороге и крутых склонах.\r\nПроизводитель оснастил STELS Navigator-900 D 29\" F010 21-скоростной системой, помогающей велосипедисту легко подбирать режим скорости как в условиях бездорожья, так и на оживленных городских улицах. Данную модель могут использовать начинающие любители экстремальной езды благодаря удобному навесному оборудованию.', 1, 'good3.jpeg', 3),
(4, 'Велосипед FORWARD APACHE 29 2.0 Disc (2021)', 24690, 'FORWARD APACHE 29 2.0 Disc - горный хардтейл начального уровня, оборудованный всем необходимым для активного катания по городу и пересеченной местности. Модель оснащена амортизационной вилкой с ходом 80мм, цепкими дисковыми механическими тормозами, 21-скоростной трансмиссией с надежными переключателями Shimano.', 1, 'good4.jpg', 11),
(5, 'Велосипед NOVATRACK STRIKE 18\" (2022)', 5750, 'Хотите, чтобы ваш ребенок, играя, укреплял здоровье Тогда ему нужен удобный и надежный велосипед Novatrack Strike 18, рассчитанный на ребят 5-8 лет. Одного взгляда малыша хватит, чтобы раз и навсегда влюбиться в свой новенький двухколесный транспорт, который можно назвать и четырехколесным. Велосипед собран на базе рамы с универсальной геометрией, которая позволяет легко взобраться или слезть с велосипеда маленькому наезднику, при этом велосипед имеет такой вес, что маленький ребенок сам легко справляется со своим транспортным средством.', 4, 'good5.jpg', 17),
(6, 'Велосипед Merida Matts J.20 ECO (2022)', 25880, 'Merida Matts J.20 Eco (2022) – грамотный выбор для ребёнка ростом от 115 до 130см. У велосипеда ободные механические тормоза Promax Alloy, которые срабатывают всегда точно и эффективно. Лёгкий и эффективный велопривод, система MERIDA EXPERT JR, 28 teeth, 127 mm. Модель комплектуется переключателем передач SHIMANO TY300. Седло MERIDA COMP JR выполнено из качественных материалов. Алюминиевая рама MATTS J20 + Alloy V-brakes обеспечивает маневренность и надёжность всей конструкции.', 4, 'good6.jpg', 21),
(7, 'Велосипед Novatrack Astra 18\'\' (2020)', 6470, 'Novatrack Astra 18 отлично подойдет для детей 5-9 лет. Стильный и яркий дизайн еще не оставил равнодушным ни одного малыша. В модели уже все продумано до мелочей сзади установлен багажник, имеется защита цепи, металлические крылья и светоотражающие катафоты. Велосипед получился достаточно маневренным и легким в управлении, поэтому ребенку будет просто и интересно учиться катанию.', 4, 'good7.jpg', 9),
(8, 'Велосипед Giant Revolt 2 (2022)', 121500, 'Велосипед гравийный Giant Revolt 2 (2022), это отличный выбор, как для любителей, так и для требовательных профессионалов.\r\nРама модели выполнена из алюминия по технологии Aluxx, отличается легким весом и повышенными прочностными характеристиками, а универсальная гравийная геометрия дарит чувство уверенности и обеспечивает стабильное положение на трассе.\r\nОригинальная технология вилки Overdrive отвечает за необходимую жесткость и стабильное управление, а мощные тормоза обеспечат уверенность и полный контроль в любых погодных условиях.\r\nСпортивное седло Giant Contact, подседельный штырь D-Fuse и руль XR D-Fuse надежно сглаживают вибрации от движения по дорогам с неровным покрытием, а технология Flip-Chip позволит быстро и легко отрегулировать геометрию заднего колеса и клиренс покрышки.', 2, 'good8.jpg', 4),
(9, 'Велосипед STINGER STREAM EVO 28\" (2021)', 70040, 'Stinger Stream Evo 28\" (2021) – универсальный и легкий шоссейный велосипед. Модель имеет задний переключатель SHIMANO CLARIS R2000. Лёгкий и эффективный велопривод, система SHIMANO RS200; 50/34T. Для быстрых остановок используются отлично себя проявляющие дисковые механические тормоза JAK T2, ротор STG, 160MM. Велосипед оснащён покрышками WTB EXPOSURE 700с Х 32. Модель собрана на базе рамы 6061-T6, двойной баттинг из алюминиевого сплава. Седло WTB ROCKET 142 COMP рассчитано на шоссейный велосипед и отличается надёжностью, а также привлекательным удобным дизайном. Простая и практичная жёсткая вилка STINGER ROAD DC, КАРБОНОВАЯ, ТОЛЬКО ПОД ДИСКОВЫЙ ТОРМОЗ.', 2, 'good9.jpg', 3),
(10, 'Велосипед ATOM Ion (2022)', 20390, 'BMX Atom Ion разработан для экстремальных условий эксплуатации. Простая и прочная конструкция классической жёсткой вилки, безрезьбовой шток 1 1/8”, конусная форма перьев, оффсет. Уменьшенный вес системы ATOM NITROS, Cr-mo ось, позволяет оптимально передавать нагрузку на каретку. Спортивное седло ATOM DJ Combо. Рама сделана из стали и обладает высокой безопасностью посадки. Специальный рисунок на покрышках INNOVA STREET 20\", Ширина: 2.4\" делает езду в любом темпе безопасной благодаря хорошему сцеплению с грунтом.\r\nОсобенности:\r\n-Гиро-ротор для свободных вращений руля, задний тормоз для безопасности\r\n-Пеги, чтобы научиться скользить, или освоить флэтовые элементы\r\n-Хром-молибденовые шатуны, каретка MID BB и задняя втулка на закрытых подшипниках\r\n-Трансмиссия 25/9 и широкие покрышки для мягких приземлений.', 3, 'good10.jpg', 17);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `order_id` int NOT NULL,
  `user_id` int NOT NULL,
  `goods_count` int NOT NULL,
  `order_price` int NOT NULL,
  `address` varchar(200) NOT NULL,
  `status_id` int NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `role_id` int NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Администратор'),
(2, 'Пользователь'),
(3, 'Клиент');

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `status_id` int NOT NULL,
  `status_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`status_id`, `status_name`) VALUES
(1, 'В обработке'),
(2, 'В доставке'),
(3, 'Получен'),
(4, 'Отменён');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_surename` varchar(50) NOT NULL,
  `user_login` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `role_id` int NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_surename`, `user_login`, `user_email`, `role_id`, `password`) VALUES
(1, 'Александр', 'Крылов', 'alexk', 'alexk@yandex.ru', 1, '123456'),
(2, 'Наталья', 'Заболотская', 'ZabolNat123', 'zabolotnaya123@mail.ru', 3, '123');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Индексы таблицы `chars`
--
ALTER TABLE `chars`
  ADD PRIMARY KEY (`char_id`),
  ADD KEY `good_id` (`good_id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`good_id`),
  ADD KEY `chars_id` (`category_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`,`status_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `chars`
--
ALTER TABLE `chars`
  MODIFY `char_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `good_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `chars`
--
ALTER TABLE `chars`
  ADD CONSTRAINT `chars_ibfk_1` FOREIGN KEY (`good_id`) REFERENCES `goods` (`good_id`);

--
-- Ограничения внешнего ключа таблицы `goods`
--
ALTER TABLE `goods`
  ADD CONSTRAINT `goods_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
