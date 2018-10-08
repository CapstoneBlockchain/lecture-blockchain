function top_module() {
    echo '<div id="top_menu" align="center">';
    echo '  <div id="div-logo" align="center">';
    echo '      <input class="top-logo" type="image" value="Home" src="img/cau.png" onclick="location.href=\'MainPage.html\'">';
    echo '  </div>';
    echo '  <table class="table-borderless table-lg">';
    echo '      <tr>';
    echo '          <td align="center">';
    echo '              <input type="button" value="Search Teacher" class="btn-lg btn-primary" onclick="location.href=\'menu/SearchTeacher.html\'" style="text-align:center;">';
    echo '          </td>';
    echo '          <td align="center">';
    echo '              <input type="button" value="Search Student" class="btn-lg btn-primary" onclick="location.href=\'menu/SearchStudent.html\'" style="text-align:center;">';
    echo '          </td>';
    echo '          <td align="center">';
    echo '              <input type="button" value="Requests" class="btn-lg btn-success" onclick="location.href=\'menu/Requests.html\'" style="text-align:center;">';
    echo '          </td>';
    echo '          <td align="center">';
    echo '              <input type="button" value="MyPage" class="btn-lg btn-info" onclick="location.href=\'menu/MyPage.html\'" style="text-align:center;">';
    echo '          </td>';
    echo '      </tr>';
    echo '  </table>';
    echo '</div>';

}