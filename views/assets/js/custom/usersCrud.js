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

$(document).ready(function () {
  $("#tablaUsuarios").DataTable({
    language: {
      url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
    },
  }),
    $(".modificar").click(handlerClickEditButton);
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
  xml.open("POST", USER_CONTROLLER);
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
      `<td style="padding-left: 5px;">
        <a href="#" class="modificar" id="${idUsuario}">
          <img src="${base_url}/views/assets/img/edit.ico" width="40">
        </a>
      </td>`,
      `
      <td style="padding-left: 5px;">
        <a href="${base_url}/?controller=User&action=index&accion=eliminar&amp;idUsuario=${idUsuario}">
          <img src="${base_url}/views/assets/img/delete.png" width="40">
        </a>
      </td>`
    ])
    .draw(false);

  $(`#${idUsuario}`).click(handlerClickEditButton);
}

async function getLastUserSaved() {
  const formData = new FormData();
  formData.append("get_last_user_saved", true);

  try {
    const res = await fetch(USER_CONTROLLER, {
      method: "POST",
      body: formData,
    });

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
      <td style="padding-left: 5px;">
        <a href="#" class="modificar" id="${id}">
          <img src="${base_url}/views/assets/img/edit.ico" width="40">
        </a>
      </td>
      <td style="padding-left: 5px;">
        <a href="${base_url}/?controller=User&action=index&accion=eliminar&amp;idUsuario=${id}">
          <img src="${base_url}/views/assets/img/delete.png" width="40">
        </a>
      </td>
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
    url: `${USER_CONTROLLER}?idUsuario=${this.id}&get_all_by_id=true`,
    success: function (data) {
      // console.log(data)

      const { response } = JSON.parse(data);

      $("#idUsuario").val(response.idUsuario);
      $("#nombre").val(response.nombre);
      $("#perfil").val(response.perfil);
      $("#accion").val("modificar");
    },
  });
}

async function getUserDataById(id) {
  const data = new FormData();
  data.append("get_all_by_id", true);
  data.append("id", id);
  try {
    const res = await fetch(USER_CONTROLLER, {
      method: "post",
      body: data,
    });
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
