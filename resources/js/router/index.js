// import { create } from "lodash";
import { createRouter, createWebHistory } from "vue-router";

import CompainsIndex from "../components/compains/CompainsIndex";
import CreateCompain from "../components/compains/CreateCompain";
import EditCompain from "../components/compains/EditCompain";
import CompainImages from "../components/compains/CompainImages";

const routes = [
    {
        path:"/dashboard",
        name:"compains.index",
        component: CompainsIndex
    },
    {
        path:"/compains/create",
        name:"compains.create",
        component: CreateCompain
    },
    {
        path:"/compains/:id/edit",
        name:"compains.edit",
        component: EditCompain,
        props: true
    },
    {
        path:"/compains/:id/images",
        name:"compains.images",
        component: CompainImages,
        props: true
    }
];
export default createRouter({
    history: createWebHistory(),
    routes
});