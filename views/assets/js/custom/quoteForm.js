const quoteForm = document.querySelector("#quote-form");
quoteForm.addEventListener("submit", (e) => {
  e.preventDefault();
  const data = new FormData(quoteForm);
  const d = new Date();
  const seconds =
    d.getSeconds().toString().length > 1
      ? d.getSeconds().toString()
      : "0" + d.getSeconds().toString();
  const time = `${d.getHours()} : ${d.getMinutes()} : ${seconds}`;

  data.append("hora", time);
  data.append("submit", true);
  fetch(UTILS, {
    method: "POST",
    body: data,
  })
    .then(() => {
      Swal.fire(
        "¡Archivo Enviado!",
        "El archivo se envio correctamente",
        "success"
      );
      console.log("Enviado");
      addRow();
      quoteForm.reset();
    })
    .catch((error) => console.log(error));
});

async function addRow() {
  const t = $("#tablaAbogados").DataTable();

  const { id, name, fecha, description, ruta, tipo, hora } =
    await getLastArchiveSaved();
  t.row
    .add([
      id,
      name,
      fecha,
      hora,
      description,
      `<td style="padding-left: 5px;"><a href="${base_url}/views/archive.php?id=${id}" target="_blank">${ruta}</a></td>`,
      tipo,
    ])
    .draw(false);
}

async function getLastArchiveSaved() {
  const formData = new FormData();
  formData.append("get_last_archive_saved", true);

  try {
    const res = await fetch(ARCHIVES_CONTROLLER, {
      method: "POST",
      body: formData,
    });

    // return res;

    const { response } = await res.json();

    return response;
  } catch (error) {
    console.log(error);
  }
}
