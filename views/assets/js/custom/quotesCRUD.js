// Variables and selectors
const quoteData = {
  empresa: "",
  idCotizacion2: "",
  fechaInicio: "",
  fechaTermino: "",
  insumos: "",
  cantidad: "",
  valorUnitario: "",
  valorVenta: "",
  porcentaje: "",
  despacho: "",
  total: "",
  valorGanancia: "",
  comentarios: "",
};

// JQuery initiations
$("#tablaCotizaciones").DataTable({
  language: {
    url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
  },
});

// Event listeners
$(".modificar").click(handlerClickEditButton);

$("#quote-form").on("input", handlerInput);

$("#btn-agregar").click(handlerSubmit);

// Functions

function handlerInput(e) {
  quoteData[e.target.getAttribute("name")] = e.target.value;
}

async function handlerSubmit(e) {
  e.preventDefault();
  if (
    quoteData.cantidad == "" ||
    quoteData.valorUnitario == "" ||
    quoteData.porcentaje == ""
  ) {
    return;
  }

  fillInTheRemainingFields();

  let msg =
    $("#accion").val() == "modificar"
      ? "El registro se ha actualizado satisfactoriamente"
      : "Los datos de la cotización han sido guardados";

  await sendData();

  await updateTable($("#accion").val());

  resetForm();
  resetQuoteData();

  Swal.fire("Exito!", msg, "success");
}

function resetQuoteData() {
  Object.keys(quoteData).forEach((key) => (quoteData[key] = ""));
}

function updateTable(action) {
  action == "agregar" ? addRow() : updateRow();
}

function updateRow() {
  const row = $(`#${quoteData.idCotizacion}`).parent().parent()[0];
  const values = Object.values(quoteData).slice(
    0,
    Object.values(quoteData).length - 2
  );

  const dataTable = $("#tablaCotizaciones").DataTable();

  values.unshift(quoteData["idCotizacion"]);

  values.push(
    `<td style="padding-left: 5px;">
        <a href="#" class="modificar" id="${quoteData.idCotizacion}">
          <img src="${base_url}/views/assets/img/edit.ico" width="40">
        </a>
      </td>`,
    `
      <td style="padding-left: 5px;">
        <a href="${base_url}/?controller=User&action=index&accion=eliminar&amp;idUsuario=${quoteData.idCotizacion}">
          <img src="${base_url}/views/assets/img/delete.png" width="40">
        </a>
      </td>`
  );

  dataTable.row(row).data(values).draw(false);

  $(`#${quoteData.idCotizacion}`).click(handlerClickEditButton);
}

async function addRow() {
  const t = $("#tablaCotizaciones").DataTable();

  const data = await getLastQuoteSaved();
  t.row
    .add([
      data.idCotizacion,
      data.empresa,
      data.idCotizacion2,
      data.fechaInicio,
      data.fechaTermino,
      data.insumos,
      data.cantidad,
      data.valorUnitario,
      data.valorVenta,
      data.porcentaje,
      data.despacho,
      data.total,
      data.valorGanancia,

      `<td style="padding-left: 5px;">
        <a href="#" class="modificar" id="${data.idCotizacion}">
          <img src="${base_url}/views/assets/img/edit.ico" width="40">
        </a>
      </td>`,
      `
      <td style="padding-left: 5px;">
        <a href="${base_url}/?controller=Quote&action=index&accion=eliminar&idUsuario=${data.idCotizacion}">
          <img src="${base_url}/views/assets/img/delete.png" width="40">
        </a>
      </td>`,
    ])
    .draw(false);

  $(`#${data.idCotizacion}`).click(handlerClickEditButton);
}

async function getLastQuoteSaved() {
  const formData = new FormData();
  formData.append("getLastRegisterSaved", true);

  try {
    const response = await fetch(QUOTE_CONTROLLER, {
      body: formData,
      method: "post",
    });
    const { result } = await response.json();
    console.log(result);
    return result;
  } catch (error) {
    console.log(error);
  }
}

function resetForm() {
  document.querySelector("#quote-form").reset();

  $("#accion").val("agregar");
  $("#idCotizacion").val("");

  if (document.querySelector("#btn-cancelar")) {
    document.querySelector("#btn-cancelar").remove();
  }
}

async function sendData() {
  const formData = new FormData();
  Object.keys(quoteData).forEach((key) => {
    formData.append(key, quoteData[key]);
  });

  formData.append("accion", document.querySelector("#accion").value);
  formData.append(
    "idCotizacion",
    document.querySelector("#idCotizacion").value
  );

  try {
    const response = await fetch(QUOTE_CONTROLLER, {
      body: formData,
      method: "post",
    });
    const { result } = await response.json();

    console.log(result);
  } catch (error) {
    console.log(error);
  }
}

function fillInTheRemainingFields() {
  quoteData.valorVenta = calculateSaleValue();
  quoteData.total = calculateTotal();
  quoteData.valorGanancia = calculateEarnedValue();
}

function showCancelButton() {
  if (!document.querySelector("#btn-cancelar")) {
    const cancelBtn = document.createElement("button");
    cancelBtn.id = "btn-cancelar";
    cancelBtn.classList.add("btn", "btn-danger");
    cancelBtn.setAttribute("type", "button");
    cancelBtn.textContent = "Cancelar";

    cancelBtn.addEventListener("click", resetForm);

    document.querySelector("#btn-agregar").parentElement.append(cancelBtn);
  }
}

function handlerClickEditButton(e) {
  e.preventDefault();
  window.scroll(0, window.outerHeight);
  showCancelButton();
  $.ajax({
    type: "GET",
    url: `${QUOTE_CONTROLLER}?idCotizacion=${this.id}"&getQuoteById="true`,
    success: function (data) {
      const { result } = JSON.parse(data);

      Object.keys(result).forEach((key) => {
        quoteData[key] = result[key];
      });

      fillInTheRemainingFields();

      $("#idCotizacion").val(result.idCotizacion);
      $("#empresa").val(result.empresa);
      $("#idCotizacion2").val(result.idCotizacion2);
      $("#fechaInicio").val(result.fechaInicio);
      $("#fechaTermino").val(result.fechaTermino);
      $("#insumos").val(result.insumos);
      $("#comentarios").val(result.comentarios);
      $("#cantidad").val(result.cantidad);
      $("#valorUnitario").val(result.valorUnitario);
      $("#porcentaje").val(result.porcentaje);
      $("#despacho").val(result.despacho);
      $("#accion").val("modificar");
    },
  });
}

function calculateSaleValue() {
  return (Math.pow(quoteData.valorUnitario, 2) * quoteData.porcentaje) / 100;
}

function calculateTotal() {
  return quoteData.valorVenta * quoteData.cantidad;
}

function calculateEarnedValue() {
  return quoteData.cantidad * (quoteData.valorVenta - quoteData.valorUnitario);
}
