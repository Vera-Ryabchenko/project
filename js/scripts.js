$(document).ready(function () {
  function checkvalid(fio1, login1, pass1, pass2, email1) {
    let errfio1 = document.querySelector(".errfio");
    let errlogin1 = document.querySelector(".errlogin");
    let errpass2 = document.querySelector(".errpassrepeat");
    let erremail1 = document.querySelector(".erremail");

    let err = 0;

    if (
      /^(?=.*[а-я])(?=.*[А-Я])[а-яА-Я\-%]{0,}\s+(?=.*[а-я])(?=.*[А-Я])[а-яА-Я\-%]{0,}\s+(?=.*[а-я])(?=.*[А-Я])[а-яА-Я\-%]{0,}$/.test(
        fio1
      )
    ) {
      errfio1.innerHTML = "";
    } else {
      errfio1.innerHTML = "*ФИО только кириллица, прописные И строчные буквы";
      err = 1;
      errfio1.classList.add("error");
      $("input[name='fio']")
        .css("border", "1px solid #FA1414")
        .css("box-shadow", "0 0 3px 3px rgba(250,20,20,0.5)")
        .css("transition", "all 1s linear");
    }

    if (/^[a-zA-Z]{0,}$/.test(login1)) {
      errlogin1.innerHTML = "";
    } else {
      errlogin1.innerHTML = "*только латинница";
      err = 1;
      errlogin1.classList.add("error");
      $("input[name='login']")
        .css("border", "1px solid #FA1414")
        .css("box-shadow", "0 0 3px 3px rgba(250,20,20,0.5)")
        .css("transition", "all 1s linear");
    }

    if (pass1 == pass2) {
      errpass2.innerHTML = "";
    } else {
      errpass2.innerHTML = "*Пароли не совпадают";
      err = 1;
      errpass2.classList.add("error");
      $("input[name='repeatpassword']")
        .css("border", "1px solid #FA1414")
        .css("box-shadow", "0 0 3px 3px rgba(250,20,20,0.5)")
        .css("transition", "all 1s linear");
    }

    if (/^[\w-\.]+@[\w-]+\.[a-z]{2,4}$/i.test(email1)) {
      erremail1.innerHTML = "";
    } else {
      erremail1.innerHTML = "введите e-mail правильно name@example.com";
      err = 1;
      erremail1.classList.add("error");
      $("input[name='email']")
        .css("border", "1px solid #FA1414")
        .css("box-shadow", "0 0 3px 3px rgba(250,20,20,0.5)")
        .css("transition", "all 1s linear");
    }
    return err;
  }

  $("#newaccount").click(function () {
    $("#forms").load("regform.php");
    return false;
  });

  $(document).on("click", ".btn-delete", function () {
    let this_id = $(this).attr("id");

    let id_all = this_id.split("_");
    let id_button = Number(id_all[1]);

    let newXHR = new XMLHttpRequest();

    newXHR.open("POST", "delmessage.php");

    newXHR.setRequestHeader(
      "Content-type",
      "application/x-www-form-urlencoded"
    );
    let data = { idb: id_button };
    if (window.confirm("Do you really want to delete?")) {
      $.post("delmessage.php", data, function (data, status) {
        console.log(status);
        console.log(data);
        $("#content-lk").load("usermessages.php");
      });
    } else {
      return false;
    }
  });

  $(document).on("click", "#btn-form", function () {
    let login = document.querySelector("input[name=login]").value;
    let pass = document.querySelector("input[name=password]").value;
    let pass2 = document.querySelector("input[name=repeatpassword]").value;
    let fio = document.querySelector("input[name=fio]").value;
    let email = document.querySelector("input[name=email]").value;
    let valid = checkvalid(fio, login, pass, pass2, email);
    console.log(valid);

    if (valid == 0) {
      let newXHR = new XMLHttpRequest();
      newXHR.open("POST", "registration.php");

      newXHR.setRequestHeader(
        "Content-type",
        "application/x-www-form-urlencoded"
      );
      data = {
        formlogin: login,
        formpass: pass,
        formfio: fio,
        formemail: email,
      };
      $.post("registration.php", data, function (data, status) {
        console.log(status);
        console.log(data);

        newHTML = data;
        $("#ans").html(newHTML);
        $("#toindex2").css("visibility", "visible");
      });
      return false;
    } else {
      $("#ans").innerHTML = "исправьте ошибки";
    }
  });

  $(document).on("click", ".loadafter_submit", function () {
    let this_id = $(this).attr("id");
    let id_all = this_id.split("_");
    let id_button = Number(id_all[1]);
    let this_idobj = "#loadafter_" + id_button;

    let newXHR = new XMLHttpRequest();
    fd = new FormData();

    newXHR.open("POST", "addphotoafter.php");

    fd.append("after", $(this_idobj)[0].files[0]);
    fd.append("this_idobj", id_button);

    newXHR.send(fd);

    $.post("addphotoafter.php", function (status) {
      console.log(status);

      $("#content-lk").load("usermessages.php");
    });
  });

  $("#btn_new-message").click(function () {
    $("#content-lk").load("feedbackform.php");
    return false;
  });

  $("#btn_all-messages").click(function () {
    $("#content-lk").load("usermessages.php");
    $(".form_radio_group").css("display", "flex").css("flex-direction", "row");
    return false;
  });

  $(document).on("change", ".messagestatus", function () {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    let this_id = $(this).attr("id");
    let id_all = this_id.split("_");
    let id_button = Number(id_all[1]);

    if (valueSelected == "отклонена") {
      let newXHR = new XMLHttpRequest();

      newXHR.open("POST", "changestatus.php");

      newXHR.setRequestHeader(
        "Content-type",
        "application/x-www-form-urlencoded"
      );
      let data = { idb: id_button };
      $.post("changestatus.php", data, function (data, status) {
        console.log(status);
        console.log(data);
        $("#content-lk").load("usermessages.php");
      });
    }

    if (valueSelected == "решена") {
      forsolveid = "#submitfile_" + id_button;

      $(forsolveid).css("display", "block");

      selectoptionnew = "#" + this_id + " option[value ='новая']";
      selectoptionesc = "#" + this_id + " option[value ='отклонена']";
      $(selectoptionnew).remove();
      $(selectoptionesc).remove();
    }
  });

  $(document).on("click", 'input[type="radio"]', function () {
    let this_id = $(this).attr("id");
    checkid = "#" + this_id;
    let newXHR = new XMLHttpRequest();

    if (this_id == "filter-newmessage") {
      $("#content-lk").load("usermessagesonlynew.php");
    } else if (this_id == "filter-escmessage") {
      $("#content-lk").load("usermessagesonlyesc.php");
    } else if (this_id == "filter-solvemessage") {
      $("#content-lk").load("usermessagesonlysolve.php");
    }

    $('input[type="radio"]:checked + label').css({
      background: "white",
      color: "rgba(27, 59, 120, 0.79)",
      border: "2px solid rgba(27, 59, 120, 0.79)",
    });

    $('input[type="radio"]:not(:checked) + label').css({
      background: "rgba(27, 59, 120, 0.79)",
      color: "rgba(27, 59, 120, 0.79)",
      border: "2px solid rgba(27, 59, 120, 0.79)",
    });
  });

  $(document).on("click", "#addcategorymessage", function () {
    namecat = $("#nameaddcategorymessage").val();
    alert(namecat);

    let newXHR = new XMLHttpRequest();

    newXHR.open("POST", "addtheme.php");

    newXHR.setRequestHeader(
      "Content-type",
      "application/x-www-form-urlencoded"
    );
    let data = { theme: namecat };
    $.post("addtheme.php", data, function (data, status) {
      console.log(status);
      console.log(data);
    });

    $("<option/>").val(namecat).text(namecat).appendTo("#thememessage");
  });

  $(document).on("click", "#delcategorymessage", function () {
    namecat = $("#thememessagefordel").val();

    let newXHR = new XMLHttpRequest();

    newXHR.open("POST", "deltheme.php");

    newXHR.setRequestHeader(
      "Content-type",
      "application/x-www-form-urlencoded"
    );
    let data = { theme: namecat };
    $.post("deltheme.php", data, function (data, status) {
      console.log(status);
      console.log(data);
    });

    selectoptionesc = "#thememessagefordel option[value ='" + namecat + "']";
    $(selectoptionesc).remove();
  });
});

function playsoundmessage() {
  var audioElement = document.createElement("audio");
  audioElement.setAttribute("src", "sounds/notif.mp3");
  $("audio").css({
    "webkit-playsinline": "true",
    playsinline: "true",
  });
  audioElement.play();
}

function message_counter() {

  $(".messages_counter").load("index2.php .messages_counter");
  newcount = $(".messages_counter").text();
  return newcount;
}

window.onload = function () {
  setInterval(function () {
    count = $(".messages_counter").text();
    newcount = message_counter();
    playsoundmessage();
  }, 5000);
};
