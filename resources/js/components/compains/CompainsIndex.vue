<template>
    <div
        class="overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-md"
    >
        <div class="flex place-content-end mb-4">
            <div
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
            >
                <router-link
                    :to="{ name: 'compains.create' }"
                    class="text-sm font-medium"
                    >Create company</router-link
                >
            </div>
        </div>

        <table class="min-w-full border divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-50">
                        <span
                            class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase"
                            >Name</span
                        >
                    </th>
                    <th class="px-6 py-3 bg-gray-50">
                        <span
                            class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase"
                            >Start Date</span
                        >
                    </th>
                    <th class="px-6 py-3 bg-gray-50">
                        <span
                            class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase"
                            >End Date</span
                        >
                    </th>
                    <th class="px-6 py-3 bg-gray-50">
                        <span
                            class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase"
                            >Dailt Budget</span
                        >
                    </th>
                    <th class="px-6 py-3 bg-gray-50">
                        <span
                            class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase"
                            >Total Budget</span
                        >
                    </th>
                    <th class="px-6 py-3 bg-gray-50">
                        <span
                            class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase"
                            >Images</span
                        >
                    </th>
                    <th class="px-6 py-3 bg-gray-50"></th>
                </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                <template v-for="item in compains" :key="item.id">
                    <tr class="bg-white">
                        <td
                            class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap"
                        >
                            {{ item.name }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap"
                        >
                            {{ item.from }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap"
                        >
                            {{ item.to }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap"
                        >
                            {{ item.daily_budget }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap"
                        >
                            {{ item.total }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap"
                        >
                           <router-link
                                :to="{
                                    name: 'compains.images',
                                    params: { id: item.id },
                                }"
                                class="mr-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                            >
                                Show
                            </router-link>
                        </td>
                        <td
                            class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap"
                        >
                            <router-link
                                :to="{
                                    name: 'compains.edit',
                                    params: { id: item.id },
                                }"
                                class="mr-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                            >
                                Edit
                            </router-link>
                            <br /><br />
                            <button
                                @click="deleteCompain(item.id)"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                            >
                                Delete
                            </button>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>
</template>
<script setup>
import useCompains from "../../composables/compains";
import { onMounted } from "vue";
const { compains, getCompains, destroyCompain } = useCompains();

const deleteCompain = async (id) => {
    if (!window.confirm("Are you sue?")) {
        return;
    }
    await destroyCompain(id);
    await getCompains();
};

onMounted(() => {
    getCompains();
});
// export default {
// setup(){
//     const {compains, getCompains} = useCompains();
//     return {
//         compains
//     }
// }
// }
</script>
