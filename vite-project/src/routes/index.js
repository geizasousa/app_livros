import {createRouter, createWebHashHistory} from 'vue-router';
import Livros from "../views/Livros.vue";
import Home from "../views/Home.vue";
import Autor from "../views/Autor.vue";
import Assunto from "../views/Assunto.vue";

const routes = [
    { path: '/home', component: Home },
    { path: '/livros', component: Livros },
    { path: '/autor', component: Autor },
    { path: '/assunto', component: Assunto },
]

const router = createRouter({
    history: createWebHashHistory(),
    routes,
})

export default router;
