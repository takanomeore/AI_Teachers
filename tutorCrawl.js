let select = document.getElementById('tutor');

select.onchange = function(){
    $.ajax({
        type:"POST",
        url:"./connectDB.php",
        data:{"tutor":this.value},
        dataType:"json",
    }).done(function(data) {
        //let who_tutor = document.getElementById('who_tutor');
        if(document.getElementById("tutorinfo") != null) {
            let tutorinfo = document.getElementById("tutorinfo");
            tutorinfo.remove();
        }
        let appMsg = "<div class=\"tutorInfo\" id=\"tutorinfo\">";
        appMsg += "<img src=\"./avatars/"+data.icon+".png\" width=56 height=56>";
        appMsg += "<h2>"+data.name+"</h2>";
        appMsg += "<h3>"+data.greet+"</h3></div>";
        document.form.tutor_name.value = data.name;
        document.form.tutor_greet.value = data.greet;
        document.form.tutor_icon.value = data.icon;
        document.form.first_contact.value = data.first_contact;
        document.form.assist_order.value = data.assist_order;
        $('#who_tutor').append(appMsg);
    });
};
