
import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

import index from './components/index.vue'

import checkIn from './components/rider/checkIn.vue'
import fullName from './components/rider/fullName.vue'
import rider from './components/rider/rider.vue'
import success from './components/rider/success.vue'
import timeline from './components/rider/timeline.vue'

export default new Router({
    routes: [
        {
            path: '/',
            name: 'index',
            component: index,
             meta:{
              //  auth: true
            }
        },
        {
            path: '/rider',
            name: 'rider',
            component: rider,
             meta:{
              //  auth: true
            }
        },
        {
            path: '/full-name',
            name: 'fullName',
            component: fullName,
             meta:{
              //  auth: true
            }
        },
        {
            path: '/check-in',
            name: 'checkIn',
            component: checkIn,
             meta:{
              //  auth: true
            }
        },
        {
            path: '/success',
            name: 'success',
            component: success,
             meta:{
              //  auth: true
            }
        },
        {
            path: '/time-line',
            name: 'timeline',
            component: timeline,
             meta:{
              //  auth: true
            }
        }
    ]
})
