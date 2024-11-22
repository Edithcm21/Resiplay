
 // Obtener el contenedor donde se agregarán los select y input
 const residuosContainer = document.getElementById('residuosContainer');
 const addMoreButton = document.getElementById('addMore');
 const residuos= window.residuos;
 
 // Función para agregar un nuevo conjunto de select e input
 if (addMoreButton ) {
    
    addMoreButton.addEventListener('click', function() {
        const newRow = document.createElement('div');
        newRow.classList.add('row', 'mb-3','row1');
                              
        let opcionesResiduo = `<option value="" disabled selected >Selecciona un residuo</option>`;
        residuos.forEach(function(residuo) {
           opcionesResiduo += `<option value = "${residuo.id_tipo}">${residuo.nombre_tipo}</option>`;
        });
       
        newRow.innerHTML = `
            <div class="col-md-5">
                <select name="residuos[]" class="form-select " required>
                    ${opcionesResiduo}
                </select>
            </div>
            <div class="col-md-2">
               <input class="inputC form-control " type="number" name="cantidades[] " value="0"  min="0" onchange="updateTotals() " required>
            </div>
            <div class="col-md-2">
                <input class="inputC  form-control " type="text"   name="porcentajes[]" value="0 %" min="0" onchange="updateTotals() " required>
            </div>
            <div class="col-md-3">
                <button type="button" class="btn btn-danger btn-remove" style="width:90%">Eliminar</button>
            </div>
        `;
        residuosContainer.appendChild(newRow);
   
        // Añadir funcionalidad de eliminar para este nuevo conjunto
        addRemoveFunctionality();
    });
 }
 // Función para eliminar un conjunto de select e input
 function addRemoveFunctionality() {
     const removeButtons = document.querySelectorAll('.btn-remove');
     removeButtons.forEach(button => {
         button.addEventListener('click', function() {
             this.closest('.row').remove();
             updateTotals();
         });
     });
     
 }


 //Funcion para obtener los totales y el porcentaje 
 function updateTotals() {
    let totalCantidad = 0;
    let totalPorcentaje = 0;
    
    // Obtener todos los inputs de cantidad
    const cantidadInputs = document.querySelectorAll('input[type="number"][name^="cantidades"]');
    cantidadInputs.forEach(input => {
        totalCantidad += parseFloat(input.value) || 0; // Sumar las cantidades
        
    });

    // Actualizar los inputs de porcentaje basado en la cantidad total
    cantidadInputs.forEach(input => {
        const cantidad = parseFloat(input.value) || 0; // Obtener la cantidad
        const porcentaje = totalCantidad > 0 ? ((cantidad / totalCantidad) * 100).toFixed(2) : 0; // Calcular el porcentaje
        const porcentajeInput = input.closest('.row1').querySelector('input[name^="porcentajes"]'); // Encontrar el input de porcentaje en la misma fila
        porcentajeInput.value = porcentaje + '%'; // Actualizar el valor del porcentaje
    });

    // Actualizar el total de cantidades
    document.getElementById('totalC').innerText = totalCantidad;

    // Sumar el total de porcentajes para mostrarlo en la tabla total
    document.getElementById('totalP').innerText = '100%';
}


document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('form_perfilEdit').addEventListener('submit',function(e){
        console.log('entro a la funcion ');
        
        var password= document.getElementById('password').value;
        var password_confirmation= document.getElementById('password_confirmation').value;
        var igual= document.getElementById('igual');

        if(password !== password_confirmation){
            e.preventDefault(); 
            igual.style.display = 'block';
        }
        else{
            igual.style.display='none';
        }

    });
});
