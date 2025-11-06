import { createApp } from 'vue';
import ClientesComponent from './components/ClientesComponent.vue';
import PlanesComponent from './components/PlanesComponent.vue';
import VentasComponent from './components/VentasComponent.vue';

const app = createApp({});

app.component('clientes-component', ClientesComponent);
app.component('planes-component', PlanesComponent);
app.component('ventas-component', VentasComponent);

app.mount('#app');


