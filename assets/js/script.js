// Ngarkimi i të gjithë të dhënave
async function loadData(endpoint, containerId, template) {
    try {
        const response = await fetch(`/db/${endpoint}`);
        const data = await response.json();
        const container = document.getElementById(containerId);
        
        data.forEach(item => {
            container.innerHTML += template(item);
        });
    } catch (error) {
        console.error('Gabim:', error);
    }
}

// Shembull për produktet
const productTemplate = (product) => `
    <div class="product-card">
        <img src="${product.image}" alt="${product.title}">
        <div class="product-title">${product.title}</div>
        <div class="product-price">${product.price} €</div>
        <button class="shto-ne-shporte" 
                data-id="${product.id}" 
                data-price="${product.price}">
            Shto në Shportë
        </button>
    </div>
`;

document.addEventListener('DOMContentLoaded', () => {
    loadData('products_api.php', 'products-list', productTemplate);
});