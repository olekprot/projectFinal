

document.querySelectorAll('.edit-btn').forEach(button => {
    button.addEventListener('click', function (event) {
        event.preventDefault(); // Отмена стандартного перехода по ссылке

        // Получение данных из атрибутов data-*
        const id = this.getAttribute('data-id');
        const nombre = this.getAttribute('data-nombre');
        const code = this.getAttribute('data-code');
        const size = this.getAttribute('data-size');
        const price = this.getAttribute('data-price');
        const quantity = this.getAttribute('data-quantity');
        const image = this.getAttribute('data-image');

        // Заполнение формы
        const form = document.getElementById('editForm');
        form.innerHTML = `
            <input type="hidden" name="id" value="${id}">
            <label>Nombre: <input type="text" name="nombre" value="${nombre}"></label><br>
            <label>Code: <input type="text" name="code" value="${code}"></label><br>
            <label>Size: <input type="text" name="size" value="${size}"></label><br>
            <label>Price: <input type="text" name="price" value="${price}"></label><br>
            <label>Quantity: <input type="text" name="quantity" value="${quantity}"></label><br>
            <label>Image: <input type="text" name="image" value="${image}"></label><br>
            <button type="submit" id="saveChanges">Сохранить</button>
        `;

        // Показ модального окна
        document.getElementById('editModal').style.display = 'block';
        document.getElementById('modalBackdrop').style.display = 'block';
    });
});



document.getElementById('editForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Отмена стандартного поведения отправки формы

    // Собираем данные из формы
    const formData = new FormData(this);

    // Отправляем данные на сервер
    fetch('../finalProject/components/_updateOrder.php', {
        method: 'POST',
        body: formData,
    })
        .then(response => {
            if (!response.ok) {
                throw new Error(`Ошибка сервера: ${response.status}`);
            }
            return response.text(); // Здесь читается ответ сервера
        })
        .then(result => {
            console.log("Ответ сервера:", result); // Лог результата в консоль
            alert(result); // Вывод результата в alert
        })
        .catch(error => {
            console.error('Ошибка:', error); // Лог ошибки
            alert('Произошла ошибка при сохранении данных.');
        });
    
});

// Закрытие модального окна
document.getElementById('closeModal').addEventListener('click', function () {
    document.getElementById('editModal').style.display = 'none';
    document.getElementById('modalBackdrop').style.display = 'none';
});

