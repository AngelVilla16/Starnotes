async function traerpendiente(q = ""){
    try{
        const url = q 
            ?`../../Modelo/traerpost.php?q=${encodeURIComponent(q)}`
            : "../../Modelo/traerpost.php";
        const res = await fetch(url);
        const data = await res.json();

        mostrarPendiente(data);
        console.log(data);

    }
    catch(error){
        console.error("Error al cargar publicaciones ", error);
    }
}

function mostrarPendiente(pendientes){
    const feed = document.getElementById('pendientes-principal');
    feed.innerHTML = "";

    pendientes.forEach(p=>{
        const div = document.createElement("div");
        div.classList.add("pendiente");
        div.dataset.id = p.Idpendiente;

        div.innerHTML= ` <div class="pendiente-header">
        ${p.Titulo}
        </div>
        <div class="pendiente-info">
        ${p.Descripcion}
        </div>
        `;
       
        
        
        feed.appendChild(div);
    });
}
document.addEventListener("DOMContentLoaded", () => {
    traerpendiente();
});
