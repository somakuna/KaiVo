/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp, h } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m.js';


window._ = _;

const app = createApp({}).use(ZiggyVue);

import WorkingOrderComponent from './components/WorkingOrderComponent.vue';
app.component('workingorder-component', WorkingOrderComponent);

import ItemComponent from './components/ItemComponent.vue';
app.component('item-component', ItemComponent);

import ItemEditComponent from './components/ItemEditComponent.vue';
app.component('item-edit-component', ItemEditComponent);

app.mount('#app');
