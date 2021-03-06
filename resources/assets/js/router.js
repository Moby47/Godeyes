
import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

import index from './components/index.vue'

import reg from './components/auth/reg.vue'
import signin from './components/auth/signin.vue'

import checkIn from './components/rider/checkIn.vue'
import rider from './components/rider/rider.vue'
import success from './components/rider/success.vue'
import timeline from './components/rider/timeline.vue'
import dailyRec from './components/rider/dailyRec.vue'

import daily from './components/captain/daily.vue'
import alltime from './components/captain/alltime.vue'
import board from './components/captain/board.vue'
import addRider from './components/captain/addRider.vue'

import notfound from './components/notfound.vue'

export default new Router({
    mode: 'history',
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
                auth: true
            }
        },
        {
            path: '/signin',
            name: 'signin',
            component: signin,
             meta:{
              //  auth: true
            }
        },
        {
            path: '/signup',
            name: 'reg',
            component: reg,
             meta:{
              //  auth: true
            }
        },
        {
            path: '/check-in',
            name: 'checkIn',
            component: checkIn,
             meta:{
                auth: true
            }
        },
        {
            path: '/success',
            name: 'success',
            component: success,
             meta:{
                auth: true
            }
        },
        {
            path: '/time-line',
            name: 'timeline',
            component: timeline,
             meta:{
                auth: true
            }
        },
        {
            path: '/view-daily-records',
            name: 'dailyRec',
            component: dailyRec,
             meta:{
                auth: true
            }
        },
        {
            path: '/daily-records',
            name: 'daily',
            component: daily,
             meta:{
              //  auth: true
            }
        },
        {
            path: '/alltime-records',
            name: 'alltime',
            component: alltime,
             meta:{
              //  auth: true
            }
        },
        {
            path: '/board',
            name: 'board',
            component: board,
             meta:{
               // auth: true
            }
        },
        {
            path: '/add-rider',
            name: 'addRider',
            component: addRider,
             meta:{
              //  auth: true
            }
        },
        {
            path: '*',
            name: 'notfound',
            component: notfound,
             meta:{
              
            }
        },
      
    ]
})
