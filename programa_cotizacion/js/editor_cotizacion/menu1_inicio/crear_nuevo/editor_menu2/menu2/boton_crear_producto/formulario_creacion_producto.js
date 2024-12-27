
/* 
Sitio Web Creado por ITred Spa.
Direccion: Guido Reni #4190
Pedro Aguirre Cerda - Santiago - Chile
contacto@itred.cl o itred.spa@gmail.com
https://www.itred.cl
Creado, Programado y Diseñado por ITred Spa.
BPPJ 
*/


/* --------------------------------------------------------------------------------------------------------------
    -------------------------------------- INICIO ITred Spa Formulario Creación Producto .JS --------------------------------------
    ------------------------------------------------------------------------------------------------------------- */

    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('productos-form');
        
        // Inicializar validación del formulario
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            if (validateForm()) {
                submitForm();
            }
        });
    
        // Función para validar el formulario
        function validateForm() {
            let isValid = true;
            const requiredFields = form.querySelectorAll('[required]');
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    showError(field, 'Este campo es obligatorio');
                } else {
                    clearError(field);
                }
    
                // Validación específica para precios
                if (field.name.includes('precio_producto')) {
                    const price = parseFloat(field.value);
                    if (isNaN(price) || price <= 0) {
                        isValid = false;
                        showError(field, 'Ingrese un precio válido mayor a 0');
                    }
                }
            });
    
            // Validación de archivos
            const fileInputs = form.querySelectorAll('input[type="file"]');
            fileInputs.forEach(input => {
                if (input.files.length > 0) {
                    const file = input.files[0];
                    if (!file.type.startsWith('image/')) {
                        isValid = false;
                        showError(input, 'Por favor, seleccione un archivo de imagen válido');
                    } else if (file.size > 5000000) { // 5MB max
                        isValid = false;
                        showError(input, 'El archivo es demasiado grande. Máximo 5MB');
                    }
                }
            });
    
            return isValid;
        }
    
        // Función para mostrar errores
        function showError(field, message) {
            clearError(field); // Limpiar error existente primero
            const error = document.createElement('div');
            error.className = 'error-message';
            error.style.color = 'red';
            error.style.fontSize = '12px';
            error.style.marginTop = '5px';
            error.textContent = message;
            field.parentNode.appendChild(error);
            field.classList.add('error');
        }
    
        // Función para limpiar errores
        function clearError(field) {
            const existingError = field.parentNode.querySelector('.error-message');
            if (existingError) {
                existingError.remove();
            }
            field.classList.remove('error');
        }
    
        // Función para enviar el formulario
        function submitForm() {
            const formData = new FormData(form);
            
            // Mostrar indicador de carga
            const submitButton = form.querySelector('button[type="submit"]');
            const originalText = submitButton.textContent;
            submitButton.disabled = true;
            submitButton.textContent = 'Guardando...';
    
            fetch('procesar_productos.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error en la respuesta del servidor');
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    alert('Productos guardados correctamente');
                    window.location.href = 'crear_producto_pr.php?success=1';
                } else {
                    alert(data.message || 'Error al guardar los productos');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Ocurrió un error al procesar los productos');
            })
            .finally(() => {
                // Restaurar el botón
                submitButton.disabled = false;
                submitButton.textContent = originalText;
            });
        }
    });
    
    // Función para agregar una nueva fila de producto
    function addRow() {
        const tbody = document.querySelector('#productos-table tbody');
        const template = tbody.querySelector('tr').cloneNode(true);
        
        // Limpiar los valores del template
        template.querySelectorAll('input, textarea, select').forEach(field => {
            field.value = '';
            field.classList.remove('error');
            const errorMessage = field.parentNode.querySelector('.error-message');
            if (errorMessage) {
                errorMessage.remove();
            }
        });
        
        tbody.appendChild(template);
    }
    
    // Función para eliminar una fila de producto
    function removeRow(button) {
        const tbody = document.querySelector('#productos-table tbody');
        if (tbody.children.length > 1) {
            button.closest('tr').remove();
        } else {
            alert('Debe mantener al menos una fila de producto');
        }
    }

/* --------------------------------------------------------------------------------------------------------------
    ---------------------------------------- FIN ITred Spa Formulario Creación Producto .JS ---------------------------------------
    ------------------------------------------------------------------------------------------------------------- */


/*
Sitio Web Creado por ITred Spa.
Direccion: Guido Reni #4190
Pedro Aguirre Cerda - Santiago - Chile
contacto@itred.cl o itred.spa@gmail.com
https://www.itred.cl
Creado, Programado y Diseñado por ITred Spa.
BPPJ
*/