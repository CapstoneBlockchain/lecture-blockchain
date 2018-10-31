<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="menu.css">
</head>
<body>

<div id="top_menu">
  <nav class="navbar navbar-darkgray">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="../MainPage.php" style="color:#ffffff;font-size:25px;">LectureChain</a>
      </div>
      <ul class="nav">
        <li><a href="SearchTeacher.php" style="color:#ffffff;font-size:16px;">Search Teacher</a></li>
        <li><a href="SearchStudent.php" style="color:#ffffff;font-size:16px;">Search Student</a></li>
        <li><a href="Requests.php" style="color:#ffffff;font-size:16px;">Requests</a></li>
        <li><a href="MyPage.php" style="color:#ffffff;font-size:16px;">My Page</a></li>
      </ul>
      <ul class="nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" custom-toggle="dropdown-over" style="color:#ffffff;font-size:16px;">
            member
          </a>
          <div class="dropdown-menu" style="min-width:150px;" align="center">
            <div align="center">
              <?php
                session_start();
                echo "<textfield>".$_SESSION['userName']."  </textfield>";
                echo "<textfield>".$_SESSION['userPossition']."</textfield>";
               ?>
            </div>
            <div align="center">
                <input type="button" value="Log-out" class="btn-warning" onclick="location.href='logout.php'">
            </div>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</div>


<div id="content" align="center">
  <ul class="nav nav-tabs">
    <li ><a href="MyPage.php" style="color:#3a3f44;">Information</a></li>
    <li class="active"><a href="MyPage_edit.php" style="color:#3a3f44;">Edit</a></li>
    <li ><a href="MyPage_matched.php" style="color:#3a3f44;">Matched List</a></li>
    <li ><a href="MyPage_coin.php" style="color:#3a3f44;">Coin Using</a></li>
    <li ><a href="MyPage_usage.php" style="color:#3a3f44;">Usage History</a></li>
  </ul>


  <?php

  include 'userController.php';
  $mysqli = new mysqli('localhost', 'root', '1234', 'lecturechain');

  $sql = "SELECT * FROM ".$_SESSION['userPossition']." WHERE id = '".$_SESSION['userId']."'";
  $result = $mysqli->query($sql);

  $row = $result->fetch_assoc();
   ?>

  <div id="request_table" align="center">
    <form name="join" action="" method="post">
      <table align="center" class="table-bordered table">
          <tr>
              <th>&nbsp;&nbsp;ID</th>
              <td class="memberinput">
                <?php
                  echo '<input id="member_id" class="form-control-sm" type="text" name="id" value="'.$_SESSION['userId'].'" disabled>';
                 ?>
              </td>
          </tr>
          <tr>
              <th>&nbsp;&nbsp;Name</th>
              <td class="memberinput">
                <?php
                  echo '<input type="text"  class="form-control-sm" name="name" value="'.$row['name'].'">';
                 ?>
              </td>
          </tr>
          <tr>
              <th>&nbsp;&nbsp;Tel</th>
              <td>
                  <select id="tel1" name="tel1" class="memberinput">
                      <option value="011" <?php if ($row['tel1'] == '011') echo "selected"; ?>>011</option>
                      <option value="017" <?php if ($row['tel1'] == '017') echo "selected"; ?>>017</option>
                      <option value="019" <?php if ($row['tel1'] == '019') echo "selected"; ?>>019</option>
                      <option value="010" <?php if ($row['tel1'] == '010') echo "selected"; ?>>010</option>
                  </select> -
                  <input type="text" id="tel2" class="form-control-sm" size="4" name="tel2" onkeyup="checkNumber(tel2)" maxlength="4" <?php echo 'value="'.$row['tel2'].'"'; ?>/> -
                  <input type="text" id="tel3" class="form-control-sm" size="4" name="tel3" onkeyup="checkNumber(tel3)" maxlength="4" <?php echo 'value="'.$row['tel3'].'"'; ?>/>
              </td>
          </tr>
          <?php
          if ($_SESSION['userPossition'] == "student"){


          } else {


          }
           ?>
          <!-- <tr>
              <th class="info" style="width:15%">&nbsp;&nbsp;School Year</th>
              <td class="memberinput">
                  <select id="select2" name="school_year" class="form-control-sm">
                      <option value="">::Choice::</option>
                      <option value="Elementary">Elementary</option>
                      <option value="Middle">Middle</option>
                      <option value="High">High</option>
                      <option value="Repeater">Repeater</option>
                      <option value="Public">Public</option>
                  </select>
              </td>
          </tr> -->
          <tr>
              <th>&nbsp;&nbsp;Hope Course</th>
              <td class="memberinput"><select name="course1" class="form-control-sm">
                  <option value="수학" <?php if ($row['course1'] == '수학') echo "selected"; ?>>수학</option>
                  <option value="국어" <?php if ($row['course1'] == '국어') echo "selected"; ?>>국어</option>
                  <option value="과학" <?php if ($row['course1'] == '과학') echo "selected"; ?>>과학</option>
                  <option value="국사" <?php if ($row['course1'] == '국사') echo "selected"; ?>>국사</option>
                  <option value="화학" <?php if ($row['course1'] == '화학') echo "selected"; ?>>화학</option>
                  <option value="물리" <?php if ($row['course1'] == '물리') echo "selected"; ?>>물리</option>
                  <option value="논술" <?php if ($row['course1'] == '논술') echo "selected"; ?>>논술</option>
                  <option value="사회" <?php if ($row['course1'] == '사회') echo "selected"; ?>>사회</option>
                  <option value="미술" style="color:#0abaca" <?php if ($row['course1'] == '미술') echo "selected"; ?>>미술</option>
                  <option value="피아노" style="color:#0abaca" <?php if ($row['course1'] == '피아노') echo "selected"; ?>>피아노</option>
                  <option value="바이올린" style="color:#0abaca" <?php if ($row['course1'] == '바이올린') echo "selected"; ?>>바이올린</option>
                  <option value="첼로" style="color:#0abaca" <?php if ($row['course1'] == '첼로') echo "selected"; ?>>첼로</option>
                  <option value="보컬" style="color:#0abaca" <?php if ($row['course1'] == '보컬') echo "selected"; ?>>보컬</option>
                  <option value="기타(악기)" style="color:#0abaca" <?php if ($row['course1'] == '기타(악기)') echo "selected"; ?>>기타(악기)</option>
                  <option value="플롯" style="color:#0abaca" <?php if ($row['course1'] == '플롯') echo "selected"; ?>>플롯</option>
                  <option value="성악" style="color:#0abaca" <?php if ($row['course1'] == '성악') echo "selected"; ?>>성악</option>
                  <option value="연기" style="color:#0abaca" <?php if ($row['course1'] == '연기') echo "selected"; ?>>연기</option>
                  <option value="무용" style="color:#0abaca" <?php if ($row['course1'] == '무용') echo "selected"; ?>>무용</option>
                  <option value="음악" style="color:#0abaca" <?php if ($row['course1'] == '음악') echo "selected"; ?>>음악</option>
                  <option value="예능" style="color:#0abaca" <?php if ($row['course1'] == '예능') echo "selected"; ?>>예능</option>
                  <option value="체능" <?php if ($row['course1'] == '체능') echo "selected"; ?>>체능</option>
                  <option value="회계" <?php if ($row['course1'] == '회계') echo "selected"; ?>>회계</option>
                  <option value="문예창작" <?php if ($row['course1'] == '문예창작') echo "selected"; ?>>문예창작</option>
                  <option value="컴퓨터" <?php if ($row['course1'] == '컴퓨터') echo "selected"; ?>>컴퓨터</option>
                  <option value="세계" <?php if ($row['course1'] == '세계') echo "selected"; ?>>세계</option>
                  <option value="특수교육" <?php if ($row['course1'] == '특수교육') echo "selected"; ?>>특수교육</option>
                  <option value="한문" <?php if ($row['course1'] == '한문') echo "selected"; ?>>한문</option>
                  <option value="테니스" <?php if ($row['course1'] == '테니스') echo "selected"; ?>>테니스</option>
                  <option value="기타과목" <?php if ($row['course1'] == '기타과목') echo "selected"; ?>>기타과목</option>
                  <option value="영어" style="color:#ff4f52" <?php if ($row['course1'] == '영어') echo "selected"; ?>>영어</option>
                  <option value="토익" style="color:#ff4f52" <?php if ($row['course1'] == '토익') echo "selected"; ?>>토익</option>
                  <option value="토플" style="color:#ff4f52" <?php if ($row['course1'] == '토플') echo "selected"; ?>>토플</option>
                  <option value="탭스" style="color:#ff4f52" <?php if ($row['course1'] == '탭스') echo "selected"; ?>>탭스</option>
                  <option value="영어회화" style="color:#ff4f52" <?php if ($row['course1'] == '영어회화') echo "selected"; ?>>영어회화</option>
                  <option value="중국어" style="color:#ff4f52" <?php if ($row['course1'] == '중국어') echo "selected"; ?>>중국어</option>
                  <option value="중국어회화" style="color:#ff4f52" <?php if ($row['course1'] == '중국어회화') echo "selected"; ?>>중국어회화</option>
                  <option value="HSK" style="color:#ff4f52" <?php if ($row['course1'] == 'HSK') echo "selected"; ?>>HSK</option>
                  <option value="일어" style="color:#ff4f52" <?php if ($row['course1'] == '일어') echo "selected"; ?>>일어</option>
                  <option value="일본어회화" style="color:#ff4f52" <?php if ($row['course1'] == '일본어회화') echo "selected"; ?>>일본어회화</option>
                  <option value="JLPT" style="color:#ff4f52" <?php if ($row['course1'] == 'JLPT') echo "selected"; ?>>JLPT</option>
                  <option value="러시아어" style="color:#ff4f52" <?php if ($row['course1'] == '러시아어') echo "selected"; ?>>러시아어</option>
                  <option value="스페인" style="color:#ff4f52" <?php if ($row['course1'] == '스페인') echo "selected"; ?>>스페인</option>
                  <option value="불어" style="color:#ff4f52" <?php if ($row['course1'] == '불어') echo "selected"; ?>>불어</option>
                  <option value="독어" style="color:#ff4f52" <?php if ($row['course1'] == '독어') echo "selected"; ?>>독어</option>
                  <option value="캄보디아어" style="color:#ff4f52" <?php if ($row['course1'] == '캄보디아어') echo "selected"; ?>>캄보디아어</option>
                  <option value="이탈리아어" style="color:#ff4f52" <?php if ($row['course1'] == '이탈리아어') echo "selected"; ?>>이탈리아어</option>
                  <option value="베트남어" style="color:#ff4f52" <?php if ($row['course1'] == '베트남어') echo "selected"; ?>>베트남어</option>
                  <option value="인도어" style="color:#ff4f52" <?php if ($row['course1'] == '인도어') echo "selected"; ?>>인도어</option>
                  <option value="아랍어" style="color:#ff4f52" <?php if ($row['course1'] == '아랍어') echo "selected"; ?>>아랍어</option>
                  <option value="인도네시아" style="color:#ff4f52" <?php if ($row['course1'] == '인도네시아') echo "selected"; ?>>인도네시아</option>
                  <option value="터키어" style="color:#ff4f52" <?php if ($row['course1'] == '터키어') echo "selected"; ?>>터키어</option>
                  <option value="몽골어" style="color:#ff4f52" <?php if ($row['course1'] == '몽골어') echo "selected"; ?>>몽골어</option>
                  <option value="태국어" style="color:#ff4f52" <?php if ($row['course1'] == '태국어') echo "selected"; ?>>태국어</option>
                  <option value="포르투갈어" style="color:#ff4f52" <?php if ($row['course1'] == '포르투갈어') echo "selected"; ?>>포르투갈어</option>
                  <option value="라틴어" style="color:#ff4f52" <?php if ($row['course1'] == '라틴어') echo "selected"; ?>>라틴어</option>
                  <option value="네덜란드어" style="color:#ff4f52" <?php if ($row['course1'] == '네덜란드어') echo "selected"; ?>>네덜란드어</option>
                  <option value="말레이어" style="color:#ff4f52" <?php if ($row['course1'] == '말레이어') echo "selected"; ?>>말레이어</option>
                  <option value="스웨덴어" style="color:#ff4f52" <?php if ($row['course1'] == '스웨덴어') echo "selected"; ?>>스웨덴어</option>
                  <option value="우즈베크어" style="color:#ff4f52" <?php if ($row['course1'] == '우즈베크어') echo "selected"; ?>>우즈베크어</option>
                  <option value="이란어" style="color:#ff4f52" <?php if ($row['course1'] == '이란어') echo "selected"; ?>>이란어</option>
                  <option value="체코어" style="color:#ff4f52" <?php if ($row['course1'] == '체코어') echo "selected"; ?>>체코어</option>
                  <option value="폴란드어" style="color:#ff4f52" <?php if ($row['course1'] == '폴란드어') echo "selected"; ?>>폴란드어</option>
                  <option value="헝가리어" style="color:#ff4f52" <?php if ($row['course1'] == '헝가리어') echo "selected"; ?>>헝가리어</option>
              </select>
                  <select name="course2" class="form-control-sm">
                    <option value="수학" <?php if ($row['course2'] == '수학') echo "selected"; ?>>수학</option>
                    <option value="국어" <?php if ($row['course2'] == '국어') echo "selected"; ?>>국어</option>
                    <option value="과학" <?php if ($row['course2'] == '과학') echo "selected"; ?>>과학</option>
                    <option value="국사" <?php if ($row['course2'] == '국사') echo "selected"; ?>>국사</option>
                    <option value="화학" <?php if ($row['course2'] == '화학') echo "selected"; ?>>화학</option>
                    <option value="물리" <?php if ($row['course2'] == '물리') echo "selected"; ?>>물리</option>
                    <option value="논술" <?php if ($row['course2'] == '논술') echo "selected"; ?>>논술</option>
                    <option value="사회" <?php if ($row['course2'] == '사회') echo "selected"; ?>>사회</option>
                    <option value="미술" style="color:#0abaca" <?php if ($row['course2'] == '미술') echo "selected"; ?>>미술</option>
                    <option value="피아노" style="color:#0abaca" <?php if ($row['course2'] == '피아노') echo "selected"; ?>>피아노</option>
                    <option value="바이올린" style="color:#0abaca" <?php if ($row['course2'] == '바이올린') echo "selected"; ?>>바이올린</option>
                    <option value="첼로" style="color:#0abaca" <?php if ($row['course2'] == '첼로') echo "selected"; ?>>첼로</option>
                    <option value="보컬" style="color:#0abaca" <?php if ($row['course2'] == '보컬') echo "selected"; ?>>보컬</option>
                    <option value="기타(악기)" style="color:#0abaca" <?php if ($row['course2'] == '기타(악기)') echo "selected"; ?>>기타(악기)</option>
                    <option value="플롯" style="color:#0abaca" <?php if ($row['course2'] == '플롯') echo "selected"; ?>>플롯</option>
                    <option value="성악" style="color:#0abaca" <?php if ($row['course2'] == '성악') echo "selected"; ?>>성악</option>
                    <option value="연기" style="color:#0abaca" <?php if ($row['course2'] == '연기') echo "selected"; ?>>연기</option>
                    <option value="무용" style="color:#0abaca" <?php if ($row['course2'] == '무용') echo "selected"; ?>>무용</option>
                    <option value="음악" style="color:#0abaca" <?php if ($row['course2'] == '음악') echo "selected"; ?>>음악</option>
                    <option value="예능" style="color:#0abaca" <?php if ($row['course2'] == '예능') echo "selected"; ?>>예능</option>
                    <option value="체능" <?php if ($row['course2'] == '체능') echo "selected"; ?>>체능</option>
                    <option value="회계" <?php if ($row['course2'] == '회계') echo "selected"; ?>>회계</option>
                    <option value="문예창작" <?php if ($row['course2'] == '문예창작') echo "selected"; ?>>문예창작</option>
                    <option value="컴퓨터" <?php if ($row['course2'] == '컴퓨터') echo "selected"; ?>>컴퓨터</option>
                    <option value="세계" <?php if ($row['course2'] == '세계') echo "selected"; ?>>세계</option>
                    <option value="특수교육" <?php if ($row['course2'] == '특수교육') echo "selected"; ?>>특수교육</option>
                    <option value="한문" <?php if ($row['course2'] == '한문') echo "selected"; ?>>한문</option>
                    <option value="테니스" <?php if ($row['course2'] == '테니스') echo "selected"; ?>>테니스</option>
                    <option value="기타과목" <?php if ($row['course2'] == '기타과목') echo "selected"; ?>>기타과목</option>
                    <option value="영어" style="color:#ff4f52" <?php if ($row['course2'] == '영어') echo "selected"; ?>>영어</option>
                    <option value="토익" style="color:#ff4f52" <?php if ($row['course2'] == '토익') echo "selected"; ?>>토익</option>
                    <option value="토플" style="color:#ff4f52" <?php if ($row['course2'] == '토플') echo "selected"; ?>>토플</option>
                    <option value="탭스" style="color:#ff4f52" <?php if ($row['course2'] == '탭스') echo "selected"; ?>>탭스</option>
                    <option value="영어회화" style="color:#ff4f52" <?php if ($row['course2'] == '영어회화') echo "selected"; ?>>영어회화</option>
                    <option value="중국어" style="color:#ff4f52" <?php if ($row['course2'] == '중국어') echo "selected"; ?>>중국어</option>
                    <option value="중국어회화" style="color:#ff4f52" <?php if ($row['course2'] == '중국어회화') echo "selected"; ?>>중국어회화</option>
                    <option value="HSK" style="color:#ff4f52" <?php if ($row['course2'] == 'HSK') echo "selected"; ?>>HSK</option>
                    <option value="일어" style="color:#ff4f52" <?php if ($row['course2'] == '일어') echo "selected"; ?>>일어</option>
                    <option value="일본어회화" style="color:#ff4f52" <?php if ($row['course2'] == '일본어회화') echo "selected"; ?>>일본어회화</option>
                    <option value="JLPT" style="color:#ff4f52" <?php if ($row['course2'] == 'JLPT') echo "selected"; ?>>JLPT</option>
                    <option value="러시아어" style="color:#ff4f52" <?php if ($row['course2'] == '러시아어') echo "selected"; ?>>러시아어</option>
                    <option value="스페인" style="color:#ff4f52" <?php if ($row['course2'] == '스페인') echo "selected"; ?>>스페인</option>
                    <option value="불어" style="color:#ff4f52" <?php if ($row['course2'] == '불어') echo "selected"; ?>>불어</option>
                    <option value="독어" style="color:#ff4f52" <?php if ($row['course2'] == '독어') echo "selected"; ?>>독어</option>
                    <option value="캄보디아어" style="color:#ff4f52" <?php if ($row['course2'] == '캄보디아어') echo "selected"; ?>>캄보디아어</option>
                    <option value="이탈리아어" style="color:#ff4f52" <?php if ($row['course2'] == '이탈리아어') echo "selected"; ?>>이탈리아어</option>
                    <option value="베트남어" style="color:#ff4f52" <?php if ($row['course2'] == '베트남어') echo "selected"; ?>>베트남어</option>
                    <option value="인도어" style="color:#ff4f52" <?php if ($row['course2'] == '인도어') echo "selected"; ?>>인도어</option>
                    <option value="아랍어" style="color:#ff4f52" <?php if ($row['course2'] == '아랍어') echo "selected"; ?>>아랍어</option>
                    <option value="인도네시아" style="color:#ff4f52" <?php if ($row['course2'] == '인도네시아') echo "selected"; ?>>인도네시아</option>
                    <option value="터키어" style="color:#ff4f52" <?php if ($row['course2'] == '터키어') echo "selected"; ?>>터키어</option>
                    <option value="몽골어" style="color:#ff4f52" <?php if ($row['course2'] == '몽골어') echo "selected"; ?>>몽골어</option>
                    <option value="태국어" style="color:#ff4f52" <?php if ($row['course2'] == '태국어') echo "selected"; ?>>태국어</option>
                    <option value="포르투갈어" style="color:#ff4f52" <?php if ($row['course2'] == '포르투갈어') echo "selected"; ?>>포르투갈어</option>
                    <option value="라틴어" style="color:#ff4f52" <?php if ($row['course2'] == '라틴어') echo "selected"; ?>>라틴어</option>
                    <option value="네덜란드어" style="color:#ff4f52" <?php if ($row['course2'] == '네덜란드어') echo "selected"; ?>>네덜란드어</option>
                    <option value="말레이어" style="color:#ff4f52" <?php if ($row['course2'] == '말레이어') echo "selected"; ?>>말레이어</option>
                    <option value="스웨덴어" style="color:#ff4f52" <?php if ($row['course2'] == '스웨덴어') echo "selected"; ?>>스웨덴어</option>
                    <option value="우즈베크어" style="color:#ff4f52" <?php if ($row['course2'] == '우즈베크어') echo "selected"; ?>>우즈베크어</option>
                    <option value="이란어" style="color:#ff4f52" <?php if ($row['course2'] == '이란어') echo "selected"; ?>>이란어</option>
                    <option value="체코어" style="color:#ff4f52" <?php if ($row['course2'] == '체코어') echo "selected"; ?>>체코어</option>
                    <option value="폴란드어" style="color:#ff4f52" <?php if ($row['course2'] == '폴란드어') echo "selected"; ?>>폴란드어</option>
                    <option value="헝가리어" style="color:#ff4f52" <?php if ($row['course2'] == '헝가리어') echo "selected"; ?>>헝가리어</option>
                  </select></td>
          </tr>
          <tr>
              <th>&nbsp;&nbsp;Hope Area1</th>
              <td class="memberinput"><select id="sido1" name="sido1" class="form-control-sm" onchange="guOption1()">
                  <option value="">선택</option>
                  <option value="서울" <?php if ($row['sido1'] == '서울') echo "selected"; ?>>서울</option>
                  <option value="부산" <?php if ($row['sido1'] == '부산') echo "selected"; ?>>부산</option>
                  <option value="인천" <?php if ($row['sido1'] == '인천') echo "selected"; ?>>인천</option>
                  <option value="경기" <?php if ($row['sido1'] == '경기') echo "selected"; ?>>경기</option>
                  <option value="대구" <?php if ($row['sido1'] == '대구') echo "selected"; ?>>대구</option>
                  <option value="대전" <?php if ($row['sido1'] == '대전') echo "selected"; ?>>대전</option>
                  <option value="울산" <?php if ($row['sido1'] == '울산') echo "selected"; ?>>울산</option>
                  <option value="광주" <?php if ($row['sido1'] == '광주') echo "selected"; ?>>광주</option>
                  <option value="경북" <?php if ($row['sido1'] == '경북') echo "selected"; ?>>경북</option>
                  <option value="경남" <?php if ($row['sido1'] == '경남') echo "selected"; ?>>경남</option>
                  <option value="충북" <?php if ($row['sido1'] == '충북') echo "selected"; ?>>충북</option>
                  <option value="충남" <?php if ($row['sido1'] == '충남') echo "selected"; ?>>충남</option>
                  <option value="전북" <?php if ($row['sido1'] == '전북') echo "selected"; ?>>전북</option>
                  <option value="전남" <?php if ($row['sido1'] == '전남') echo "selected"; ?>>전남</option>
                  <option value="강원" <?php if ($row['sido1'] == '강원') echo "selected"; ?>>강원</option>
                  <option value="제주" <?php if ($row['sido1'] == '제주') echo "selected"; ?>>제주</option>
                  <option value="세종" <?php if ($row['sido1'] == '세종') echo "selected"; ?>>세종</option>
              </select>
                  <select id="gugun1" name="gugun1" class="form-control-sm">
                      <option value="">선택</option>
                  </select></td>
          </tr>
          <tr>
              <th>&nbsp;&nbsp;Hope Area2</th>
              <td class="memberinput"><select id="sido2" name="sido2" class="form-control-sm" onchange="guOption2()">
                  <option value="">선택</option>
                  <option value="서울" <?php if ($row['sido2'] == '서울') echo "selected"; ?>>서울</option>
                  <option value="부산" <?php if ($row['sido2'] == '부산') echo "selected"; ?>>부산</option>
                  <option value="인천" <?php if ($row['sido2'] == '인천') echo "selected"; ?>>인천</option>
                  <option value="경기" <?php if ($row['sido2'] == '경기') echo "selected"; ?>>경기</option>
                  <option value="대구" <?php if ($row['sido2'] == '대구') echo "selected"; ?>>대구</option>
                  <option value="대전" <?php if ($row['sido2'] == '대전') echo "selected"; ?>>대전</option>
                  <option value="울산" <?php if ($row['sido2'] == '울산') echo "selected"; ?>>울산</option>
                  <option value="광주" <?php if ($row['sido2'] == '광주') echo "selected"; ?>>광주</option>
                  <option value="경북" <?php if ($row['sido2'] == '경북') echo "selected"; ?>>경북</option>
                  <option value="경남" <?php if ($row['sido2'] == '경남') echo "selected"; ?>>경남</option>
                  <option value="충북" <?php if ($row['sido2'] == '충북') echo "selected"; ?>>충북</option>
                  <option value="충남" <?php if ($row['sido2'] == '충남') echo "selected"; ?>>충남</option>
                  <option value="전북" <?php if ($row['sido2'] == '전북') echo "selected"; ?>>전북</option>
                  <option value="전남" <?php if ($row['sido2'] == '전남') echo "selected"; ?>>전남</option>
                  <option value="강원" <?php if ($row['sido2'] == '강원') echo "selected"; ?>>강원</option>
                  <option value="제주" <?php if ($row['sido2'] == '제주') echo "selected"; ?>>제주</option>
                  <option value="세종" <?php if ($row['sido2'] == '세종') echo "selected"; ?>>세종</option>
              </select>
                  <select id="gugun2" name="gugun2" class="form-control-sm">
                      <option value="">선택</option>
                  </select></td>
          </tr>
          <tr>
              <th>&nbsp;&nbsp;About Me</th>
              <td class="memberinput">
                <textarea id="about_me" name="aboutme" cols="55" rows="15" class="form-control">
                  <?php echo $row["about"]; ?>
                </textarea>
              </td>
          </tr>
      </table>
      <div align="right" style="padding-right: 10px;">
          <input type="submit" class="btn-lg btn-dark" value="update">
      </div>
    </form>
  </div>

</div>
<script type="text/javascript">
  loadgugun("select#gugun1", "<?php echo $row["sido1"] ?>", "<?php echo $row["gugun1"] ?>");
  loadgugun("select#gugun2", "<?php echo $row["sido2"] ?>", "<?php echo $row["gugun2"] ?>");
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>
<script type="text/javascript" src="MyPage.js"></script>
</body>
</html>
