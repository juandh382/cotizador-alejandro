// variables
const userForm = document.querySelector("#user-form");
const btnSubmit = document.querySelector("#btn-submit");
const actionInput = document.querySelector("#accion");
const editButtons = document.querySelectorAll(".modificar");
const idUsuario = document.querySelector("#idUsuario");

// event listeners
userForm.addEventListener("submit", submitForm);
editButtons.forEach((btn) => {
  btn.addEventListener("click", () => {
    if (!document.querySelector("#btn-cancel")) showCancelButton();
  });
});

// functions

function showCancelButton() {
  const cancelButton = document.createElement("button");
  cancelButton.setAttribute("type", "button");
  cancelButton.className = "btn btn-danger";
  cancelButton.id = "btn-cancel";
  cancelButton.style.marginTop = "0px";
  cancelButton.textContent = "Cancelar";
  cancelButton.onclick = function () {
    resetForm();
  };
  userForm.append(cancelButton);
}

function submitForm(e) {
  e.preventDefault();

  const formData = new FormData(userForm),
    xml = new XMLHttpRequest();

  xml.addEventListener("load", function () {
    if (idUsuario.value !== "") {
      Swal.fire(
        "Registro actualizado",
        "Los datos del usuario han sido actualizados exitosamente",
        "success"
      );
      updateRow();

      console.log(JSON.parse(xml.responseText));
    } else {
      Swal.fire(
        "Usuario Guardado",
        "Los datos del usuario han sido almacenados exitosamente",
        "success"
      );
      addRow();
    }

    resetForm();
  });
  xml.open("POST", "https://www.stbmsgingenieria.cl/cotizaciones/Controlador/usuario.php");
  xml.send(formData);
}

async function addRow() {
  const t = $("#tablaUsuarios").DataTable();

  const { idUsuario, nombre, pwd, perfil } = await getLastUserSaved();

  t.row
    .add([
      idUsuario,
      nombre,
      pwd,
      perfil,
      "<td style='padding-left: 5px;'><a href='#' class='modificar' id='" +
        idUsuario +
        "'><img src='img/edit.ico' width='40'></a></td>",
      "<td style='padding-left: 5px;'><a href='../Controlador/usuario.php?accion=eliminar&idUsuario=" +
        idUsuario +
        "'><img src='img/delete.png' width='40'></a></td>",
      "</tr>",
    ])
    .draw(false);

  $(`#${idUsuario}`).click(handlerClickEditButton);
}

async function getLastUserSaved() {
  const formData = new FormData();
  formData.append("get_last_user_saved", true);

  try {
    const res = await fetch(
      "https://www.stbmsgingenieria.cl/cotizaciones/Controlador/usuario.php",
      { method: "POST", body: formData }
    );

    const { response } = await res.json();

    return response;
  } catch (error) {
    console.log(error);
  }
}

async function updateRow() {
  const id = idUsuario.value;
  const { nombre, perfil, pwd } = await getUserDataById(id);
  console.log(id, nombre, perfil, pwd);

  document.querySelectorAll("#tablaUsuarios tr td").forEach((td) => {
    if (td.textContent == id) {
      td.parentElement.innerHTML = `
      <td style="padding-left: 5px;" class="sorting_1">${id}</td><td style="padding-left: 5px;">${nombre}</td>
      <td style="padding-left: 5px;">${pwd}</td>
      <td style="padding-left: 5px;">${perfil}</td>
      <td style="padding-left: 5px;"><a href="#" class="modificar" id="${id}"><img src="img/edit.ico" width="40"></a></td>
      <td style="padding-left: 5px;"><a href="../Controlador/usuario.php?accion=eliminar&amp;idUsuario=${id}"><img src="img/delete.png" width="40"></a></td>
      `;

      $(".modificar").click(handlerClickEditButton);
    }
  });
}

function handlerClickEditButton(e) {
  e.preventDefault();
  window.scroll(0, window.outerHeight);
  if (!document.querySelector("#btn-cancel")) showCancelButton();
  $.ajax({
    type: "GET",
    url: "../Controlador/ajax/datosUsuario.php?idUsuario=" + this.id,
    success: function (data) {
      //alert(data);
      var result = $.parseJSON(data);
      $("#idUsuario").val(result.idUsuario);
      $("#nombre").val(result.nombre);
      $("#perfil").val(result.perfil);
      $("#accion").val("modificar");
    },
  });
}

async function getUserDataById(id) {
  const data = new FormData();
  data.append("get_all_by_id", true);
  data.append("id", id);
  try {
    const res = await fetch(
      "https://www.stbmsgingenieria.cl/cotizaciones/Controlador/usuario.php",
      {
        method: "post",
        body: data,
      }
    );
    const { response } = await res.json();

    return response;
  } catch (error) {
    console.log(error);
  }
}

// Esta funcion reinicia el formulario

function resetForm() {
  userForm.reset();

  btnSubmit.textContent = "Agregar";
  actionInput.value = "agregar";
  idUsuario.value = "";
  if (document.querySelector("#btn-cancel")) {
    document.querySelector("#btn-cancel").remove();
  }
}
