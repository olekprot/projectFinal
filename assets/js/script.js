/*UPDATE*/

document.querySelectorAll('.edit-btn').forEach(button => {
    button.addEventListener('click', function (event) {
        event.preventDefault(); // Cancelar la transición de enlace estándar

        // Obtención de datos de los atributos data-*
        const id = this.getAttribute('data-id');
        const nombre = this.getAttribute('data-nombre');
        const code = this.getAttribute('data-code');
        const size = this.getAttribute('data-size');
        const price = this.getAttribute('data-price');
        const quantity = this.getAttribute('data-quantity');
        const image = this.getAttribute('data-image');
        const tableName = this.getAttribute('data-table'); // Nombre del tabla

        // Formulario
        const form = document.getElementById('editForm');
        form.innerHTML = `
            <h2>Editar Producto</h2>
            <input type="hidden" name="id" value="${id}">
            <input type="hidden" name="tableName" value="${tableName}">
            <label>Nombre: <input type="text" name="nombre" value="${nombre}"></label>
            <label>Code: <input type="text" name="code" value="${code}"></label>
            <label>Size: <input type="text" name="size" value="${size}"></label>
            <label>Price: <input type="text" name="price" value="${price}"></label>
            <label>Quantity: <input type="text" name="quantity" value="${quantity}"></label>
            <label>Image: <input type="text" name="image" value="${image}"></label>
            <button type="submit" class="edit-btn" id="saveChanges">Guardar Cambios</button>
        `;

        // Mostrar una ventana modal
        document.getElementById('editModal').style.display = 'block';
        document.getElementById('modalBackdrop').style.display = 'block';
    });
});

document.getElementById('editForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Anulación del comportamiento de envío de formulario predeterminado

    // ganar los datos del formulario
    const formData = new FormData(this);

    // enviar los datos al servidor
    fetch('../finalProject/components/_updateOrder.php', {
        method: 'POST',
        body: formData,
    })
        .then(response => {
            if (!response.ok) {
                throw new Error(`Error del servidor: ${response.status}`);
            }
            return response.text(); // Respuesta del servidor
        })
        .then(result => {
            console.log("Respuesta:", result); // Registra el resultado en la consola

            // cerrar la ventana modal
            document.getElementById('editModal').style.display = 'none';
            document.getElementById('modalBackdrop').style.display = 'none';
            window.location.reload();
        })
        .catch(error => {
            console.error('Error:', error); // Log de errores
            alert('Los errores han sido corregidos');
        });
});
document.getElementById('closeModal').addEventListener('click', function () {
    document.getElementById('editModal').style.display = 'none';
    document.getElementById('modalBackdrop').style.display = 'none';
});
/*END UPDATE*/

/*DELETE*/

document.querySelectorAll('.delete-btn').forEach(button => {
    button.addEventListener('click', function (event) {
        event.preventDefault();

        const deleteModal = document.getElementById('deleteModal');
        const modalBackdrop = document.getElementById('modalBackdrop');
        const confirmDelete = document.getElementById('confirmDelete');
        const cancelDelete = document.getElementById('cancelDelete');

        // Mostrar una ventana modal
        deleteModal.style.display = 'block';
        modalBackdrop.style.display = 'block';

        // Recibimos datos para el envío
        const form = this.closest('form');
        const formData = new FormData(form);
        const queryString = new URLSearchParams(formData).toString();

        // Confirmar eliminación
        confirmDelete.onclick = function () {
            fetch(`components/_deleteProduct.php?${queryString}`, { method: 'GET' })
                .then(response => response.json())
                .then(result => {
                    if (result.status === 'success') {
                        alert(result.message); // Ventana modal con éxito
                        window.location.reload(); // Recargar página
                    } else {
                        alert(result.message); // Ventana modal con error
                    }

                    // Cerrar la ventana modal
                    deleteModal.style.display = 'none';
                    modalBackdrop.style.display = 'none';
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error al eliminar elemento.');

                    // Cerrar la ventana modal
                    deleteModal.style.display = 'none';
                    modalBackdrop.style.display = 'none';
                });
        };

        // Cancelar eliminación
        cancelDelete.onclick = function () {
            deleteModal.style.display = 'none';
            modalBackdrop.style.display = 'none';
        };
    });
});

/*END DELETE*/

/*Mobile*/


