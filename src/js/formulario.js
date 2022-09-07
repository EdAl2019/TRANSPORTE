var today = new Date();
function onScanSuccess(qrCodeMessage) {
  $("#QR").val(qrCodeMessage);
  $("#reader").hide();
  $("#Detener").click();
  $("contenedor_scaner").hide();
  $("#check_scan").show();
  //document.getElementById('result').innerHTML = '<span class="result">' + qrCodeMessage + '</span>';
}

function Parametros() {
  let punto_control = "";
  $.post(
    "../Controlador/encuesta_controlador.php?op=parametros",
    {
      user: 0,
    },
    function (data, status) {
      data = JSON.parse(data);

      

      $("#usuario").html("Encuestador: " + data.Nombres + " " + data.Apellidos);
    }
  );
}

function onScanError(errorMessage) {
  //handle scan error
}

var html5QrcodeScanner = new Html5QrcodeScanner("reader", {
  fps: 10,
  qrbox: 250,
});
html5QrcodeScanner.render(onScanSuccess, onScanError);

$("#formulario").hide();
$(".3-mas").prop("disabled", true);
$(".4-mas").prop("disabled", true);
//ready
$(document).ready(function () {
  var input_identidad = document.getElementById("IDENTIDAD");
  input_identidad.addEventListener("input", function () {
    if (this.value.length > 13) this.value = this.value.slice(0, 13);
  });
  var input_telefono = document.getElementById("TELEFONO");
  input_telefono.addEventListener("input", function () {
    if (this.value.length > 8) this.value = this.value.slice(0, 8);
  });
  document.getElementById("formulario-encuesta").reset();
  Parametros();
  $("#check_scan").hide();

  $("#comenzar").on("click", function () {
    $("#formulario").show();
    $("#contenedor_comenzar").hide();
    $.post(
      "../Controlador/encuesta_controlador.php?op=inicio",
      { valor: "" },
      function (data, status) {
          
            $("#FECHAINICIO").val(data);
        
      }
    );
  }); //fin comenzar

  $(".transporte-hogar").on("click", function () {
    if ($(".4-mas").val() == "") {
      $(".4-mas").val("");
      $(".4-mas").removeAttr("disabled");
    } else {
      $(".4-mas").removeAttr("disabled");
    }
  });
  $(".transporte-mas").on("click", function () {
    if ($(".3-mas").val() == "") {
      $(".3-mas").val("");
      $(".3-mas").removeAttr("disabled");
    } else;
    {
      $(".3-mas").removeAttr("disabled");
    }
  });

  $(".radio3").on("click", function () {
    $(".3-mas").val("");
    $(".3-mas").prop("disabled", true);
  });
  $(".radio4").on("click", function () {
    $(".4-mas").val("");
    $(".4-mas").prop("disabled", true);
  });

  $("#guardar").on("click", function () {
    datos = $("#formulario-encuesta").serialize();
    console.log(datos);
    //valudaciones
    var mensaje_error = [];
    var qr = $("#QR").val();
    var identidad = $("#IDENTIDAD").val();
    var telefono = $("#TELEFONO").val();
    var pregunta3 = $("input[id=3]:checked", "#formulario-encuesta").val();
    console.log(pregunta3);
    var pregunta4 = $("input[id=4]:checked", "#formulario-encuesta").val();
    console.log(pregunta4);
    var pregunta5 = $("input[id=5]:checked").val();
    console.log(pregunta5);
    var pregunta6 = $("input[id=6]:checked").val();
    console.log(pregunta6);

    if (
      qr === "" ||
      identidad === "" ||
      telefono === "" ||
      pregunta3 === undefined ||
      pregunta3 === "" ||
      pregunta4 === undefined ||
      pregunta4 === "" ||
      pregunta5 === undefined ||
      pregunta5 === "" ||
      pregunta6 === undefined ||
      pregunta6 === ""
    ) {
      if (qr === "" || qr === null) {
        mensaje_error.push("Completa el campo: ESCANER QR<br><br>");
        
      }
      if (identidad === "" || identidad === null) {
        mensaje_error.push("Completa el campo: IDENTIDAD<br><br>");
      }
      if (telefono === "" || telefono === null) {
        mensaje_error.push("Completa el campo: TELÉFONO<br><br>");
      }
      if (pregunta3 === undefined || pregunta3 === "") {
        mensaje_error.push(
          "Completa el campo: ¿CUÁNTAS UNIDADES DE TRANSPORTE UTILIZA PARA LLEGAR A SU DESTINO?<br><br>"
        );
      }
      if (pregunta4 === undefined || pregunta4 === "") {
        mensaje_error.push(
          "Completa el campo: ¿CUÁNTAS PERSONAS UTILIZAN TRANSPORTE EN SU HOGAR?<br><br>"
        );
      }
      if (pregunta5 === undefined || pregunta5 === "") {
        mensaje_error.push(
          "Completa el campo: ¿QUÉ OTROS SERVICIOS DE TRANSPORTE UTILIZA FRECUENTEMENTE ? <br><br>"
        );
      }
      if (pregunta6 === undefined || pregunta6 === "") {
        mensaje_error.push(
          "Completa el campo: ¿QUÉ ASPECTOS LE GUSTARÍA QUE MEJOREN EN EL SERVICIO DE TRANSPORTE? <br><br>"
        );
      }
      console.log(datos);

      Swal.fire({
        position: "",
        imageUrl: "../src/img/firma.jpg",
        imageWidth: 100,
        imageHeight: 100,
        imageAlt: "Custom image",
        icon: "error",
        title: "<h6 style='color:red;'>" + mensaje_error + "</h6>",
        showConfirmButton: true,
        timer: false,
      });
    } else {
      $.ajax({
        url: "../Controlador/encuesta_controlador.php?op=registrar",
        type: "POST",
        data: datos,
        success: function (data) {
          console.log(data);
          if (data == 1) {
            Swal.fire({
              position: "top-center",
              imageUrl: "../src/img/firma.jpg",
              imageWidth: 100,
              imageHeight: 100,
              imageAlt: "Custom image",
              icon: "success",
              title:
                "Datos guardados correctamente.<br> ¡Gracias por participar!",
              showConfirmButton: false,
              footer: "<a class='btn btn-primary' href='formulario.php'>Ok</a>",
              timer: false,
            });
          } else {
            console.log(data);
          }
        },
      }); //fin del ajax
    }
  }); //btn guardar.
  $("#IDENTIDAD").on("focusout", function () {
    var identidad = $(this).val();
    $.post(
      "../Controlador/encuesta_controlador.php?op=identidad",
      { IDENTIDAD: identidad },
      function (data, status) {
        if (data == 0) {
          $("#IDENTIDAD").val("");
          Swal.fire({
            position: "",
            imageUrl: "../src/img/firma.jpg",
            imageWidth: 100,
            imageHeight: 100,
            imageAlt: "Custom image",
            icon: "warning",
            title: "<h2>Esta persona ya completo el censo</h2>",
            showConfirmButton: true,
            timer: false,
          });
        }
      }
    );
  }); //consulta identidad
}); //fin de document ready
