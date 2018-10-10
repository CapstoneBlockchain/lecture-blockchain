var guName = new Array();
var guCode = new Array();

//서울
guName[1] = new Array();		guCode[1] = new Array();
guName[1][0] = "----------- ";			guCode[1][0] = "";
guName[1][1] = "강남구";		guCode[1][1] = "010";
guName[1][2] = "강동구";		guCode[1][2] = "020";
guName[1][3] = "강북구";		guCode[1][3] = "030";
guName[1][4] = "강서구";		guCode[1][4] = "040";
guName[1][5] = "관악구";		guCode[1][5] = "050";
guName[1][6] = "광진구";		guCode[1][6] = "060";
guName[1][7] = "구로구";		guCode[1][7] = "070";
guName[1][8] = "금천구";		guCode[1][8] = "080";
guName[1][9] = "노원구";		guCode[1][9] = "090";
guName[1][10] = "도봉구";		guCode[1][10] = "100";
guName[1][11] = "동대문구";		guCode[1][11] = "110";
guName[1][12] = "동작구";		guCode[1][12] = "120";
guName[1][13] = "마포구";		guCode[1][13] = "130";
guName[1][14] = "서대문구";		guCode[1][14] = "140";
guName[1][15] = "서초구";		guCode[1][15] = "150";
guName[1][16] = "성동구";		guCode[1][16] = "160";
guName[1][17] = "성북구";		guCode[1][17] = "170";
guName[1][18] = "송파구";		guCode[1][18] = "180";
guName[1][19] = "양천구";		guCode[1][19] = "190";
guName[1][20] = "영등포구";		guCode[1][20] = "200";
guName[1][21] = "용산구";		guCode[1][21] = "210";
guName[1][22] = "은평구";		guCode[1][22] = "220";
guName[1][23] = "종로구";		guCode[1][23] = "230";
guName[1][24] = "중구";			guCode[1][24] = "240";
guName[1][25] = "중랑구";		guCode[1][25] = "250";

//부산
guName[2] = new Array();		guCode[2] = new Array();
guName[2][0] = "----------- ";			guCode[2][0] = "";
guName[2][1] = "강서구";		guCode[2][1] = "010";
guName[2][2] = "금정구";		guCode[2][2] = "020";
guName[2][3] = "기장군";		guCode[2][3] = "030";
guName[2][4] = "남구";			guCode[2][4] = "040";
guName[2][5] = "동구";			guCode[2][5] = "050";
guName[2][6] = "동래구";		guCode[2][6] = "060";
guName[2][7] = "부산진구";		guCode[2][7] = "070";
guName[2][8] = "북구";			guCode[2][8] = "080";
guName[2][9] = "사상구";		guCode[2][9] = "090";
guName[2][10] = "사하구";		guCode[2][10] = "100";
guName[2][11] = "서구";			guCode[2][11] = "110";
guName[2][12] = "수영구";		guCode[2][12] = "120";
guName[2][13] = "연제구";		guCode[2][13] = "130";
guName[2][14] = "영도구";		guCode[2][14] = "140";
guName[2][15] = "중구";			guCode[2][15] = "150";
guName[2][16] = "해운대구";		guCode[2][16] = "016";

//인천
guName[3] = new Array();		guCode[3] = new Array();
guName[3][0] = "----------- ";;			guCode[3][0] = "";
guName[3][1] = "강화군";		guCode[3][1] = "010";
guName[3][2] = "계양구";		guCode[3][2] = "020";
guName[3][3] = "남구";			guCode[3][3] = "030";
guName[3][4] = "남동구";		guCode[3][4] = "040";
guName[3][5] = "동구";			guCode[3][5] = "050";
guName[3][6] = "부평구";		guCode[3][6] = "060";
guName[3][7] = "서구";			guCode[3][7] = "070";
guName[3][8] = "연수구";		guCode[3][8] = "080";
guName[3][9] = "옹진군";		guCode[3][9] = "090";
guName[3][10] = "중구";			guCode[3][10] = "100";

//경기
guName[4] = new Array();		guCode[4] = new Array();
guName[4][0] = "----------- ";;			guCode[4][0] = "";
guName[4][1] = "가평군";		guCode[4][1] = "010";
guName[4][2] = "고양시";		guCode[4][2] = "020";
guName[4][3] = "과천시";		guCode[4][3] = "030";
guName[4][4] = "광명시";		guCode[4][4] = "040";
guName[4][5] = "광주시";		guCode[4][5] = "050";
guName[4][6] = "구리시";		guCode[4][6] = "060";
guName[4][7] = "군포시";		guCode[4][7] = "070";
guName[4][8] = "김포시";		guCode[4][8] = "080";
guName[4][9] = "남양주시";		guCode[4][9] = "090";
guName[4][10] = "동두천시";		guCode[4][10] = "100";
guName[4][11] = "부천시";		guCode[4][11] = "110";
guName[4][12] = "성남시";		guCode[4][12] = "120";
guName[4][13] = "수원시";		guCode[4][13] = "130";
guName[4][14] = "시흥시";		guCode[4][14] = "140";
guName[4][15] = "안산시";		guCode[4][15] = "150";
guName[4][16] = "안성시";		guCode[4][16] = "160";
guName[4][17] = "안양시";		guCode[4][17] = "170";
guName[4][18] = "양주시";		guCode[4][18] = "180";
guName[4][19] = "양평군";		guCode[4][19] = "190";
guName[4][20] = "여주군";		guCode[4][20] = "200";
guName[4][21] = "연천군";		guCode[4][21] = "210";
guName[4][22] = "오산시";		guCode[4][22] = "220";
guName[4][23] = "용인시";		guCode[4][23] = "230";
guName[4][24] = "의왕시";		guCode[4][24] = "240";
guName[4][25] = "의정부시";		guCode[4][25] = "250";
guName[4][26] = "이천시";		guCode[4][26] = "260";
guName[4][27] = "파주시";		guCode[4][27] = "270";
guName[4][28] = "평택시";		guCode[4][28] = "280";
guName[4][29] = "포천시";		guCode[4][29] = "290";
guName[4][30] = "하남시";		guCode[4][30] = "300";
guName[4][31] = "화성시";		guCode[4][31] = "310";


//대구
guName[5] = new Array();		guCode[5] = new Array();
guName[5][0] = "----------- ";;			guCode[5][0] = "000";
guName[5][1] = "남구";			guCode[5][1] = "010";
guName[5][2] = "달서구";		guCode[5][2] = "020";
guName[5][3] = "달성군";		guCode[5][3] = "030";
guName[5][4] = "동구";			guCode[5][4] = "040";
guName[5][5] = "북구";			guCode[5][5] = "050";
guName[5][6] = "서구";			guCode[5][6] = "060";
guName[5][7] = "수성구";		guCode[5][7] = "070";
guName[5][8] = "중구";			guCode[5][8] = "080";


//대전
guName[6] = new Array();		guCode[6] = new Array();
guName[6][0] = "----------- ";;			guCode[6][0] = "000";
guName[6][1] = "대덕구";		guCode[6][1] = "010";
guName[6][2] = "동구";			guCode[6][2] = "020";
guName[6][3] = "서구";			guCode[6][3] = "030";
guName[6][4] = "유성구";		guCode[6][4] = "040";
guName[6][5] = "중구";			guCode[6][5] = "050";


//울산
guName[7] = new Array();		guCode[7] = new Array();
guName[7][0] = "----------- ";;			guCode[7][0] = "000";
guName[7][1] = "남구";			guCode[7][1] = "010";
guName[7][2] = "동구";			guCode[7][2] = "020";
guName[7][3] = "북구";			guCode[7][3] = "030";
guName[7][4] = "울주군";		guCode[7][4] = "040";
guName[7][5] = "중구";			guCode[7][5] = "050";


//광주
guName[8] = new Array();		guCode[8] = new Array();
guName[8][0] = "----------- ";;			guCode[8][0] = "000";
guName[8][1] = "광산구";		guCode[8][1] = "010";
guName[8][2] = "남구";			guCode[8][2] = "020";
guName[8][3] = "동구";			guCode[8][3] = "030";
guName[8][4] = "북구";			guCode[8][4] = "040";
guName[8][5] = "서구";			guCode[8][5] = "050";


//경북
guName[9] = new Array();		guCode[9] = new Array();
guName[9][0] = "----------- ";;			guCode[9][0] = "";
guName[9][1] = "경산시";		guCode[9][1] = "010";
guName[9][2] = "경주시";		guCode[9][2] = "020";
guName[9][3] = "고령군";		guCode[9][3] = "030";
guName[9][4] = "구미시";		guCode[9][4] = "040";
guName[9][5] = "군위군";		guCode[9][5] = "050";
guName[9][6] = "김천시";		guCode[9][6] = "060";
guName[9][7] = "문경시";		guCode[9][7] = "070";
guName[9][8] = "봉화군";		guCode[9][8] = "080";
guName[9][9] = "상주시";		guCode[9][9] = "090";
guName[9][10] = "성주군";		guCode[9][10] = "100";
guName[9][11] = "안동시";		guCode[9][11] = "110";
guName[9][12] = "영덕군";		guCode[9][12] = "120";
guName[9][13] = "영양군";		guCode[9][13] = "130";
guName[9][14] = "영주시";		guCode[9][14] = "140";
guName[9][15] = "영천시";		guCode[9][15] = "150";
guName[9][16] = "예천군";		guCode[9][16] = "160";
guName[9][17] = "울릉군";		guCode[9][17] = "170";
guName[9][18] = "울진군";		guCode[9][18] = "180";
guName[9][19] = "의성군";		guCode[9][19] = "190";
guName[9][20] = "청도군";		guCode[9][20] = "200";
guName[9][21] = "청송군";		guCode[9][21] = "210";
guName[9][22] = "칠곡군";		guCode[9][22] = "220";
guName[9][23] = "포항시";		guCode[9][23] = "230";


//경남
guName[10] = new Array();		guCode[10] = new Array();
guName[10][0] = "----------- ";;			guCode[10][0] = "";
guName[10][1] = "거제시";		guCode[10][1] = "010";
guName[10][2] = "거창군";		guCode[10][2] = "020";
guName[10][3] = "고성군";		guCode[10][3] = "030";
guName[10][4] = "김해시";		guCode[10][4] = "040";
guName[10][5] = "남해군";		guCode[10][5] = "050";
guName[10][6] = "마산시";		guCode[10][6] = "060";
guName[10][7] = "밀양시";		guCode[10][7] = "070";
guName[10][8] = "사천시";		guCode[10][8] = "080";
guName[10][9] = "산청군";		guCode[10][9] = "090";
guName[10][10] = "양산시";		guCode[10][10] = "100";
guName[10][11] = "의령군";		guCode[10][11] = "110";
guName[10][12] = "진주시";		guCode[10][12] = "120";
guName[10][13] = "진해시";		guCode[10][13] = "130";
guName[10][14] = "창녕군";		guCode[10][14] = "140";
guName[10][15] = "창원시";		guCode[10][15] = "150";
guName[10][16] = "통영시";		guCode[10][16] = "160";
guName[10][17] = "하동군";		guCode[10][17] = "170";
guName[10][18] = "함안군";		guCode[10][18] = "180";
guName[10][19] = "함양군";		guCode[10][19] = "190";
guName[10][20] = "합천군";		guCode[10][20] = "200";


//충북
guName[11] = new Array();		guCode[11] = new Array();
guName[11][0] = "----------- ";;			guCode[11][0] = "";
guName[11][1] = "괴산군";		guCode[11][1] = "010";
guName[11][2] = "단양군";		guCode[11][2] = "020";
guName[11][3] = "보은군";		guCode[11][3] = "030";
guName[11][4] = "영동군";		guCode[11][4] = "040";
guName[11][5] = "옥천군";		guCode[11][5] = "050";
guName[11][6] = "음성군";		guCode[11][6] = "060";
guName[11][7] = "제천시";		guCode[11][7] = "070";
guName[11][8] = "증평군";		guCode[11][8] = "080";
guName[11][9] = "진천군";		guCode[11][9] = "090";
guName[11][10] = "청원군";		guCode[11][10] = "100";
guName[11][11] = "청주시";		guCode[11][11] = "110";
guName[11][12] = "충주시";		guCode[11][12] = "120";


//충남
guName[12] = new Array();		guCode[12] = new Array();
guName[12][0] = "----------- ";;			guCode[12][0] = "";
guName[12][1] = "계룡시";		guCode[12][1] = "010";
guName[12][2] = "공주시";		guCode[12][2] = "020";
guName[12][3] = "금산군";		guCode[12][3] = "030";
guName[12][4] = "논산시";		guCode[12][4] = "040";
guName[12][5] = "당진군";		guCode[12][5] = "050";
guName[12][6] = "보령시";		guCode[12][6] = "060";
guName[12][7] = "부여군";		guCode[12][7] = "070";
guName[12][8] = "서산시";		guCode[12][8] = "080";
guName[12][9] = "서천군";		guCode[12][9] = "090";
guName[12][10]= "아산시";		guCode[12][10]=  "100";
guName[12][11] = "연기군";		guCode[12][11] = "110";
guName[12][12] = "예산군";		guCode[12][12] = "120";
guName[12][13] = "천안시";		guCode[12][13] = "130";
guName[12][14] = "청양군";		guCode[12][14] = "140";
guName[12][15] = "태안군";		guCode[12][15] = "150";
guName[12][16] = "홍성군";		guCode[12][16] = "160";


//전북
guName[13] = new Array();		guCode[13] = new Array();
guName[13][0] = "----------- ";;			guCode[13][0] = "";
guName[13][1] = "고창군";		guCode[13][1] = "010";
guName[13][2] = "군산시";		guCode[13][2] = "020";
guName[13][3] = "김제시";		guCode[13][3] = "030";
guName[13][4] = "남원시";		guCode[13][4] = "040";
guName[13][5] = "무주군";		guCode[13][5] = "050";
guName[13][6] = "부안군";		guCode[13][6] = "060";
guName[13][7] = "순창군";		guCode[13][7] = "070";
guName[13][8] = "완주군";		guCode[13][8] = "080";
guName[13][9] = "익산시";		guCode[13][9] = "090";
guName[13][10] = "임실군";		guCode[13][10] = "100";
guName[13][11] = "장수군";		guCode[13][11] = "110";
guName[13][12] = "전주시";		guCode[13][12] = "120";
guName[13][13] = "정읍시";		guCode[13][13] = "130";
guName[13][14] = "진안군";		guCode[13][14] = "140";


//전남
guName[14] = new Array();		guCode[14] = new Array();
guName[14][0] = "----------- ";;			guCode[14][0] = "";
guName[14][1] = "강진군";		guCode[14][1] = "010";
guName[14][2] = "고흥군";		guCode[14][2] = "020";
guName[14][3] = "곡성군";		guCode[14][3] = "030";
guName[14][4] = "광양시";		guCode[14][4] = "040";
guName[14][5] = "구례군";		guCode[14][5] = "050";
guName[14][6] = "나주시";		guCode[14][6] = "060";
guName[14][7] = "담양군";		guCode[14][7] = "070";
guName[14][8] = "목포시";		guCode[14][8] = "080";
guName[14][9] = "무안군";		guCode[14][9] = "090";
guName[14][10] = "보성군";		guCode[14][10] = "100";
guName[14][11] = "순천시";		guCode[14][11] = "110";
guName[14][12] = "신안군";		guCode[14][12] = "120";
guName[14][13] = "여수시";		guCode[14][13] = "130";
guName[14][14] = "영광군";		guCode[14][14] = "140";
guName[14][15] = "영암군";		guCode[14][15] = "150";
guName[14][16] = "완도군";		guCode[14][16] = "160";
guName[14][17] = "장성군";		guCode[14][17] = "170";
guName[14][18] = "장흥군";		guCode[14][18] = "180";
guName[14][19] = "진도군";		guCode[14][19] = "190";
guName[14][20] = "함평군";		guCode[14][20] = "200";
guName[14][21] = "해남군";		guCode[14][21] = "210";
guName[14][22] = "화순군";		guCode[14][22] = "220";


//강원
guName[15] = new Array();		guCode[15] = new Array();
guName[15][0] = "----------- ";;			guCode[15][0] = "";
guName[15][1] = "강릉시";		guCode[15][1] = "010";
guName[15][2] = "고성군";		guCode[15][2] = "020";
guName[15][3] = "동해시";		guCode[15][3] = "030";
guName[15][4] = "삼척시";		guCode[15][4] = "040";
guName[15][5] = "속초시";		guCode[15][5] = "050";
guName[15][6] = "양구군";		guCode[15][6] = "060";
guName[15][7] = "양양군";		guCode[15][7] = "070";
guName[15][8] = "영월군";		guCode[15][8] = "080";
guName[15][9] = "원주시";		guCode[15][9] = "090";
guName[15][10] = "인제군";		guCode[15][10] = "100";
guName[15][11] = "정선군";		guCode[15][11] = "110";
guName[15][12] = "철원군";		guCode[15][12] = "120";
guName[15][13] = "춘천시";		guCode[15][13] = "130";
guName[15][14] = "태백시";		guCode[15][14] = "140";
guName[15][15] = "평창군";		guCode[15][15] = "150";
guName[15][16] = "홍천군";		guCode[15][16] = "160";
guName[15][17] = "화천군";		guCode[15][17] = "170";
guName[15][18] = "횡성군";		guCode[15][18] = "180";


//제주
guName[16] = new Array();		guCode[16] = new Array();
guName[16][0] = "----------- ";;		guCode[16][0] = "000";
guName[16][1] = "서귀포시";		guCode[16][1] = "030";
guName[16][2] = "제주시";		guCode[16][2] = "040";

//세종특별자치시
guName[17] = new Array();		guCode[17] = new Array();
guName[17][0] = "----------- ";;		guCode[17][0] = "000";
guName[17][1] = "반곡동";		guCode[17][1] = "010";
guName[17][2] = "소담동";		guCode[17][2] = "020";
guName[17][3] = "보람동";		guCode[17][3] = "030";
guName[17][4] = "대평동";		guCode[17][4] = "040";
guName[17][5] = "가람동";		guCode[17][5] = "050";
guName[17][6] = "한솔동";		guCode[17][6] = "060";
guName[17][7] = "나성동";		guCode[17][7] = "070";
guName[17][8] = "새롬동";		guCode[17][8] = "080";
guName[17][9] = "다정동";		guCode[17][9] = "090";
guName[17][10] = "어진동";		guCode[17][10] = "010";
guName[17][11] = "종촌동";		guCode[17][11] = "011";
guName[17][12] = "고운동";		guCode[17][12] = "012";
guName[17][13] = "아름동";		guCode[17][13] = "013";
guName[17][14] = "도담동";		guCode[17][14] = "014";
guName[17][15] = "조치원읍";	guCode[17][15] = "015";
guName[17][16] = "연기면";		guCode[17][16] = "016";
guName[17][17] = "연동면";		guCode[17][17] = "017";
guName[17][18] = "부강면";		guCode[17][18] = "018";
guName[17][19] = "금남면";		guCode[17][19] = "019";
guName[17][20] = "장군면";		guCode[17][20] = "020";
guName[17][21] = "연서면";		guCode[17][21] = "021";
guName[17][22] = "전의면";		guCode[17][22] = "022";
guName[17][23] = "전동면";		guCode[17][23] = "023";
guName[17][24] = "소정면";		guCode[17][24] = "024";

function guOption1(){
    var sidoSelect = document.getElementById("student_sido1").value;
    $("select#student_gugun1").empty();

    if (sidoSelect == "선택"){
        for (var i = 0; i < guName[0].length; i++){
            $("select#student_gugun1").append('<option value="'+guName[0][i]+'">'+guName[0][i]+'</option>>');
        }
    } else if (sidoSelect == "서울"){
        for (var i = 0; i < guName[1].length; i++){
            $("select#student_gugun1").append('<option value="'+guName[1][i]+'">'+guName[1][i]+'</option>>');
        }
    } else if (sidoSelect == "부산"){
        for (var i = 0; i < guName[2].length; i++){
            $("select#student_gugun1").append('<option value="'+guName[2][i]+'">'+guName[2][i]+'</option>>');
        }
    } else if (sidoSelect == "인천"){
        for (var i = 0; i < guName[3].length; i++){
            $("select#student_gugun1").append('<option value="'+guName[3][i]+'">'+guName[3][i]+'</option>>');
        }
    } else if (sidoSelect == "경기"){
        for (var i = 0; i < guName[4].length; i++){
            $("select#student_gugun1").append('<option value="'+guName[4][i]+'">'+guName[4][i]+'</option>>');
        }
    } else if (sidoSelect == "대구"){
        for (var i = 0; i < guName[5].length; i++){
            $("select#student_gugun1").append('<option value="'+guName[5][i]+'">'+guName[5][i]+'</option>>');
        }
    } else if (sidoSelect == "대전"){
        for (var i = 0; i < guName[6].length; i++){
            $("select#student_gugun1").append('<option value="'+guName[6][i]+'">'+guName[6][i]+'</option>>');
        }
    } else if (sidoSelect == "울산"){
        for (var i = 0; i < guName[7].length; i++){
            $("select#student_gugun1").append('<option value="'+guName[7][i]+'">'+guName[7][i]+'</option>>');
        }
    } else if (sidoSelect == "광주"){
        for (var i = 0; i < guName[8].length; i++){
            $("select#student_gugun1").append('<option value="'+guName[8][i]+'">'+guName[8][i]+'</option>>');
        }
    } else if (sidoSelect == "경북"){
        for (var i = 0; i < guName[9].length; i++){
            $("select#student_gugun1").append('<option value="'+guName[9][i]+'">'+guName[9][i]+'</option>>');
        }
    } else if (sidoSelect == "경남"){
        for (var i = 0; i < guName[10].length; i++){
            $("select#student_gugun1").append('<option value="'+guName[10][i]+'">'+guName[10][i]+'</option>>');
        }
    } else if (sidoSelect == "충북"){
        for (var i = 0; i < guName[11].length; i++){
            $("select#student_gugun1").append('<option value="'+guName[11][i]+'">'+guName[11][i]+'</option>>');
        }
    } else if (sidoSelect == "충남"){
        for (var i = 0; i < guName[12].length; i++){
            $("select#student_gugun1").append('<option value="'+guName[12][i]+'">'+guName[12][i]+'</option>>');
        }
    } else if (sidoSelect == "전북"){
        for (var i = 0; i < guName[13].length; i++){
            $("select#student_gugun1").append('<option value="'+guName[13][i]+'">'+guName[13][i]+'</option>>');
        }
    } else if (sidoSelect == "전남"){
        for (var i = 0; i < guName[14].length; i++){
            $("select#student_gugun1").append('<option value="'+guName[14][i]+'">'+guName[14][i]+'</option>>');
        }
    } else if (sidoSelect == "강원"){
        for (var i = 0; i < guName[15].length; i++){
            $("select#student_gugun1").append('<option value="'+guName[15][i]+'">'+guName[15][i]+'</option>>');
        }
    } else if (sidoSelect == "제주"){
        for (var i = 0; i < guName[16].length; i++){
            $("select#student_gugun1").append('<option value="'+guName[16][i]+'">'+guName[16][i]+'</option>>');
        }
    } else if (sidoSelect == "세종"){
        for (var i = 0; i < guName[17].length; i++){
            $("select#student_gugun1").append('<option value="'+guName[17][i]+'">'+guName[17][i]+'</option>>');
        }
    }
}
function guOption2(){
    var sidoSelect = document.getElementById("student_sido2").value;
    $("select#student_gugun2").empty();

    if (sidoSelect == "선택"){
        for (var i = 0; i < guName[0].length; i++){
            $("select#student_gugun2").append('<option value="'+guName[0][i]+'">'+guName[0][i]+'</option>>');
        }
    } else if (sidoSelect == "서울"){
        for (var i = 0; i < guName[1].length; i++){
            $("select#student_gugun2").append('<option value="'+guName[1][i]+'">'+guName[1][i]+'</option>>');
        }
    } else if (sidoSelect == "부산"){
        for (var i = 0; i < guName[2].length; i++){
            $("select#student_gugun2").append('<option value="'+guName[2][i]+'">'+guName[2][i]+'</option>>');
        }
    } else if (sidoSelect == "인천"){
        for (var i = 0; i < guName[3].length; i++){
            $("select#student_gugun2").append('<option value="'+guName[3][i]+'">'+guName[3][i]+'</option>>');
        }
    } else if (sidoSelect == "경기"){
        for (var i = 0; i < guName[4].length; i++){
            $("select#student_gugun2").append('<option value="'+guName[4][i]+'">'+guName[4][i]+'</option>>');
        }
    } else if (sidoSelect == "대구"){
        for (var i = 0; i < guName[5].length; i++){
            $("select#student_gugun2").append('<option value="'+guName[5][i]+'">'+guName[5][i]+'</option>>');
        }
    } else if (sidoSelect == "대전"){
        for (var i = 0; i < guName[6].length; i++){
            $("select#student_gugun2").append('<option value="'+guName[6][i]+'">'+guName[6][i]+'</option>>');
        }
    } else if (sidoSelect == "울산"){
        for (var i = 0; i < guName[7].length; i++){
            $("select#student_gugun2").append('<option value="'+guName[7][i]+'">'+guName[7][i]+'</option>>');
        }
    } else if (sidoSelect == "광주"){
        for (var i = 0; i < guName[8].length; i++){
            $("select#student_gugun2").append('<option value="'+guName[8][i]+'">'+guName[8][i]+'</option>>');
        }
    } else if (sidoSelect == "경북"){
        for (var i = 0; i < guName[9].length; i++){
            $("select#student_gugun2").append('<option value="'+guName[9][i]+'">'+guName[9][i]+'</option>>');
        }
    } else if (sidoSelect == "경남"){
        for (var i = 0; i < guName[10].length; i++){
            $("select#student_gugun2").append('<option value="'+guName[10][i]+'">'+guName[10][i]+'</option>>');
        }
    } else if (sidoSelect == "충북"){
        for (var i = 0; i < guName[11].length; i++){
            $("select#student_gugun2").append('<option value="'+guName[11][i]+'">'+guName[11][i]+'</option>>');
        }
    } else if (sidoSelect == "충남"){
        for (var i = 0; i < guName[12].length; i++){
            $("select#student_gugun2").append('<option value="'+guName[12][i]+'">'+guName[12][i]+'</option>>');
        }
    } else if (sidoSelect == "전북"){
        for (var i = 0; i < guName[13].length; i++){
            $("select#student_gugun2").append('<option value="'+guName[13][i]+'">'+guName[13][i]+'</option>>');
        }
    } else if (sidoSelect == "전남"){
        for (var i = 0; i < guName[14].length; i++){
            $("select#student_gugun2").append('<option value="'+guName[14][i]+'">'+guName[14][i]+'</option>>');
        }
    } else if (sidoSelect == "강원"){
        for (var i = 0; i < guName[15].length; i++){
            $("select#student_gugun2").append('<option value="'+guName[15][i]+'">'+guName[15][i]+'</option>>');
        }
    } else if (sidoSelect == "제주"){
        for (var i = 0; i < guName[16].length; i++){
            $("select#student_gugun2").append('<option value="'+guName[16][i]+'">'+guName[16][i]+'</option>>');
        }
    } else if (sidoSelect == "세종"){
        for (var i = 0; i < guName[17].length; i++){
            $("select#student_gugun2").append('<option value="'+guName[17][i]+'">'+guName[17][i]+'</option>>');
        }
    }
}

function checkNumber(chr){
    if(isNaN(chr.value)){
        alert("숫자만 입력하세요");
        chr.value="";
    }
}

function checkId(userId) {
  if (userId == "") {
    alert("아이디를 입력해 주세요.");
  } else {
    $.ajax({
      url: 'idCheck_student.php',
      type: 'POST',
      data: {
        'id': userId
      },
      dataType: 'html',
      success: function(data) {
        alert(data); // 결과 텍스트를 경고창으로 보여준다.
      }
    });
  }
}
