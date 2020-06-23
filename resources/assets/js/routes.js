import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export default new Router({


    routes: [

        {
            path: '/',
            name: 'dashboard',
            component: require('./views/Dashboard')
        },

        {
            path: '/administrar/vehiculos',
            name: 'administrarvehiculos',
            component: require('./views/AdministrarVehiculos')
        },

        {
            path: '/administrar/productos',
            name: 'administrarproductos',
            component: require('./views/AdministrarProductos')
        },

        {
            path: '*',
            component: require('./views/404')
        }

        

    ],

    mode: 'history'


})

