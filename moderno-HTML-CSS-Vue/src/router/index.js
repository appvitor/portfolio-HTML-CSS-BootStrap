import Vue from 'vue'
import Router from 'vue-router'
import home from '@/components/home'
import contact from '@/components/contact'

Vue.use(Router)

export default new Router({
  routes: [
    {
    	path:'/',
    	redirect : 'home'
    },
    {
      path: '/home',
      name: 'home',
      component: home
    },
    {
    	path:'/contact',
    	name: 'contact',
    	component: contact
    }
  ]
})
