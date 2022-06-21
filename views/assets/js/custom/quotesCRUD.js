// Variables and selectors
const quoteData = {
  empresa: "",
  idCotizacion2: "",
  fechaInicio: "",
  fechaTermino: "",
  insumos: "",
  cantidad: "",
  comentarios: "",
  valorUnitario: "",
  porcentaje: "",
  despacho: "",
  valorVenta: "",
  valorGanancia: "",
  total: "",
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

function handlerSubmit(e) {
  e.preventDefault();
  if (
    quoteData.cantidad == "" ||
    quoteData.valorUnitario == "" ||
    quoteData.porcentaje == ""
  ) {
    return;
  }

  fillInTheRemainingFields();

  sendData();
  addRow();
  showMessage();
  resetForm()
}

function showMessage() {

}

function addRow() {

}

function resetForm() {
  // document.querySelector('#quote-form').reset();

}

async function sendData() {
  const formData = new FormData();
  Object.keys(quoteData).forEach((key) => {
    formData.append(key, quoteData[key]);
  });

  formData.append('accion', document.querySelector('#accion').value)
  formData.append('idCotizacion', document.querySelector('#idCotizacion').value)

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
  quoteData.valorGanancia = calculateEarnedValue(
    quoteData.cantidad,
    quoteData.valorUnitario,
    quoteData.porcentaje
  );

  quoteData.total = calculateTotal(
    quoteData.cantidad,
    quoteData.valorUnitario,
    quoteData.porcentaje
  );

  quoteData.valorVenta = calculateSaleValue(
    quoteData.valorUnitario,
    quoteData.porcentaje
  );
}

function handlerClickEditButton(e) {
  e.preventDefault();
  window.scroll(0, window.outerHeight);

  $.ajax({
    type: "GET",
    url: `${QUOTE_CONTROLLER}?idCotizacion=${this.id}"&getQuoteById="true`,
    success: function (data) {
      const { result } = JSON.parse(data);

      Object.keys(result).forEach(key => {
        quoteData[key] = result[key]
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

function calculateSaleValue(unitValue, percentage) {
  return (unitValue * percentage) / 100;
}

function calculateTotal(amount, unitValue, percentage) {
  return (unitValue * amount * percentage) / 100;
}

function calculateEarnedValue(amount, unitValue, percentage) {
  return amount * unitValue * (percentage / 100 - 1);
}

