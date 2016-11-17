-- MySQL dump 10.13  Distrib 5.5.49, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: WAP_WEB_DB
-- ------------------------------------------------------
-- Server version	5.5.49-0ubuntu0.14.04.1

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
-- Table structure for table `BOARD`
--

DROP TABLE IF EXISTS `BOARD`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `BOARD` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `idxOf` int(11) NOT NULL,
  `regIdx` int(11) NOT NULL,
  `main` longtext NOT NULL,
  `isFileUp` char(1) NOT NULL DEFAULT 'N',
  `isImageUp` char(1) NOT NULL DEFAULT 'N',
  `isUsable` char(1) NOT NULL DEFAULT 'N',
  `regDate` datetime NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `BOARD`
--

LOCK TABLES `BOARD` WRITE;
/*!40000 ALTER TABLE `BOARD` DISABLE KEYS */;
INSERT INTO `BOARD` VALUES (43,'[공지사항] 홈페이지 게시판 이용시 주의사항!',1,1,'안녕하세요&nbsp;<div>부경대학교 동아리 W.A.P 회장입니다.</div><div>홈페이지 개편을 통하여 이용에 앞서&nbsp;</div><div>먼저 알려드립니다.</div><div>현재 우리가 사용하고 있는 이 홈페이지는 무료 호스팅을 이용하여&nbsp;</div><div>운영하고 있으며 꾸준한 활동이 있어야 유지 가능합니다!</div><div>하지만 무료호스팅인 만큼 제약 사항이 많아서 먼저&nbsp;</div><div>알려드려야 이용이 불편없이 사용 하실수 있을겁니다.</div><div>게시판을 이용하면서 문제점은&nbsp;</div><div>파일을 업로드 하는데 제한이 너무나 큰데&nbsp;</div><div>허용용량은 거의 8MB입니다. 하지만 만에 하나의 사태를 생각해서</div><div><b>6MB정도만 업로드 가능하다고 생각하시고 사용하시길 바랍니다.</b></div><div>새롭게 개편된 만큼 많은 이용 바랍니다!&nbsp;</div><div><br></div><div><br></div>','N','N','Y','2015-12-29 00:00:00'),(44,'웹 개발을 하고싶나요??? ',2,1,'안녕하세요&nbsp;<div>회원분들 활동하시면서 많은 공부를 하실건데&nbsp;</div><div>시간은 적고 그렇다고 책을 보려니 넘 시간이 오래걸리고</div><div>인터넷 강의라도 있으면 좋겠는데 없으니 너무 답답할겁니다.</div><div>웹 프로그래밍 공부를 시작하시는 분들에게는&nbsp;</div><div>다들 아실지 모르겠지만&nbsp;</div><div><b>\"생활코딩\" &nbsp;(&nbsp;https://opentutorials.org/course/1&nbsp;</b><b style=\"line-height: 1.42857;\">)&nbsp;</b><span style=\"line-height: 1.42857;\">이라는 곳을 소개 해드릴까 합니다.</span></div><div>먼저 오픈 강의라서 무료라는 장점과 웹의 기초인 HTML 부터</div><div>CSS JavaScript 그리고 PHP 프레임워크인 Codeigniter까지&nbsp;</div><div>다양한 강의가 있습니다.&nbsp;</div><div>강의를 들으면서 실습까지 한다면 정말 도움 되는 사이트입니다.</div><div>회원분들이 참고하셔서 많은 이용하면 좋겠네요! ㅎ&nbsp;</div>','N','N','Y','2015-12-29 00:00:00'),(45,'[공지사항] 프로젝트 및 동아리 홍보 관련',1,1,'안녕하세요&nbsp;<div><b>프로젝트 관련</b>으로 안내를 드립니다.</div><div><b>이번 프로젝트</b>는 방학 프로젝트인 만큼&nbsp;</div><div><b>제일 중요한 프로젝트</b>라고도 할 수 있습니다.</div><div>무엇보다 이번 방학 프로젝트는&nbsp;</div><div>학기중에 했던 프로젝트보다 <b>자신의 역량을 좀 더 향상 시키는데</b>에&nbsp;</div><div><b>목표</b>를 두고 있고요&nbsp;</div><div>그렇기에 더더욱 엄격하게 진행 할 예정입니다.&nbsp;</div><div>프로젝트 기간은 2016. 01. 07. ~ 02. 25.<br></div><div>(ps. c언어로 콘솔 용 프로그램은 허용 안한다 이겁니다.)</div><div><br></div><div>그리고 <b>2016년이 되었기에</b>&nbsp;</div><div>신입생을 가입받기 위하여 <b>홍보 및 세미나</b>를 해야 합니다.</div><div>먼저 홍보는 모든 회원 분들이 참여 하셔야 합니다.&nbsp;</div><div>자세한 사항은 추가적인 회의를 통하여 계획을 잡기로 하구요&nbsp;</div><div>그리고 매년 신입생을 대상으로 한<b> C언어 세미나는&nbsp;</b></div><div><b>겨울 방학 프로젝트를 참여를 안하시는 분</b>에게 세미나를&nbsp;</div><div>각 파트 별로 맡으시면 되겠습니다.</div><div>물론 프로젝트는 의무적으로 해야하지만 정말 어쩔수없는 분들</div><div><b>해외로 장기 출타 이시거나 나는 집이 너무 거리가 멀다( ps. 창원 또는 그이외의 지방 )</b></div><div><b style=\"line-height: 1.42857;\">이런분들만 예외를 시키고 세미나를 준비 해 주셔야 합니다.</b><br></div><div><b>그외의 사유&nbsp;</b></div><div><b>1. 집은 지방인데, 자취방에서 산다.&nbsp;</b></div><div><b>2. 부산 기장, 장산, 영도 , 다대포 이런 곳은 안됨</b></div><div><b>3. 알바때문에 안된다&nbsp;</b></div><div><b>4. 영어 공부때문에 안된다.&nbsp;</b></div><div><b>5. 기타 사유로 시간때문에 안된다.</b></div><div><b>안됩니다.</b></div><div><b>정말 무엇때문에 안되는지 조금 이해 하기 힘들수 도 있네요&nbsp;</b></div><div><b>다들 방학은 휴식 기간이라고 생각하시겠지만&nbsp;</b></div><div><b>절대! 아닙니다. 특히 1학년들은요&nbsp;</b></div><div><b>이</b><b style=\"line-height: 1.42857;\">때가 제일 변화할수 있는 시기이면서&nbsp;</b></div><div><b>중요한 시기입니다. 잠깐의 몸이 편하고자 안하게 된다면 결국 제자리 입니다.</b></div><div><b>사실 프로젝트 완성을 못하는건 잘못이지만&nbsp;</b></div><div><b>그렇다고 책임을 묻지 않습니다. 제가 회원들이 프로젝트를 하면서 안되는거</b></div><div><b>왜안되냐 그리고 따지는 부분은 이 회원이 프로젝트를 위하여 공부를 안했다라는것이&nbsp;</b></div><div><b>보이기 때문입니다 그러한 노력도 없이 동아리 활동을 한다는건 조금 이상하다고 생각되네요.</b></div><div><b>노력한사람은 주변인들로 부터 노력한 것이 보이기때문입니다.</b></div><div><b>우리의 활동이 마음에 안드시면 저한테 말하시고 조용히 나가시면 되겠네요&nbsp;</b></div><div><b><br></b></div><div><b>아무튼 다들 이번방학을 알차게 보내시길 바랄게요&nbsp;</b></div><div><br></div><div>홍보 및 세미나 계획은 프로젝트 중간 발표에 계획을 잡는것으로 하겠습니다.</div><div><br></div><div>긴글읽느라 수고 하셨습니다.&nbsp;</div><div><br></div><div>마지막으로 확인 댓글 등록 바랍니다. :D</div><div><b><br></b></div>','N','N','Y','2016-01-02 00:00:00'),(46,'[공지사항] 2016년 첫 회의 자료',1,1,'2016년 첫 회의 자료 입니다.','N','N','Y','2016-01-03 00:00:00'),(47,'웹소켓 정말 좋네요 ',2,1,'안녕하세요 이번에는 웹소켓에대해서 알아볼까합니다.<div><br></div><div>다들 알고계실거라고 생각하지만&nbsp;</div><div>소켓은 네트워크프로그래밍에서 가장 중요한 녀석입니다.&nbsp;</div><div>소켓이 없다면 아마 네트워크를 이용한 프로그래밍을&nbsp;</div><div>하지못하지 않았을까 합니다....&nbsp;</div><div>네트워크내부에서는 많은 계층들이 존재하는데&nbsp;</div><div>가장 먼저 프로토콜이란것이 중요합니다. 프로토콜이란</div><div>일종의 서로간의 규약을 정해놓은 것이며 이 정해진 규약대로 행해져야&nbsp;</div><div>문제없다는 것입니다. 우리가 지금 사용하고 있는 인터넷브라우저에서 나오는&nbsp;</div><div>홈페이지는 가장 쉬운 프로토콜인 http 라는 프로토콜을 사용하죠!&nbsp;</div><div>(그래서 홈페이지 주소의 맨앞에 http:// 가 붙는것입니다.)&nbsp;</div><div>http 프로토콜은 가장 쉬운 프로토콜인 대신에 단점이 있습니다.&nbsp;</div><div>단순히 문서를 전달하면 되기때문에 브라우저가 해당문서를 요청하고&nbsp;</div><div>서버에서는 요청문서에 대한 응답을 해주고 연결을 끊습니다!&nbsp;</div><div>바로! 여기서 단점이 생기는것이죠!!!&nbsp;</div><div>연결을 지속하지 않기때문에 새로운 정보가 업데이트 되거나 하였을 때&nbsp;</div><div>브라우저는 업데이트된 내용을 실시간으로 받을수 없다는 것 이죠!!&nbsp;</div><div>이러한 비연결성의 문제는 http의 가장 문제였습니다 ㅠ&nbsp;</div><div>(물론 여러가지의 방법으로 최신정보를 받는 법이 있긴합니다...)</div><div><br></div><div>이러한 불편함을 사용하던 중 HTML5가 나오기 시작하면서&nbsp;</div><div>불편함을 해소 할수 있는데 그것이 바로 웹 소켓입니다!!!!!</div><div>웹 소켓은 웹브라우저에서 서버와 브라우저간의 양방향으로&nbsp;</div><div>정보들을 이동할 수 있습니다.&nbsp;</div><div>정말 좋은 기술입니다!! &nbsp;하지만 문제는 아직 완전히 사용을 하기엔&nbsp;</div><div>조금 어려운감이 있기때문에 아쉬운데요&nbsp;</div><div>최근? Node.js 라는 녀석이 나타나 Node.js에서 웹소켓을 지원하는&nbsp;</div><div>Socket.io 를 이용하여 웹소켓 통신을 편리하게 할 수 있습니다!</div><div>최근 많은 웹앱이나오면서 이러한 통신은 거의 Node js를&nbsp;</div><div>많이 사용하는 하는 추세입니다 ㅎ&nbsp;</div><div>Node.js 에관한 내용또는&nbsp;</div><div>사용해보고싶은 분은&nbsp;<span style=\"line-height: 1.42857;\">( http://ohgyun.com/370 ) 참고하시면되겠습니다.</span></div><div><br></div><div><span style=\"line-height: 20px;\">수고하세요 ㅎ&nbsp;</span></div><div><span style=\"line-height: 1.42857;\"><br></span></div><div><br></div>','N','N','Y','2016-01-13 00:00:00'),(48,'[입문자를 위한 글] 분산 버전 관리 시스템(버전 관리)에 대하여',2,20,'안녕하세요 WAP 13기 정회원 김호균입니다.<div><br><div>아마 생소하신 분들이 많을 것 같아서&nbsp;<span style=\"line-height: 1.42857;\">간단하게 저의 소개를 드리자면,</span></div><div><span style=\"line-height: 1.42857;\">현재 학교에서는 활동을 하고 있지 않지만</span></div><div>현재 <b>국방의 의무</b>(?)를 지키기 위해서 산업체에서 현재 2년 째 일을 하고 있는 동아리 회원입니다. <b>(드디어 올해 가을에 만날 수 있습니다)</b></div><div>그래서 여러분들에게는 실제 현업 개발자들이 고려해야 하는 내용,</div><div>회사에서 실제 협업을 위해 필요한 문제에 대해서는 어느 누구보다 자세히 설명을 드릴 수 있을 것 같습니다.</div><div><br></div><div><br></div><div><br></div><div>- 서론 -</div><div>동아리 홈페이지의 활성화를 위해서 준비한 글은 바로 형상 관리입니다.</div><div>아마 대부분의 학생들이 잘못 사용하고 있는 것 중에 하나가 형상관리라고 생각합니다.</div><div>실제로 신입 개발자를 채용했을 때 90% 이상이 버전관리를 사용 안해봤거나,</div><div>github 등의 경험을 해본적이 있으나, 실제로 제대로 사용하는 것이 아닌 경우가 많습니다.</div><div><br></div><div>보통 대부분의 학생들은 언어를 기본기라고 생각합니다.</div><div>그러나 실제 현업 개발자 중에서는 <b>\"형상관리를 할 줄 모르는 사람은 개발자가 아니다\"</b> 라는</div><div>주제의 이야기를 하는 사람도 있을 정도로&nbsp;<span style=\"line-height: 1.42857;\">기본기 중에 기본기라고 말씀 드릴 수 있습니다.</span></div><div>이유는 간단합니다. 프로그램은 혼자 개발하는 것이 아니기 때문이죠</div><div><br></div><div><br></div><div><br></div><div>- 본론 -</div><div><b>1. 형상 관리와 버전 관리란</b></div><div>형상관리와 버전관리는 같은 개념이 아닙니다. 형상관리는 버전관리 + 이슈트래킹 이라고 볼 수 있으며</div><div>이슈트래킹은 간단하게 설명을 드리자면, 버그 현상 또는 해야 할 일에 대한 목록을 제시하고 개발자가 해결하는 과정을 관리하는 도구입니다.</div><div>이슈트래킹에 대해서는 다음에 시간이 날 때 자세히 설명을 드리겠습니다. <b>(시간날 때 반드시 강의를 하고 싶습니다)</b></div><div>형상 관리는 프로젝트에 대한 형상을 관리하는 것이기 때문에, 소스에 대한 관리(버전 관리)를 포함하여 이슈에 대한 관리도 수행합니다.</div><div>즉, 제대로 된 형상관리를 하는 기업은 버전관리와 더불어 이슈트래킹을 운영하고 두 개의 도구가 연동되어 있어야 합니다.</div><div><br></div><div><b>2. 버전 관리의 종류</b></div><div>버전 관리는 3세대로 구분할 수 있습니다.</div><div>1 세대 : 아마 다수의 여러분들이 하시는 그 파일을 사본으로 저장하는 그 개념입니다.</div><div>2 세대 : svn, cvs 와 같은 버전 관리를 말하는 것이며 서버-클라이언트 방식으로 운영됩니다. 모든 형상은 서버에 저장되어 있습니다.</div><div>클라이언트는 특정 리비전에 대한 소스를 열람하거나 비교할 때, 서버에 요청합니다.</div><div>3 세대 : git, mercurial 등과 같은 형상 관리를 말하는 것이며 p2p 와 같은 분산 네트워크입니다. 즉 형상이 모든 서버, 클라이언트에 저장되어 있습니다.</div><div>따라서 clone(checkout, 모든 리비전을 가져오는 작업)이 느리며, 오프라인 상태에서도 형상관리가 가능합니다.</div><div>git, mercurial 등을 쓰는 이유는 오프라인 상태에서도 작업이 가능하지만, 그 외에도 lock 개념이 아닌 merge 가 있어서 소스 합치기가 편리하다는 것입니다.</div><div><br></div><div><b>3. 버전 관리 용어</b></div><div>&nbsp;- <b>리비전(revision)</b> : 소스에서의 특정 시점입니다. 만약 처음 시작했다면 리비전은 0 또는 1이며, 하나씩 등록(커밋, commit)할 때 마다.</div><div>리비전은 1씩 증가합니다.&nbsp;<span style=\"line-height: 1.42857;\">만약, 이전 소스로 돌아가고 싶다면 이전 소스의 해당 리비전 번호로 돌아가면 됩니다.</span></div><div>&nbsp;- <b>리파지토리(repository)</b> : 리비전들을 모아 놓은 저장 공간입니다.</div><div>&nbsp;- <b>커밋(commit)</b> : 소스의 상태를 저장합니다. (리비전을 새로 생성합니다)</div><div>&nbsp;- <b>푸시(push)</b> : 새로 생성한 리비전들을 서버에 전달합니다.</div><div>&nbsp;- <b>풀(pull)</b> : 서버의 새로운 리비전을 클라이언트로 받아옵니다.</div><div>&nbsp;- <b>브랜치(branch)</b> : 모든 리비전(루트를 제외한)은 부모의 리비전으로 부터 변화된 내용을 저장하고 있습니다.</div><div>따라서 같은 부모로 부터 서로 다른 내용을 가진 리비전이 있을 수 있습니다.</div><div>특정 리비전으로부터 분화된 가지를 브랜치라고 합니다.&nbsp;<span style=\"line-height: 1.42857;\">브랜치는 보통 명명(naming) 할 수 있습니다.</span></div><div>또한, 같은 네임을 가진 브랜치가 2개 이상으로 갈라질 수 있으나(2개 이상의 head 를 가질 수 있으나) 보통 정상적인 상황은 아닙니다.</div><div>&nbsp;- <b>헤드(head)</b> : 브랜치가 갈라졌을 때 나뭇가지의 끝(말단) 리비전</div><div>이외의 용어들이 많이 있으나, &nbsp;필요에 따라 찾아보시기 바랍니다. (물어보셔도 좋습니다)</div><div><br></div><div><b>4. 분산 버전관리의 사용</b></div><div>3세대 분산 버전 관리, 여기에서도 mercurial 을 본인이 좋아하므로 mercurial 기준으로 소개를 드리자면</div><div>1. clone(checkout) : 서버로 부터 모든 리비전을 가져온다 ( ex : hg clone http://source.url/projectname )</div><div>2. update : 특정 리비전으로 이동한다 ( ex : hg update develop, hg update 1245 )</div><div>3. commit : 리비전을 새로 생성한다 ( ex : hg commit, hg commit -m \"리비전에 대한 간략한 메시지\" )</div><div>4. pull : 클라이언트에 없는 새로운 리비전을 서버로 부터 가져 온다 ( ex : hg pull )</div><div>5. push : 클라이언트에서 새로 생성한 리비전을 서버로 전달한다 ( ex : hg push )</div><div>6. history : 리비전에 대한 나열, 윈도우즈, GNU 환경이라면 차라리 tortoise 같이 GUI 로 이쁘게 보여주는 도구를 쓰시길 ( ex : hg history )</div><div><br></div><div>이외에도 status, heads, 등등은 필요할 때 쓰시면 됩니다. 버전관리에 대하여 감이 오신다면 이 글은 성공한 것이라고 볼 수 있습니다.</div><div>아마 제가 지금 생각나는 대로 적어서 명령어에서 다소 틀린 부분이 있을 수도 있지만 (아마 맞을듯),</div><div>형상관리를 고려한다면 다른 웹 사이트에서 한번 보고 찾아보시길</div><div><br></div><div><br></div><div><b>4. 브랜치의 운용</b></div><div>자세하게는 아래의&nbsp;<span style=\"color: rgb(102, 102, 102); font-family: Titillium, Arial, sans-serif; font-size: 16px; line-height: 24px; background-color: rgb(234, 234, 234);\">분산형 버전 관리 시스템 작업 흐름 – 게으른 푸시 모델(lazy push model)&nbsp;</span><span style=\"line-height: 1.42857;\">를 참고하세요</span></div><div><span style=\"line-height: 20px;\">이해에 도움을 주기위해 간단하게 설명을 드리자면</span></div><div><span style=\"line-height: 20px;\"><br></span></div><div>회사의 요구사항은 상당히 많이 바뀝니다. 안정적인 버전을 원하고, 서로 다른 버전이 출시될 수 있습니다. (에디션 같은거 말이죠)</div><div>그리고 새로운 기능을 추가하였을 때, 그것이 모든 에디션에 적용해야 한다면, 그리고 그 에디션이 최소 100개 이상이라면</div><div>상당히 심각하게 퇴사를 고민하는 본인의 모습을 보실 수 있습니다.</div><div><br></div><div>보통의 회사가 운용하는 default(master), hotfix, develop, release, feature 에 대해서 소개를 드리겠습니다.</div><div>&nbsp;-<b> default(master)</b>&nbsp;: 최종 프로젝트의 버전입니다. 실제로 납품 가능한 버전이 이 브랜치에 와야 합니다.</div><div>&nbsp;- <b>hotfix</b> :최종 프로젝트의 버전에서도 버그가 발견 될 수 있습니다. 그럴 경우 hotfix 를 통해서 수정합니다. (바로 default 에서 수정해도 됩니다)</div><div>&nbsp;- <b>develop</b> : 새로운 기능을 개발하는 리비전입니다. 이 브랜치에서는 많은 버그가 발생할 수 있습니다.</div><div>&nbsp;- <b>release</b> : QA 팀이 기능 테스트를 거친 버전은 이곳으로 옵니다. QA 시작 지점에서 이 브랜치는 분화되며, 그 이후 develop 과 merge 를 하지 않습니다.</div><div>QA 기간 동안 버그 수정된 내용은 release 브랜치에서 수정되어야 하며, release 의 브랜치 내용을 develop 으로 머지 해야 합니다.</div><div><span style=\"line-height: 1.42857;\">develop 브랜치로 머지되면,&nbsp;</span><span style=\"line-height: 1.42857;\">develop 은 새로운 기능에 대한 코드를 포함하면서</span>&nbsp;develop 브랜치는 해당 버그에 대한 이슈가 수정될 것입니다.</div><div>&nbsp;- <b>feature-*</b> : 기능 개발을 할 때, 기능 개발이 장기적으로 갈 것을 예상한다면, develop 브랜치로 부터 feature 브랜치를 생성합니다.</div><div>feature 브랜치에서 기능 개발을 진행하면서 develop 으로 부터 머지를 하고, 기능 구현이 완료되고 단위테스트가 완료 되면, 다시 develop 에 머지합니다.</div><div>그러면 develop 브랜치에 새 기능은 다소 버그가 덜 발생하는 상태로 머지가 됩니다.</div><div>&nbsp;- <b>custom</b> : 만약 커스텀 기능에 대한 브랜치가 필요하다면 develop 에서 브랜치를 생성한뒤 커스텀 기능을 개발하고,</div><div>그 이후에는 develop 으로 부터 머지를 받습니다. custom 의 내용을 develop 으로 절대 머지하면 안됩니다.</div><div><br></div><div><br></div><div><br></div><div>- 결론 -</div><div><b>결론은 형상관리를 잘 사용해서, 같은 일을 두 번 하는 바보같은 개발자가 되지 말자 입니다.</b></div><div><br></div><div>학교에서 개발한 프로젝트는 세발의 피에 불과합니다. 같은 일 두 번 해도 생각보다 할만(?)합니다.</div><div>회사는 영리단체이기 때문에, 여러분에게 제한된 시간안에 가장 안정화된 프로그램을 만들기를 원합니다. 요구사항이 변할 수도 있죠</div><div><span style=\"line-height: 1.42857;\">학교와 회사가 서로 다르기 때문에 다음과 같은 매우 심각한 문제들이 발생할 수 있습니다.</span><br></div><div><span style=\"line-height: 1.42857;\"><br></span></div><div><b><span style=\"line-height: 1.42857;\">1. </span><span style=\"line-height: 1.42857;\">요구사항은 언제든지 변할 수 있습니다. 기획의 변경, 커스텀을 원하는 고객사가 있을 수도 있죠 -&gt; 버전이 많아진다 -&gt; 개발자가 야근 한다</span></b></div><div>요구사항 변경되거나 커스텀을 원하는 고객사를 만나면, 그 부분에 대하여 서로 다른 기능을 제공하는 버전을 제공하고 관리되어야 합니다.</div><div>버전관리가 제대로 안된 회사에서 3년전에 어떤 프로젝트를 찾아내라라고 상사가 지시한다면, 그 작업만으로도 야근하는 경험을 하실 수 있습니다.</div><div><br></div><div><b>2. 회사에서는 프로젝트 개발 기간이 한정되어 있습니다. 따라서 여러명이 작업을 해야하죠 -&gt; 소스를 합친다 -&gt; 버전관리 못한다 -&gt; 개발자가 야근한다</b></div><div>제한 시간이 혼자 할 수 있는 작업량보다 작은 경우가 많으므로, 필수적으로 협업을 해야 하는 상황에서</div><div>형상관리 등이 제대로 되지 않는다면, 소스 합치는 부분에서 많은 시간이 걸릴 수 있고요</div><div><br></div><div><b>여러분은 지금 개발자가 야근하는 알고리즘을 보고 계십니다.</b></div><div>개발은 사실상 코드의 문제라기보다는 사람의 문제가 큰 경우가 많습니다. IT 회사를 보통 사람 장사라고 합니다.</div><div>좋은 선임을 만나서 이러한 내용을 배우면 가장 좋겠지만... 제가 본 많은 회사들이 개발 프로세스가 잘 수행되는 경우는 없었죠</div><div>개발자하면 보통 야근이 연상되는데, 머리가 나쁘면 손발이 고생한다는 말이 여기에 어울리는 듯 하죠</div><div><br></div><div><br></div><div><br></div><div>- 참고 하시면 좋은 내용 -</div><div><span style=\"color: rgb(102, 102, 102); font-family: Titillium, Arial, sans-serif; font-size: 16px; line-height: 24px; background-color: rgb(234, 234, 234);\">분산형 버전 관리 시스템 작업 흐름 – 게으른 푸시 모델(lazy push model)</span><br></div><div>http://surpreem.com/archives/1847#sthash.ZwwVaah3.dpbs<br></div></div>','N','N','Y','2016-01-13 00:00:00'),(49,'[회의록] 20160104 1차회의',1,7,'1차 회의록입니다.<div><br></div><div>일시 : 2016년 01월 04일</div><div>장소 : 향파관 107호</div><div>기타 : 회의 관련 ppt ( http://wap.pknu.wink.ws/board/view/1/46 )</div>','N','N','Y','2016-01-14 00:00:00'),(50,'[회의록] 20160114 2차회의',1,7,'<span style=\"background-color: rgb(255, 255, 255);\">2차 회의록입니다.</span><div style=\"background-color: rgb(255, 255, 255);\"><br></div><div style=\"background-color: rgb(255, 255, 255);\">일시 : 2016년 01월 14일</div><div style=\"background-color: rgb(255, 255, 255);\">장소 : 향파관 207호</div><div style=\"background-color: rgb(255, 255, 255);\"><br></div>','N','N','Y','2016-01-14 00:00:00'),(51,'[도서] 도서목록',1,7,'<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"214\" style=\"width: 161pt;\"><colgroup><col width=\"37\" style=\"width: 28pt;\"><col width=\"177\" style=\"width: 133pt;\"></colgroup><tbody><tr height=\"22\" style=\"height: 16.5pt;\"><td height=\"22\" class=\"xl64\" width=\"37\" style=\"height: 16.5pt; width: 28pt;\">A</td><td class=\"xl65\" width=\"177\" style=\"border-left-style: none; width: 133pt;\">언어</td></tr><tr height=\"22\" style=\"height: 16.5pt;\"><td height=\"22\" class=\"xl64\" style=\"height: 16.5pt; border-top-style: none;\">B</td><td class=\"xl65\" style=\"border-top-style: none; border-left-style: none;\">응용프로그램 개발</td></tr><tr height=\"22\" style=\"height: 16.5pt;\"><td height=\"22\" class=\"xl64\" style=\"height: 16.5pt; border-top-style: none;\">C</td><td class=\"xl65\" style=\"border-top-style: none; border-left-style: none;\">Web</td></tr><tr height=\"22\" style=\"height: 16.5pt;\"><td height=\"22\" class=\"xl64\" style=\"height: 16.5pt; border-top-style: none;\">D</td><td class=\"xl65\" style=\"border-top-style: none; border-left-style: none;\">Network</td></tr><tr height=\"22\" style=\"height: 16.5pt;\"><td height=\"22\" class=\"xl64\" style=\"height: 16.5pt; border-top-style: none;\">E</td><td class=\"xl65\" style=\"border-top-style: none; border-left-style: none;\">알고리즘 || 자료구조</td></tr><tr height=\"22\" style=\"height: 16.5pt;\"><td height=\"22\" class=\"xl64\" style=\"height: 16.5pt; border-top-style: none;\">F</td><td class=\"xl65\" style=\"border-top-style: none; border-left-style: none;\">영상처리 || 신호처리</td></tr><tr height=\"22\" style=\"height: 16.5pt;\"><td height=\"22\" class=\"xl64\" style=\"height: 16.5pt; border-top-style: none;\">G</td><td class=\"xl65\" style=\"border-top-style: none; border-left-style: none;\">Database</td></tr><tr height=\"22\" style=\"height: 16.5pt;\"><td height=\"22\" class=\"xl64\" style=\"height: 16.5pt; border-top-style: none;\">H</td><td class=\"xl65\" style=\"border-top-style: none; border-left-style: none;\">보안</td></tr><tr height=\"22\" style=\"height: 16.5pt;\"><td height=\"22\" class=\"xl64\" style=\"height: 16.5pt; border-top-style: none;\">I</td><td class=\"xl65\" style=\"border-top-style: none; border-left-style: none;\">OS</td></tr><tr height=\"22\" style=\"height: 16.5pt;\"><td height=\"22\" class=\"xl64\" style=\"height: 16.5pt; border-top-style: none;\">J</td><td class=\"xl65\" style=\"border-top-style: none; border-left-style: none;\">임베디드</td></tr><tr height=\"22\" style=\"height: 16.5pt;\"><td height=\"22\" class=\"xl64\" style=\"height: 16.5pt; border-top-style: none;\">K</td><td class=\"xl65\" style=\"border-top-style: none; border-left-style: none;\">교양교재</td></tr><tr height=\"22\" style=\"height: 16.5pt;\"><td height=\"22\" class=\"xl64\" style=\"height: 16.5pt; border-top-style: none;\">L</td><td class=\"xl65\" style=\"border-top-style: none; border-left-style: none;\">전공 etc.</td></tr></tbody></table><br><div>2016 도서목록입니다.</div><div>위 인덱스를 따라 책장에서 찾으시면 됩니다.</div><div><br></div><div>&lt;&lt; 대여에 관하여 &gt;&gt;</div><div>동아리방 안에서 책을 사용할때는 대출하지 않으셔도 됩니다.</div><div>동아리방 밖으로 가지고 나가실때는 도서부장에게 말해주세요</div><div><span style=\"line-height: 1.42857;\"><br></span></div><div><b><span style=\"line-height: 1.42857;\">1인당 최대 2권까지 대여 가능</span><br></b></div><div><b>대여 기간 ::</b></div><div><b>&nbsp; 기본 : 10일</b></div><div><b>&nbsp; 장기대여 : 1달단위</b></div>','N','N','Y','2016-01-14 00:00:00'),(52,'[PPT 관련] PPT 만들 때 유용한 사이트',2,24,'<div style=\"font: 12px/16.8px 돋움, dotum, Helvetica, sans-serif; list-style: none; margin: 0px; padding: 0px; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; word-spacing: 0px; white-space: normal; font-size-adjust: none; font-stretch: normal;\">1. wallpapers wide &nbsp;( http://wallpaperswide.com/ )</div><div style=\"font: 12px/16.8px 돋움, dotum, Helvetica, sans-serif; list-style: none; margin: 0px; padding: 0px; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; word-spacing: 0px; white-space: normal; font-size-adjust: none; font-stretch: normal;\"><br></div><div style=\"font: 12px/16.8px 돋움, dotum, Helvetica, sans-serif; list-style: none; margin: 0px; padding: 0px; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; word-spacing: 0px; white-space: normal; font-size-adjust: none; font-stretch: normal;\">고화질 사진 다운가능한 사이트</div><div style=\"font: 12px/16.8px 돋움, dotum, Helvetica, sans-serif; list-style: none; margin: 0px; padding: 0px; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; word-spacing: 0px; white-space: normal; font-size-adjust: none; font-stretch: normal;\"><br></div><p><font face=\"돋움\"><br></font></p><div style=\"font: 12px/16.8px 돋움, dotum, Helvetica, sans-serif; list-style: none; margin: 0px; padding: 0px; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; word-spacing: 0px; white-space: normal; font-size-adjust: none; font-stretch: normal;\"><br></div><div style=\"font: 12px/16.8px 돋움, dotum, Helvetica, sans-serif; list-style: none; margin: 0px; padding: 0px; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; word-spacing: 0px; white-space: normal; font-size-adjust: none; font-stretch: normal;\">2. the noun project &nbsp;http://thenounproject.com/ )</div><div style=\"font: 12px/16.8px 돋움, dotum, Helvetica, sans-serif; list-style: none; margin: 0px; padding: 0px; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; word-spacing: 0px; white-space: normal; font-size-adjust: none; font-stretch: normal;\"><br></div><div style=\"font: 12px/16.8px 돋움, dotum, Helvetica, sans-serif; list-style: none; margin: 0px; padding: 0px; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; word-spacing: 0px; white-space: normal; font-size-adjust: none; font-stretch: normal;\">다양한 픽토그램 모음 사이트</div><div style=\"font: 12px/16.8px 돋움, dotum, Helvetica, sans-serif; list-style: none; margin: 0px; padding: 0px; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; word-spacing: 0px; white-space: normal; font-size-adjust: none; font-stretch: normal;\"><br></div><div style=\"font: 12px/16.8px 돋움, dotum, Helvetica, sans-serif; list-style: none; margin: 0px; padding: 0px; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; word-spacing: 0px; white-space: normal; font-size-adjust: none; font-stretch: normal;\"><br></div><div style=\"font: 12px/16.8px 돋움, dotum, Helvetica, sans-serif; list-style: none; margin: 0px; padding: 0px; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; word-spacing: 0px; white-space: normal; font-size-adjust: none; font-stretch: normal;\"><br></div><div style=\"font: 12px/16.8px 돋움, dotum, Helvetica, sans-serif; list-style: none; margin: 0px; padding: 0px; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; word-spacing: 0px; white-space: normal; font-size-adjust: none; font-stretch: normal;\">&nbsp;</div><div style=\"font: 12px/16.8px 돋움, dotum, Helvetica, sans-serif; list-style: none; margin: 0px; padding: 0px; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; word-spacing: 0px; white-space: normal; font-size-adjust: none; font-stretch: normal;\"><br></div><div style=\"font: 12px/16.8px 돋움, dotum, Helvetica, sans-serif; list-style: none; margin: 0px; padding: 0px; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; word-spacing: 0px; white-space: normal; font-size-adjust: none; font-stretch: normal;\">3. Adobe color CC ( https://color.adobe.com/ )</div><div style=\"font: 12px/16.8px 돋움, dotum, Helvetica, sans-serif; list-style: none; margin: 0px; padding: 0px; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; word-spacing: 0px; white-space: normal; font-size-adjust: none; font-stretch: normal;\"><br></div><div style=\"font: 12px/16.8px 돋움, dotum, Helvetica, sans-serif; list-style: none; margin: 0px; padding: 0px; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; word-spacing: 0px; white-space: normal; font-size-adjust: none; font-stretch: normal;\">다양한 색의 배열을 맞춰주는 사이트!</div><div style=\"font: 12px/16.8px 돋움, dotum, Helvetica, sans-serif; list-style: none; margin: 0px; padding: 0px; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; word-spacing: 0px; white-space: normal; font-size-adjust: none; font-stretch: normal;\"><br></div><div style=\"font: 12px/16.8px 돋움, dotum, Helvetica, sans-serif; list-style: none; margin: 0px; padding: 0px; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; word-spacing: 0px; white-space: normal; font-size-adjust: none; font-stretch: normal;\">ppt의 꽃인 디자인을 위해서 꼭 필요한 사이트.</div>','N','N','Y','2016-01-14 00:00:00'),(53,'[알고리즘] 삼성 대학생 프로그래밍 경진대회 (SCPC) 2015 대회 참가 후기',2,20,'안녕하세요 WAP 13기 정회원 김호균입니다.<div><div>오늘 참여하였던 삼성 대학생 프로그래밍 경진대회 (SCPC) 2015 참가 후기를 올려봅니다.</div><div><br></div><div>이 글은 알고리즘 대회를 준비하는 많은 동아리 회원들에게 도움이 주는 것을 목표로 하며,</div><div>동아리<span style=\"line-height: 1.42857;\">&nbsp;회원들이 각종 공모전, 알고리즘, 보안, 스타트업에 많은 관심을 가지고 새로운 시도를 하기 위해</span></div><div>오늘의 경험을 토대로 앞으로의 발전 방향을 제시하기 위함입니다.</div><div><br></div><div><br></div><div><br></div><div><b>1. 문제의 난이도</b></div><div>대다수의 참가자들이 문제를 푸는 것에 상당히 어려움을 느꼈습니다.</div><div>4문제가 나왔으며 만점자는 없는 것으로 보입니다.</div><div>다수의 참가자들이 부분점수를 받거나 점수를 하나도 받지 못했습니다.</div><div>예선과 다르게 난이도가 너무 높았고, 세계 대회 수준이라는 평도 있었던 것 같습니다</div><div><br></div><div>문제는 아마 codeground 에서 공개할 것 같은데, 유형은 다음과 같았습니다.</div><div>1번 문제 : parametric search 를 이용해서 푸는 문제</div><div>2번 문제 : 네트워크 플로우인데 매칭이 3단계에 걸쳐서 나왔습니다. 또한 포드 풀커슨으로 풀면 타임 아웃이 났습니다.</div><div>3번 문제 : 키르히호프 법칙을 사용하여 푸는 문제, 저는 여기서 부터는 구현 방법 조차 모르겠고요</div><div>4번 문제 : 기하 입니다. 일단 문제가 거의 논문이 었습니다 -_-; 읽기 부터 짜증났어요</div><div><br></div><div>이야기만 들어도 어려우니, 넘어가겠습니다. 사실 이게 중요한건 아니에요</div><div><br></div><div><br></div><div><br></div></div><div><b>2. 대회에서 본 네트워크들</b></div><div>알고리즘을 하는 사람들은 알고리즘 하는 사람들끼리 모입니다.</div><div>제가 현재 일하고 있는 업체에는 ACM 대회 수상자(알고리즘 덕후이므로 알덕이라 명명하겠습니다)가 있었고,</div><div>제가 알고리즘에 관심이 많았기에 최근 많은 이야기를 나누었는데요</div><div><span style=\"line-height: 1.42857;\"><br></span></div><div><span style=\"line-height: 1.42857;\">이야기를 들어보니 알고스팟이라든지 백준온라인저지에서 만난 사람들이 실제로 네트워크를 형성하고 서로 대결하며 실력을 쌓고 있었구요</span><br></div><div>우리는 알고리즘에 모든 것을 걸지 않았지만,&nbsp;<span style=\"line-height: 1.42857;\">이 사람들은 정말 알고리즘만 합니다. 최소 1~2년(밥만먹고 알고리즘만)이고</span></div><div><span style=\"line-height: 1.42857;\">정올 출신들은 중고등학교때부터 시작해서 지금까지 하고 있는 것입니다. 이런 애들이 ACM 월드파이널에 진출하는 것이구요</span></div><div>어느정도 수준이냐면 학교에서 배운 것은 제가 어느정도 다 기억하는데, 이걸로는 안됩니다. 그것보다 더 좋은 알고리즘을 요구합니다.</div><div>학교에서는 다익스트라 알고리즘이 n^2 이라 알려주고, 기본 원리와 그리디한 부분을 설명해주잖습니까, 이것까지는 눈감고도 코드를 치는데요</div><div>실제 알고리즘 대회에서 다익스트라 알고리즘은 n log n 으로 작성해야 되죠, 그러니 학교에서 알려준 내용보다 심화로 알고 가야 합니다.</div><div><br></div><div>대회에서 본 네트워크는 들은 것과 다른게 없었습니다. 결국 아는 사람들끼리 모여 문제에 대해서 논의 하는 것입니다.</div><div>아쉽게도 부산권의 학생은 서로 네트워크가 잘 안되었고 처음엔 혼자서 문제를 풀었으나,</div><div>알덕님의 덕분으로 제가 그분의 학교를 중심으로한 네트워크에 참여할 수 있었습니다.</div><div><br></div><div>긍정적인 것은 문제 접근 방법이라든지에 대해서 서로의 의견이 같았고 (이럴 때 기분이 무지 좋습니다)</div><div>이야기도 잘 되었기에 서로 스터디를 하거나 도움을 줄 수 있을 것 같다는 거죠</div><div><br></div><div>아 참고로 말하면 이번에 참가한 서울대 학생들은 약 30명 이상이었습니다. 이번에 단체상 받았죠</div><div>또한 주목해야 할 부분 중 하나는 대회에 참여한 학생들은 대부분이 서울권 학생들이었다는 것입니다.</div><div><span style=\"line-height: 1.42857;\">즉, \'</span><b style=\"line-height: 1.42857;\">네트워크에 참여한 사람들에 대해서만, 그들만의 리그\'</b><span style=\"line-height: 1.42857;\"> 였습니다.</span><br></div><div><br></div><div><br></div><div><br></div><div><b>3. 우리 모습과 비교</b></div><div>사실 알고리즘은 어느정도 수준 이상이면 의미가 없습니다. 그래서 공모전에 초점을 더 두는게 좋을 수도 있습니다.</div><div>테스트 주도 개발, 모듈화 프로그램, 소프트웨어 성능 개선 등의 도움은 있겠으나 개발을 잘하기 위해서는 다른 요소가 많이 필요합니다.</div><div><br></div><div>물론, 삼성에서는 정말 알고리즘을 잘하는 핵심 인재가 매우 필요하다는 것을 이번 대회를 통해 상당히 어필하였고</div><div>해외의 수 많은 공룡 기업과의 소프트웨어 전쟁에서 지지 않겠다는 삼성과, 국내의 수많은 중견기업, 대기업의 움직임이 보입니다.</div><div>즉, 개발자의 역량을 기르겠다면 알고리즘은 분명 열심히 해야합니다.</div><div><br></div><div>그래서 우리 동아리에서도 알고리즘을 중요하게 생각하고, 많은 분들이 공부를 하고 있습니다만</div><div><span style=\"line-height: 1.42857;\">다른 학교 학생들은 우리처럼 고립되어서 공부하지 않습니다. 이게 우리가 질 수 밖에 없는 이유이기도 하고요</span><br></div><div><br></div><div>왜냐하면,&nbsp;<span style=\"line-height: 1.42857;\">대회에 나오는 문제는 일반 책에서 나오는 내용이 아닙니다.</span></div><div>외국 서적에서 언급되거나, 외국의 탑코더 또는 코드포스에서 제출되는 문제를 보시면 알겠지만</div><div>fft 등과 같이 전자학과에서 다루는 내용을 알고리즘 문제로 내는 경우도 있고요, 우리가 배웠던 통계학을 이용해서 문제를 푸는 내용도 있습니다</div><div>종만 북이 아무리 대단하다고 하지만, 이 모든 내용을 다루고 있지 않습니다. 저도 이런 부분에 대해서 알덕에게 배우고 있죠.</div><div><br></div><div>그런 내용을 누가 알려주겠습니까? 인적 네트워크입니다. 아는 사람들이 알려주면 더 빠르게 터득하고 이해하기 쉬운 자료까지 얻을 수 있습니다</div><div>우리가 발전하기 위해서는 이런 부분을 배워야 합니다.</div><div><br></div><div><br></div><div><br></div><div><b>4. 결론</b></div><div>우리 동아리가 부경대 안에서만 알아주는 것은 상당히 의미 없는 일입니다.</div><div>그리고 동아리에 속한 회원들이 사회에 나갔을 때, \'저 사람은 정말 모르는 게 없다\' 라고 말을 듣는 것을 원합니다.</div><div><br></div><div>이번 대회는 매우 아쉬웠습니다. 그런데 뭔가 희망을 보았습니다.</div><div>해볼 수 있겠다는 생각과, 새로 생긴 네트워크가 다른 어떠한 것보다 상당히 마음에 듭니다.</div><div>저는 이 네트워크를 이용해서 동아리 전체의 개발 능력 향상을 원하고 있구요</div><div><br></div><div>이번 기회를 시작으로 우리 동아리의 개발 능력이 증진되어, 새로운 일들을 해볼 수 있는 기회가 될 수 있었으면 좋겠습니다.</div>','N','N','N','2016-01-14 00:00:00'),(54,'[알고리즘] 삼성 대학생 프로그래밍 경진대회 (SCPC) 2015 대회 참가 후기',2,20,'안녕하세요 WAP 13기 정회원 김호균입니다.<div><div>오늘 참여하였던 삼성 대학생 프로그래밍 경진대회 (SCPC) 2015 참가 후기를 올려봅니다.</div><div><br></div><div>이 글은 알고리즘 대회를 준비하는 많은 동아리 회원들에게 도움이 주는 것을 목표로 하며,</div><div>동아리<span style=\"line-height: 1.42857;\">&nbsp;회원들이 각종 공모전, 알고리즘, 보안, 스타트업에 많은 관심을 가지고 새로운 시도를 하기 위해</span></div><div>오늘의 경험을 토대로 앞으로의 발전 방향을 제시하기 위함입니다.</div><div><br></div><div><br></div><div><br></div><div><b>1. 문제의 난이도</b></div><div>대다수의 참가자들이 문제를 푸는 것에 상당히 어려움을 느꼈습니다.</div><div>4문제가 나왔으며 만점자는 없는 것으로 보입니다.</div><div>다수의 참가자들이 부분점수를 받거나 점수를 하나도 받지 못했습니다.</div><div>예선과 다르게 난이도가 너무 높았고, 세계 대회 수준이라는 평도 있었던 것 같습니다</div><div><br></div><div>문제는 아마 codeground 에서 공개할 것 같은데, 유형은 다음과 같았습니다.</div><div>1번 문제 : parametric search 를 이용해서 푸는 문제</div><div>2번 문제 : 네트워크 플로우인데 매칭이 3단계에 걸쳐서 나왔습니다. 또한 포드 풀커슨으로 풀면 타임 아웃이 났습니다.</div><div>3번 문제 : 키르히호프 법칙을 사용하여 푸는 문제, 저는 여기서 부터는 구현 방법 조차 모르겠고요</div><div>4번 문제 : 기하 입니다. 일단 문제가 거의 논문이 었습니다 -_-; 읽기 부터 짜증났어요</div><div><br></div><div>이야기만 들어도 어려우니, 넘어가겠습니다. 사실 이게 중요한건 아니에요</div><div><br></div><div><br></div><div><br></div></div><div><b>2. 대회에서 본 네트워크들</b></div><div>알고리즘을 하는 사람들은 알고리즘 하는 사람들끼리 모입니다.</div><div>제가 현재 일하고 있는 업체에는 ACM 대회 수상자(알고리즘 덕후이므로 알덕이라 명명하겠습니다)가 있었고,</div><div>제가 알고리즘에 관심이 많았기에 최근 많은 이야기를 나누었는데요</div><div><span style=\"line-height: 1.42857;\"><br></span></div><div><span style=\"line-height: 1.42857;\">이야기를 들어보니 알고스팟이라든지 백준온라인저지에서 만난 사람들이 실제로 네트워크를 형성하고 서로 대결하며 실력을 쌓고 있었구요</span><br></div><div>우리는 알고리즘에 모든 것을 걸지 않았지만,&nbsp;<span style=\"line-height: 1.42857;\">이 사람들은 정말 알고리즘만 합니다. 최소 1~2년(밥만먹고 알고리즘만)이고</span></div><div><span style=\"line-height: 1.42857;\">정올 출신들은 중고등학교때부터 시작해서 지금까지 하고 있는 것입니다. 이런 애들이 ACM 월드파이널에 진출하는 것이구요</span></div><div>어느정도 수준이냐면 학교에서 배운 것은 제가 어느정도 다 기억하는데, 이걸로는 안됩니다. 그것보다 더 좋은 알고리즘을 요구합니다.</div><div>학교에서는 다익스트라 알고리즘이 n^2 이라 알려주고, 기본 원리와 그리디한 부분을 설명해주잖습니까, 이것까지는 눈감고도 코드를 치는데요</div><div>실제 알고리즘 대회에서 다익스트라 알고리즘은 n log n 으로 작성해야 되죠, 그러니 학교에서 알려준 내용보다 심화로 알고 가야 합니다.</div><div><br></div><div>대회에서 본 네트워크는 들은 것과 다른게 없었습니다. 결국 아는 사람들끼리 모여 문제에 대해서 논의 하는 것입니다.</div><div>아쉽게도 부산권의 학생은 서로 네트워크가 잘 안되었고 처음엔 혼자서 문제를 풀었으나,</div><div>알덕님의 덕분으로 제가 그분의 학교를 중심으로한 네트워크에 참여할 수 있었습니다.</div><div><br></div><div>긍정적인 것은 문제 접근 방법이라든지에 대해서 서로의 의견이 같았고 (이럴 때 기분이 무지 좋습니다)</div><div>이야기도 잘 되었기에 서로 스터디를 하거나 도움을 줄 수 있을 것 같다는 거죠</div><div><br></div><div>아 참고로 말하면 이번에 참가한 서울대 학생들은 약 30명 이상이었습니다. 이번에 단체상 받았죠</div><div>또한 주목해야 할 부분 중 하나는 대회에 참여한 학생들은 대부분이 서울권 학생들이었다는 것입니다.</div><div><span style=\"line-height: 1.42857;\">즉, \'</span><b style=\"line-height: 1.42857;\">네트워크에 참여한 사람들에 대해서만, 그들만의 리그\'</b><span style=\"line-height: 1.42857;\"> 였습니다.</span><br></div><div><br></div><div><br></div><div><br></div><div><b>3. 우리 모습과 비교</b></div><div>사실 알고리즘은 어느정도 수준 이상이면 의미가 없습니다. 그래서 공모전에 초점을 더 두는게 좋을 수도 있습니다.</div><div>테스트 주도 개발, 모듈화 프로그램, 소프트웨어 성능 개선 등의 도움은 있겠으나 개발을 잘하기 위해서는 다른 요소가 많이 필요합니다.</div><div><br></div><div>물론, 삼성에서는 정말 알고리즘을 잘하는 핵심 인재가 매우 필요하다는 것을 이번 대회를 통해 상당히 어필하였고</div><div>해외의 수 많은 공룡 기업과의 소프트웨어 전쟁에서 지지 않겠다는 삼성과, 국내의 수많은 중견기업, 대기업의 움직임이 보입니다.</div><div>즉, 개발자의 역량을 기르겠다면 알고리즘은 분명 열심히 해야합니다.</div><div><br></div><div>그래서 우리 동아리에서도 알고리즘을 중요하게 생각하고, 많은 분들이 공부를 하고 있습니다만</div><div><span style=\"line-height: 1.42857;\">다른 학교 학생들은 우리처럼 고립되어서 공부하지 않습니다. 이게 우리가 질 수 밖에 없는 이유이기도 하고요</span><br></div><div><br></div><div>왜냐하면,&nbsp;<span style=\"line-height: 1.42857;\">대회에 나오는 문제는 일반 책에서 나오는 내용이 아닙니다.</span></div><div>외국 서적에서 언급되거나, 외국의 탑코더 또는 코드포스에서 제출되는 문제를 보시면 알겠지만</div><div>fft 등과 같이 전자학과에서 다루는 내용을 알고리즘 문제로 내는 경우도 있고요, 우리가 배웠던 통계학을 이용해서 문제를 푸는 내용도 있습니다</div><div>종만 북이 아무리 대단하다고 하지만, 이 모든 내용을 다루고 있지 않습니다. 저도 이런 부분에 대해서 알덕에게 배우고 있죠.</div><div><br></div><div>그런 내용을 누가 알려주겠습니까? 인적 네트워크입니다. 아는 사람들이 알려주면 더 빠르게 터득하고 이해하기 쉬운 자료까지 얻을 수 있습니다</div><div>우리가 발전하기 위해서는 이런 부분을 배워야 합니다.</div><div><br></div><div><br></div><div><br></div><div><b>4. 결론</b></div><div>우리 동아리가 부경대 안에서만 알아주는 것은 상당히 의미 없는 일입니다.</div><div>그리고 동아리에 속한 회원들이 사회에 나갔을 때, \'저 사람은 정말 모르는 게 없다\' 라고 말을 듣는 것을 원합니다.</div><div><br></div><div>이번 대회는 매우 아쉬웠습니다. 그런데 뭔가 희망을 보았습니다.</div><div>해볼 수 있겠다는 생각과, 새로 생긴 네트워크가 다른 어떠한 것보다 상당히 마음에 듭니다.</div><div>저는 이 네트워크를 이용해서 동아리 전체의 개발 능력 향상을 원하고 있구요</div><div><br></div><div>이번 기회를 시작으로 우리 동아리의 개발 능력이 증진되어, 새로운 일들을 해볼 수 있는 기회가 될 수 있었으면 좋겠습니다.</div>','N','N','Y','2016-01-14 00:00:00'),(55,'[알고리즘] 삼성 대학생 프로그래밍 경진대회 (SCPC) 2015 대회 참가 후기',2,20,'안녕하세요 WAP 13기 정회원 김호균입니다.<div><div>오늘 참여하였던 삼성 대학생 프로그래밍 경진대회 (SCPC) 2015 참가 후기를 올려봅니다.</div><div><br></div><div>이 글은 알고리즘 대회를 준비하는 많은 동아리 회원들에게 도움이 주는 것을 목표로 하며,</div><div>동아리<span style=\"line-height: 1.42857;\">&nbsp;회원들이 각종 공모전, 알고리즘, 보안, 스타트업에 많은 관심을 가지고 새로운 시도를 하기 위해</span></div><div>오늘의 경험을 토대로 앞으로의 발전 방향을 제시하기 위함입니다.</div><div><br></div><div><br></div><div><br></div><div><b>1. 문제의 난이도</b></div><div>대다수의 참가자들이 문제를 푸는 것에 상당히 어려움을 느꼈습니다.</div><div>4문제가 나왔으며 만점자는 없는 것으로 보입니다.</div><div>다수의 참가자들이 부분점수를 받거나 점수를 하나도 받지 못했습니다.</div><div>예선과 다르게 난이도가 너무 높았고, 세계 대회 수준이라는 평도 있었던 것 같습니다</div><div><br></div><div>문제는 아마 codeground 에서 공개할 것 같은데, 유형은 다음과 같았습니다.</div><div>1번 문제 : parametric search 를 이용해서 푸는 문제</div><div>2번 문제 : 네트워크 플로우인데 매칭이 3단계에 걸쳐서 나왔습니다. 또한 포드 풀커슨으로 풀면 타임 아웃이 났습니다.</div><div>3번 문제 : 키르히호프 법칙을 사용하여 푸는 문제, 저는 여기서 부터는 구현 방법 조차 모르겠고요</div><div>4번 문제 : 기하 입니다. 일단 문제가 거의 논문이 었습니다 -_-; 읽기 부터 짜증났어요</div><div><br></div><div>이야기만 들어도 어려우니, 넘어가겠습니다. 사실 이게 중요한건 아니에요</div><div><br></div><div><br></div><div><br></div></div><div><b>2. 대회에서 본 네트워크들</b></div><div>알고리즘을 하는 사람들은 알고리즘 하는 사람들끼리 모입니다.</div><div>제가 현재 일하고 있는 업체에는 ACM 대회 수상자(알고리즘 덕후이므로 알덕이라 명명하겠습니다)가 있었고,</div><div>제가 알고리즘에 관심이 많았기에 최근 많은 이야기를 나누었는데요</div><div><span style=\"line-height: 1.42857;\"><br></span></div><div><span style=\"line-height: 1.42857;\">이야기를 들어보니 알고스팟이라든지 백준온라인저지에서 만난 사람들이 실제로 네트워크를 형성하고 서로 대결하며 실력을 쌓고 있었구요</span><br></div><div>우리는 알고리즘에 모든 것을 걸지 않았지만,&nbsp;<span style=\"line-height: 1.42857;\">이 사람들은 정말 알고리즘만 합니다. 최소 1~2년(밥만먹고 알고리즘만)이고</span></div><div><span style=\"line-height: 1.42857;\">정올 출신들은 중고등학교때부터 시작해서 지금까지 하고 있는 것입니다. 이런 애들이 ACM 월드파이널에 진출하는 것이구요</span></div><div>어느정도 수준이냐면 학교에서 배운 것은 제가 어느정도 다 기억하는데, 이걸로는 안됩니다. 그것보다 더 좋은 알고리즘을 요구합니다.</div><div>학교에서는 다익스트라 알고리즘이 n^2 이라 알려주고, 기본 원리와 그리디한 부분을 설명해주잖습니까, 이것까지는 눈감고도 코드를 치는데요</div><div>실제 알고리즘 대회에서 다익스트라 알고리즘은 n log n 으로 작성해야 되죠, 그러니 학교에서 알려준 내용보다 심화로 알고 가야 합니다.</div><div><br></div><div>대회에서 본 네트워크는 들은 것과 다른게 없었습니다. 결국 아는 사람들끼리 모여 문제에 대해서 논의 하는 것입니다.</div><div>아쉽게도 부산권의 학생은 서로 네트워크가 잘 안되었고 처음엔 혼자서 문제를 풀었으나,</div><div>알덕님의 덕분으로 제가 그분의 학교를 중심으로한 네트워크에 참여할 수 있었습니다.</div><div><br></div><div>긍정적인 것은 문제 접근 방법이라든지에 대해서 서로의 의견이 같았고 (이럴 때 기분이 무지 좋습니다)</div><div>이야기도 잘 되었기에 서로 스터디를 하거나 도움을 줄 수 있을 것 같다는 거죠</div><div><br></div><div>아 참고로 말하면 이번에 참가한 서울대 학생들은 약 30명 이상이었습니다. 이번에 단체상 받았죠</div><div>또한 주목해야 할 부분 중 하나는 대회에 참여한 학생들은 대부분이 서울권 학생들이었다는 것입니다.</div><div><span style=\"line-height: 1.42857;\">즉, \'</span><b style=\"line-height: 1.42857;\">네트워크에 참여한 사람들에 대해서만, 그들만의 리그\'</b><span style=\"line-height: 1.42857;\"> 였습니다.</span><br></div><div><br></div><div><br></div><div><br></div><div><b>3. 우리 모습과 비교</b></div><div>사실 알고리즘은 어느정도 수준 이상이면 의미가 없습니다. 그래서 공모전에 초점을 더 두는게 좋을 수도 있습니다.</div><div>테스트 주도 개발, 모듈화 프로그램, 소프트웨어 성능 개선 등의 도움은 있겠으나 개발을 잘하기 위해서는 다른 요소가 많이 필요합니다.</div><div><br></div><div>물론, 삼성에서는 정말 알고리즘을 잘하는 핵심 인재가 매우 필요하다는 것을 이번 대회를 통해 상당히 어필하였고</div><div>해외의 수 많은 공룡 기업과의 소프트웨어 전쟁에서 지지 않겠다는 삼성과, 국내의 수많은 중견기업, 대기업의 움직임이 보입니다.</div><div>즉, 개발자의 역량을 기르겠다면 알고리즘은 분명 열심히 해야합니다.</div><div><br></div><div>그래서 우리 동아리에서도 알고리즘을 중요하게 생각하고, 많은 분들이 공부를 하고 있습니다만</div><div><span style=\"line-height: 1.42857;\">다른 학교 학생들은 우리처럼 고립되어서 공부하지 않습니다. 이게 우리가 질 수 밖에 없는 이유이기도 하고요</span><br></div><div><br></div><div>왜냐하면,&nbsp;<span style=\"line-height: 1.42857;\">대회에 나오는 문제는 일반 책에서 나오는 내용이 아닙니다.</span></div><div>외국 서적에서 언급되거나, 외국의 탑코더 또는 코드포스에서 제출되는 문제를 보시면 알겠지만</div><div>fft 등과 같이 전자학과에서 다루는 내용을 알고리즘 문제로 내는 경우도 있고요, 우리가 배웠던 통계학을 이용해서 문제를 푸는 내용도 있습니다</div><div>종만 북이 아무리 대단하다고 하지만, 이 모든 내용을 다루고 있지 않습니다. 저도 이런 부분에 대해서 알덕에게 배우고 있죠.</div><div><br></div><div>그런 내용을 누가 알려주겠습니까? 인적 네트워크입니다. 아는 사람들이 알려주면 더 빠르게 터득하고 이해하기 쉬운 자료까지 얻을 수 있습니다</div><div>우리가 발전하기 위해서는 이런 부분을 배워야 합니다.</div><div><br></div><div><br></div><div><br></div><div><b>4. 결론</b></div><div>우리 동아리가 부경대 안에서만 알아주는 것은 상당히 의미 없는 일입니다.</div><div>그리고 동아리에 속한 회원들이 사회에 나갔을 때, \'저 사람은 정말 모르는 게 없다\' 라고 말을 듣는 것을 원합니다.</div><div><br></div><div>이번 대회는 매우 아쉬웠습니다. 그런데 뭔가 희망을 보았습니다.</div><div>해볼 수 있겠다는 생각과, 새로 생긴 네트워크가 다른 어떠한 것보다 상당히 마음에 듭니다.</div><div>저는 이 네트워크를 이용해서 동아리 전체의 개발 능력 향상을 원하고 있구요</div><div><br></div><div>이번 기회를 시작으로 우리 동아리의 개발 능력이 증진되어, 새로운 일들을 해볼 수 있는 기회가 될 수 있었으면 좋겠습니다.</div>','N','N','N','2016-01-14 00:00:00'),(56,'[알고리즘] 삼성 대학생 프로그래밍 경진대회 (SCPC) 2015 대회 참가 후기',2,20,'안녕하세요 WAP 13기 정회원 김호균입니다.<div><div>오늘 참여하였던 삼성 대학생 프로그래밍 경진대회 (SCPC) 2015 참가 후기를 올려봅니다.</div><div><br></div><div>이 글은 알고리즘 대회를 준비하는 많은 동아리 회원들에게 도움이 주는 것을 목표로 하며,</div><div>동아리<span style=\"line-height: 1.42857;\">&nbsp;회원들이 각종 공모전, 알고리즘, 보안, 스타트업에 많은 관심을 가지고 새로운 시도를 하기 위해</span></div><div>오늘의 경험을 토대로 앞으로의 발전 방향을 제시하기 위함입니다.</div><div><br></div><div><br></div><div><br></div><div><b>1. 문제의 난이도</b></div><div>대다수의 참가자들이 문제를 푸는 것에 상당히 어려움을 느꼈습니다.</div><div>4문제가 나왔으며 만점자는 없는 것으로 보입니다.</div><div>다수의 참가자들이 부분점수를 받거나 점수를 하나도 받지 못했습니다.</div><div>예선과 다르게 난이도가 너무 높았고, 세계 대회 수준이라는 평도 있었던 것 같습니다</div><div><br></div><div>문제는 아마 codeground 에서 공개할 것 같은데, 유형은 다음과 같았습니다.</div><div>1번 문제 : parametric search 를 이용해서 푸는 문제</div><div>2번 문제 : 네트워크 플로우인데 매칭이 3단계에 걸쳐서 나왔습니다. 또한 포드 풀커슨으로 풀면 타임 아웃이 났습니다.</div><div>3번 문제 : 키르히호프 법칙을 사용하여 푸는 문제, 저는 여기서 부터는 구현 방법 조차 모르겠고요</div><div>4번 문제 : 기하 입니다. 일단 문제가 거의 논문이 었습니다 -_-; 읽기 부터 짜증났어요</div><div><br></div><div>이야기만 들어도 어려우니, 넘어가겠습니다. 사실 이게 중요한건 아니에요</div><div><br></div><div><br></div><div><br></div></div><div><b>2. 대회에서 본 네트워크들</b></div><div>알고리즘을 하는 사람들은 알고리즘 하는 사람들끼리 모입니다.</div><div>제가 현재 일하고 있는 업체에는 ACM 대회 수상자(알고리즘 덕후이므로 알덕이라 명명하겠습니다)가 있었고,</div><div>제가 알고리즘에 관심이 많았기에 최근 많은 이야기를 나누었는데요</div><div><span style=\"line-height: 1.42857;\"><br></span></div><div><span style=\"line-height: 1.42857;\">이야기를 들어보니 알고스팟이라든지 백준온라인저지에서 만난 사람들이 실제로 네트워크를 형성하고 서로 대결하며 실력을 쌓고 있었구요</span><br></div><div>우리는 알고리즘에 모든 것을 걸지 않았지만,&nbsp;<span style=\"line-height: 1.42857;\">이 사람들은 정말 알고리즘만 합니다. 최소 1~2년(밥만먹고 알고리즘만)이고</span></div><div><span style=\"line-height: 1.42857;\">정올 출신들은 중고등학교때부터 시작해서 지금까지 하고 있는 것입니다. 이런 애들이 ACM 월드파이널에 진출하는 것이구요</span></div><div>어느정도 수준이냐면 학교에서 배운 것은 제가 어느정도 다 기억하는데, 이걸로는 안됩니다. 그것보다 더 좋은 알고리즘을 요구합니다.</div><div>학교에서는 다익스트라 알고리즘이 n^2 이라 알려주고, 기본 원리와 그리디한 부분을 설명해주잖습니까, 이것까지는 눈감고도 코드를 치는데요</div><div>실제 알고리즘 대회에서 다익스트라 알고리즘은 n log n 으로 작성해야 되죠, 그러니 학교에서 알려준 내용보다 심화로 알고 가야 합니다.</div><div><br></div><div>대회에서 본 네트워크는 들은 것과 다른게 없었습니다. 결국 아는 사람들끼리 모여 문제에 대해서 논의 하는 것입니다.</div><div>아쉽게도 부산권의 학생은 서로 네트워크가 잘 안되었고 처음엔 혼자서 문제를 풀었으나,</div><div>알덕님의 덕분으로 제가 그분의 학교를 중심으로한 네트워크에 참여할 수 있었습니다.</div><div><br></div><div>긍정적인 것은 문제 접근 방법이라든지에 대해서 서로의 의견이 같았고 (이럴 때 기분이 무지 좋습니다)</div><div>이야기도 잘 되었기에 서로 스터디를 하거나 도움을 줄 수 있을 것 같다는 거죠</div><div><br></div><div>아 참고로 말하면 이번에 참가한 서울대 학생들은 약 30명 이상이었습니다. 이번에 단체상 받았죠</div><div>또한 주목해야 할 부분 중 하나는 대회에 참여한 학생들은 대부분이 서울권 학생들이었다는 것입니다.</div><div><span style=\"line-height: 1.42857;\">즉, \'</span><b style=\"line-height: 1.42857;\">네트워크에 참여한 사람들에 대해서만, 그들만의 리그\'</b><span style=\"line-height: 1.42857;\"> 였습니다.</span><br></div><div><br></div><div><br></div><div><br></div><div><b>3. 우리 모습과 비교</b></div><div>사실 알고리즘은 어느정도 수준 이상이면 의미가 없습니다. 그래서 공모전에 초점을 더 두는게 좋을 수도 있습니다.</div><div>테스트 주도 개발, 모듈화 프로그램, 소프트웨어 성능 개선 등의 도움은 있겠으나 개발을 잘하기 위해서는 다른 요소가 많이 필요합니다.</div><div><br></div><div>물론, 삼성에서는 정말 알고리즘을 잘하는 핵심 인재가 매우 필요하다는 것을 이번 대회를 통해 상당히 어필하였고</div><div>해외의 수 많은 공룡 기업과의 소프트웨어 전쟁에서 지지 않겠다는 삼성과, 국내의 수많은 중견기업, 대기업의 움직임이 보입니다.</div><div>즉, 개발자의 역량을 기르겠다면 알고리즘은 분명 열심히 해야합니다.</div><div><br></div><div>그래서 우리 동아리에서도 알고리즘을 중요하게 생각하고, 많은 분들이 공부를 하고 있습니다만</div><div><span style=\"line-height: 1.42857;\">다른 학교 학생들은 우리처럼 고립되어서 공부하지 않습니다. 이게 우리가 질 수 밖에 없는 이유이기도 하고요</span><br></div><div><br></div><div>왜냐하면,&nbsp;<span style=\"line-height: 1.42857;\">대회에 나오는 문제는 일반 책에서 나오는 내용이 아닙니다.</span></div><div>외국 서적에서 언급되거나, 외국의 탑코더 또는 코드포스에서 제출되는 문제를 보시면 알겠지만</div><div>fft 등과 같이 전자학과에서 다루는 내용을 알고리즘 문제로 내는 경우도 있고요, 우리가 배웠던 통계학을 이용해서 문제를 푸는 내용도 있습니다</div><div>종만 북이 아무리 대단하다고 하지만, 이 모든 내용을 다루고 있지 않습니다. 저도 이런 부분에 대해서 알덕에게 배우고 있죠.</div><div><br></div><div>그런 내용을 누가 알려주겠습니까? 인적 네트워크입니다. 아는 사람들이 알려주면 더 빠르게 터득하고 이해하기 쉬운 자료까지 얻을 수 있습니다</div><div>우리가 발전하기 위해서는 이런 부분을 배워야 합니다.</div><div><br></div><div><br></div><div><br></div><div><b>4. 결론</b></div><div>우리 동아리가 부경대 안에서만 알아주는 것은 상당히 의미 없는 일입니다.</div><div>그리고 동아리에 속한 회원들이 사회에 나갔을 때, \'저 사람은 정말 모르는 게 없다\' 라고 말을 듣는 것을 원합니다.</div><div><br></div><div>이번 대회는 매우 아쉬웠습니다. 그런데 뭔가 희망을 보았습니다.</div><div>해볼 수 있겠다는 생각과, 새로 생긴 네트워크가 다른 어떠한 것보다 상당히 마음에 듭니다.</div><div>저는 이 네트워크를 이용해서 동아리 전체의 개발 능력 향상을 원하고 있구요</div><div><br></div><div>이번 기회를 시작으로 우리 동아리의 개발 능력이 증진되어, 새로운 일들을 해볼 수 있는 기회가 될 수 있었으면 좋겠습니다.</div>','N','N','N','2016-01-14 00:00:00'),(57,'[알고리즘] 삼성 대학생 프로그래밍 경진대회 (SCPC) 2015 대회 참가 후기',2,20,'안녕하세요 WAP 13기 정회원 김호균입니다.<div><div>오늘 참여하였던 삼성 대학생 프로그래밍 경진대회 (SCPC) 2015 참가 후기를 올려봅니다.</div><div><br></div><div>이 글은 알고리즘 대회를 준비하는 많은 동아리 회원들에게 도움이 주는 것을 목표로 하며,</div><div>동아리<span style=\"line-height: 1.42857;\">&nbsp;회원들이 각종 공모전, 알고리즘, 보안, 스타트업에 많은 관심을 가지고 새로운 시도를 하기 위해</span></div><div>오늘의 경험을 토대로 앞으로의 발전 방향을 제시하기 위함입니다.</div><div><br></div><div><br></div><div><br></div><div><b>1. 문제의 난이도</b></div><div>대다수의 참가자들이 문제를 푸는 것에 상당히 어려움을 느꼈습니다.</div><div>4문제가 나왔으며 만점자는 없는 것으로 보입니다.</div><div>다수의 참가자들이 부분점수를 받거나 점수를 하나도 받지 못했습니다.</div><div>예선과 다르게 난이도가 너무 높았고, 세계 대회 수준이라는 평도 있었던 것 같습니다</div><div><br></div><div>문제는 아마 codeground 에서 공개할 것 같은데, 유형은 다음과 같았습니다.</div><div>1번 문제 : parametric search 를 이용해서 푸는 문제</div><div>2번 문제 : 네트워크 플로우인데 매칭이 3단계에 걸쳐서 나왔습니다. 또한 포드 풀커슨으로 풀면 타임 아웃이 났습니다.</div><div>3번 문제 : 키르히호프 법칙을 사용하여 푸는 문제, 저는 여기서 부터는 구현 방법 조차 모르겠고요</div><div>4번 문제 : 기하 입니다. 일단 문제가 거의 논문이 었습니다 -_-; 읽기 부터 짜증났어요</div><div><br></div><div>이야기만 들어도 어려우니, 넘어가겠습니다. 사실 이게 중요한건 아니에요</div><div><br></div><div><br></div><div><br></div></div><div><b>2. 대회에서 본 네트워크들</b></div><div>알고리즘을 하는 사람들은 알고리즘 하는 사람들끼리 모입니다.</div><div>제가 현재 일하고 있는 업체에는 ACM 대회 수상자(알고리즘 덕후이므로 알덕이라 명명하겠습니다)가 있었고,</div><div>제가 알고리즘에 관심이 많았기에 최근 많은 이야기를 나누었는데요</div><div><span style=\"line-height: 1.42857;\"><br></span></div><div><span style=\"line-height: 1.42857;\">이야기를 들어보니 알고스팟이라든지 백준온라인저지에서 만난 사람들이 실제로 네트워크를 형성하고 서로 대결하며 실력을 쌓고 있었구요</span><br></div><div>우리는 알고리즘에 모든 것을 걸지 않았지만,&nbsp;<span style=\"line-height: 1.42857;\">이 사람들은 정말 알고리즘만 합니다. 최소 1~2년(밥만먹고 알고리즘만)이고</span></div><div><span style=\"line-height: 1.42857;\">정올 출신들은 중고등학교때부터 시작해서 지금까지 하고 있는 것입니다. 이런 애들이 ACM 월드파이널에 진출하는 것이구요</span></div><div>어느정도 수준이냐면 학교에서 배운 것은 제가 어느정도 다 기억하는데, 이걸로는 안됩니다. 그것보다 더 좋은 알고리즘을 요구합니다.</div><div>학교에서는 다익스트라 알고리즘이 n^2 이라 알려주고, 기본 원리와 그리디한 부분을 설명해주잖습니까, 이것까지는 눈감고도 코드를 치는데요</div><div>실제 알고리즘 대회에서 다익스트라 알고리즘은 n log n 으로 작성해야 되죠, 그러니 학교에서 알려준 내용보다 심화로 알고 가야 합니다.</div><div><br></div><div>대회에서 본 네트워크는 들은 것과 다른게 없었습니다. 결국 아는 사람들끼리 모여 문제에 대해서 논의 하는 것입니다.</div><div>아쉽게도 부산권의 학생은 서로 네트워크가 잘 안되었고 처음엔 혼자서 문제를 풀었으나,</div><div>알덕님의 덕분으로 제가 그분의 학교를 중심으로한 네트워크에 참여할 수 있었습니다.</div><div><br></div><div>긍정적인 것은 문제 접근 방법이라든지에 대해서 서로의 의견이 같았고 (이럴 때 기분이 무지 좋습니다)</div><div>이야기도 잘 되었기에 서로 스터디를 하거나 도움을 줄 수 있을 것 같다는 거죠</div><div><br></div><div>아 참고로 말하면 이번에 참가한 서울대 학생들은 약 30명 이상이었습니다. 이번에 단체상 받았죠</div><div>또한 주목해야 할 부분 중 하나는 대회에 참여한 학생들은 대부분이 서울권 학생들이었다는 것입니다.</div><div><span style=\"line-height: 1.42857;\">즉, \'</span><b style=\"line-height: 1.42857;\">네트워크에 참여한 사람들에 대해서만, 그들만의 리그\'</b><span style=\"line-height: 1.42857;\"> 였습니다.</span><br></div><div><br></div><div><br></div><div><br></div><div><b>3. 우리 모습과 비교</b></div><div>사실 알고리즘은 어느정도 수준 이상이면 의미가 없습니다. 그래서 공모전에 초점을 더 두는게 좋을 수도 있습니다.</div><div>테스트 주도 개발, 모듈화 프로그램, 소프트웨어 성능 개선 등의 도움은 있겠으나 개발을 잘하기 위해서는 다른 요소가 많이 필요합니다.</div><div><br></div><div>물론, 삼성에서는 정말 알고리즘을 잘하는 핵심 인재가 매우 필요하다는 것을 이번 대회를 통해 상당히 어필하였고</div><div>해외의 수 많은 공룡 기업과의 소프트웨어 전쟁에서 지지 않겠다는 삼성과, 국내의 수많은 중견기업, 대기업의 움직임이 보입니다.</div><div>즉, 개발자의 역량을 기르겠다면 알고리즘은 분명 열심히 해야합니다.</div><div><br></div><div>그래서 우리 동아리에서도 알고리즘을 중요하게 생각하고, 많은 분들이 공부를 하고 있습니다만</div><div><span style=\"line-height: 1.42857;\">다른 학교 학생들은 우리처럼 고립되어서 공부하지 않습니다. 이게 우리가 질 수 밖에 없는 이유이기도 하고요</span><br></div><div><br></div><div>왜냐하면,&nbsp;<span style=\"line-height: 1.42857;\">대회에 나오는 문제는 일반 책에서 나오는 내용이 아닙니다.</span></div><div>외국 서적에서 언급되거나, 외국의 탑코더 또는 코드포스에서 제출되는 문제를 보시면 알겠지만</div><div>fft 등과 같이 전자학과에서 다루는 내용을 알고리즘 문제로 내는 경우도 있고요, 우리가 배웠던 통계학을 이용해서 문제를 푸는 내용도 있습니다</div><div>종만 북이 아무리 대단하다고 하지만, 이 모든 내용을 다루고 있지 않습니다. 저도 이런 부분에 대해서 알덕에게 배우고 있죠.</div><div><br></div><div>그런 내용을 누가 알려주겠습니까? 인적 네트워크입니다. 아는 사람들이 알려주면 더 빠르게 터득하고 이해하기 쉬운 자료까지 얻을 수 있습니다</div><div>우리가 발전하기 위해서는 이런 부분을 배워야 합니다.</div><div><br></div><div><br></div><div><br></div><div><b>4. 결론</b></div><div>우리 동아리가 부경대 안에서만 알아주는 것은 상당히 의미 없는 일입니다.</div><div>그리고 동아리에 속한 회원들이 사회에 나갔을 때, \'저 사람은 정말 모르는 게 없다\' 라고 말을 듣는 것을 원합니다.</div><div><br></div><div>이번 대회는 매우 아쉬웠습니다. 그런데 뭔가 희망을 보았습니다.</div><div>해볼 수 있겠다는 생각과, 새로 생긴 네트워크가 다른 어떠한 것보다 상당히 마음에 듭니다.</div><div>저는 이 네트워크를 이용해서 동아리 전체의 개발 능력 향상을 원하고 있구요</div><div><br></div><div>이번 기회를 시작으로 우리 동아리의 개발 능력이 증진되어, 새로운 일들을 해볼 수 있는 기회가 될 수 있었으면 좋겠습니다.</div>','N','N','N','2016-01-14 00:00:00'),(58,'[알고리즘] 삼성 대학생 프로그래밍 경진대회 (SCPC) 2015 대회 참가 후기',2,20,'안녕하세요 WAP 13기 정회원 김호균입니다.<div><div>오늘 참여하였던 삼성 대학생 프로그래밍 경진대회 (SCPC) 2015 참가 후기를 올려봅니다.</div><div><br></div><div>이 글은 알고리즘 대회를 준비하는 많은 동아리 회원들에게 도움이 주는 것을 목표로 하며,</div><div>동아리<span style=\"line-height: 1.42857;\">&nbsp;회원들이 각종 공모전, 알고리즘, 보안, 스타트업에 많은 관심을 가지고 새로운 시도를 하기 위해</span></div><div>오늘의 경험을 토대로 앞으로의 발전 방향을 제시하기 위함입니다.</div><div><br></div><div><br></div><div><br></div><div><b>1. 문제의 난이도</b></div><div>대다수의 참가자들이 문제를 푸는 것에 상당히 어려움을 느꼈습니다.</div><div>4문제가 나왔으며 만점자는 없는 것으로 보입니다.</div><div>다수의 참가자들이 부분점수를 받거나 점수를 하나도 받지 못했습니다.</div><div>예선과 다르게 난이도가 너무 높았고, 세계 대회 수준이라는 평도 있었던 것 같습니다</div><div><br></div><div>문제는 아마 codeground 에서 공개할 것 같은데, 유형은 다음과 같았습니다.</div><div>1번 문제 : parametric search 를 이용해서 푸는 문제</div><div>2번 문제 : 네트워크 플로우인데 매칭이 3단계에 걸쳐서 나왔습니다. 또한 포드 풀커슨으로 풀면 타임 아웃이 났습니다.</div><div>3번 문제 : 키르히호프 법칙을 사용하여 푸는 문제, 저는 여기서 부터는 구현 방법 조차 모르겠고요</div><div>4번 문제 : 기하 입니다. 일단 문제가 거의 논문이 었습니다 -_-; 읽기 부터 짜증났어요</div><div><br></div><div>이야기만 들어도 어려우니, 넘어가겠습니다. 사실 이게 중요한건 아니에요</div><div><br></div><div><br></div><div><br></div></div><div><b>2. 대회에서 본 네트워크들</b></div><div>알고리즘을 하는 사람들은 알고리즘 하는 사람들끼리 모입니다.</div><div>제가 현재 일하고 있는 업체에는 ACM 대회 수상자(알고리즘 덕후이므로 알덕이라 명명하겠습니다)가 있었고,</div><div>제가 알고리즘에 관심이 많았기에 최근 많은 이야기를 나누었는데요</div><div><span style=\"line-height: 1.42857;\"><br></span></div><div><span style=\"line-height: 1.42857;\">이야기를 들어보니 알고스팟이라든지 백준온라인저지에서 만난 사람들이 실제로 네트워크를 형성하고 서로 대결하며 실력을 쌓고 있었구요</span><br></div><div>우리는 알고리즘에 모든 것을 걸지 않았지만,&nbsp;<span style=\"line-height: 1.42857;\">이 사람들은 정말 알고리즘만 합니다. 최소 1~2년(밥만먹고 알고리즘만)이고</span></div><div><span style=\"line-height: 1.42857;\">정올 출신들은 중고등학교때부터 시작해서 지금까지 하고 있는 것입니다. 이런 애들이 ACM 월드파이널에 진출하는 것이구요</span></div><div>어느정도 수준이냐면 학교에서 배운 것은 제가 어느정도 다 기억하는데, 이걸로는 안됩니다. 그것보다 더 좋은 알고리즘을 요구합니다.</div><div>학교에서는 다익스트라 알고리즘이 n^2 이라 알려주고, 기본 원리와 그리디한 부분을 설명해주잖습니까, 이것까지는 눈감고도 코드를 치는데요</div><div>실제 알고리즘 대회에서 다익스트라 알고리즘은 n log n 으로 작성해야 되죠, 그러니 학교에서 알려준 내용보다 심화로 알고 가야 합니다.</div><div><br></div><div>대회에서 본 네트워크는 들은 것과 다른게 없었습니다. 결국 아는 사람들끼리 모여 문제에 대해서 논의 하는 것입니다.</div><div>아쉽게도 부산권의 학생은 서로 네트워크가 잘 안되었고 처음엔 혼자서 문제를 풀었으나,</div><div>알덕님의 덕분으로 제가 그분의 학교를 중심으로한 네트워크에 참여할 수 있었습니다.</div><div><br></div><div>긍정적인 것은 문제 접근 방법이라든지에 대해서 서로의 의견이 같았고 (이럴 때 기분이 무지 좋습니다)</div><div>이야기도 잘 되었기에 서로 스터디를 하거나 도움을 줄 수 있을 것 같다는 거죠</div><div><br></div><div>아 참고로 말하면 이번에 참가한 서울대 학생들은 약 30명 이상이었습니다. 이번에 단체상 받았죠</div><div>또한 주목해야 할 부분 중 하나는 대회에 참여한 학생들은 대부분이 서울권 학생들이었다는 것입니다.</div><div><span style=\"line-height: 1.42857;\">즉, \'</span><b style=\"line-height: 1.42857;\">네트워크에 참여한 사람들에 대해서만, 그들만의 리그\'</b><span style=\"line-height: 1.42857;\"> 였습니다.</span><br></div><div><br></div><div><br></div><div><br></div><div><b>3. 우리 모습과 비교</b></div><div>사실 알고리즘은 어느정도 수준 이상이면 의미가 없습니다. 그래서 공모전에 초점을 더 두는게 좋을 수도 있습니다.</div><div>테스트 주도 개발, 모듈화 프로그램, 소프트웨어 성능 개선 등의 도움은 있겠으나 개발을 잘하기 위해서는 다른 요소가 많이 필요합니다.</div><div><br></div><div>물론, 삼성에서는 정말 알고리즘을 잘하는 핵심 인재가 매우 필요하다는 것을 이번 대회를 통해 상당히 어필하였고</div><div>해외의 수 많은 공룡 기업과의 소프트웨어 전쟁에서 지지 않겠다는 삼성과, 국내의 수많은 중견기업, 대기업의 움직임이 보입니다.</div><div>즉, 개발자의 역량을 기르겠다면 알고리즘은 분명 열심히 해야합니다.</div><div><br></div><div>그래서 우리 동아리에서도 알고리즘을 중요하게 생각하고, 많은 분들이 공부를 하고 있습니다만</div><div><span style=\"line-height: 1.42857;\">다른 학교 학생들은 우리처럼 고립되어서 공부하지 않습니다. 이게 우리가 질 수 밖에 없는 이유이기도 하고요</span><br></div><div><br></div><div>왜냐하면,&nbsp;<span style=\"line-height: 1.42857;\">대회에 나오는 문제는 일반 책에서 나오는 내용이 아닙니다.</span></div><div>외국 서적에서 언급되거나, 외국의 탑코더 또는 코드포스에서 제출되는 문제를 보시면 알겠지만</div><div>fft 등과 같이 전자학과에서 다루는 내용을 알고리즘 문제로 내는 경우도 있고요, 우리가 배웠던 통계학을 이용해서 문제를 푸는 내용도 있습니다</div><div>종만 북이 아무리 대단하다고 하지만, 이 모든 내용을 다루고 있지 않습니다. 저도 이런 부분에 대해서 알덕에게 배우고 있죠.</div><div><br></div><div>그런 내용을 누가 알려주겠습니까? 인적 네트워크입니다. 아는 사람들이 알려주면 더 빠르게 터득하고 이해하기 쉬운 자료까지 얻을 수 있습니다</div><div>우리가 발전하기 위해서는 이런 부분을 배워야 합니다.</div><div><br></div><div><br></div><div><br></div><div><b>4. 결론</b></div><div>우리 동아리가 부경대 안에서만 알아주는 것은 상당히 의미 없는 일입니다.</div><div>그리고 동아리에 속한 회원들이 사회에 나갔을 때, \'저 사람은 정말 모르는 게 없다\' 라고 말을 듣는 것을 원합니다.</div><div><br></div><div>이번 대회는 매우 아쉬웠습니다. 그런데 뭔가 희망을 보았습니다.</div><div>해볼 수 있겠다는 생각과, 새로 생긴 네트워크가 다른 어떠한 것보다 상당히 마음에 듭니다.</div><div>저는 이 네트워크를 이용해서 동아리 전체의 개발 능력 향상을 원하고 있구요</div><div><br></div><div>이번 기회를 시작으로 우리 동아리의 개발 능력이 증진되어, 새로운 일들을 해볼 수 있는 기회가 될 수 있었으면 좋겠습니다.</div>','N','N','N','2016-01-14 00:00:00'),(59,'[공지사항]중간발표 관련 공지',1,1,'<div><span style=\"line-height: 1.42857;\">안녕하세요 회장입니다.</span><br></div><div>벌써 새해가 된 지 한달이 다 되어가는데요</div><div><b>겨울방학프로젝트 중간발표</b>에대해서 공지를 해드릴까 합니다.&nbsp;</div><div><b>2월 2일 (화) 오후 02:00&nbsp;</b></div><div><b>향파관어딘가에서 진행하겠습니다.</b></div><div>중간발표는 시작발표처럼 크게 발표준비를 안하셔도 괜찮으니&nbsp;</div><div>부담가지지 않아도 됩니다 :D</div><div><br></div><div>그리고&nbsp;<b style=\"line-height: 1.42857;\">추가적으로 세미나를 준비하시는 분 중&nbsp;</b></div><div><b>예행연습이 필요하여 중간발표때 하시는 인원은</b></div><div><b style=\"line-height: 1.42857;\">발표를 준비</b><span style=\"line-height: 1.42857;\"><b>해 오시길</b> 바랍니다.&nbsp;</span></div><div><br></div><div>공지 끝내며 <b>확인 댓글 부탁</b>드립니다.</div><div><b>글 안읽으시는 분들은 개인톡 할 겁니다.</b></div><div><b><br></b></div><div>그리고 <b>중간발표 불참석자는 댓글에 사유</b>를 올려주세요</div><div><br></div><div>다들 올 한 해도 열심히해서 모두가 발전하길바라며</div><div>동아리를 빛내주시길바랍니다 :D</div><div><br></div><div>수고하세요 ㅎ&nbsp;</div><div><br></div><div><b>※ 세미나 중간점검 인원 1차</b></div><div><b>조건문 : 정상우</b></div><div><b>반복문 : 주새별</b></div><div><b>배열 : 강창훈</b></div><div><b>함수 : 이현영</b></div><div><br></div><div><br></div>','N','N','Y','2016-01-25 00:00:00'),(60,'두잇 안드로이드',3,22,'사주세염♥♥','N','N','Y','2016-02-02 00:00:00'),(61,'두잇 안드로이드 개정2판',3,17,'사주십쇼','N','N','Y','2016-02-02 00:00:00'),(62,'두잇 안드로이드 개정 2판',3,11,'부탁드립니다','N','N','Y','2016-02-04 00:00:00'),(63,'[회의록] 20160226 4차회의',1,7,'<span style=\"line-height: 22.2222px; background-color: rgb(255, 255, 255);\">4차 회의의 회의록입니다.</span><div style=\"line-height: 22.2222px; background-color: rgb(255, 255, 255);\"><br></div><div style=\"line-height: 22.2222px; background-color: rgb(255, 255, 255);\">일시 : 2016년 02월 26일</div><div style=\"line-height: 22.2222px; background-color: rgb(255, 255, 255);\">장소 : 호연관 122호</div><div style=\"line-height: 22.2222px; background-color: rgb(255, 255, 255);\"><br></div><div style=\"line-height: 22.2222px; background-color: rgb(255, 255, 255);\">다음 총 회의 : 3월 4일</div>','N','N','Y','2016-02-27 00:00:00'),(64,'20160304 1차회의록',1,7,'일시 : 2016.03.04<div>시간 : 17:00</div><div>장소 : 누리관 2124</div>','N','N','Y','2016-03-05 00:00:00'),(65,'20160310 2차 회의록',1,7,'<span style=\"line-height: 22.2222px; background-color: rgb(255, 255, 255);\">일시 : 2016.03.10</span><div style=\"line-height: 22.2222px; background-color: rgb(255, 255, 255);\">시간 : 19:00</div><div style=\"line-height: 22.2222px; background-color: rgb(255, 255, 255);\">장소 : 향파관 302</div>','N','N','Y','2016-03-10 00:00:00'),(66,'test',2,1,'test입니다.','N','N','N','2016-06-30 00:00:00'),(67,'파일업로드? ',2,1,'파일테스트&nbsp;','N','N','N','2016-06-30 00:00:00'),(68,'파일업로드? ',2,1,'파일테스트&nbsp;','N','N','N','2016-06-30 00:00:00'),(69,'ㅁㄴㅇㄹㅁㄴㅇㄹ',2,1,'ㅁㄴㅇㄹㅁㅇㄴㄹㅁㅇㄴ','N','N','N','2016-07-04 00:00:00'),(70,'test',2,1,'daf','N','N','N','2016-07-04 00:00:00'),(71,'test2',2,1,'asdfasdf','N','N','N','2016-07-04 00:00:00'),(72,'test',2,1,'test','N','N','N','2016-07-05 00:00:00'),(73,'test',2,1,'gggggg','N','N','N','2016-07-06 00:00:00'),(74,'test',2,1,'test','N','N','N','2016-07-06 01:21:14'),(75,'test',2,1,'test','N','N','N','2016-07-06 01:21:58'),(76,'test',2,1,'ddd','N','N','N','2016-07-06 14:45:01');
/*!40000 ALTER TABLE `BOARD` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `BOARD_TYPE`
--

DROP TABLE IF EXISTS `BOARD_TYPE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `BOARD_TYPE` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sBoardIdx` int(11) DEFAULT NULL,
  `manageIdx` int(11) NOT NULL,
  `accessLevel` int(11) NOT NULL,
  `isUsable` char(1) NOT NULL DEFAULT 'N',
  `isAllow` char(1) NOT NULL DEFAULT 'N',
  `regDate` datetime NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `BOARD_TYPE`
--

LOCK TABLES `BOARD_TYPE` WRITE;
/*!40000 ALTER TABLE `BOARD_TYPE` DISABLE KEYS */;
INSERT INTO `BOARD_TYPE` VALUES (1,'공지사항',NULL,1,1,'Y','Y','2015-11-23 00:00:00'),(2,'자유게시판',NULL,1,10,'Y','Y','2015-11-23 00:00:00'),(3,'Q&A',NULL,1,11,'Y','Y','2015-11-23 00:00:00');
/*!40000 ALTER TABLE `BOARD_TYPE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `COMMENT`
--

DROP TABLE IF EXISTS `COMMENT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `COMMENT` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `typeOf` int(11) NOT NULL,
  `regIdx` int(11) NOT NULL,
  `idxOf` int(11) NOT NULL,
  `main` text NOT NULL,
  `regDate` datetime NOT NULL,
  `isUsable` char(1) NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `COMMENT`
--

LOCK TABLES `COMMENT` WRITE;
/*!40000 ALTER TABLE `COMMENT` DISABLE KEYS */;
INSERT INTO `COMMENT` VALUES (36,1,8,46,'ㅇㅅㅇ','2016-01-04 00:00:00','Y'),(37,1,9,45,'확인했습니다','2016-01-05 00:00:00','Y'),(38,1,12,45,'확인했습니다.','2016-01-10 00:00:00','Y'),(39,1,11,45,'확인했습니다','2016-01-10 00:00:00','Y'),(40,1,16,45,'확인했습니다.','2016-01-12 00:00:00','Y'),(41,1,21,45,'확인했습니다.','2016-01-13 00:00:00','Y'),(42,1,20,46,'ㅇㅅㅇ','2016-01-13 00:00:00','Y'),(43,1,22,45,'확인했습니다.','2016-01-13 00:00:00','Y'),(44,2,1,48,'정말좋은 자료 감사드립니다 ㅎㅎ  회원들에게 좋은 정보네요 ㅎ ','2016-01-14 00:00:00','Y'),(45,1,24,46,'ㅇㅅㅇ','2016-01-14 00:00:00','Y'),(46,2,23,48,'좋은 자료 감사합니다!','2016-01-14 00:00:00','Y'),(47,2,20,54,'여담이지만 부산멤버십 성상민 전 운영자님을 그곳에서 다시 만났죠, 만나기전엔 별 생각없었는데, 실시간으로 쳐발리는 모습을 생중계 당했다고 생각하니 도망치듯 대회장을 빠져나왔습죠','2016-01-14 00:00:00','Y'),(48,2,1,54,'알고리즘... 너무나도 다가가기 힘든거같아 항상 손만놓고있을수없네요 ㅠㅠㅠ ','2016-01-14 00:00:00','Y'),(49,2,12,54,'도움 많이 되었습니닷.. 좋은 글 감사합니다!','2016-01-14 00:00:00','Y'),(50,2,1,52,'오오 디자인에 필요한 자료네요 정말 감사합니다 ㅎ ','2016-01-15 00:00:00','Y'),(51,1,10,59,'읽었습니당~~','2016-01-26 00:00:00','Y'),(52,1,13,59,'확인했습니다','2016-01-27 00:00:00','Y'),(53,1,24,59,'9-17시까지 알바 관계로 불참하겠심당..','2016-01-27 00:00:00','Y'),(54,1,9,59,'넹','2016-01-27 00:00:00','Y'),(55,1,9,59,'확인했습니다','2016-01-27 00:00:00','Y'),(56,1,21,59,'확인했습니다','2016-01-27 00:00:00','Y'),(57,1,30,59,'확인했습니다','2016-01-27 00:00:00','Y'),(58,1,12,59,'확인했어요','2016-01-27 00:00:00','Y'),(59,1,11,59,'확인했습니다','2016-01-28 00:00:00','Y'),(60,1,22,59,'확인♥♥','2016-01-28 00:00:00','Y'),(61,1,31,59,'넹','2016-01-28 00:00:00','Y'),(62,1,7,59,'다등 홧팅하십셔','2016-01-28 00:00:00','Y'),(63,1,32,59,'확인','2016-01-28 00:00:00','Y'),(64,1,23,59,'확인했슴당','2016-01-28 00:00:00','Y'),(65,1,14,59,'확인했습니다.','2016-01-29 00:00:00','Y'),(66,2,17,54,'좋은 글 감사합니다','2016-02-18 00:00:00','Y'),(67,2,1,72,'오오 고쳐졌당!!','2016-07-05 00:00:00','Y'),(68,2,1,75,'test','2016-07-06 00:00:00','Y');
/*!40000 ALTER TABLE `COMMENT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `FILE_LIST`
--

DROP TABLE IF EXISTS `FILE_LIST`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `FILE_LIST` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `fileName` text NOT NULL,
  `filePath` longtext NOT NULL,
  `idxOf` int(11) NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `FILE_LIST`
--

LOCK TABLES `FILE_LIST` WRITE;
/*!40000 ALTER TABLE `FILE_LIST` DISABLE KEYS */;
INSERT INTO `FILE_LIST` VALUES (7,'2016년 첫 회의 발표.pptx','upload/user_1/board_46/',46),(8,'회의록 160104.hwp','upload/user_7/board_49/',49),(9,'회의록 160114.hwp','upload/user_7/board_50/',50),(10,'WAP 2016 도서목록.xlsx','upload/user_7/board_51/',51),(11,'회의록160226.hwp','upload/user_7/board_63/',63),(12,'WAP 1차회의.pptx','upload/user_7/board_64/',64),(13,'20160304 1차 회의록.hwp','upload/user_7/board_64/',64),(14,'20160310 2차 회의록.hwp','upload/user_7/board_65/',65),(15,'__find.png','upload/user_1/board_67/',67),(16,'wap.sql','upload/user_1/board_69/',69),(17,'wap.sql','upload/user_1/board_70/',70),(18,'wap.sql','upload/user_1/board_71/',71),(19,'test.html','upload/user_1/board_72/',72),(20,'대외개발활동_내역서_양식.docx','upload/user_1/board_73/',73),(21,'GTWA.pdf','upload/user_1/board_76/',76);
/*!40000 ALTER TABLE `FILE_LIST` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `GALLERY`
--

DROP TABLE IF EXISTS `GALLERY`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `GALLERY` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `main` longtext,
  `regIdx` int(11) NOT NULL,
  `thumbPath` text,
  `regDate` datetime NOT NULL,
  `isUsable` char(1) NOT NULL DEFAULT 'N',
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `GALLERY`
--

LOCK TABLES `GALLERY` WRITE;
/*!40000 ALTER TABLE `GALLERY` DISABLE KEYS */;
INSERT INTO `GALLERY` VALUES (65,'W.A.P 홈페이지 대문 ','동아리 홈페이지 대문입니다.',1,'/pictures/gallery_65/thumb_20151229_095224.png','2015-12-29 21:52:24','Y'),(66,'동아리 방 증축 - 1','2015년 12월 26일 토요일 오전 부터 시작한 동아리 증축활동 사진입니다.',1,'/pictures/gallery_66/thumb_20160103_095222.jpg','2016-01-03 09:52:22','Y'),(67,'동아리 방 증축 - 2','2015년 12월 26일 토요일 오전부터 시작하여 저녁 7시 20분까지 \n동아리 방 증축을 한 활동 사진입니다.',1,'/pictures/gallery_67/thumb_20160103_095549.jpg','2016-01-03 09:55:49','Y'),(68,'동아리 방 증축 - 3','동아리 방 증축한 결과 사진입니다.',1,'/pictures/gallery_68/thumb_20160103_095709.jpg','2016-01-03 09:57:09','Y'),(69,'이미지 업로드 테스트','ㅎㅎㅎ ',1,'/pictures/gallery_69/thumb_20160630_042557.png','2016-06-30 04:25:57','N'),(70,'이미지 업로드 테스트','ㅎㅎㅎ ',1,'/pictures/gallery_70/thumb_20160630_042803.png','2016-06-30 04:28:03','N'),(71,'이미지 업로드 테스트 입니다.','ㅎㅎㅎㅎ ',1,'/pictures/gallery_71/thumb_20160705_025017.png','2016-07-05 02:50:17','N');
/*!40000 ALTER TABLE `GALLERY` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `GALLERY_IMG`
--

DROP TABLE IF EXISTS `GALLERY_IMG`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `GALLERY_IMG` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `filePath` text NOT NULL,
  `fileName` text NOT NULL,
  `idxOf` int(11) NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=147 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `GALLERY_IMG`
--

LOCK TABLES `GALLERY_IMG` WRITE;
/*!40000 ALTER TABLE `GALLERY_IMG` DISABLE KEYS */;
INSERT INTO `GALLERY_IMG` VALUES (116,'pictures/gallery_65/','img_20151229_095224_1.png',65),(117,'pictures/gallery_66/','img_20160103_095222_1.jpg',66),(118,'pictures/gallery_66/','img_20160103_095222_2.jpg',66),(119,'pictures/gallery_66/','img_20160103_095222_3.jpg',66),(120,'pictures/gallery_66/','img_20160103_095222_4.jpg',66),(121,'pictures/gallery_66/','img_20160103_095222_5.jpg',66),(122,'pictures/gallery_66/','img_20160103_095222_6.jpg',66),(123,'pictures/gallery_66/','img_20160103_095222_7.jpg',66),(124,'pictures/gallery_66/','img_20160103_095222_8.jpg',66),(125,'pictures/gallery_66/','img_20160103_095222_9.jpg',66),(126,'pictures/gallery_67/','img_20160103_095549_1.jpg',67),(127,'pictures/gallery_67/','img_20160103_095549_2.jpg',67),(128,'pictures/gallery_67/','img_20160103_095549_3.jpg',67),(129,'pictures/gallery_67/','img_20160103_095549_4.jpg',67),(130,'pictures/gallery_67/','img_20160103_095549_5.jpg',67),(131,'pictures/gallery_67/','img_20160103_095549_6.jpg',67),(132,'pictures/gallery_67/','img_20160103_095549_7.jpg',67),(133,'pictures/gallery_67/','img_20160103_095549_8.jpg',67),(134,'pictures/gallery_67/','img_20160103_095549_9.jpg',67),(135,'pictures/gallery_68/','img_20160103_095709_1.jpg',68),(136,'pictures/gallery_68/','img_20160103_095709_2.jpg',68),(137,'pictures/gallery_68/','img_20160103_095709_3.jpg',68),(138,'pictures/gallery_68/','img_20160103_095709_4.jpg',68),(139,'pictures/gallery_68/','img_20160103_095709_5.jpg',68),(140,'pictures/gallery_68/','img_20160103_095709_6.jpg',68),(141,'pictures/gallery_68/','img_20160103_095709_7.jpg',68),(142,'pictures/gallery_69/','img_20160630_042557_1.png',69),(143,'pictures/gallery_69/','img_20160630_042557_2.png',69),(144,'pictures/gallery_70/','img_20160630_042803_1.png',70),(145,'pictures/gallery_70/','img_20160630_042803_2.png',70),(146,'pictures/gallery_71/','img_20160705_025017_1.png',71);
/*!40000 ALTER TABLE `GALLERY_IMG` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `GL_COMMENT`
--

DROP TABLE IF EXISTS `GL_COMMENT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `GL_COMMENT` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `idxOf` int(11) NOT NULL,
  `regIdx` int(11) NOT NULL,
  `main` text NOT NULL,
  `regDate` datetime NOT NULL,
  `isUsable` varchar(45) NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `GL_COMMENT`
--

LOCK TABLES `GL_COMMENT` WRITE;
/*!40000 ALTER TABLE `GL_COMMENT` DISABLE KEYS */;
INSERT INTO `GL_COMMENT` VALUES (12,71,1,'오오 잘됩니다1!!!','2016-07-05 02:50:28','Y');
/*!40000 ALTER TABLE `GL_COMMENT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `LEVEL`
--

DROP TABLE IF EXISTS `LEVEL`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `LEVEL` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `LEVEL`
--

LOCK TABLES `LEVEL` WRITE;
/*!40000 ALTER TABLE `LEVEL` DISABLE KEYS */;
INSERT INTO `LEVEL` VALUES (1,'관리자'),(2,'회장'),(3,'부회장'),(4,'총무'),(5,'기획'),(6,'관리'),(7,'교육'),(8,'정회원'),(9,'OB'),(10,'준회원'),(11,'휴면');
/*!40000 ALTER TABLE `LEVEL` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MAJOR`
--

DROP TABLE IF EXISTS `MAJOR`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MAJOR` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MAJOR`
--

LOCK TABLES `MAJOR` WRITE;
/*!40000 ALTER TABLE `MAJOR` DISABLE KEYS */;
INSERT INTO `MAJOR` VALUES (1,'컴퓨터공학과'),(2,'IT융합응용공학과');
/*!40000 ALTER TABLE `MAJOR` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MEMBER`
--

DROP TABLE IF EXISTS `MEMBER`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MEMBER` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `sNumber` char(9) NOT NULL,
  `majorIdx` int(11) NOT NULL,
  `id` varchar(45) NOT NULL,
  `pwd` varchar(255) NOT NULL DEFAULT 'PASSWORD(''1234'')',
  `levelIdx` int(11) NOT NULL DEFAULT '0',
  `birthDay` date NOT NULL,
  `phoneNumber` varchar(13) NOT NULL DEFAULT '010-0000-0000',
  `email` varchar(255) NOT NULL DEFAULT 'wap@wap.com',
  `introduction` text NOT NULL,
  `regDate` datetime NOT NULL,
  `isAllow` char(1) NOT NULL DEFAULT 'N',
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MEMBER`
--

LOCK TABLES `MEMBER` WRITE;
/*!40000 ALTER TABLE `MEMBER` DISABLE KEYS */;
INSERT INTO `MEMBER` VALUES (1,'권태성','201111673',1,'xotjd183','*728FFCCCEE9DCC50D0544ADC1632C772CC1C50CE',1,'1992-11-23','010-2835-2911','xotjd183@gmail.com','안녕하세요 ㅎㅎ ','2015-11-17 00:00:00','Y'),(10,'전은희','201412826',1,'yp1t','*712B69033BB2C08B8E1243774687F3DE968DBBF4',10,'1995-03-28','010-8323-7702','yp1t@naver.com','안녕하세여 ㅎ','2016-01-05 08:29:47','Y'),(5,'송진근','201111780',1,'vicious92','*712B69033BB2C08B8E1243774687F3DE968DBBF4',1,'1992-03-02','010-9910-0389','vicious92@naver.com','Hi','2015-11-30 00:00:00','Y'),(9,'이현영','201512787',1,'gussh03','*E3DCC1F12560E67910F6E2B9F374C58DC6568F44',8,'1996-05-05','010-6634-9154','gussh03@naver.com','18기 이현영 입니다.','2016-01-05 08:26:26','Y'),(7,'서효정','201512768',1,'hyoya314','*11443EBC243A6A20FD175F623D078998B549ADF4',1,'1996-03-14','010-3662-7176','ghtybndss@naver.com',':)','2016-01-03 08:04:44','Y'),(8,'윤종대','200000000',1,'1stexplosion','*9D05A3D3EAFD517A17604FDCC2D4474C5CF40DA6',8,'1991-03-27','01025657075','1stexplosion@gmail.com','Old man','2016-01-04 02:32:47','Y'),(11,'문진혁','201111766',2,'azvx007','*B23C93CA5DD234B05E1ED82421DB9B2E0D112FD4',10,'1992-09-02','010-8831-9257','azvxy@hanmail.net','잘 부탁드립니다','2016-01-10 00:35:22','Y'),(12,'최홍범','장난치지마시오',1,'luise0kby','*00A51F3F48415C7D4E8908980D443C29C69B60C9',8,'2014-04-17','01075900177','luiz4our@naver.com','???? 왜 제학번은 장난치지마시오로 되잇느건가요..?','2016-01-10 02:47:48','Y'),(13,'정상우','201512135',2,'jsu4838','*EAB3FB471F5C149B2E73E1DC95335F75624BB361',10,'1997-01-09','010-9591-4838','jsu4838@naver.com','','2016-01-12 05:02:05','Y'),(14,'이서희','201512782',1,'shlee0150','*98124467C5A16A538212BDE6CE83D3154BF43810',10,'1996-03-11','010-2824-8262','shlee0150@gmail.com','잘 부탁드려요~~','2016-01-12 05:02:51','Y'),(15,'고혜진','201412780',1,'h_jin815','*DCA0F375229E514CBC42B1D0F7D5ED3696515F84',8,'1995-11-12','010-4414-8015','h_jin815@naver.com','안녕하세요.','2016-01-12 16:10:56','Y'),(16,'이지훈','',1,'Anteater333','*0D8A309A5730C77E0451D03C68D24FDEAA9342E5',10,'1995-04-07','010-4174-4150','zx1056@naver.com','왑 18기 컴공 14 이지훈입니다.','2016-01-12 22:18:18','Y'),(17,'권태훈','201010994',1,'gth1021','*50B5D1D63D1DC7BB7EDA92080B4E017E44EF88B1',10,'1991-10-21','010-3052-6921','gth1021@naver.com','안녕하십니까\nWAP 18기 권태훈입니다','2016-01-13 08:01:11','Y'),(18,'안효창','201011860',1,'keepfresh2','*60319BC3A47297C2762726FF072443F069BB4EA4',8,'1991-04-02','010-9896-4136','ahc0402@naver.com','hi!','2016-01-13 08:06:42','Y'),(19,'김정문','201212936',2,'frontgate','*701DCE53E431B9823E12E5A9CF0B0A8145AE9DFD',10,'1992-12-28','010-5910-6728','door6728@naver.com','hi','2016-01-13 08:30:57','Y'),(20,'김호균','201011848',1,'gh5976','*5D537B5596EB23D5CD56B87E7F734A5E4AD1A85B',1,'1992-01-05','010-3073-5266','hogyoon.kim@gmail.com','안녕하세요','2016-01-13 08:35:02','Y'),(21,'주새별','201512802',1,'newstar','*5398EE558022655AE7416CCC7601A2AE3C3702C4',10,'1996-08-18','010-2801-9815','qufdl199@naver.com','안녕하세요','2016-01-13 08:52:53','Y'),(22,'강창훈','201112622',2,'hun9013','*DE12666EA7433072466888A91DAB2C2F0C7CE0F5',10,'1992-06-14','01044049010','hun1016@gmail.com','롤 첼린저 다는게 소원입니다.','2016-01-13 11:49:34','Y'),(23,'박민수','201111768',2,'skykings7','*D75CC763C5551A420D28A227AC294FADE26A2FF2',10,'1992-04-18','알쥐?','secret@cecret','나다','2016-01-14 06:36:19','Y'),(24,'도원이','200911598',2,'perzia','*6160766CB7D8359ABBCC6ADEE2B8D7B2723084EB',8,'1990-11-26','010-4220-7357','suk7357@naver.com','내가 전설이다.','2016-01-14 07:38:55','Y'),(25,'장은영','201330180',2,'eunew','*DB469070DB0AD0CA0B93040D166D7FC4713D6961',10,'1993-11-17','010-2755-8853','jjangbear_@naver.com',':)','2016-01-14 07:46:53','Y'),(26,'황도영','200911796',1,'dodo4513','*FDA36907E64FE3B255B9D07DFB42B76354B17C8B',9,'1990-12-15','010-7142-5268','xavier32@naver.com','안녕하세요','2016-01-15 00:36:28','Y'),(27,'도자기','201611111',1,'mkdh2nd','*A9FECF0CC3A4390B8051FB00185D700DC76EE943',10,'1997-12-04','010-4447-0460','mkdh2nd@nate.com','도자기 공학과 도자기 입니다.','2016-01-22 02:32:45','Y'),(28,'정혜윤','201412833',1,'warinmyheart','*443EF1D938CEB523AE28FE92316E5237D72A9939',10,'2015-04-06','01095504974','warinmyheart@naver.com','컴퓨터공학과 14학번 정혜윤입니다.','2016-01-26 23:22:32','Y'),(29,'아나고','200911731',2,'아나고','*B59F0DAF85972149F9FDBC2E5D2A0830CCBD9F87',10,'2011-11-11','010-0000-0000','골뱅이@지메일.컴','자기소개','2016-01-26 23:42:50','Y'),(30,'윤정호','201011866',1,'yoon5065','*DB469070DB0AD0CA0B93040D166D7FC4713D6961',8,'1991-07-07','01049150939','yoon50650@gmail.com','윤정호','2016-01-27 23:22:54','Y'),(31,'박준영','201111694',1,'201111694','*97E7471D816A37E38510728AEA47440F9C6E2585',8,'2016-06-11','010-2591-5172','parkjun611@naver.com',' .','2016-01-28 00:49:01','Y'),(32,'김철','201011843',1,'cheol0212','*EDAA67D03D8461B757EE385351E2DBDB7215D3F0',8,'1989-03-01','010-7559-4147','cheolkim0651@gmail.con','자기소개','2016-01-28 01:21:57','Y'),(33,'최지민','201312167',2,'adorablemin','*00A51F3F48415C7D4E8908980D443C29C69B60C9',10,'1994-12-09','01047301208','adorablejimini@gmail.com','Hi there','2016-02-01 19:46:19','Y'),(34,'김한준','201612635',1,'hallazzang','*24DE9517894C26E7D5928BD5A4BC220C8921B379',10,'1997-09-06','010-2881-2829','hallazzang@gmail.com','901f','2016-07-22 21:51:19','Y'),(35,'테스트','201111688',1,'test588','*A4B6157319038724E3560894F7F932C8886EBFCF',10,'2001-01-13','010-0000-0000','test@gmail.com','안녕하세요','2016-08-31 22:32:00','Y');
/*!40000 ALTER TABLE `MEMBER` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PROJECT`
--

DROP TABLE IF EXISTS `PROJECT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PROJECT` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `main` text NOT NULL,
  `startDate` datetime NOT NULL,
  `endDate` datetime NOT NULL,
  `regIdx` int(11) NOT NULL,
  `regDate` datetime NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PROJECT`
--

LOCK TABLES `PROJECT` WRITE;
/*!40000 ALTER TABLE `PROJECT` DISABLE KEYS */;
INSERT INTO `PROJECT` VALUES (11,'왑 홈페이지 개설','왑홈페이지 새롭게 리뉴얼 했음','2015-10-01 00:00:00','2015-12-26 00:00:00',1,'2016-01-04 02:32:59'),(12,'Sling!','2D 인디 횡스크롤 플랫포머 게임 Sling!','2016-01-14 00:00:00','2016-02-25 00:00:00',13,'2016-01-12 08:07:15'),(13,'Tom /tom','저희 팀은 김정문,이현영, 주새별 입니다.\n시작발표 ppt 입니다.','2016-01-11 00:00:00','2016-02-25 00:00:00',19,'2016-01-13 08:32:13'),(14,'요 괘않나?','학교 주변 상호에 대한 평가 및 검색 어플리케이션 프로젝트입니다.','2016-01-14 00:00:00','2016-02-25 00:00:00',22,'2016-01-13 11:51:08');
/*!40000 ALTER TABLE `PROJECT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PROJECT_END`
--

DROP TABLE IF EXISTS `PROJECT_END`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PROJECT_END` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `proIdx` int(11) NOT NULL,
  `fileName` text NOT NULL,
  `filePath` text NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PROJECT_END`
--

LOCK TABLES `PROJECT_END` WRITE;
/*!40000 ALTER TABLE `PROJECT_END` DISABLE KEYS */;
/*!40000 ALTER TABLE `PROJECT_END` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PROJECT_MEMBER`
--

DROP TABLE IF EXISTS `PROJECT_MEMBER`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PROJECT_MEMBER` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `userIdx` int(11) NOT NULL,
  `proIdx` int(11) NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PROJECT_MEMBER`
--

LOCK TABLES `PROJECT_MEMBER` WRITE;
/*!40000 ALTER TABLE `PROJECT_MEMBER` DISABLE KEYS */;
INSERT INTO `PROJECT_MEMBER` VALUES (16,1,11),(17,13,12),(19,14,12),(20,19,13),(21,9,13),(22,21,13),(23,22,14),(24,11,14),(25,17,14);
/*!40000 ALTER TABLE `PROJECT_MEMBER` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PROJECT_MIDDLE`
--

DROP TABLE IF EXISTS `PROJECT_MIDDLE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PROJECT_MIDDLE` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `proIdx` int(11) NOT NULL,
  `fileName` text NOT NULL,
  `filePath` text NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PROJECT_MIDDLE`
--

LOCK TABLES `PROJECT_MIDDLE` WRITE;
/*!40000 ALTER TABLE `PROJECT_MIDDLE` DISABLE KEYS */;
INSERT INTO `PROJECT_MIDDLE` VALUES (1,13,'TomTom.zip','projectFile/project13/middleDir/');
/*!40000 ALTER TABLE `PROJECT_MIDDLE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PROJECT_START`
--

DROP TABLE IF EXISTS `PROJECT_START`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PROJECT_START` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `proIdx` int(11) NOT NULL,
  `fileName` text NOT NULL,
  `filePath` text NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PROJECT_START`
--

LOCK TABLES `PROJECT_START` WRITE;
/*!40000 ALTER TABLE `PROJECT_START` DISABLE KEYS */;
INSERT INTO `PROJECT_START` VALUES (6,13,'시작발표.show','projectFile/project13/startDir/');
/*!40000 ALTER TABLE `PROJECT_START` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-17 17:42:35
