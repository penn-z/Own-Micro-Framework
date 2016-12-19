-- MySQL dump 10.13  Distrib 5.5.53, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: study_mvc
-- ------------------------------------------------------
-- Server version	5.5.53-0ubuntu0.14.04.1-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `username` varchar(50) NOT NULL COMMENT '管理员用户名',
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'penn','202cb962ac59075b964b07152d234b70'),(3,'admin','21232f297a57a5a743894a0e4a801fc3');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '文章自增id',
  `title` varchar(100) NOT NULL COMMENT '文章标题\n',
  `author` varchar(50) NOT NULL COMMENT '作者',
  `description` varchar(255) NOT NULL COMMENT '文章简介',
  `content` text NOT NULL COMMENT '文章内容',
  `dateline` int(11) NOT NULL DEFAULT '0' COMMENT '文章添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article`
--

LOCK TABLES `article` WRITE;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` VALUES (7,'今天去看你的名字','新海诚','男女主角交换身体的故事～！１','已经看完了，故事很好，画面依然是美。每一帧都是壁纸～',1480852503),(9,'测试标题','作者是我','没有简介呢～～','乱写看看的～',1480852546),(10,'再来一篇','继续','不写，。～','没有',1480852622),(12,'更新文章测试','penn','内容更新测试','你说我要写什么内容呢',1481540038),(14,'再来测试一次','penn','乱七八糟的描述','真的是乱乱的',1481542637),(15,'再来测试一次','penn','乱七八糟的描述','真的是乱乱的',1481542639),(16,'123456','Jing','乱七八糟的描述','真的是乱乱的',1481542640);
/*!40000 ALTER TABLE `article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(4) NOT NULL AUTO_INCREMENT COMMENT '新闻编号',
  `title` char(50) NOT NULL COMMENT '标题',
  `author` varchar(20) NOT NULL COMMENT '作者',
  `source` varchar(20) NOT NULL COMMENT '出处',
  `content` text NOT NULL COMMENT '内容',
  `dateline` int(11) NOT NULL DEFAULT '0' COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (11,'测试文章1～～～','penn','在学校图书馆敲出来的～','这是第一个自做的微型框架，主要是为了理解并巩固mvc思想～～',1481894026),(12,'慕课网，努力学习～～','penn','Library','慕课网上的教学资源真的很棒～～！！！',1481894100),(13,'测试文章2～～～～','penn','宿舍敲出来的～','这是测试文章2，，～～用于测试搜索～～～',1481900745),(14,'明年楼市怎么走？中央已放出这些信息！','刘德宾 ','新浪','<p>12月16日闭幕的中央经济工作会议，对中国房地产市场提出了新的定位和工作部署，&ldquo;房子是用来住的，不是用来炒的&rdquo;这一表述，被看作是在减弱住房金融属性。同时，会议在抑制房地产市场泡沫、增加土地供应、落实人地挂钩等方面的部署，也决定着明年楼市调控的基调和市场走势。</p>\r\n\r\n<p>　　明年房地产市场将会如何走？一起来了解。</p>\r\n\r\n<p><strong>　　&ldquo;房子是用来住的，不是用来炒的&rdquo;</strong></p>\r\n\r\n<p><strong>　　未来或将严防金融资金炒房路</strong></p>\r\n\r\n<p>　　&ldquo;房子是用来住的，不是用来炒的&rdquo;，在部署2017年中国房地产市场工作时，中央经济工作会议率先明确了这一战略性定位。看似通俗易懂的表述背后，有着怎样的含义？中国社科院城市与竞争力研究中心主任倪鹏飞接受媒体采访时表示，上述定位意在减弱金融属性，住房属于耐用消费品，基本功能是居住，不是用于投资和投机赚钱。</p>\r\n\r\n<p>　　倪鹏飞说，未来金融监管层面的关键，就是要防止股市、债市、保险和银行资金违规进入楼市。&ldquo;此轮楼市过热，最主要原因就是金融机构利用监管漏洞，采取不同形式让资金绕道转入房地产市场&rdquo;。</p>\r\n\r\n<p>　　&ldquo;炒房最可怕的地方不在于用自有资金炒房，而在于用金融资金炒房，金融机构参与是造成高杠杆的主要因素。&rdquo;中国社科院城市发展与环境研究中心原主任、中国城市经济学会副会长牛凤瑞在接受媒体采访时坦言。</p>\r\n\r\n<p>　　作为从业人士，易居研究院智库中心研究总监严跃进解释称，&ldquo;政策含义非常明确，住房需求要继续得到保障，炒房需求要管控和遏制&rdquo;。</p>\r\n\r\n<p>　　为保障正常的购房和贷款需求，会议提出，要在宏观上管住货币，微观信贷政策要支持合理自住购房，严格限制信贷流向投资投机性购房。</p>\r\n\r\n<p><strong>　　抑制房地产泡沫、防止大起大落</strong></p>\r\n\r\n<p><strong>　　要坚持分类调控，因城因地施策</strong></p>\r\n\r\n<p>　　会议要求，综合运用金融、土地、财税、投资、立法等手段，加快研究建立符合国情、适应市场规律的基础性制度和长效机制，既抑制房地产泡沫，又防止出现大起大落。</p>\r\n\r\n<p>　　&ldquo;可以看出，政策明确了明年房地产调控的总体思路。&rdquo;严跃进告诉媒体记者，一是抑制房地产泡沫，主要是土地市场和房价的泡沫；二是防范市场出现大起大落，让市场更加稳定，从而预期才会更加稳定。&rdquo;</p>\r\n\r\n<p>　　挤出炒房泡沫后，真实的供求关系才更容易显现。倪鹏飞分析，决策层清醒认识到房地产的定位，绝不容忍投机的泛滥，如果采取措施确保住房回归居住和消费属性，有助于房地产市场挤出泡沫，显现真实的供求关系，有利于房地产市场健康平稳发展。</p>\r\n\r\n<p>　　会议明确，去库存方面，要坚持分类调控，因城因地施策，重点解决三四线城市房地产库存过多问题。要把去库存和促进人口城镇化结合起来，提高三四线城市和特大城市间基础设施的互联互通，提高三四线城市教育、医疗等公共服务水平，增强对农业转移人口的吸引力。</p>\r\n\r\n<p><strong>　　落实人地挂钩政策</strong></p>\r\n\r\n<p><strong>　　一、二线城市或加大土地供应指标</strong></p>\r\n\r\n<p>　　会议指出，要落实人地挂钩政策，根据人口流动情况分配建设用地指标。要落实地方政府主体责任，房价上涨压力大的城市要合理增加土地供应，提高住宅用地比例，盘活城市闲置和低效用地。特大城市要加快疏解部分城市功能，带动周边中小城市发展。</p>\r\n\r\n<p>　　倪鹏飞认为要区别看待：三、四线城市的情况是地方政府大量供应土地，由于供应总量多，房价反而会低；而在一、二线城市，由于主、客观两个层面的作用造成土地供应不足，形成土地的饥渴和短缺，加上土地拍卖制度就把地价搞得特别高。</p>\r\n\r\n<p>　　&ldquo;针对一、二线土地市场供应不足导致的地价、房价上涨，可以从两个层面来解决。&rdquo;倪鹏飞建议，首先要加大土地供应指标，采取人地挂钩模式；其次由于一、二线城市存量土地比较多，同样有盘活的余地。</p>\r\n\r\n<p>　　严跃进表示，政策初衷就是考虑到各大城市人口流动的差异性特征，预计明年继续实行限购的城市，在获得开发用地、土地转性等方面将有更多机会，2017年下半年楼市供应紧张局面有望改变。</p>\r\n\r\n<p><strong>　　加快住房租赁市场立法</strong></p>\r\n\r\n<p><strong>　　城市住房结构将进一步改善</strong></p>\r\n\r\n<p>　　会议还指出，要加快住房租赁市场立法，加快机构化、规模化租赁企业发展。加强住房市场监管和整顿，规范开发、销售、中介等行为。</p>\r\n\r\n<p>　　今年6月份，国务院办公厅发布《关于加快培育和发展住房租赁市场的若干意见》提出，到2020年，基本形成供应主体多元、经营服务规范、租赁关系稳定的住房租赁市场体系，基本形成保基本、促公平、可持续的公共租赁住房保障体系。为加快培育和发展住房租赁市场，鼓励房地产开发企业开展住房租赁业务，允许将商业用房等按规定改建为租赁住房。</p>\r\n\r\n<p>　　在严跃进看来，发展住房租赁市场无论是从迎合城市各层次住房者的租赁需求，还是进一步改善城市住房结构的角度，都有益处。</p>\r\n',1482112671);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-19 11:02:27
