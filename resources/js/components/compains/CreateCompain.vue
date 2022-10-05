<template>
    <div v-if="errors">
        <div
            class="bg-red-500 text-red rounded font-bold mb-4 shadow-lg py-2 px-4 pr-0"
        >
            <p class="text-sm">
                {{ errors }}
            </p>
        </div>
    </div>

    <form class="space-y-6" @submit.prevent="saveCompain">
        <div class="space-y-4 rounded-md shadow-sm">
            <div>
                <label
                    for="name"
                    class="block text-sm font-medium text-gray-700"
                    >Name</label
                >
                <div class="mt-1">
                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="form.name"
                    />
                </div>
            </div>

            <div>
                <label
                    for="from"
                    class="block text-sm font-medium text-gray-700"
                    >Start from</label
                >
                <div class="mt-1">
                    <input
                        type="text"
                        name="from"
                        id="from"
                        class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="form.from"
                    />
                </div>
            </div>

            <div>
                <label for="to" class="block text-sm font-medium text-gray-700"
                    >End at</label
                >
                <div class="mt-1">
                    <input
                        type="text"
                        name="to"
                        id="to"
                        class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="form.to"
                    />
                </div>
            </div>

            <div>
                <label
                    for="daily_budget"
                    class="block text-sm font-medium text-gray-700"
                    >Daily budget</label
                >
                <div class="mt-1">
                    <input
                        type="number"
                        name="daily_budget"
                        id="daily_budget"
                        class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="form.daily_budget"
                    />
                </div>
            </div>
            <div>
                <label
                    for="total"
                    class="block text-sm font-medium text-gray-700"
                    >Total</label
                >
                <div class="mt-1">
                    <input
                        type="number"
                        name="total"
                        id="total"
                        class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="form.total"
                    />
                </div>
            </div>
            <div>
                <label
                    for="images"
                    class="block text-sm font-medium text-gray-700"
                    >images</label
                >
                <div class="mt-1">
                    <input
                        type="file"
                        name="images"
                        id="images"
                        accept="image/*"
                        class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        @change="getImageData"
                        multiple
                    />
                </div>

            </div>
            <!-- <input type="file" accept="image/*" @change="uploadImage" /> -->
        </div>
                <br>

        <center><button
            type="submit"
            class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 rounded-md border border-transparent ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25"
        >
            Create
        </button></center>
    </form>
</template>

<script setup>
import { reactive } from "vue";
import useCompanies from "../../composables/compains";

const form = reactive({
    name: "",
    from: "",
    to: "",
    daily_budget: "",
    total: "",
});
const { errors, storeCompain } = useCompanies();
const data = new FormData();

const getImageData = (event) => {
    const files = event.target.files;
    for (let i = 0; i < files.length; i++) {
        console.log(files[i]);
        data.append("images[" + i + "]", files[i]);
    }
};

const saveCompain = async () => {
    data.append("name", form.name);
    data.append("from", form.from);
    data.append("to", form.to);
    data.append("total", form.total);
    data.append("daily_budget", form.daily_budget);

    await storeCompain(data);
};
</script>
