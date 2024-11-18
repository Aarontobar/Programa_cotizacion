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
    -------------------------------------- INICIO ITred Producto .JS --------------------------------------
    ------------------------------------------------------------------------------------------------------------- */

// Array to store products
let productos = [];

// Function to render products
function renderizarProductos() {
    const tbody = document.getElementById('productos-body');
    if (!tbody) {
        console.error('Element with id "productos-body" not found');
        return;
    }
    tbody.innerHTML = '';
    productos.forEach((producto, index) => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td><input type="text" value="${producto.nombre_producto}" onchange="actualizarProducto(${index}, 'nombre_producto', this.value)"></td>
            <td><input type="number" value="${producto.cantidad}" onchange="actualizarProducto(${index}, 'cantidad', this.value)"></td>
            <td><input type="number" value="${producto.precio_unitario}" onchange="actualizarProducto(${index}, 'precio_unitario', this.value)"></td>
            <td>${producto.total.toFixed(2)}</td>
            <td><button onclick="eliminarProducto(${index})">Eliminar</button></td>
        `;
        tbody.appendChild(tr);
    });
    calcularTotales();
}

// Function to update a product
function actualizarProducto(index, campo, valor) {
    productos[index][campo] = campo === 'nombre_producto' ? valor : parseFloat(valor);
    productos[index].total = productos[index].cantidad * productos[index].precio_unitario;
    renderizarProductos();
}

// Function to add a new product
function agregarProducto() {
    productos.push({
        nombre_producto: 'Nuevo Producto',
        cantidad: 1,
        precio_unitario: 0,
        total: 0
    });
    renderizarProductos();
}

// Function to remove a product
function eliminarProducto(index) {
    productos.splice(index, 1);
    renderizarProductos();
}

// Function to calculate totals
function calcularTotales() {
    const subtotal = productos.reduce((sum, producto) => sum + producto.total, 0);
    const iva = subtotal * 0.19; // Assuming 19% IVA
    const total = subtotal + iva;

    const subtotalElement = document.getElementById('subtotal');
    const ivaElement = document.getElementById('iva');
    const totalElement = document.getElementById('total_final');

    if (subtotalElement) subtotalElement.textContent = subtotal.toFixed(2);
    if (ivaElement) ivaElement.textContent = iva.toFixed(2);
    if (totalElement) totalElement.textContent = total.toFixed(2);
}

// Function to initialize the product table
function inicializarTablaProductos() {
    const agregarProductoButton = document.getElementById('agregar-producto');
    if (agregarProductoButton) {
        agregarProductoButton.addEventListener('click', agregarProducto);
    } else {
        console.error('Element with id "agregar-producto" not found');
    }

    // Check if productos array is empty and add an initial product if needed
    if (productos.length === 0) {
        agregarProducto();
    } else {
        renderizarProductos();
    }
}

// Call the initialization function when the DOM is fully loaded
document.addEventListener('DOMContentLoaded', inicializarTablaProductos);

/* --------------------------------------------------------------------------------------------------------------
    ---------------------------------------- FIN ITred Spa Producto .JS  ---------------------------------------
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