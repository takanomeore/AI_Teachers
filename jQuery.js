$('#send').on('click',function(event) {
    let question = document.getElementById('question');
    let message = question.value;
    if(message == "") {
        alert("質問文を入力してください！");
        return;
    }
    let appmsg = "<div class=\"userMessages\">";
    appmsg += "<img src=\"./avatars/catgirl4.png\" width=56 height=56>";
    appmsg += "<div class=\"userBox\">"+message+"</div>";
    appmsg += "</div><br>";
    $('#chatarea').append(appmsg);
    question.value = "";
    let tutorMsg = "<div class=\"tutorMessages\" id=\"originTutor\">";
    tutorMsg += "<div class=\"tutorBox\">";
    tutorMsg += '<div class="intersecting-circles-spinner">\
    <div class="spinnerBlock">\
      <span class="circle"></span>\
      <span class="circle"></span>\
      <span class="circle"></span>\
      <span class="circle"></span>\
      <span class="circle"></span>\
      <span class="circle"></span>\
      <span class="circle"></span>\
    </div></div></div>'
    tutorMsg += "<img src=\"./avatars/"+document.form.icon.value+".png\" width=56 height=56>";
    tutorMsg += "</div>";
    $('#chatarea').append(tutorMsg);
    $.ajax ({
        type:"POST",
        url:"./AjaxToPython.php",
        data:{"data":message,"order":document.form.assist_order.value}
    }).done(function(data) {
        $('#originTutor').remove();
        tutorMsg = "<div class=\"tutorMessages\">";
        tutorMsg += "<div class=\"tutorBox\">"+data+"</div>";
        tutorMsg += "<img src=\"./avatars/"+document.form.icon.value+".png\" width=56 height=56>";
        tutorMsg += "</div><br>";
        $('#chatarea').append(tutorMsg);
    }).fail(function(xhr,status,error) {
        alert("akan");
    });
});