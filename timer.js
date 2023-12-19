const timer = document.getElementById('timer');
let nowSec = 0;
let nowMin = 0;
let nowHour = 0;
let isCount = true;

window.addEventListener('load', function(){
    let tutorMsg = "<div class=\"tutorMessages\">";
    tutorMsg += "<div class=\"tutorBox\">勉強がんばろう！</div>";
    tutorMsg += "<img src=\"./avatars/"+document.form.icon.value+".png\" width=56 height=56>";
    tutorMsg += "</div><br>";
    $('#chatarea').append(tutorMsg);
    countUp();
});

$('#countControl').on('click',function(){
    //タイマースタート　or　ストップ
    if(isCount) {
        $('#countControl').value = "count start.";
        isCount = false;
    } else {
        $('#countControl').value = "count stop.";
        isCount = true;
        countUp();
    }
});

$('#close').on('click',function(){
    //学習終了時のオーバーレイ表示
    isCount = false;
    $('#fullOverlay').css({
        'display':'block',
        'z-index':2147483647
    });
    let appMsg = "<div class=\"endtext\">学習時間<br>"+('00'+nowHour).slice(-2)+":"+('00'+nowMin).slice(-2)+":"+('00'+nowSec).slice(-2)+"<br>";
    appMsg += "<a href=\"https://unj-labo.com/AI_Teachers/\">トップに戻る</a></div>"
    $('#fullOverlay').append(appMsg);
});

function countUp()
{
    setTimeout(() => {
        if(!isCount) return;
        nowSec++;
        if(nowSec == 60) {
            nowMin++;
            nowSec = 0;
        }
        if(nowMin == 60) {
            nowHour++;
            nowMin = 0;
        }
        
        timer.textContent = ('00'+nowHour).slice(-2)+":"+('00'+nowMin).slice(-2)+":"+('00'+nowSec).slice(-2);
        countUp();
    },1000);
}